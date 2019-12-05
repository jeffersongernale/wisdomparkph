
    <h3>ABOUT</h3>
    <p>All details regarding with the about section can be edited here. For more detailed illustration please view the attached guide.</p>
    <button class="btn btn-sm btn-primary float-right"><i class="fa fa-eye"></i>&nbsp;VIEW GUIDE</button>
    <br>
    <br>

    <div id="accordion">

        <div class="card">
            <div class="card-header p-1 accordion_header" id="accordion_header" data-toggle="collapse" data-target="#collapse_header" aria-expanded="true" aria-controls="collapseOne">
                <h6 class="mb-0 p-1">
                    <i class="fa fa-image"></i>&nbsp;PHOTOS
                </h6>
            </div>
            <div id="collapse_header" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="card">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title">GALLERY PHOTOS</h5>
                            <fieldset class="border pb-3 pr-3 pl-3">
                                <form id="gallery_upload" enctype="multipart/form-data" method="post">
                                <div class="row mt-3">
                                    
                                    <div class="col-lg-2 font-weight-bold">
                                        IMAGE:
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="file" name="gallery_file_image" id="gallery_file_image" class="form-control">
                                    </div>
                                    <div class="w-100 mb-1"></div>
                                    <div class="col-lg-12">
                                    <button type="button" id="btn_header_submit" class="btn btn-sm btn-danger float-right mt-3"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                                    <button type="button" id="btn_header_submit" class="btn btn-sm btn-primary float-right mt-3 mr-2" onclick="GALLERY.insert_gallery_photo()"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
                                    </div>
                                   
                                </div>
                                </form>
                            </fieldset>

                            <fieldset class="border pb-3 pr-3 pl-3 mb-4">
                                <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;Current</legend>
                                <table class="table table-bordered table-striped" id="tbl_photo_admin">
                                
                            </table>
                            </fieldset>

                          

                           

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header p-1  accordion_header" id="headingTwo" data-toggle="collapse" data-target="#collapse_details" aria-expanded="false" aria-controls="collapseTwo">
                <h6 class="mb-0  p-1">
                    <i class="fa fa-info-circle"></i>&nbsp;VIDEOS
                </h6>
            </div>
            <div id="collapse_details" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <div class="card">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title">GALLERY VIDEOS</h5>

                            <fieldset class="border pb-3 pr-3 pl-3">
                                <legend class="w-auto font-weight-bold pl-2 pr-2 fieldset_header"><i class="fa fa-edit"></i>&nbsp;New</legend>
                                <b>Youtube Video ID: </b> 
                                <a href="#" onclick="window.open('<?php echo base_url('asset/images/website/YoutubeID.png')?>');" class="ml-3"  style="text-decoration: underline"><i class="fa fa-question-circle"></i>&nbsp;What is a Youtube Video ID?</a>
                                <input type="text" class="form-control" placeholder="Embed Video Here">
                                <!-- <b>Title: </b>
                                <input type="text" class="form-control" placeholder="Input here"> -->
                                <b>Description: </b>
                                <textarea class="form-control" rows="5" placeholder="Input Here"></textarea>
                                <button type="button" id="btn_header_submit" class="btn btn-sm btn-danger float-right mt-3"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                            <button type="button" id="btn_header_submit" class="btn btn-sm btn-primary float-right mt-3 mr-2"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
                            </fieldset>

                            <fieldset class="border pb-3 pr-3 pl-3 mb-4">
                                <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;Current</legend>
                                <table class="table table-bordered table-striped" id="tbl_video_admin">
                                
                               
                            </table>
                            </fieldset>

                            

                           

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header p-1  accordion_header" id="headingThree" data-toggle="collapse" data-target="#collapse_subdetails" aria-expanded="false" aria-controls="collapseThree">
                <h6 class="mb-0  p-1">
                    <i class="fa fa-clipboard-list"></i>&nbsp;SONGS
                </h6>
            </div>
            <div id="collapse_subdetails" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <div class="card">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title">SUB-DETAILS</h5>
                            <fieldset class="border pb-3 pr-3 pl-3 mb-4">
                                <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;Current</legend>
                                <p class="card-text">
                                    <i class="fa fa-check"></i>&nbsp;The mainstream activities in this Center comprise of lectures on Buddhism, Science, Philosophy, Psychology, Health, and the Environment.
                                    <br>
                                    <i class="fa fa-check"></i>&nbsp;The Center is equipped with multi-media facilitation rooms designed to continuously conduct programs, lectures, and dialogues relevant to the abovementioned goal.
                                    <br>
                                    <i class="fa fa-check"></i>&nbsp;Licensed counselors for troubled individuals and community service activities are also available.
                                </p>
                            </fieldset>

                            <fieldset class="border pb-3 pr-3 pl-3">
                                <legend class="w-auto font-weight-bold pl-2 pr-2 fieldset_header"><i class="fa fa-edit"></i>&nbsp;New</legend>
                                <button class="btn btn-sm btn-danger float-right" style="color:white"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-sm btn-success float-right mr-2 ml-2 mb-2"><i class="fa fa-plus"></i></button>
                                <span class="float-right">Field Controls</span>

                                <input type="text" class="form-control m-2" placeholder="Input Text Here">
                                <input type="text" class="form-control m-2" placeholder="Input Text Here">
                            </fieldset>

                            <button type="button" id="btn_header_submit" class="btn btn-sm btn-danger float-right mt-3"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                            <button type="button" id="btn_header_submit" class="btn btn-sm btn-primary float-right mt-3 mr-2"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>


                        </div>
                    </div>
                </div>
            </div>

        </div>

       
    </div>
