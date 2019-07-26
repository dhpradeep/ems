function create_program(data = null) {
    if (data != null) {
        $('#addProgram').modal('show');
    } else {
        $("#programName").val("");
        $("#programDuration").val(60);
        $('#addProgram').modal('show');
    }
}

$(document).ready(function() {
    $('#programTable').DataTable();
    $('#modelTable').DataTable();
});

$(document).on("click", ".edit-icon-program", function() {
    var columnValues = $(this).parent().parent().siblings().map(function() {
        return $(this).text();
    }).get();

    console.log(columnValues);

    $("#programName").val(columnValues[1].trim());
    $("#programDuration").val(columnValues[2].trim().split(" ")[0]);

    // get category id from DB
    catId = 1;
    create_program(catId);
});

$(document).on("click", ".edit-icon-model", function() {
    create_model( /*with value */ );
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

function sleep(time) {
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



// For Models
function create_model(data = null) {
    if (data != null) {
        $('#addModel').modal('show');
    } else {
        $("#categoryId").val($("#categoryId option:first").val());
        $("#questionLevel").val($("#questionLevel option:first").val());
        $("#noOfQuestions").val('');
        $('#addModel').modal('show');
    }
}

$(document).on("click", ".edit-model", function() {
    var columnValues = $(this).parent().parent().siblings().map(function() {
        return $(this).text();
    }).get();

    $("#categoryId select").val(columnValues[1].trim());
    $("#questionLevel select").val(columnValues[2].trim());
    $("#noOfQuestions").val(columnValues[3].trim());

    // get category id from DB
    catId = 1;
    create_model(catId);
});

$(document).on("click", ".remove-model", function() {

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