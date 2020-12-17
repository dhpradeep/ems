$(document).on('click', "#take-test-by-student", function(e) {
    programId = e.target.dataset['id'];
    BootstrapDialog.show({
        title: 'Confirm',
        message: 'Once you confirm, You can\'t revert back!\n Are you sure to start the test ?',
        buttons: [{
            label: 'Yes',
            cssClass: 'btn-primary',
            action: function(dialog) {
                window.location.replace("./test/start/"+programId);
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