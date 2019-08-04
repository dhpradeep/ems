<!-- For model -->
<div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add Model</h3>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                    <label>Category</label>
                        <select class="form-control" id="categoryId" name="categoryId">
                            <option value="1" name="PHP">PHP</option>
                            <option value="2" name="JAVA">JAVA</option>
                            <option value="3" name="JAVA">PYTHON</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Question Level </label>
                        <select class="form-control" id="questionLevel" name="questionLevel">
                            <option value="1" name="Basic">Basic</option>
                            <option value="2" name="Intermediate">Intermediate</option>
                            <option value="3" name="Hard">Hard</option>
                        </select>
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">No. of questions</label>
                        <input type="number" class="form-control" id="noOfQuestions" name="passing_score">
                        <span class="help-inline"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="saveBtn">Add</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>