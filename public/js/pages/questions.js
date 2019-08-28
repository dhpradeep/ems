jQuery.fn.CKEditorValFor = function(element_id) {
    return CKEDITOR.instances[element_id].getData();
}

$('#addQuestion').on('hidden.bs.modal', function(e) {
    resetFields();
});

function resetFields() {
    CKEDITOR.instances['question'].setData("");
    CKEDITOR.instances['passage'].setData("");
    $("#questionId").data('id', '-1');
    $('#answer').val('');
    $('#choice2').val('');
    $('#choice3').val('');
    $('#choice4').val('');
    $('#containPassage').val('-1');
    $('#passageList').val('-1');
    $("#passageList").attr('disabled', false);
    $('#passageTitle').val("");
    $('#createNewPassage').html("create new");

    $('#toHideForPassage').hide();
    $("#toHideForLink").hide();
    //$('#level').val('');
    //$('#categoryId').val('');
}

function create_question(data = null) {

    if (data != null) {
        if (data != undefined) {
            fetchPasses(0, data.passageId);
            CKEDITOR.instances['question'].setData(data.question);
            $("#questionId").data('id', data.id);
            $("#saveBtn")[0].innerHTML = "Update";
            $('#answer').val(data.answer);
            $('#choice2').val(data.choice2);
            $('#choice3').val(data.choice3);
            $('#choice4').val(data.choice4);

            $('#level').val(data.level);

            $('#categoryId').val(data.categoryId);
            if(data.containPassage == 1) {
                $('#containPassage').val('1');
                $('#passageList').val(data.passageId);
                $('#passageTitle').val(data.passageTitle)
                CKEDITOR.instances['passage'].setData(data.passage);
                $('#createNewPassage').html("clear passage");
                if(!$('#createNewPassage').hasClass("edit-active")) {
                    $('#createNewPassage').toggleClass("edit-active");  
                }
                $('#toHideForPassage').show();
                $("#toHideForLink").show();
            }else {
                $('#toHideForPassage').hide();
                $("#toHideForLink").hide();
            }         

            $('#addQuestion').modal('show');
        }
    } else {
        $("#saveBtn")[0].innerHTML = "Add";

        $('#addQuestion').modal('show');
    }
}

$(document).ready(function() {
    CKEDITOR.replace('question');
    CKEDITOR.replace('passage');
    CKEDITOR.config.autoParagraph = false;
    refresh();
});

$(document).on("click", "#saveBtn", function(e) {
    e.preventDefault();
    var btn = $('#saveBtn')[0].innerHTML;
    if (btn == "Update") {
        updateQuestion();
    } else {
        addQuestion();
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

function updateQuestion() {
    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    var containPassage = $('#containPassage').val();
    var passageId;
    var passageTitle;
    var passage;
    if(containPassage > 0) {
        passageId = $('#passageList').val();
        passageTitle = $('#passageTitle').val();
        passage = $().CKEditorValFor('passage');
    }else {
        passageId = -2;
        passageTitle = "";
        passage = "";
    }

    var id = $('#questionId').data('id');
    if (id > 0) {
        $.ajax({
            url: '../question/all/update',
            async: true,
            type: 'POST',
            data: {
                id: $('#questionId').data('id'),
                categoryId: $('#categoryId').children("option:selected").val(),
                question: $().CKEditorValFor('question'),
                level: $('#level').children("option:selected").val(),
                answer: $('#answer').val(),
                choice2: $('#choice2').val(),
                choice3: $('#choice3').val(),
                choice4: $('#choice4').val(),
                containPassage : containPassage,
                passageId : passageId,
                passageTitle : passageTitle,
                passage : passage
            },
            success: function(response) {
                animate(300);
                var decode = JSON.parse(response);
                if (decode.success == true) {
                    $('#addQuestion').modal('hide');
                    refresh();
                    $.notify("Record successfully updated", "success");
                } else if (decode.success === false) {
                    decode.errors.forEach(function(element) {
                        $.notify(element, "error");
                    });
                    //if (decode.status === -1) $('#addQuestion').modal('hide');
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

function addQuestion() {

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    var containPassage = $('#containPassage').val();
    var passageId;
    var passageTitle;
    var passage;
    if(containPassage > 0) {
        passageId = $('#passageList').val();
        passageTitle = $('#passageTitle').val();
        passage = $().CKEditorValFor('passage');
    }else {
        passageId = -2;
        passageTitle = "";
        passage = "";
    }

    $.ajax({
        url: '../question/all/add',
        async: true,
        type: 'POST',
        data: {
            categoryId: $('#categoryId').children("option:selected").val(),
            question: $().CKEditorValFor('question'),
            level: $('#level').children("option:selected").val(),
            answer: $('#answer').val(),
            choice2: $('#choice2').val(),
            choice3: $('#choice3').val(),
            choice4: $('#choice4').val(),
            containPassage : containPassage,
            passageId : passageId,
            passageTitle : passageTitle,
            passage : passage
        },
        success: function(response) {
            var decode = JSON.parse(response);
            if (decode.success == true) {
                $('#addQuestion').modal('hide');
                refresh();
                $.notify("Record successfully saved", "success");
            } else if (decode.success === false) {
                decode.errors.forEach(function(element) {
                    $.notify(element, "error");
                });
                //if (decode.status == -1) $('#addQuestion').modal('hide');
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
        url: '../question/all/delete',
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

$(document).on("change", "#filterData", function(e) {
    e.preventDefault();
    getAllData();
});

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
        //$.notify("All records display", "info");
        spinner.stop();
    });
    return;
}

function refresh() {
    getAllData();
    resetFields();
    animate(500);
}

/* Formatting function for row details*/
function format(d) {
    var html = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td class = "choices">Question:</td>' +
        '<td class = "answers"><b>' + d.question + '</b></td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">Answer:</td>' +
        '<td class = "answers"><b>' + d.answer + '</b></td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">2nd Choice:</td>' +
        '<td class = "answers">' + d.choice2 + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">3rd Choice:</td>' +
        '<td class = "answers">' + d.choice3 + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class = "choices">4th Choice:</td>' +
        '<td class = "answers">' + d.choice4 + '</td>' +
        '</tr>';
    if(d.containPassage == 1) {
        html +='<tr>'+
            '<td class = "choices">Passage:</td>' +
            '<td class = "answers">' + d.passageTitle + '</td>' +
            '</tr>';
    }
    html += '</table>';


    return html;
}

$("#addQuestion").on('change', "#containPassage", function(){
    if($(this).val() == 1) {
        fetchPasses(0);
    }
});

$("#addQuestion").on('change', "#passageList", function(){
    if($(this).val() != -1) {
        fetchPasses(1);
    }else {
        $('#toHideForPassage').hide();
    }
});

function checkObjectSize(obj) {
    return Object.keys(obj).length;
}

function fetchPasses(mode, value = -1) {
    var passageId;
    if(mode == 1) {
        passageId = $("#passageList").val();
    }
        $.ajax({
            url: '../question/all/getPassages',
            async: true,
            type: 'POST',
            data: {
                confirm: 1
            },
            success: function(response) {
                var decode = JSON.parse(response);
                if (decode.success == true) {
                    var html = '<option value="-1">None</option>';
                    if (checkObjectSize(decode.passages) >= 1) {
                        if(mode == 1) {              
                            if(decode.passages[passageId] != undefined ) {
                                $('#passageTitle').val(decode.passages[passageId].passageTitle);
                                //CKEDITOR.instances['passage'].setData("");
                                CKEDITOR.instances['passage'].setData(decode.passages[passageId].passage);
                            }else {
                                $('#passageTitle').val("");
                                CKEDITOR.instances['passage'].setData("");
                            }
                            return;
                        }
                        var key;
                        for (key in decode.passages) {
                            html += '<option value="' + decode.passages[key].id + '">' + decode.passages[key].passageTitle + '</option>';
                        }
                    } else {
                       $.notify("No passages found.", "error");
                    }
                    $('#passageList').html(html);

                    if(mode == 0 && value != -1 && value != undefined) {
                        $('#passageList').val(value);
                        console.log("hel");
                    }
                } else if (decode.success === false) {
                    if($('#containPassage').val() == 1) {
                        var html = '<option value="-1">None</option>';
                        if (decode.error != undefined) {
                            $.notify(decode.error[0], "error");
                        } else {
                            $.notify("Problem fetching passages.", "error");
                        }
                        if(mode == 0) $('#passageList').html(html);
                    }
                    return;
                }
            },
            error: function(error) {
                if (error.responseText) {
                    var msg = JSON.parse(error.responseText)
                    $.notify(msg.msg, "error");
                }
                return;
            }
        });
    
}

function getAllData() {
    $("#questionTable").dataTable().fnDestroy();
    var table = $('#questionTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../question/all/get",
            "type": "POST",
            "data": {
                filterData: $("#filterData").val()
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
                "data": "question"
            },
            { "data": "category",
                sortable: true,
                "render": function(data, type, row, meta) {
                    return (row.containPassage == 1) ? "(P) "+ row.category : row.category;
                }
            },
            { "data": "levelName" },
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
    $('#questionTable tbody').on('click', 'td.details-control', function() {
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

    $('#questionTable tbody').on('click', '.edit-icon', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        create_question(row.data());
    });
}

$(document).on('click', '#createNewPassage', function() {
    $(this).toggleClass("edit-active")
    if ($(this).hasClass("edit-active")) {
        $(this).html("clear passage")
        $("#passageList").attr('disabled', true)
        $("#passageList").val("-1")
        $('#toHideForPassage').show()
    } else {
        $(this).html("create new")
        $("#passageList").attr('disabled', false)
        CKEDITOR.instances['passage'].setData("")
        $("#passageTitle").val('');
        $("#passageList").val("-1");
        $('#toHideForPassage').hide()
    }
})

$(document).on('change', "#containPassage", function() {
    if ($("#containPassage").val() == -1) {
        $("#toHideForLink").hide();
        CKEDITOR.instances['passage'].setData("")
        $("#passageTitle").val('');
        $("#passageList").val("-1");
        $('#toHideForPassage').hide()
    } else {
        $("#toHideForLink").show();
    }
})