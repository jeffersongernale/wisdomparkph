
<ul class="nav nav-pills border p-2 m-2" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" href="<?php echo base_url('admin-events') ?>">Event Management</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="<?php echo base_url('admin-events-attendance') ?>">Event Attendance</a>
    </li>
</ul>

    <h3>EVENTS</h3>
    <p>Display all the saved events in our website.</p>
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
            <form method="post" enctype="multipart/form-data" id="form_event">
            <fieldset class="border pb-3 pr-3 pl-3 mb-4">
            <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-edit"></i>&nbsp;NEW</legend>              
                <b>TITLE</b>
                <input type="text" id="txt_title" name="txt_title" class="form-control" placeholder="Input text">
                <b>IMAGE</b>
                <input type="file" id="file_event_image" name="file_event_image" class="form-control" placeholder="Input text">
                <b>SECTION</b>
                <input type="text"id="slc_section" name="slc_section" class="form-control" placeholder="Input text" list="datalist_section">
                <datalist for="slc_section" id="datalist_section"></datalist>
                <b>DATE</b>
                <input type="date" id="txt_date_event" name="txt_date_event" class="form-control">
                <!-- <b>TIME</b>
                <input type="time" id="txt_date_event" name="txt_time_event" class="form-control"> -->
                <b>DESCRIPTION</b>
                <textarea id="txt_description" name="txt_description" class="form-control" rows="5" placeholder="Input text"></textarea>
                
                <b>LIST OF LINKS</b>
                <textarea id="txt_list_links" name="txt_list_links" class="form-control" rows="5" placeholder="Input text" readonly></textarea>
                
                

                <div class="row">
                    <div class="col-6">
                        <b>DELETE LINKS</b>
                        <select id="txt_select_links" class="form-control"></select>
                    </div>
                    <div class="col-6 pt-4"><button type="button" class="btn btn-sm btn-danger" onclick="EVENTS.delete_lists()"><i class="fa fa-trash"></i>&nbsp;DELETE</button></div>
                    <div class="w-100"></div>
                    <div class="col-6">
                    <b>ADD LINKS</b>
                        <input type="text"id="txt_add_link" name="txt_add_link" class="form-control " placeholder="Input text">
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-sm btn-success mt-4"  onclick="EVENTS.add_lists()"><i class="fa fa-plus"></i>&nbsp;ADD</button>
                    </div>
                </div>
               
                <button type="button" class="btn btn-sm btn-danger mt-4 float-right"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                <button type="button" class="btn btn-sm btn-primary mt-4 mr-4 float-right" onclick="EVENTS.insert_event()"><i class="fa fa-paper-plane"></i>&nbsp;SAVE</button>
            </fieldset>
            </form>
            <fieldset class="border pb-3 pr-3 pl-3 mb-4">
            <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;LIST OF EVENTS</legend>              
                <h5 class="card-title">SAVED EVENTS</h5>
                <div class="table-responsive">
                <table id="tbl_admin_events" class="table table-sm table-bordered">
                    <thead>
                        <th>CTRLS</th>
                        <th style="width: 20vw">TITLE</th>
                        <th style="width: 50vw">DESCRIPTION</th>
                        <th style="width: 20vw">DATE</th>
                        <th style="width: 20vw">SECTION</th>
                    </thead>
                    <tbody></tbody>
                </table>               
            </fieldset>
                        
                        
                
            </div>
        </div>
    </div>        


    <div class="modal fade" id="modal_events_change_pic" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="modal_form_events" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-image"></i>&nbsp;CHANGE PICTURE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>Select a picture to upload</b>
                    <input type="file" class="form-control" id="file_events_image" name="file_events_image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" onclick="EVENTS.update_event_modals_submit()"><i class="fa fa-save"></i>&nbsp;SAVE</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modal_links" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-links"></i>&nbsp;MANAGE LINKS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <div class="modal_links_list">
                        
                    </div>
                

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" onclick="EVENTS.update_event_modals_submit()"><i class="fa fa-save"></i>&nbsp;SAVE</button>
                </div>
            </div>
        </div>
    </div>



