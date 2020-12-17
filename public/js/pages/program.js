jQuery.fn.CKEditorValFor = function(element_id) {
    return CKEDITOR.instances[element_id].getData();
}

$('body').on('shown.bs.modal', '#addProgram', function() {
    $('input:visible:enabled:first', this).focus();
})

$('#addProgram').on('hidden.bs.modal', function(e) {
    resetFields();
});

function resetFields() {
    CKEDITOR.instances['welcome'].setData("");
    CKEDITOR.instances['thanks'].setData("");
    $("#programId").data('id','-1');
    $('#name').val('');
    $('#duration').val('');
    $("#groupId").val([]);
}

function create_program(data = null) {
    if(data != null) {
        CKEDITOR.instances['welcome'].setData(data.welcome);
        CKEDITOR.instances['thanks'].setData(data.thanks);
        $("#programId").data('id',data.id);
        $('#name').val(data.name);
        $('#duration').val(data.duration);
        $("#saveBtn")[0].innerHTML = "Update";
        $('#addProgram').modal('show');
        $("#groupId").val(data.groupId);
        $('#groupId option:selected').each(function() {
            $(this).prop('selected', true);
        });
    }else{
        $("#saveBtn")[0].innerHTML = "Add";
               
        $('#addProgram').modal('show');
    }
}
 
$(document).ready(function() {
    CKEDITOR.replace('welcome');
    CKEDITOR.replace('thanks');
    refresh();
});

$(document).on("click", "#saveBtn", function(e) {
    e.preventDefault();
    var btn = $('#saveBtn')[0].innerHTML;
    if(btn == "Update") {
        updateProgram();
    } else {
        addProgram();
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

function updateProgram() {
     $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    var groupId = $('#groupId').val();
    if(groupId == null) {
        groupId = [];
    }

    var id = $('#programId').data('id');
    if(id > 0) {
        $.ajax({
            url: '../question/program/update',
            async: true,
            type: 'POST',
            data: {
                id: $('#programId').data('id'),
                name: $('#name').val(),
                duration: $('#duration').val(),
                welcome: $().CKEditorValFor('welcome'),
                thanks : $().CKEditorValFor('thanks'),
                groupId: groupId

            },
            success: function(response) {
                animate(300);
                var decode = JSON.parse(response);
                if (decode.success == true) {
                    $('#addProgram').modal('hide');
                    refresh();
                    $.notify("Record successfully updated", "success");
                } else if (decode.success === false) {
                    decode.errors.forEach(function(element) {
                      $.notify(element, "error");
                    });
                    if(decode.status === -1) $('#addProgram').modal('hide');
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

function addProgram(){

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    var groupId = $('#groupId').val();
    if(groupId == null) {
        groupId = [];
    }

    $.ajax({
        url: '../question/program/add',
        async: true,
        type: 'POST',
        data: {
            name: $('#name').val(),
            duration: $('#duration').val(),
            welcome: $().CKEditorValFor('welcome'),
            thanks : $().CKEditorValFor('thanks'),
            groupId: groupId
        },
        success: function(response) {
            var decode = JSON.parse(response);
            if (decode.success == true) {
                $('#addProgram').modal('hide');
                refresh();
                $.notify("Record successfully saved", "success");
            } else if (decode.success === false) {
                decode.errors.forEach(function(element) {
                  $.notify(element, "error");
                });
                if(decode.status == -1) $('#addProgram').modal('hide');
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
            url: '../question/program/delete',
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
    $("#programTable").dataTable().fnDestroy();
    var table = $('#programTable').DataTable( {
        "processing": true,
        "serverSide": true,
        stateSave: true,
        "ajax": {
            "url": "../question/program/get",
            "type": "POST"
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "columns": [
            { "data": "name" },
            { "data": "groups", sortable: false },
            { "data": "duration" },
            {   
                 sortable: false,
                 "render": function ( data, type, row, meta ) {
                    return '<a href="./model/'+row.url+'" class="details-program btn btn-default btn-xs">Details</a>'+
                     "<a data-id="+ row.id +" class='edit-icon btn btn-success btn-xs'><i class='fa fa-pencil'></i> </a><a data-id="+ row.id +" class='remove-icon btn btn-danger btn-xs'><i class='fa fa-remove'></i></a>";
                 }
            }
        ],
        "order": [[0, 'asc']]
    } );

    $('#programTable tbody').on('click', '.edit-icon', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        create_program(row.data());
    } );
}