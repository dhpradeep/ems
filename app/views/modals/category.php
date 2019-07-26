<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-book"></i> Add Category</h3>
            </div>
            <form method="post">
                <div class="modal-body col-md-12">
                    <div class="form-group col-md-6">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="category name" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <input type="text" class="form-control" name="categoryDescription" id="categoryDescription" placeholder="category description" />
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> Save</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
        </div>
    </div>
</div>
</div>