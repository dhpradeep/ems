function create_student() {
    $('#addStudent').modal('show');
}
$("#addEducation").click(function() {
    // alert("function call");
    educationFormMaker();
});

function educationFormMaker() {
    var counter = $("#counter").data("id");
    educationFormatter(counter);
    console.log("Before add" + counter);
    counter++;
    console.log(counter);
    $("#counter").data("id", counter);
}

function educationFormatter(i) {
    var htm = '<div class="edu">' +
        '<div class="form-group col-md-2">' +
        '<label for="level' + i + '">Level</label>' +
        '<select class="form-control" name="level' + i + '" id="level' + i + '">' +
        '<option value="1">SLC</option>' +
        '<option value="2">+2</option>' +
        '<option value="3">Distict Level</option>' +
        '</select>' +
        '</div>' +
        '<div class="form-group col-md-2">' +
        '<label for="board' + i + '">Board</label>' +
        '<input type="text" class="form-control" name="board' + i + '" id="board' + i + '" placeholder="Board" />' +
        '<span class="help-inline"></span>' +
        '</div>' +
        '<div class="form-group col-md-2">' +
        '<label for="yearofcompletion' + i + '">Y.O.C</label>' +
        '<input type="text" class="form-control" name="yearofcompletion' + i + '" id="yearofcompletion' + i + '" placeholder="Year of completion" />' +
        '<span class="help-inline"></span>' +
        '</div>' +
        '<div class="form-group col-md-2">' +
        '<label for="percentage' + i + '">Percentage</label>' +
        '<input type="text" class="form-control" name="percentage' + i + '" id="percentage' + i + '" placeholder="Percentage" />' +
        '<span class="help-inline"></span>' +
        '</div>' +
        '<div class="form-group col-md-3">' +
        '<label for="institution' + i + '">Institute</label>' +
        '<input type="text" class="form-control" name="institution' + i + '" id="institution' + i + '" placeholder="Institute" />' +
        '<span class="help-inline"></span>' +
        '</div>' +
        '<div class="form-group-btn col-md-1">' +
        '<label for="removeEdu' + i + '">&nbsp;</label>' +
        '<button id="removeEdu' + i + '" type="button" class="form-control btn btn-danger removeEdu">-</button>' +
        '</div>' +
        '</div>';
    $('#nestedForm').append(htm);
}

$("#nestedForm").on("click", ".removeEdu", function() { $(this).parent().parent().remove() });

$(".next").click(function() { $('#tabList li.active').next('li').find('a').trigger('click') });
$(".previous").click(function() { $('#tabList li.active').prev('li').find('a').trigger('click') });