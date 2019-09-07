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
    $('#programId').val('');
    //$('#doa').val('2019-08-09');
    $('#dobAd').val('');
    $('#gender').val('');
    //$('#nationality').val('');
    $('#fatherName').val('');
    $('#municipality').val('');
    $('#wardNo').val('');
    $('#area').val('');
    $('#district').val('');
    $('#zone').val('');
    $('#mobileNo').val('');
    $('#telephoneNo').val('');
    $('#blockNo').val('');
    $('#email').val('');
    $('#guardianName').val('');
    $('#guardianRelation').val('');
    $('#guardianContact').val('');
    $('#formNo').val('');
    $('#entranceNo').val('');

    $("#eligible").prop("checked", false);
    $("#marksheet_see").prop("checked", false);
    $("#marksheet_11").prop("checked", false);
    $("#marksheet_12").prop("checked", false);
    $("#transcript").prop("checked", false);
    $("#characterCertificate_see").prop("checked", false);
    $("#characterCertificate_12").prop("checked", false);
    $("#citizenship").prop("checked", false);
    $("#photo").prop("checked", false);

    $("#remarks").val('');
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
    $('#programId').val(data.programId);
    $('#doa').val(data.doa);
    $('#dobAd').val(data.dobAd);
    $('#gender').val(data.gender);
    $('#nationality').val(data.nationality);
    $('#fatherName').val(data.fatherName);
    $('#municipality').val(data.municipality);
    $('#wardNo').val(data.wardNo);
    $('#area').val(data.area);
    $('#district').val(data.district);
    $('#zone').val(data.zone);
    $('#mobileNo').val(data.mobileNo);
    $('#telephoneNo').val(data.telephoneNo);
    $('#blockNo').val(data.blockNo);
    $('#email').val(data.email);
    $('#guardianName').val(data.guardianName);
    $('#guardianRelation').val(data.guardianRelation);
    $('#guardianContact').val(data.guardianContact);
    $('#formNo').val(data.formNo);
    $('#entranceNo').val(data.entranceNo);

    $("#eligible").prop("checked", isTrue(data.eligible));
    $("#marksheet_see").prop("checked", isTrue(data.marksheet_see));
    $("#marksheet_11").prop("checked", isTrue(data.marksheet_11));
    $("#marksheet_12").prop("checked", isTrue(data.marksheet_12));
    $("#transcript").prop("checked", isTrue(data.transcript));
    $("#characterCertificate_see").prop("checked", isTrue(data.characterCertificate_see));
    $("#characterCertificate_12").prop("checked", isTrue(data.characterCertificate_12));
    $("#citizenship").prop("checked", isTrue(data.citizenship));
    $("#photo").prop("checked", isTrue(data.photo));

    $("#remarks").val(data.remarks);
    for (var i = 0; i < data.edu.length; i++) {
        educationFormMaker();
        $("#level" + i).val(data.edu[i].level);
        $("#board" + i).val(data.edu[i].board);
        $("#faculty" + i).val(data.edu[i].faculty);
        $("#yearOfCompletion" + i).val(data.edu[i].yearOfCompletion);
        $("#percent" + i).val(data.edu[i].percent);
        $("#institution" + i).val(data.edu[i].institution);
    }
}

function create_student(data = null) {
    if (data != null) {
        if (data != undefined) {
            $("#saveBtn")[0].innerHTML = "Update";
            setFields(data);
            $('#addStudent').modal('show');
        }
    } else {
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
    data.programId = $('#programId').val();
    data.doa = $('#doa').val();
    data.dobAd = $('#dobAd').val();
    data.gender = $('#gender').val();
    data.nationality = $('#nationality').val();
    data.fatherName = $('#fatherName').val();
    data.municipality = $('#municipality').val();
    data.wardNo = $('#wardNo').val();
    data.area = $('#area').val();
    data.district = $('#district').val();
    data.zone = $('#zone').val();
    data.mobileNo = $('#mobileNo').val();
    data.telephoneNo = $('#telephoneNo').val();
    data.blockNo = $('#blockNo').val();
    data.email = $('#email').val();
    data.guardianName = $('#guardianName').val();
    data.guardianRelation = $('#guardianRelation').val();
    data.guardianContact = $('#guardianContact').val();
    data.formNo = $('#formNo').val();
    data.entranceNo = $('#entranceNo').val();

    data.eligible = $("#eligible").prop("checked");
    data.marksheet_see = $("#marksheet_see").prop("checked");
    data.marksheet_11 = $("#marksheet_11").prop("checked");
    data.marksheet_12 = $("#marksheet_12").prop("checked");
    data.transcript = $("#transcript").prop("checked");
    data.characterCertificate_see = $("#characterCertificate_see").prop("checked");
    data.characterCertificate_12 = $("#characterCertificate_12").prop("checked");
    data.citizenship = $("#citizenship").prop("checked");
    data.photo = $("#photo").prop("checked");

    data.remarks = $("#remarks").val();

    data.edu = [];

    var counter = $("#counter").data("id");

    for (var i = 0; i < counter; i++) {
        var obj = {};
        obj.level = $("#level" + i).val();
        obj.board = $("#board" + i).val();
        obj.faculty = $("#faculty" + i).val();
        obj.yearOfCompletion = $("#yearOfCompletion" + i).val();
        obj.percent = $("#percent" + i).val();
        obj.institution = $("#institution" + i).val();
        data.edu.push(obj);
    }

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
    var start = '<tr>' +
        '<td class = "choices">Education : </td>' +
        '<td class = "answers"></td>' +
        '</tr>';
    var end = "";
    for (var i = 0; i < d.edu.length; i++) {
        end += '<tr>' +
            '<td class = "choices">Level:</td>' +
            '<td class = "answers"><i>' + d.edu[i].levelName + '</i></td>' +
            '<td class = "choices">Board</td>' +
            '<td class = "answers">' + d.edu[i].board + '</td>' +
            '<td class = "choices">Faculty:</td>' +
            '<td class = "answers"><i>' + d.edu[i].faculty + '</i></td>' +
            '</tr>' +
            '<tr>' +
            '<td class = "choices">Year of Completion:</td>' +
            '<td class = "answers">' + d.edu[i].yearOfCompletion + '</td>' +
            '<td class = "choices">Percent/GPA:</td>' +
            '<td class = "answers">' + d.edu[i].percent + '</td>' +
            '<td class = "choices">Institute:</td>' +
            '<td class = "answers">' + d.edu[i].institution + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td class = "choices"></td>' +
            '<td class = "answers"></td>' +
            '</tr>';
    }
    var education = start + end;

    var documents = '<tr>' +
        '<td class = "choices">Eligible:</td>' +
        '<td class = "answers">' + returnIcon(d.eligible) + '</td>' +
        '<td class = "choices">Marksheet SEE/SLC:</td>' +
        '<td class = "answers">' + returnIcon(d.marksheet_see) + '</td>' +
        '<td class = "choices">Marksheet 11:</td>' +
        '<td class = "answers">' + returnIcon(d.marksheet_11) + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">Marksheet 12:</td>' +
        '<td class = "answers">' + returnIcon(d.marksheet_12) + '</td>' +
        '<td class = "choices">Transcript:</td>' +
        '<td class = "answers">' + returnIcon(d.transcript) + '</td>' +
        '<td class = "choices">Character Certificate SEE/SLC:</td>' +
        '<td class = "answers">' + returnIcon(d.characterCertificate_see) + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">Character Certificate (+2):</td>' +
        '<td class = "answers">' + returnIcon(d.characterCertificate_12) + '</td>' +
        '<td class = "choices">Citizenship:</td>' +
        '<td class = "answers">' + returnIcon(d.citizenship) + '</td>' +
        '<td class = "choices">Photo:</td>' +
        '<td class = "answers">' + returnIcon(d.photo) + '</td>' +
        '</tr>';


    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td class = "choices">Password:</td>' +
        '<td class = "answers"><i>' + d.password + '</i></td>' +
        '<td class = "choices">Form Number:</td>' +
        '<td class = "answers"><i>' + d.formNo + '</i></td>' +
        '<td class = "choices">Program:</td>' +
        '<td class = "answers">' + d.programName + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices"></td>' +
        '<td class = "answers"></td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">Date of application:</td>' +
        '<td class = "answers">' + d.doa + '</td>' +
        '<td class = "choices">Date of Birth (AD):</td>' +
        '<td class = "answers">' + d.dobAd + '</td>' +
        '<td class = "choices">Date of Birth (BS):</td>' +
        '<td class = "answers">' + d.dobBs + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">Gender:</td>' +
        '<td class = "answers">' + d.genderName + '</td>' +
        '<td class = "choices">Nationality:</td>' +
        '<td class = "answers">' + d.nationality + '</td>' +
        '<td class = "choices">Father\'s name:</td>' +
        '<td class = "answers">' + d.fatherName + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">Municipality:</td>' +
        '<td class = "answers">' + d.municipality + '</td>' +
        '<td class = "choices">Ward No:</td>' +
        '<td class = "answers">' + d.wardNo + '</td>' +
        '<td class = "choices">Area:</td>' +
        '<td class = "answers">' + d.area + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">District:</td>' +
        '<td class = "answers">' + d.district + '</td>' +
        '<td class = "choices">Zone:</td>' +
        '<td class = "answers">' + d.zone + '</td>' +
        '<td class = "choices">Mobile No:</td>' +
        '<td class = "answers">' + d.mobileNo + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">Telephone No:</td>' +
        '<td class = "answers">' + d.telephoneNo + '</td>' +
        '<td class = "choices">Block No.:</td>' +
        '<td class = "answers">' + d.blockNo + '</td>' +
        '<td class = "choices">Guardian Name:</td>' +
        '<td class = "answers">' + d.guardianName + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">Guardian Relation:</td>' +
        '<td class = "answers">' + d.guardianRelation + '</td>' +
        '<td class = "choices">Guardian Contact:</td>' +
        '<td class = "answers">' + d.guardianContact + '</td>' +
        '</tr>' + education +
        documents +
        '<tr>' +
        '<td class = "choices">Remarks:</td>' +
        '<td class = "answers">' + d.remarks + '</td>' +
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
        formNo: "Form No",
        entranceNo: "Entrance No",
        name: "Fullname",
        programName: "Program",
        dobAd: "Date of Birth (AD)",
        doa: "Date of Application",
        genderName: "Gender",
        nationality: "Nationality",
        fatherName: "Father's name",
        municipality: "Municipality",
        wardNo: "Ward No",
        area: "Area",
        district: "District",
        zone: "Zone",
        mobileNo: "Mobile",
        telephoneNo: "Telephone",
        email: "Email",
        blockNo: "Block No",
        guardianName: "Guardian Name",
        guardianRelation: "Guardian Relation",
        guardianContact: "Guardian Contact",
        levelName: "Level",
        board: "Board",
        faculty: "Faculty",
        yearOfCompletion: "Year",
        percent: "Percent / GPA",
        institution: "Institute",
        eligible: "Eligible",
        marksheet_see: "Marksheet SEE/SLC",
        marksheet_11: "Marksheet 11",
        marksheet_12: "Marksheet 12",
        transcript: "Transcript",
        characterCertificate_see: "Character Certificate SLC/SEE",
        characterCertificate_12: "Character Certificate +2",
        citizenship: "Citizenship",
        photo: "Photo",
        remarks: "Remarks"
    };

    var index;

    if (data.length <= 0) {
        $.notify("No data to export!");
        return;
    }

    for (var i = 0; i < data.length; i++) {
        if (data[i].edu.length > 0) {
           /* index = get_keys(data[i], 1);*/
            found = true;
            break;
        }
    }
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
        var edulength = data[i].edu.length;

        if (edulength < 1) {
            doc += "<tr>";
            for (key in arr) {
                    if (data[i][key] == undefined) {
                        doc += "<td></td>";
                    } else {
                        doc += "<td>" + data[i][key] + "</td>";
                    }
            }
            doc += "</tr>";
        } else if (edulength >= 1) {
            doc += "<tr>";
            for (key in arr) {
                    if (key in data[i]['edu'][0]) {
                        if (data[i]['edu'][0][key] == undefined) {
                            doc += "<td></td>"
                        } else {
                            doc += "<td>" + data[i]['edu'][0][key] + "</td>";
                        }
                    } else {
                        if (data[i][key] == undefined) {
                            doc += "<td></td>"
                        } else {
                            doc += "<td>" + data[i][key] + "</td>";
                        }
                    }
            }
            doc += "</tr>";
            if (edulength > 1) {
                for (k = 1; k < edulength; k++) {
                    doc += "<tr>";
                    for (key in arr) {
                        if(arr[key] != undefined) {
                            if (key in data[i].edu[k]) {
                                if (data[i]['edu'][k][key] == undefined) {
                                    doc += "<td></td>"
                                } else {
                                    doc += "<td>" + data[i]['edu'][k][key] + "</td>";
                                }
                            } else {
                                doc += "<td></td>";
                            }
                        }
                    }
                    doc += "</tr>";
                }
            }
        }
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
                "data": "entranceNo",
                sortable: false
            },
            { "data": "username" },
            {
                "data": "email",
                sortable: false
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