<!doctype html>
<html lang="en">
  <head>
    <title>Wisdom Park</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="asset/css/jquery-ui.css">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
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
    <!-- <script src="https://balkangraph.com/js/latest/OrgChart.js"></script> -->
    <script src="<?php echo base_url('asset/node_modules/balkangraph/all.min.js') ?>"></script>

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

  
     
    <div class="site-blocks-cover overlay" style="background-image: url(asset/images/banner.jpg);" data-aos="fade" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">

          
          <div class="col-md-8 mt-lg-5 text-center">
            <h1 class="text-uppercase mb-5" data-aos="fade-up">Promoting Human Values through Education</h1>
            
            <div data-aos="fade-up" data-aos-delay="100">
              <a href="#contact-section" class="btn smoothscroll btn-primary mr-2 mb-2">Get In Touch</a>
            </div>
          </div>
            
        </div>
      </div>

      <a href="#about-section" class="mouse smoothscroll">
        <span class="mouse-icon">
          <span class="mouse-wheel"></span>
        </span>
      </a>
    </div>  

    <!-- ABOUT -->
    <?php include 'website/about.php'; ?>

    <!-- MISSION VISION -->
    <?php include 'website/mission_vision.php'; ?>

    <!-- GOAL -->
    <?php include 'website/goal.php'; ?>
    

    <!-- EVENTS -->
   <!--  <?php include 'website/events.php'; ?> -->
   

  
 

    
    
<!-- <section class="site-section testimonial-wrap bg-light" id="orgchart-section" data-aos="fade">
         <div class="container">
         <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
              <h2 class="section-title mb-3">ORGANIZATIONAL CHART</h2>
            </div>
          </div>
        <div class="m-5" id="tree" ></div>
         </div>
       

   
</section> -->


<!-- ORG CHART -->
<?php include 'website/org_chart.php'; ?>
  

  <!-- <section class="site-section testimonial-wrap bg-light" id="testimonials-section" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Testimonials</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              
              <blockquote class="mb-5">
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="asset/images/person_3.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>John Smith</p>
              </figure>
            </div>
          </div>
          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="asset/images/person_2.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Christine Aguilar</p>
              </figure>
              
            </div>
          </div>

          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="asset/images/person_4.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Robert Spears</p>
              </figure>

              
            </div>
          </div>

          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="asset/images/person_4.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Bruce Rogers</p>
              </figure>

            </div>
          </div>

        </div>
  </section> -->

  <section class="site-section" id="faq-section">
    <div class="container">
        <div class="col-12 text-center mb-5" data-aos="fade">
          <h2 class="section-title">Frequently Asked Questions</h2>
        </div>
        <div class="accordion faqs_text" id="accordionExample">
        </div>
      
    </div>
  </section>


 <!--  <section class="site-section bg-light" id="about-section">
      <div class="container">
        <div class="row mb-5">
          
          <div class="col-lg-6 ml-auto mb-5 order-1 order-lg-2" data-aos="fade" data-aos="fade-up" data-aos-delay="">
            <img src="asset/images/hero_1.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-lg-6 order-2 order-lg-1" data-aos="fade">

            <div class="row">

              
              
              <div class="col-md-12 mb-md-5 mb-0 col-lg-6" data-aos="fade-up" data-aos-delay="">
                <div class="unit-4">
                  <div class="unit-4-icon mr-4 mb-3"><span class="text-primary flaticon-head"></span></div>
                  <div>
                    <h3>Web &amp; Mobile Specialties</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis consect.</p>
                    <p class="mb-0"><a href="#">Learn More</a></p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 mb-md-5 mb-0 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="unit-4">
                  <div class="unit-4-icon mr-4 mb-3"><span class="text-primary flaticon-smartphone"></span></div>
                  <div>
                    <h3>Intuitive Thinkers</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis.</p>
                    <p class="mb-0"><a href="#">Learn More</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
  </section> -->
  
    
    

<!--   <section class="site-section" id="blog-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3">Our Blog</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="h-entry">
              <a href="single.html">
                <img src="asset/images/post_1.jpg" alt="Image" class="img-fluid">
              </a>
              <h2 class="font-size-regular"><a href="#">Repudiandae Quisquam Eaque Dolore</a></h2>
              <div class="meta mb-4">Ham Brook <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
              <p><a href="#">Continue Reading...</a></p>
            </div> 
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="h-entry">
              <a href="single.html">
                <img src="asset/images/post_2.jpg" alt="Image" class="img-fluid">
              </a>
              <h2 class="font-size-regular"><a href="#">Repudiandae Quisquam Eaque Dolore</a></h2>
              <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
              <p><a href="#">Continue Reading...</a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="h-entry">
              <a href="single.html">
                <img src="asset/images/post_3.jpg" alt="Image" class="img-fluid">
              </a>
              <h2 class="font-size-regular"><a href="#">Repudiandae Quisquam Eaque Dolore</a></h2>
              <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
              <p><a href="#">Continue Reading...</a></p>
            </div> 
          </div>
          
        </div>
      </div>
  </section> -->

  <section class="site-section" id="blog-section">
      <div class="container">
          <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
              <h2 class="section-title mb-3">Our Location</h2>
            </div>
          </div>
          <p class="text-center">#14, Broadway Ave, cor. 3<sup>rd</sup> St.,New Manila, Quezon City, Metro Manila, Philippines</p>
        <div style="margin: 0 auto" class="border">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1623.2444606787572!2d121.03130684292138!3d14.613441991905187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b62d60c73005%3A0xe8f3f8143ef60931!2sWisdom%20Park!5e0!3m2!1sen!2ssg!4v1575509591775!5m2!1sen!2ssg" 
          width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="true"></iframe>
        </div>
        
      </div>
  </section>


  <section class="site-section bg-light" id="contact-section" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Contact Us</h2>
          </div>
        </div>
        <div class="row mb-5">
          


          <div class="col-md-4 text-center">
            <p class="mb-4">
              <span class="icon-room d-block h4 text-primary"></span>
              <span>203 Fake St. Mountain View, San Francisco, California, USA</span>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <p class="mb-4">
              <span class="icon-phone d-block h4 text-primary"></span>
              <a href="#">+1 232 3235 324</a>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <p class="mb-0">
              <span class="icon-mail_outline d-block h4 text-primary"></span>
              <a href="#">youremail@domain.com</a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-5">

            

            <form action="#" class="p-5 bg-white">
              
              <h2 class="h4 text-black mb-5">Contact Form</h2> 

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input type="text" id="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" id="lname" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input type="subject" id="subject" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                </div>
              </div>

  
            </form>
          </div>
          
        </div>
      </div>
  </section>

  <br>
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

  
  <script src="asset/js/main.js"></script>
  <script src="asset/scripts/index.js"></script>

  <script>
  var chart = new OrgChart(document.getElementById("tree"), {
            template: "diva",         
            showYScroll: OrgChart.scroll.visible, 
            mouseScrool: OrgChart.action.yScroll,
            layout: OrgChart.normal,
            // scaleInitial: OrgChart.match.width,
            scaleInitial: OrgChart.match.boundary,
            enableSearch: true,
            nodeBinding: {
                field_0: "name",
                field_1: "position",
                img_0: "img"
            },
            nodes: [
                { id: 1, name: "Amber McKenzie", img: _BASE_URL+"asset/images/hero_1.jpg", position: "President"},
                { id: 2, pid: 1, name: "Ava Field" },
                { id: 3, pid: 1, name: "Peter Stevens" },
                { id: 4, pid: 2, name: "Ava Field" },
                { id: 5, pid: 2, name: "Peter Stevens" },
                { id: 6, pid: 3, name: "Peter Stevens" },
                { id: 7, pid: 3, name: "Peter Stevens" },
                { id: 8, pid: 4, name: "Peter Stevens" }
            ]
        });

  // OrgChart.MIXED_LAYOUT_ALL_NODES = false;
  // var chart = new OrgChart(document.getElementById("tree"), {   
  //           template: "rony",         
  //           showYScroll: OrgChart.scroll.visible, 
  //           mouseScrool: OrgChart.action.yScroll,
  //           layout: OrgChart.normal,
  //           // scaleInitial: OrgChart.match.width,
  //           scaleInitial: OrgChart.match.width,
  //           enableSearch: false,
  //           nodes: [
  //               { id: "1"  },
  //               { id: "2" , pid: "1"},
  //               { id: "3" , pid: "1"},
  //               { id: "4" , pid: "1"},
  //               { id: "5" , pid: "2"},
  //               { id: "6" , pid: "2"},
  //               { id: "7" , pid: "2"},
  //               { id: "8" , pid: "2"},
  //               { id: "9" , pid: "2"},
  //               { id: "10", pid: "2" },
  //               { id: "11", pid: "2" },
  //               { id: "12", pid: "2" },
  //               { id: "14", pid: "2" },
  //               { id: "15", pid: "3" },
  //               { id: "16", pid: "3" },
  //               { id: "17", pid: "3" },
  //               { id: "18", pid: "3" },
  //               { id: "19", pid: "3" },
  //               { id: "20", pid: "3" },
  //               { id: "21", pid: "3" },
  //               { id: "22", pid: "3" },
  //               { id: "23", pid: "4" },
  //               { id: "24", pid: "4" },
  //               { id: "25", pid: "4" },
  //               { id: "26", pid: "4" },
  //               { id: "27", pid: "4" },
  //               { id: "28", pid: "4" },
  //               { id: "29", pid: "4" },
  //               { id: "30", pid: "4" },
  //               { id: "31", pid: "2" },
  //               { id: "32", pid: "2" },
  //               { id: "33", pid: "2" },
  //               { id: "34", pid: "2" },
  //               { id: "35", pid: "2" },
  //               { id: "36", pid: "2" },
  //               { id: "37", pid: "2" }
  //           ]
  //       });      

  </script>
    
  </body>
</html>