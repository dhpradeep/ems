function create_category(data = null) {
    if(data != null) {

    }else{
        $('#addcategory').modal('show');
    }
}

$(document).ready(function() {
    $('#categoryTable').DataTable();
});

$(document).on("click", ".edit-icon", function() {
    create_category(/*with value */);
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