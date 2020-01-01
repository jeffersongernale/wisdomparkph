<div id="org_chart" class="container tab-pane fade"><br>
    <h3>MISSION</h3>

    <div class="card">
        <div class="card-header p-1 accordion_header" id="accordion_header" aria-expanded="true" aria-controls="collapseOne">
            <h6 class="mb-0 p-1">
                <i class="fa fa-info-circle"></i>&nbsp;Information
            </h6>
        </div>
        <div id="collapse_header" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="card">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title">ORGANIZATIONAL CHART</h5>
                        <form id="form_org_chart" enctype="multipart/form-data" method="POST">
                        <fieldset class="border pb-3 pr-3 pl-3">
                            <legend class="w-auto font-weight-bold pl-2 pr-2 fieldset_header"><i class="fa fa-edit"></i>&nbsp;EDIT</legend>
                            <b>Image:</b>
                            <input type="file" id="file_org_image" name ="file_org_image" class="form-control">
                            <b>Name:</b>
                            <input type="text" id="txt_org_name" name = "txt_org_name" class="form-control" placeholder="Input Text Here">
                            <b>Position:</b>
                            <input type="text" id="txt_org_position" name = "txt_org_position" class="form-control" placeholder="Input Text Here">
                            <button type="button" id="btn_header_submit" class="btn btn-sm btn-danger float-right mt-3"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                            <button type="button" id="btn_header_submit" class="btn btn-sm btn-primary float-right mt-3 mr-2" onclick="DETAILS.insert_org_chart()"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
                        </fieldset>
                        </form>
                        <fieldset class="border pb-3 pr-3 pl-3 mb-4">
                            <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;Current</legend>
                            <table class="table table-bordered table-striped text-center" id="tbl_org_chart">
                                <thead>
                                    <th>CONTROLS</th>
                                    <th>NAME</th>
                                    <th>POSITION</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </fieldset>
                       

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="modal_org_chart_change_pic" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="modal_form_org_chart" enctype="multipart/form-data" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-image"></i>&nbsp;CHANGE PICTURE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Select a picture to upload</b>
                <input type="file" class="form-control" id="file_org_chart_image" name="file_org_chart_image" required>
                <!-- <input type="text" name="lalala"> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" onclick="DETAILS.update_org_chart_modals_submit()"><i class="fa fa-save"></i>&nbsp;SAVE</button>
            </div>
        </div>
        </form>
    </div>
</div>