
<h3>USER MANAGEMENT</h3>
    <p>Display all administrator account</p>
    <br>
    <br>

   
    <div class="card">
        <div class="card-header p-1 accordion_header" id="accordion_header" aria-expanded="true" aria-controls="collapseOne">
            <h6 class="mb-0 p-1">
                <i class="fa fa-info-circle"></i>&nbsp;Information
            </h6>
        </div>
        <div id="collapse_header" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
            <fieldset class="border pb-3 pr-3 pl-3 mb-4">
            <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-user-plus"></i>&nbsp;CREATE NEW USER</legend>              
            <b>NAME: </b>
             <input type="text" id="txt_name" placeholder="Input Text Here" class="form-control mb-2">            
            <b>USERNAME: </b>
             <input type="text" id="txt_username" placeholder="Input Text Here" class="form-control mb-2">              
            <b>PASSWORD: </b>
             <input type="password" id="txt_password" placeholder="Input Text Here" class="form-control mb-2">              
            <b>CONFIRM PASSWORD: </b>
             <input type="password" id="txt_confirm_password" placeholder="Input Text Here" class="form-control mb-4">          
             <button class="btn btn-sm btn-danger float-right"><i class="fa fa-times"></i>&nbsp;CANCEL</button> 
             <button class="btn btn-sm btn-primary float-right mr-2" onclick="USER.insert_user()"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>               
            </fieldset>

            <fieldset class="border pb-3 pr-3 pl-3 mb-4">
            <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;LIST OF EVENTS</legend>              
                <h5 class="card-title">SAVED EVENTS</h5>
                <div class="table-responsive">
                <table id="tbl_user_mgmt" class="table table-sm table-bordered text-center">
                    <thead>
                        <th class="text-nowrap" style="width: 20%">CONTROLS</th>
                        <th class="text-nowrap">NAME</th>
                        <th class="text-nowrap">DATE CREATED</th>
                    </thead>
                    <tbody></tbody>
                </table>  
                </div>             
            </fieldset>
            </div>
        </div>
    </div>        



    <div class="modal fade" id="modal_users_edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
       
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-info-circle"></i>&nbsp;INFORMATION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>NAME:</b>
                <input type="text" class="form-control" id="txt_modal_name">
                <b>USERNAME:</b>
                <input type="text" class="form-control" id="txt_modal_username">
                <b>PASSWORD:</b>
                <input type="password" class="form-control" id="txt_modal_password">
                <!-- <input type="text" name="lalala"> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" onclick="USER.update_user()"><i class="fa fa-save"></i>&nbsp;SAVE</button>
            </div>
        </div>
    </div>
</div>