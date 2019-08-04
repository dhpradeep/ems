$(document).ready(function() {
    refresh();
});

function refresh() {
    getAllData();
    animate(500);
}

function getAllData() {
    $("#resultTable").dataTable().fnDestroy();
    var table = $('#resultTable').DataTable({});
    return true;
}