<div id="goal" class="container tab-pane fade"><br>
  <h3>GOAL</h3>

  <div class="card">
  <div class="card-header p-1 accordion_header" id="accordion_header"  aria-expanded="true" aria-controls="collapseOne">
            <h6 class="mb-0 p-1">
                <i class="fa fa-info-circle"></i>&nbsp;Information
            </h6>
        </div>
    <div class="card-body">
      <h5 class="card-title">COMPANY GOALS</h5>
      <fieldset class="border pb-3 pr-3 pl-3">
        <legend class="w-auto font-weight-bold pl-2 pr-2 fieldset_header"><i class="fa fa-edit"></i>&nbsp;New</legend>
        <textarea class="form-control" placeholder="Input Text Here" id="txt_goals" rows="5"></textarea>
        <button type="button" id="btn_header_submit" class="btn btn-sm btn-danger float-right mt-3"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
        <button type="button" id="btn_header_submit" class="btn btn-sm btn-primary float-right mt-3 mr-2" onclick="DETAILS.insert_goals()"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
      </fieldset>

      <fieldset class="border pb-3 pr-3 pl-3 mb-4 mt-4">
        <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;Current</legend>
        <table  id="current_goals" class="card-text table table-bordered"></table>
      </fieldset>

      

   


    </div>
  </div>

</div>