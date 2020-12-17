$('body').on('shown.bs.modal', '#addGroup', function() {
    $('input:visible:enabled:first', this).focus();
})

$('#addGroup').on('hidden.bs.modal', function(e) {
    resetFields();
});

function resetFields() {
    $("#groupId").data('id','-1');
    $('#gname').val('');
}

function create_group(data = null) {
    if(data != null) {
        $("#groupId").data('id',data.id);
        $('#gname').val(data.name);
        $("#saveBtn")[0].innerHTML = "Update";
        $('#addGroup').modal('show');
    }else{
        $("#saveBtn")[0].innerHTML = "Add";
               
        $('#addGroup').modal('show');
    }
}
 
$(document).ready(function() {
    refresh();
});

$(document).on("click", "#saveBtn", function(e) {
    e.preventDefault();
    var btn = $('#saveBtn')[0].innerHTML;
    if(btn == "Update") {
        updateGroup();
    } else {
        addGroup();
    }
});

$(document).on("click", ".remove-icon", function(e) {
    var id = $(this).data('id');
    BootstrapDialog.show({
        title: 'Delete',
        message: 'Are you sure to delete this record?',
        buttons: [{
            label: 'Yes',
            cssClass: 'btn-primary',
            action: function(dialog) {
                deletedata(id);
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
});

function updateGroup() {
     $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    var id = $('#groupId').data('id');
    if(id > 0) {
        $.ajax({
            url: '../student/groups/update',
            async: true,
            type: 'POST',
            data: {
                id: $('#groupId').data('id'),
                name: $('#gname').val()
            },
            success: function(response) {
                animate(300);
                var decode = JSON.parse(response);
                if (decode.success == true) {
                    $('#addGroup').modal('hide');
                    refresh();
                    $.notify("Record successfully updated", "success");
                } else if (decode.success === false) {
                    decode.errors.forEach(function(element) {
                      $.notify(element, "error");
                    });
                    if(decode.status === -1) $('#addGroup').modal('hide');
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
    
}

function addGroup(){

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    $.ajax({
        url: '../student/groups/add',
        async: true,
        type: 'POST',
        data: {
            name: $('#gname').val()
        },
        success: function(response) {
            var decode = JSON.parse(response);
            if (decode.success == true) {
                $('#addGroup').modal('hide');
                refresh();
                $.notify("Record successfully saved", "success");
            } else if (decode.success === false) {
                decode.errors.forEach(function(element) {
                  $.notify(element, "error");
                });
                if(decode.status == -1) $('#addGroup').modal('hide');
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

function deletedata(id) {
     $.ajax({
            url: '../student/groups/delete',
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
        //$.notify("All records display", "info");
        spinner.stop();
    });
    return;
}

function refresh() {
   getAllData();
   resetFields();
   animate(500);
}


function getAllData(){
    $("#groupTable").dataTable().fnDestroy();
    var table = $('#groupTable').DataTable( {
        "processing": true,
        "serverSide": true,
        stateSave: true,
        "ajax": {
            "url": "../student/groups/get",
            "type": "POST"
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "columns": [
            { "data": "name" },
            { "data": "noOfStudents" },
            {   
                 sortable: false,
                 "render": function ( data, type, row, meta ) {
                    return "<a data-id="+ row.id +" class='edit-icon btn btn-success btn-xs'><i class='fa fa-pencil'></i> </a><a data-id="+ row.id +" class='remove-icon btn btn-danger btn-xs'><i class='fa fa-remove'></i></a>";
                 }
            }
        ],
        "order": [[0, 'asc']]
    } );

    $('#groupTable tbody').on('click', '.edit-icon', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        create_group(row.data());
    } );
}