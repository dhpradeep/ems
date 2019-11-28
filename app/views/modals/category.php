<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-book"></i> Manage Category</h3>
            </div>
            <form method="post">
                <div class="modal-body col-md-12">
                    <div class="form-group col-md-6">
                        <label>Program *</label>
                        <select class="form-control" id="programId" name="programId">
                            <option value="1">BCA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <input id="categoryId" type="hidden"/>
                        <label>Category Name *</label>
                        <input id="categoryName" type="text" class="form-control" name="categoryName" placeholder="category name" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <textarea id="categoryDescription" rows="4" type="text" class="form-control" name="categoryDescription" placeholder="category description"
                        style="resize:vertical;height:auto">
                        </textarea>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveBtn">Add</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
        </div>
    </div>
</div>
</div>
