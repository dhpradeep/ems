function create_user(data = null) {
    $('#adduser').modal('show');
}

$( document ).ready(function() {
    refresh();
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

$(document).on("change", ".change-role", function(e) {
    var id = $(this).data('id');
    var role = $(this).children("option:selected").val();
    updateUser(id, role);
});

$(document).on("click", "#saveBtn", function(e){
    e.preventDefault();
    addUser();
});

function updateUser(id, role) {
    $.ajax({
            url: '../user/users/update',
            async: true,
            type: 'POST',
            data: {
                id: id,
                role: role
            },
            success: function(response) {
                animate(300);
                var decode = JSON.parse(response);
                if (decode.success == true) {
                    $.notify("Record successfully updated", "success");
                } else if (decode.success === false) {
                    decode.errors.forEach(function(element) {
                      $.notify(element, "error");
                    });
                    if(decode.status === -1) $('#adduser').modal('hide');
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

function addUser(){

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    $.ajax({
        url: '../user/users/add',
        async: true,
        type: 'POST',
        data: {
            fname: $('#fname').val(),
            mname: $('#mname').val(),
            lname: $('#lname').val(),
            username: $('#username').val(),
            passwordHash: $('#passwordHash').val(),
            cpasswordHash: $('#cpasswordHash').val(),
            email: $('#email').val(),
            role: $('#role').val()
        },
        success: function(response) {
            var decode = JSON.parse(response);
            if (decode.success == true) {
                $('#adduser').modal('hide');
                refresh();
                $.notify("Record successfully saved", "success");
            } else if (decode.success === false) {
                decode.errors.forEach(function(element) {
                  $.notify(element, "error");
                });
                if(decode.status == -1) $('#adduser').modal('hide');
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
            url: '../user/users/delete',
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
        $.notify("All records display", "info");
        spinner.stop();
    });
    return;
}

function refresh() {
   getAllData();
   animate(500);
}

function getAllData(){
   /* $.ajax({
            url: '../user/users/get',
            async: true,
            type: 'GET',
            success: function(response) {
                var decode = JSON.parse(response);
                if (decode.success == true) {
                    data = decode.data;
                    //for (var i = 0; i < decode.data.length; i++) {*/

                        /*console.log(decode.data);
                        var row = decode.data[i];
                        var html = '<tr role="row">\
                                        <td class="sorting">' + row.name +'</td>\
                                        <td class="sorting">' + row.username + '</td>\
                                        <td class="sorting">' + row.email + '</td>\
                                        <td class="sorting">\
                                            <select class="form-control change-role" data-id="6">'+
                                                '<option'+(row.role == 1 ? ' selected' : '')+' value="1">Admin</option>'+
                                                '<option'+(row.role == 2 ? ' selected' : '')+' value="2">Teacher</option>'+
                                                '<option'+(row.role == 3 ? ' selected' : '')+' value="3">Student</option>'+
                                            '</select></td>\
                                        <td width="10%">\
                                            <div class="text-right">\
                                                <a class="remove-icon btn btn-danger btn-xs" data-id="'+row.id+'">\
                                                        <i class="fa fa-remove"></i>\
                                                </a>\
                                            </div>\
                                            </td>\
                                    </tr>';
                                    console.log(html);
                        $("#userTable tbody").append(html);*/
                            $("#userTable").dataTable().fnDestroy();
                             $('#userTable').DataTable( {
                                "processing": true,
                                "serverSide": true,
                                "ajax": {
                                    "url": "../user/users/get",
                                    "type": "POST"
                                },
                                "columns": [
                                    { "data": "name" },
                                    { "data": "username" },
                                    { "data": "email" },
                                    {  "data" : "role",
                                         sortable: true,
                                         "render": function ( data, type, row, meta ) {
                                             return "<select style = 'width:80%' class='form-control change-role' data-id="+ row.id +">"+
                                                "<option"+(row.role == 1 ? ' selected' : '')+" value='1'>Admin</option>"+
                                                "<option"+(row.role == 2 ? ' selected' : '')+" value='2'>Teacher</option>"+
                                                "<option"+(row.role == 3 ? ' selected' : '')+" value='3'>Student</option>"+
                                            "</select>";
                                         }
                                    },
                                    {   
                                         sortable: false,
                                         "render": function ( data, type, row, meta ) {
                                             return "<a data-id="+ row.id +" class='remove-icon btn btn-danger btn-xs'><i class='fa fa-remove'></i></a>";
                                         }
                                    }
                                ]
                            } );
}