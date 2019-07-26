<div class="modal fade" id="addProgram" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add Program</h3>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label class="control-label">Program Name</label>
                        <input id="programName" type="text" class="form-control" id="course_code" name="course_code">
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Duration</span>
                        <input id="programDuration" type="number" id="time" name="time" class="form-control" value="" required="" min="0">   
                        <span class="input-group-addon">Min.</span>                 
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <a id="btn-save" class="btn btn-primary" onclick="save()">Submit</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



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
              <a id="btn-save" class="btn btn-primary" onclick="save()">Submit</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>