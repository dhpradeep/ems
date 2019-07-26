<div class="modal fade" id="questionsModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" role="form" id="frmQuestions" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3>Manage Questions</h3>
                </div>
                <div class="modal-body col-md-12">
                    <div class="form-group col-md-12">
                        <label>Question</label>
                        <textarea class="ckeditor" name="content" id="content"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Primary Image: </label>
                        <input type="file" name="mainpic" id="mainpic" class="form-control" accept="image/*" />
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Category</label>
                        <select class="form-control" id="categoryId" name="categoryId">
                            <option value="1" name="PHP">PHP</option>
                            <option value="2" name="JAVA">JAVA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Question Level </label>
                        <select class="form-control" id="questionLevel" name="questionLevel">
                            <option value="1" name="Basic">Basic</option>
                            <option value="2" name="Intermediate">Intermediate</option>
                            <option value="3" name="Hard">Hard</option>
                        </select>
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Correct Answer</label>
                        <input type="text" name="answer" id="answer" class="form-control answer"/>
                        <p class="help-inline"></p>
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label>2nd Choice</label>
                        <input type="text" name="choice2" id="choice2" class="form-control answer"/> 
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group col-md-6">                
                        <label>3rd Choice</label>
                        <input type="text" name="choice3" id="choice3" class="form-control answer"/> 
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>4th Choice</label>
                        <input type="text" name="choice4" id="choice4" class="form-control answer"/>
                        <p class="help-inline"></p> 
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" id="btn-save" class="btn btn-primary">Submit</button> -->
                    <button type="submit" id="btn-save" class="btn btn-primary">Submit</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
