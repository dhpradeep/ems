$("#addEducation").click(function() {
    educationFormMaker();
});

function educationFormMaker() {
    $('#nestedForm').append(`
    <div class="edu">
    <div class="form-group col-md-2">
        <label for="level">Level</label>
        <select class="form-control" id="level">
            <option value="1">SLC</option>
            <option value="2">+2</option>
            <option value="3">Distict Level</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="board">Board</label>
        <input type="text" class="form-control" name="board" id="board" placeholder="Board" />
        <span class="help-inline"></span>
    </div>
    <div class="form-group col-md-2">
        <label for="yearofcompletion">Year of completion</label>
        <input type="text" class="form-control" name="yearofcompletion" id="yearofcompletion" placeholder="Year of completion" />
        <span class="help-inline"></span>
    </div>
    <div class="form-group col-md-2">
        <label for="percentage">Percentage</label>
        <input type="text" class="form-control" name="percentage" id="percentage" placeholder="Percentage" />
        <span class="help-inline"></span>
    </div>
    <div class="form-group col-md-3">
        <label for="institution">Institute</label>
        <input type="text" class="form-control" name="institution" id="institution" placeholder="Institute" />
        <span class="help-inline"></span>
    </div>
    <div class="form-group-btn col-md-1">
        <label for="removeEdu">&nbsp;</label>
        <button id="removeEdu" type="button" class="form-control btn btn-danger">-</button>
    </div>
</div>
        `);
}

$("#nestedForm").on("click", "#removeEdu", function() { $(this).parent().parent().remove() });

$(".next").click(function() { $('#tabList li.active').next('li').find('a').trigger('click') });
$(".previous").click(function() { $('#tabList li.active').prev('li').find('a').trigger('click') });