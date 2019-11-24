
    <h3>ABOUT</h3>
    <p>All details regarding with the about section can be edited here. For more detailed illustration please view the attached guide.</p>
    <br>
    <br>

    <div class="row">

        <div class="col-lg-9">
           
            <div class="card">
                <div class="card-header p-1 accordion_header" id="accordion_header" aria-expanded="true" aria-controls="collapseOne">
                    <h6 class="mb-0 p-1">
                        <i class="fa fa-info-circle"></i>&nbsp;Information
                    </h6>
                </div>
                <div id="collapse_header" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                    <fieldset class="border pb-3 pr-3 pl-3 mb-4">
                    <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-edit"></i>&nbsp;NEW</legend>              
                        <b>TITLE</b>
                        <input type="text" id="txt_title" class="form-control" placeholder="Input text">
                        <b>SECTION</b>
                        <input type="text"id="slc_section" class="form-control" placeholder="Input text">
                        <b>DATE</b>
                        <input type="date" id="txt_date_event" class="form-control">
                        <b>DESCRIPTION</b>
                        <textarea id="txt_description" class="form-control" rows="5" placeholder="Input text"></textarea>
                        <button type="button" class="btn btn-sm btn-danger mt-4 float-right"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                        <button type="button" class="btn btn-sm btn-primary mt-4 mr-4 float-right" onclick="EVENTS.insert_event()"><i class="fa fa-paper-plane"></i>&nbsp;SAVE</button>
                    </fieldset>

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
        </div>

        <div class="col-lg-3">
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
                                <h5 class="card-title">SAVED EVENTS</h5>
                                <div class="table-responsive">
                                <table id="tbl_admin_events1" class="table table-sm table-bordered">
                                    <thead>
                                        <th>CTRLS</th>
                                        <th style="width: 20vw">SECTION</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>


