$(document).ready(function() {
    refresh();
});

function refresh() {
    getAllData();
    animate(500);
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
       // $.notify("All records display", "info");
        spinner.stop();
    });
    return;
}

$(document).on("change", "#filterData", function(e) {
    e.preventDefault();
    getAllData();
});

function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], { type: "text/csv" });

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}


function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("#toExport table tr");

    for (var i = 0; i < rows.length; i++) {
        var row = [],
            cols = rows[i].querySelectorAll("td, th");

        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);

        csv.push(row.join(","));
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}

$(document).on("click", "#exportBtn", function(e) {
    var examId = $("#examId").data('id');
    exportTableToCSV("result_details_"+examId+".csv");
});

function returnIcon(num) {
    if(num >= 1) {
        return "<a class='btn btn-success btn-xs'><i class='fa fa-check'></i>"+num+"</a>";
    }else {
        return "<a class='btn btn-danger btn-xs'><i class='fa fa-remove'></i>"+num+"</a>"; 
    }
}

function getAllData(){
    var examId = $("#examId").data('id');
    if(examId > 0) {
        $("#resultDetailTable").dataTable().fnDestroy();
        var table = $('#resultDetailTable').DataTable( {
            "processing": true,
            "serverSide": true,
            stateSave: true,
            "ajax": {
                "url": "../examController/get",
                "type": "POST",
                "data": {
                    filterData : $("#filterData").val(),
                    id : examId
                }
            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "columns": [
                { "data": "question" },
                { "data": "userAnswer" ,
                    sortable: false 
                },
                {  "data" : "answer",
                    sortable: false 
                },
                {  "data" : "result",
                     sortable: true,
                     "render": function ( data, type, row, meta ) {
                         return returnIcon(row.result);
                     }
                }
            ],
            "order": [[1, 'asc']]
        } );
    }
    
}