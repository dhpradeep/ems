<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-user"></i> Manage User</h3>
            </div>
            <form method="post">
                <div class="modal-body col-md-12">
                    <div class="form-group col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Firstname" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="mname" id="mname" placeholder="Middlename" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Lastname" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Password" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Role</label>
                        <select class="form-control" id="level" name="level">
                            <option value="Admin">Admin</option>
                            <option value="User">Teacher</option>
                        </select>
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