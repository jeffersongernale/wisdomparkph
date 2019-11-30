
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
            <div id="collapse_header" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
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
                                <table class="table table-bordered table-striped" id="tbl_gallery_admin">
                                
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
                                <input type="text" class="form-control" placeholder="embed video here">
                                <button type="button" id="btn_header_submit" class="btn btn-sm btn-danger float-right mt-3"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                            <button type="button" id="btn_header_submit" class="btn btn-sm btn-primary float-right mt-3 mr-2"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
                            </fieldset>

                            <fieldset class="border pb-3 pr-3 pl-3 mb-4">
                                <legend class="w-auto font-weight-bold pl-2 pr-2"><i class="fa fa-database"></i>&nbsp;Current</legend>
                                <table class="table table-bordered table-striped">
                                <thead>
                                    <th class="text-nowrap text-center" style="width:20vw;">CONTROLS</th>
                                    <th  class="text-nowrap">TITLE</th>
                                    <th>DESCRIPTION</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;EDIT</button>
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                                        </td>
                                        <td>
                                            Library
                                        </td>
                                        <td>
                                        <p>Wisdom Park Library houses more than a thousand books in English, Chinese, and Filipino covering various aspects, doctrines, ethics, and practices of the Mahayana, Vajrayana, Theravada, Zen, and Tibetan schools of Buddhism. It also offers a sizable collection of books of related topics such as Psychology, Philosophy, Health, Science, and Meditation. It is a place where students may conduct research, discussions, and studies on topics such as Comparative Religion and various Buddhist schools, traditions, and orientations.
                                        Wisdom Park Library aims to promote understanding and appreciation of Buddhism through study, discussion, and practice.
                                        The Library is conducive to reading and studying. Its use is free of charge. It is open to the public from Mondays to Sundays between 9 am and 6 pm. There are also books for free distribution which you may enquire with the person in charge.
                                        </p>
                                        </td>
                                    </tr>
                                </tbody>
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
