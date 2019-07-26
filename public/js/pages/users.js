function create_user(data = null) {
    if(data != null) {

    }else{
        $('#adduser').modal('show');
    }
}

$( document ).ready(function() {
    $('#userTable').DataTable();
});

$(document).on("click", ".remove-icon", function() {
    
    BootstrapDialog.show({
        title: 'Delete',
        message: 'Are you sure to delete this record?',
        buttons: [{
            label: 'Yes',
            cssClass: 'btn-primary',
            action: function(dialog) {
                deletedata();
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

$(document).on("click", "#saveBtn", function(){
    console.log("Me0");

    addUser();
});

function addUser(){

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    if ($('#fname').val() == '') {
        $('#fname').next('span').text('First Name is required.');
        empty = true;
    }

    if ($('#lname').val() == '') {
        $('#lname').next('span').text('Last Name is required.');
        empty = true;
    }

    if ($('#email').val() == '') {
        $('#email').next('span').text('Email Address is required.');
        empty = true;
    }

    if ($('#username').val() == '') {
        $('#username').next('span').text('Username is required.');
        empty = true;
    }

    if ($('#passwordHash').val() == '') {
        $('#passwordHash').next('span').text('Password is required.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }
    console.log("Me");

    if ($("#id").val() === '') {
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
    } else {
        $.ajax({
            url: '../user/users/update',
            async: true,
            type: 'POST',
            data: {
                id: $('#id').val(),
                fname: $('#fname').val(),
                mname: $('#mname').val(),
                lname: $('#lname').val(),
                username: $('#username').val(),
                passwordHash: $('#passwordHash').val(),
                email: $('#email').val(),
                role: $('#role').val()
            },
            success: function(response) {
                var decode = JSON.parse(response);
                if (decode.success == true) {
                    $('#adduser').modal('hide');
                    refresh();
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
}

function deletedata(id = null) {
    //delete ajax code
    
    $.notify("Record successfully deleted", "success");
    refresh();
}

function refresh() {
    var target = document.getElementById('target1');
    var spinner = new Spinner({
        radius: 30,
        length: 0,
        width: 10,
        trail: 40
    }).spin(target);

    getAllData();

    $.notify("All records display", "info");
    spinner.stop();
    return;
}

function getAllData(){

}