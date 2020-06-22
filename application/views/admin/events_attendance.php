<ul class="nav nav-pills border p-2 m-2" role="tablist">
    <li class="nav-item">
      <a class="nav-link " href="<?php echo base_url('admin-events') ?>">Event Management</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="<?php echo base_url('admin-events-attendance') ?>">Event Attendance</a>
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
            
            <fieldset class="border pb-3 pr-3 pl-3 mb-4">
            <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;LIST OF EVENTS</legend>              
                <h5 class="card-title">SAVED EVENTS</h5>
                <div class="table-responsive">
                <table id="tbl_admin_events" class="table table-sm table-bordered text-center">
                    <thead>
                        <th class="text-nowrap">EVENT TITLE</th>
                        <th class="text-nowrap">DESCRIPTION</th>
                        <th class="text-nowrap">EVENT DATE</th>
                        <th class="text-nowrap">HEADCOUNT</th>
                        <th class="text-nowrap">CONTROLS</th>
                    </thead>
                    <tbody></tbody>
                </table>               
            </fieldset>
                        
                        
                
            </div>
        </div>
    </div>        


   



    <div class="modal fade" id="modal_attendance_mail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
       
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-paper-plane"></i>&nbsp;ANNOUNCEMENT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>SUBJECT:</b>
                <input type="text" placeholder="Input Text Here" class="form-control mb-3" id="txt_subject">
                <b>MESSAGE:</b>
                <textarea class="form-control mb-5" placeholder="Input Text Here" id="txt_message" rows="5"></textarea>
            </div>
            <div class="modal-footer">
                <button id="event_attendance_send_mail" type="button" class="btn btn-sm btn-primary" onclick="EVENT_ATTENDANCE.send_mail()"><i class="fa fa-paper-plane"></i>&nbsp;SEND</button>
            </div>
        </div>
    </div>
</div>