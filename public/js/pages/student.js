$('#addStudent').on('hidden.bs.modal', function(e) {
    resetFields();
});

$('body').on('shown.bs.modal', '#addStudent', function() {
    $('input:visible:enabled:first', this).focus();
})

function resetFields() {
    $("#nestedForm").empty();
    $("#studentId").data('id', '-1');
    $("#counter").data("id", '0');

    $('#fname').val('');
    $('#mname').val('');
    $('#lname').val('');
    $('#groupId').val('');
    $('#dobAd').val('');    
    $('#email').val('');
    
    $("#eligible").prop("checked", false);
}

function isTrue(str) {
    return (str == "true");
}

function setFields(data) {
    $("#nestedForm").empty();
    $("#studentId").data('id', data.id);
    $('#fname').val(data.fname);
    $('#mname').val(data.mname);
    $('#lname').val(data.lname);
    $('#groupId').val(data.groupId);
    $('#dobAd').val(data.dobAd);
    $('#email').val(data.email);
    $("#eligible").prop("checked", isTrue(data.eligible));
}

function create_student(data = null) {
    if(data != null) {
        if(data != undefined) {
            $("#saveBtn")[0].innerHTML = "Update";
            setFields(data);
            $('#addStudent').modal('show');
        }        
    }else{
            $("#saveBtn")[0].innerHTML = "Add";                   
            $('#addStudent').modal('show');
    }
}

$(document).ready(function() {
    $('#toExport').hide();
    refresh();
});

$(document).on("click", "#saveBtn", function(e) {
    e.preventDefault();
    var btn = $('#saveBtn')[0].innerHTML;
    if (btn == "Update") {
        updateStudent();
    } else {
        addStudent();
    }
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

function prepareData(id = 0) {
    var data = {};
    if (id > 0) {
        data.id = $("#studentId").data('id');
    }
    data.fname = $('#fname').val();
    data.mname = $('#mname').val();
    data.lname = $('#lname').val();
    data.groupId = $('#groupId').val();
    data.dobAd = $('#dobAd').val();
    data.email = $('#email').val();
    data.eligible = $("#eligible").prop("checked");

    return data;
}

function updateStudent() {
    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    var id = $('#studentId').data('id');
    if (id > 0) {
        var allData = prepareData(id);
        $.ajax({
            url: '../student/all/update',
            async: true,
            type: 'POST',
            data: allData,
            success: function(response) {
                animate(300);
                var decode = JSON.parse(response);
                if (decode.success == true) {
                    $('#addStudent').modal('hide');
                    refresh();
                    $.notify("Record successfully updated", "success");
                } else if (decode.success === false) {
                    decode.errors.forEach(function(element) {
                        $.notify(element, "error");
                    });
                    if (decode.status === -1) $('#addStudent').modal('hide');
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

function addStudent() {

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });
    var allData = prepareData(0);

    $.ajax({
        url: '../student/all/add',
        async: true,
        type: 'POST',
        data: allData,
        success: function(response) {
            var decode = JSON.parse(response);
            if (decode.success == true) {
                $('#addStudent').modal('hide');
                refresh();
                $.notify("Record successfully saved", "success");
            } else if (decode.success === false) {
                decode.errors.forEach(function(element) {
                    $.notify(element, "error");
                });
                if (decode.status == -1) $('#addStudent').modal('hide');
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
        url: '../student/all/delete',
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

function sleep(time) {
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

function refresh() {
    getAllData();
    resetFields();
    animate(500);
}

function returnIcon(str) {
    if (isTrue(str)) {
        return "<a class='btn btn-success btn-xs'><i class='fa fa-check'></i></a>";
    } else {
        return "<a class='btn btn-warning btn-xs'><i class='fa fa-remove'></i></a>";
    }
}

/* Formatting function for row details*/
function format(d) {
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td class = "choices">Password:</td>' +
        '<td class = "answers"><i>' + d.password + '</i></td>' +
        '<td class = "choices"></td>' +
        '<td class = "answers"></td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">Date of Birth (AD):</td>' +
        '<td class = "answers">' + d.dobAd + '</td>' +
        '</tr>' +
        '</table>';
}

/*function get_keys(data, mode = 0) {
    var arr = [];
    if (mode == 1) {
        for (var i in data) {
            var key = i;
            var val = data[i];
            if (key == 'edu') {
                for (var j in val[0]) {
                    var sub_key = j;
                    // var sub_val = val[0][j];
                    arr.push(sub_key);
                }
            } else {
                arr.push(key);
            }
        }
    } else {
        for (var i in data) {
            var key = i;
            var val = data[i];
            if (key != 'edu') {
                arr.push(key);
            }
        }
    }
    return arr;
}*/

function export_format(data) {
    var found = false;

    var arr = {
        name: "Fullname",
        groupName: "GroupName",
        dobAd: "Date of Birth (AD)",
        email: "Email",
        eligible: "Verified",
    };

    var index;

    if (data.length <= 0) {
        $.notify("No data to export!");
        return;
    }

    // for (var i = 0; i < data.length; i++) {
    //     if (data[i].edu.length > 0) {
    //        /* index = get_keys(data[i], 1);*/
    //         found = true;
    //         break;
    //     }
    // }
    /*if (found == false && data.length > 0) {
        index = get_keys(data[0], 0);
    }*/

    var key;

    var doc = "<table border='1'><tr>";
    for (key in arr) {
        doc += "<th>" + arr[key] + "</th>";
    }


    doc += "</tr>";
    for (i = 0; i < data.length; i++) {
        doc += "<tr>";
            for (key in arr) {
                    if (data[i][key] == undefined) {
                        doc += "<td></td>";
                    } else {
                        doc += "<td>" + data[i][key] + "</td>";
                    }
            }
            doc += "</tr>";
    } 

    doc += "</table>";

    $("#toExport").html(doc);

    exportTableToCSV("studentData.csv");

    //exportTableToExcel(doc, "student_data");

}


function exportTableToExcel(doc, filename = null) {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableHTML = doc.replace(/ /g, '%20');

    // Specify file name
    filename = filename ? filename + '.xls' : 'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}

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

function print_to_excel(data) {
    var data = data.json.data;
    export_format(data);
}

function getAllData(trigger = null) {
    $("#studentTable").dataTable().fnDestroy();
    var table = $('#studentTable').DataTable({
        "processing": true,
        "serverSide": true,
        stateSave: true,
        "ajax": {
            "url": "../student/all/get",
            "type": "POST",
            "data": {
                filterData: $("#filterData").val()
            }
        },
        "drawCallback": function(data) {
            if (trigger != null) {
                trigger = null;
                print_to_excel(data);
            }
        },
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "columns": [{
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            {
                "data": "name"
            },
            {
                "data": "groupName",
                sortable: false
            },
            { "data": "username" },
            {
                "data": "email",
                sortable: true
            },
            {
                sortable: false,
                "render": function(data, type, row, meta) {
                    return "<span>"+ returnIcon(row.eligible)+ "</span>";
                }
            },
            {
                sortable: false,
                "render": function(data, type, row, meta) {
                    return "<a data-id=" + row.id + " class='edit-icon btn btn-success btn-xs'><i class='fa fa-pencil'></i> </a><a data-id=" + row.id + " class='remove-icon btn btn-danger btn-xs'><i class='fa fa-remove'></i></a>";
                }
            }
        ],
        "order": [
            [1, 'asc']
        ]
    });

    // Add event listener for opening and closing details
    $('#studentTable tbody').on('click', '.details-control', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        if (row.data() != undefined) {
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        }
    });

    $('#studentTable tbody').on('click', '.edit-icon', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        create_student(row.data());
    });
}