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
                        <fieldset class="border pb-3 pr-3 pl-3">
                            <legend class="w-auto font-weight-bold pl-2 pr-2 fieldset_header"><i class="fa fa-edit"></i>&nbsp;New</legend>
                            <div class="row text-right">
                                <div class="col-lg-2 font-weight-bold">IMAGE:</div>
                                <div class="col-lg-10">
                                    <input type="file" name="file_image" id="file_image" class="form-control">
                                </div>
                                <div class="w-100 mb-2"></div>
                                <div class="col-lg-2 font-weight-bold">TITLE:</div>
                                <div class="col-lg-10">
                                    <input type="text" name="file_image" id="file_image" class="form-control" placeholder="Input Text Here">
                                </div>
                                <div class="w-100 mb-2"></div>
                                <div class="col-lg-2 font-weight-bold">DESCRIPTION:</div>
                                <div class="col-lg-10">
                                <textarea id="txt_header" class="form-control" placeholder="Input Text Here" rows="5"></textarea>
                                </div>
                                <div class="w-100 mb-2"></div>
                                <div class="col-12">
                                <button type="button" id="btn_header_submit" class="btn btn-sm btn-danger float-right mt-3"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                                <button type="button" id="btn_header_submit" class="btn btn-sm btn-primary float-right mt-3 mr-2"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
                                </div>
                            </div>
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
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-image"></i>&nbsp;VIEW PICTURE</a>
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

                        <button type="button" id="btn_header_submit" class="btn btn-sm btn-danger float-right mt-3"><i class="fa fa-times"></i>&nbsp;CANCEL</button>
                        <button type="button" id="btn_header_submit" class="btn btn-sm btn-primary float-right mt-3 mr-2"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>