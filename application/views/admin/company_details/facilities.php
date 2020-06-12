<div id="menu2" class="container tab-pane fade"><br>
    <h3>Facilities</h3>
    <div class="card">
        <div class="card-header p-1 accordion_header" id="accordion_header" data-toggle="collapse" data-target="#collapse_header" aria-expanded="true" aria-controls="collapseOne">
            <h6 class="mb-0 p-1">
                <i class="fa fa-info-circle"></i>&nbsp;Information
            </h6>
        </div>
        <div id="collapse_header" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="card">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <!-- <h5 class="card-title">FACILITIES </h5> -->
                        <form id="form_facilities" enctype="multipart/form-data">
                        <fieldset class="border pb-3 pr-3 pl-3">
                            <legend class="w-auto font-weight-bold pl-2 pr-2 fieldset_header"><i class="fa fa-edit"></i>&nbsp;New</legend>
                            <div class="row text-right">
                                <div class="col-lg-2 font-weight-bold">IMAGE:</div>
                                <div class="col-lg-10">
                                    <input type="file" name="file_image" id="file_image" class="form-control" required>
                                </div>
                                <div class="w-100 mb-2"></div>
                                <div class="col-lg-2 font-weight-bold">TITLE:</div>
                                <div class="col-lg-10">
                                    <input type="text" name="txt_title" id="txt_title" class="form-control" placeholder="Input Text Here" required>
                                </div>
                                <div class="w-100 mb-2"></div>
                                <div class="col-lg-2 font-weight-bold">DESCRIPTION:</div>
                                <div class="col-lg-10">
                                <textarea id="txt_description" name="txt_description" class="form-control" placeholder="Input Text Here" rows="5" required></textarea>
                                </div>
                                <div class="w-100 mb-2"></div>
                                <div class="col-12">
                                <button type="button" id="btn_header_submit" class="btn btn-sm btn-danger float-right mt-3"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                                <button type="button" id="btn_header_submit" class="btn btn-sm btn-primary float-right mt-3 mr-2" onclick="DETAILS.insert_facilities()"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
                                </div>
                            </div>
                        </fieldset>
                        </form>
                        <fieldset class="border pb-3 pr-3 pl-3 mb-4">
                            <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;Current</legend>
                            
                            <table class="table table-bordered table-striped" id="tbl_admin_facilities">
                            </table>
                        </fieldset>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_facilities_change_pic" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="modal_form_facilities" enctype="multipart/form-data" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-image"></i>&nbsp;CHANGE PICTURE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Select a picture to upload</b>
                <input type="file" class="form-control" id="file_facilities_image" name="file_facilities_image" required>
                <!-- <input type="text" name="lalala"> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" onclick="DETAILS.update_facilities_modals_submit()"><i class="fa fa-save"></i>&nbsp;SAVE</button>
            </div>
        </div>
        </form>
    </div>
</div>