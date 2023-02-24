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

function returnIcon(num) {
    if(num == 1) {
        return "<a class='btn btn-success btn-xs'><i class='fa fa-check'></i></a>";
    }else {
        return "<a class='btn btn-danger btn-xs'><i class='fa fa-remove'></i></a>"; 
    }
}

function getAllData(){
    var examId = $("#examId").data('id');
    if(examId > 0) {
        $("#resultDetailTable").dataTable().fnDestroy();
        var table = $('#resultDetailTable').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "../examController/get",
                "type": "POST",
                "data": {
                    filterData : $("#filterData").val(),
                    id : examId
                }
            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "columns": [
                { "data": "question" },
                { "data": "userAnswer" ,
                    sortable: false 
                },
                {  "data" : "answer",
                    sortable: false 
                },
                {  "data" : "result",
                     sortable: true,
                     "render": function ( data, type, row, meta ) {
                         return returnIcon(row.result);
                     }
                }
            ],
            "order": [[1, 'asc']]
        } );
    }
    
}