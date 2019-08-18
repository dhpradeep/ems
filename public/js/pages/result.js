$(document).ready(function() {
    refresh();
});

function refresh() {
    getAllData();
    animate(500);
}

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

function animate(sec) {
    var target = document.getElementById('target1');
    var spinner = new Spinner({
        radius: 30,
        length: 0,
        width: 10,
        trail: 40
    }).spin(target);

    sleep(sec).then(() => {
       // $.notify("All records display", "info");
        spinner.stop();
    });
    return;
}

$(document).on("change", "#filterData", function(e) {
    e.preventDefault();
    getAllData();
});

function delete_result(data) {
	if(data != null) {
		BootstrapDialog.show({
	        title: 'Delete',
	        message: '<b>Are you sure to delete this result?</b>',
	        buttons: [{
	            label: 'Yes',
	            cssClass: 'btn-primary',
	            action: function(dialog) {
	                deletedata(data.id);
	                dialog.close();
	            }
	        }, {
	            label: 'No',
	            cssClass: 'btn-warning',
	            action: function(dialog) {
	                dialog.close();
	            }
	        }]
	    });
	}
}


function deletedata(id) {
     $.ajax({
            url: '../result/all/delete',
            async: true,
            type: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                var decode = JSON.parse(response);
                if (decode.success == true) {
                    refresh();
                    $.notify("Record successfully updated", "success");
                } else if (decode.success === false) {
                    decode.errors.forEach(function(element) {
                      $.notify(element, "error");
                    });
                    return;
                }
            },
            error: function(error) {
                console.log("Error:");
                console.log(error.responseText);
                console.log(error.message);
                if (error.responseText) {
                    var msg = JSON.parse(error.responseText)
                    $.notify(msg.msg, "error");
                }
                return;
            }
    });
}




function getAllData(){
    $("#resultTable").dataTable().fnDestroy();
    var table = $('#resultTable').DataTable( {
        "processing": true,
        "serverSide": true,
        /*dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],*/
        "ajax": {
            "url": "../result/all/get",
            "type": "POST",
            "data": {
            	filterData : $("#filterData").val()
            }
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "columns": [
            { "data": "name" },
            { "data": "programName" },
            {  "data" : "totalAnswer",
                 sortable: false,
                 "render": function ( data, type, row, meta ) {
                     return row.countRightAnswer+" / "+row.totalAnswers;
                 }
            },
            {  "data" : "percent",
                 sortable: true,
                 "render": function ( data, type, row, meta ) {
                     return row.percent+" % ";
                 }
            },
            {   
                 sortable: false,
                 "render": function ( data, type, row, meta ) {
                    return '<a href="./exam/'+row.id+'" class="details-program btn btn-default btn-xs">Details</a>'+
                     "<a data-id="+ row.id +" class='remove-icon btn btn-danger btn-xs'><i class='fa fa-remove'></i></a>";
                 }
            }
        ],
        "order": [[1, 'asc']]
    } );

    $('#resultTable tbody').on('click', '.remove-icon', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        delete_result(row.data());
    } );
}