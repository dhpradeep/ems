function create_category(data = null) {
    if(data != null) {
        $('#addcategory').modal('show');
    }else{
        $("#categoryName").val("");
        $("#categoryDescription").val("");
        $('#addcategory').modal('show');
    }
}
 
$(document).ready(function() {
    $('#categoryTable').DataTable();
});

$(document).on("click", ".edit-icon", function() {
    var columnValues = $(this).parent().parent().siblings().map(function() {
        return $(this).text();
    }).get();

    $("#categoryName").val(columnValues[1].trim());
    $("#categoryDescription").val(columnValues[2].trim());

    // get category id from DB
    catId = 1;
    create_category(catId);
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