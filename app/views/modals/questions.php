<div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" role="form" id="frmQuestions" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3>Manage Questions</h3>
                </div>
                <div class="modal-body col-md-12">
                    <div class="form-group col-md-6">
                        <label>Contain Passage ?</label>
                        <select class="form-control" id="containPassage" name="level">
                            <option value="-1" name="none">No</option>
                            <option value="1" name="passage">Yes</option>
                        </select>
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group col-md-6" id="toHideForLink">
                        <label>Select passage</label>
                        <select class="form-control" id="passageList" name="level">
                            <option value="-1" name="passage-1">None</option>
                            <?php 
                                if(!is_null($this->passages)) {
                                    foreach ($this->passages as $passage) {
                                        echo "<option value='".$passage['id']."' name='passage".$passage['id']."'>".$passage['passageTitle']."</option>";  
                                    }
                                }
                            ?>
                        </select> or <span style="color:blue;cursor:pointer" id="createNewPassage">create new</span>
                        <p class="help-inline"></p>
                    </div>
                    <div id="toHideForPassage">
                        <div class="form-group col-md-6">
                            <label>Passage Title</label>
                            <input type="text" name="passageTitle" id="passageTitle" class="form-control answer" required/> 
                            <p class="help-inline"></p>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Passage</label>
                            <textarea name="passage" class="ckeditor" id="passage" required></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <input id="questionId" type="hidden"/>
                        <label>Question</label>
                        <textarea name="question" class="ckeditor" id="question" required></textarea>
                    </div>
                    <!--<div class="form-group col-md-12">
                        <label>Primary Image: </label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" />
                        <p class="help-inline"></p>
                    </div>-->
                    <div class="form-group col-md-6">
                        <label>Category</label>
                        <select class="form-control" id="categoryId" name="categoryId">
                            <?php
                                foreach ($this->category as $value) {
                            ?>
                                    <option value="<?= $value['id'] ?>" name="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                            <?php
                                 } 
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Question Level </label>
                        <select class="form-control" id="level" name="level">
                            <option value="1" name="Basic">Basic</option>
                            <option value="2" name="Medium">Medium</option>
                            <option value="3" name="Hard">Hard</option>
                        </select>
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Correct Answer</label>
                        <input type="text" name="answer" id="answer" class="form-control answer" required/>
                        <p class="help-inline"></p>
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label>2nd Choice</label>
                        <input type="text" name="choice2" id="choice2" class="form-control answer" required/> 
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group col-md-6">                
                        <label>3rd Choice</label>
                        <input type="text" name="choice3" id="choice3" class="form-control answer" required/> 
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>4th Choice</label>
                        <input type="text" name="choice4" id="choice4" class="form-control answer" required/>
                        <p class="help-inline"></p> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveBtn">Add</button>
                    <!--<button type="reset" class="btn btn-warning">Reset</button>-->
                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
