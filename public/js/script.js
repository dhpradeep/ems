$(document).on('click', "#take-test-by-student", function() {
    BootstrapDialog.show({
        title: 'Confirm',
        message: 'Once you confirm, You can\'t revert back!\n Are you sure to start the test ?',
        buttons: [{
            label: 'Yes',
            cssClass: 'btn-primary',
            action: function(dialog) {
                window.location.replace("./test/start");
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
})