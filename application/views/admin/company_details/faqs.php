<div id="menu1" class="container tab-pane fade"><br>
    <h3>Frequently Ask Questions</h3>

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
                        <!-- <h5 class="card-title">COMPANY MISSION</h5> -->
                        <fieldset class="border pb-3 pr-3 pl-3">
                            <legend class="w-auto font-weight-bold pl-2 pr-2 fieldset_header"><i class="fa fa-edit"></i>&nbsp;New</legend>
                            <b>QUESTION:</b>
                            <textarea id="txt_question" class="form-control mb-3" placeholder="Input Text Here" rows="5"></textarea>
                            <b>ANSWER:</b>
                            <textarea id="txt_answer"   class="form-control" placeholder="Input Text Here" rows="5"></textarea>
                            <button type="button" id="btn_header_submit" class="btn btn-sm btn-danger float-right mt-3"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                            <button type="button" id="btn_header_submit" class="btn btn-sm btn-primary float-right mt-3 mr-2"  onclick="DETAILS.insert_faqs()"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
                        
                        </fieldset>

                        
                        <fieldset class="border pb-3 pr-3 pl-3 mb-4 mt-4">
                            <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;Current</legend>
                            <!-- <button type="button" onclick="DETAILS.get_data();">RELOAD</button> -->
                            <table  id="current_faqs" class="card-text table table-bordered">
                                <thead>
                                    <th class="text-center">QUESTION</th>
                                    <th class="text-center">ANSWER</th>
                                    <th class="text-center">CONTROLS</th>
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