<!-- For model -->
<div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Manage Model</h3>
            </div>
            <div class="modal-body col-md-12">
                <form role="form">
                    <input id="modelId" type="hidden"/>
                    <input id="programId" data-id="<?= $this->program['id']; ?>" type="hidden">
                    <div class="form-group col-md-6">
                        <label>Program *</label>
                        <select class="form-control" id="programOption" name="programOption">
                            <option value="0" name="None"> None </option>
                                <?php
                                if(!is_null($this->programs)) {
                                    foreach ($this->programs as $value) {
                                ?>
                                <option value="<?= $value['id'] ?>" name="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                <?php
                                   }
                                }
                            ?>                        
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Category *</label>
                        <select class="form-control" id="categoryId" name="categoryId">
                            <option value="0" name="None"> None </option>
                            <?php
                                if(!is_null($this->category)) {
                                    foreach ($this->category as $value) {
                                        echo "<option value='".$value['id']."' name='".$value['name']."'>".$value['name']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label>Question Level *</label>
                        <select class="form-control" id="minLevel" name="minLevel">
                            <option value="1" name="Basic">Basic</option>
                            <option value="2" name="Medium">Medium</option>
                            <option value="3" name="Hard">Hard</option>
                        </select>
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">No. of questions *</label>
                        <input type="number" class="form-control" id="noOfQuestions" name="noOfQuestions" min="1">
                        <span class="help-inline"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="saveBtn">Add</button>
                <!--<button type="reset" class="btn btn-warning">Reset</button>-->
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
