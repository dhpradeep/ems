function create_program(data = null) {
    if(data != null) {

    }else{
        $('#addProgram').modal('show');
    }
}

$( document ).ready(function() {
    $('#modelTable').DataTable();
});

$(document).on("click", ".edit-icon-program", function() {
    create_program(/*with value */);
});

function create_model(data = null) {
    if(data != null) {

    }else{
        $('#addModel').modal('show');
    }
}

$(document).on("click", ".edit-icon-model", function() {
    create_model(/*with value */);
});

$(document).on("click", ".remove-icon-program", function() {
    
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

function deletedata() {
    $.notify("Record successfully deleted", "success");
    refresh();
}

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

function refresh() {
    var target = document.getElementById('target1')
    var spinner = new Spinner({
        radius: 30,
        length: 0,
        width: 10,
        trail: 40
    }).spin(target);

    sleep(1000).then(() => {
        $.notify("All records display", "info");
        spinner.stop();
    });

    return;
}
