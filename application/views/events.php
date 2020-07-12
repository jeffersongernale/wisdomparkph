
<!doctype html>
<html lang="en">
  <head>
    <title>Wisdom Park</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="asset/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="asset/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="asset/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="asset/images/favicon/site.webmanifest">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/jquery-ui.css">
    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asset/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="asset/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="asset/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="asset/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="asset/fonts/icomoon/style.css">

    <link rel="stylesheet" href="asset/css/aos.css">

    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/custom.css">
    <link href="<?php echo base_url('asset/node_modules/izitoast/dist/css/iziToast.min.css'); ?>" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  

 


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <?php include 'include/website_navbar.php'; ?>
  

  
     
    <div class="site-blocks-cover overlay" style="background-image: url(asset/images/website/img6.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          
              <div class="col-md-9 mt-lg-5 text-center">
                <h1>Check our Events</h1>
                <p class="post-meta">Library &bull;Dharma & Lecture Hall &bull; Multi-Media Facilitation Hall &bull;Dharma Café – Vegetarian Dining Hall &bull; A Nine-dragon fountain &bull; etc</p>
                
              </div>
            
        </div>
      </div>
    </div>  

    
    <section class="site-section border-bottom" id="services-section">
        <div class="container">
            <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Our Events</h2>
            </div>
            </div>
            
            <div class="row align-items-stretch" id="facilities_data">
                
            </div>

            
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal_event_confirm" data-id=0>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Event Attendance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>To attend in this event, please state your name and email.</p>
            <b>Complete Name:</b>
            <input type="text" id="txt_name" class="form-control mb-2">
            <b>Email Address:</b>
            <input type="text" id="txt_email" class="form-control mb-2">
            <b>Number of attendees:</b>
            <input type="number" id="txt_attendees" class="form-control" value="1">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="EVENTS.save_attendance();">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
    <?php include 'include/footer.php'; ?>

  </div> <!-- .site-wrap -->

  <script src="asset/js/jquery-3.3.1.min.js"></script>
  <script src="asset/js/jquery-ui.js"></script>
  <script src="asset/js/popper.min.js"></script>
  <script src="asset/js/bootstrap.min.js"></script>
  <script src="asset/js/owl.carousel.min.js"></script>
  <script src="asset/js/jquery.countdown.min.js"></script>
  <script src="asset/js/jquery.easing.1.3.js"></script>
  <script src="asset/js/aos.js"></script>
  <script src="asset/js/jquery.fancybox.min.js"></script>
  <script src="asset/js/jquery.sticky.js"></script>
  <script src="asset/js/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url('asset/node_modules/izitoast/dist/js/iziToast.min.js'); ?>"></script>
  
  <script src="asset/js/main.js"></script>
  <script src="asset/scripts/events.js"></script>

  
    
  </body>
</html>


