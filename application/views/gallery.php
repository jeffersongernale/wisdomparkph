
<!doctype html>
<html lang="en">
  <head>
    <title>Wisdom Park</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
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

  
     
    <div class="site-blocks-cover overlay" style="background-image: url(asset/images/website/img1.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          
              <div class="col-md-9 mt-lg-5 text-center">
                <h1>Welcome to Wisdom Park Gallery</h1>
                <p class="post-meta">Photos &bull;Videos &bull; Songs </p>
                
              </div>
            
        </div>
      </div>
    </div>  

    
    <section class="site-section mb-5" id="portfolio-section">
      

      <div class="container">

        <div class="row mb-3">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3">Gallery</h2>
          </div>
        </div>

        <div class="row justify-content-center mb-5" data-aos="fade-up">
          <div id="filters" class="filters text-center button-group col-md-7">
            <button class="btn btn-primary active" data-filter="*">All</button>
            <button class="btn btn-primary" data-filter=".photos">Photos</button>
            <button class="btn btn-primary" data-filter=".videos">Videos</button>
            <button class="btn btn-primary" data-filter=".songs">Songs</button>
          </div>
        </div>  
        
        <div id="posts" class="row no-gutter gallery_container">
          <!-- <div class="item photos col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="asset/images/img_1.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="asset/images/img_1.jpg">
            </a>
          </div> -->
          <?php 
          if(count($photos) > 0)
          {
            foreach($photos as $photo_val)
            {
              echo "<div class='item photos col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4'>
                      <a href='asset/upload/gallery/photo/{$photo_val['image_name']}' class='item-wrap fancybox' data-fancybox='gallery2'>
                      <span class='icon-search2'></span>
                      <img class='img-fluid' src='asset/upload/gallery/photo/{$photo_val['image_name']}'>
                      </a>
                  </div>";
            }
          }
          if(count($videos) > 0)
          {
            foreach($videos as $videos_val)
            {
              echo "<div class='item videos col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4'>
                      <a href='https://www.youtube.com/embed/{$videos_val['image_name']}?playlist=tgbNymZ7vqY&loop=1' class='item-wrap fancybox' data-fancybox='gallery2'>
                      <span class='icon-search2'></span>
                      <iframe width='420' height='315' class='img-fluid'
                      src='https://www.youtube.com/embed/{$videos_val['image_name']}?playlist=tgbNymZ7vqY&loop=1'>
                      </iframe>
                      </a>
                  </div>";
            }
          }
          if(count($songs) > 0)
          {
            foreach($songs as $songs_val)
            {
              echo "<div class='item songs col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4'>
                      <a href='asset/upload/gallery/photo/{$songs_val['image_name']}' class='item-wrap fancybox' data-fancybox='gallery2'>
                      <span class='icon-search2'></span>
                      <img class='img-fluid' src='asset/upload/gallery/photo/{$songs_val['image_name']}'>
                      </a>
                  </div>";
            }
          }
           ?>
        </div>

      </div>
    </section>

    
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

  <script src="asset/scripts/website_gallery.js" defer></script>
  <script src="asset/js/main.js" defer></script>
 

  
    
  </body>
</html>


