<div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Manage Student</h3>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Manage Student
                        </div>
                        <div class="panel-body">
                            <div class="row text-right">
                                <span style="color:red;">field(*) are required.</span>
                            </div>
                            <div class="row">
                            <div role="tabpanel">

                <div class="tab-content tab-content-student">
                    <br>
                    <div role="tabpanel" class=" tab-pane active" id="home">
                        <form role="form">
                            <div class="form-group col-md-6">
                                <label for="fname">First Name *</label>
                                <input id="studentId" type="hidden"/>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mname">Middle Name</label>
                                <input type="text" class="form-control" name="mname" id="mname" placeholder="Middle Name" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname">Last Name *</label>
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email *</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dobAd">Date of Birth (A.D)</label>
                                <input type="date" class="form-control" name="dobAd" id="dobAd" placeholder="Date of Birth" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="groupId">Group *</label>
                                <select class="form-control" id="groupId" name="groupId">
                                    <?php
                                        foreach ($this->group as $value) {
                                    ?>
                                            <option value="<?= $value['id'] ?>" name="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                    <?php
                                         } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="has-success">
                                    <div class="checkbox">
                                        <label for="eligible">
                                        <input type="checkbox" id="eligible" name="eligible" value="1">
                                       Verified 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">&nbsp;</div>
                            <div class="form-group col-md-12 col-sm-12 text-right">
                                    <a id="saveBtn" href="#" class="btn btn-success">Add</a>
                                    <button class="btn btn-warning" data-dismiss="modal">Close</button>
                            </div>
                    </div>

                    
                        </form>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
    </div>
</div>