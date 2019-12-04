<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

<div class="container">
    <div class="row align-items-center">

        <div class="col-6 col-xl-2">
        <h3 class="mb-0 site-logo"><a href="index.html" class="mb-0 text-nowrap"><img class="img-responsive logo" src="<?php echo base_url('asset/images/LOGO/LOGO.png')?>">Wisdom Park</a></h3>
        </div>

        <div class="col-12 col-md-10 d-none d-xl-block">
        <nav class="site-navigation position-relative text-right" role="navigation">

            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
            <li><a href="<?php echo base_url('#home-section');?>" class="nav-link">Home</a></li>
            <li class="has-children">
                <a href="#" class="nav-link">About Us</a>
                <ul class="dropdown">
                <li><a href="<?php echo base_url('#about-section');?>" class="nav-link">Profile History</a></li>
                <li><a href="<?php echo base_url('#mission_vision-section');?>" class="nav-link">Mission and Vision</a></li>
                <li><a href="<?php echo base_url('#goal-section');?>" class="nav-link">Our Goals</a></li>
                <li><a href="<?php echo base_url('#pricing-section');?>" class="nav-link">Organizational Chart</a></li>
                <li><a href="<?php echo base_url('#faq-section');?>" class="nav-link">FAQ's</a></li>
                </ul>
            </li>
            <li><a href="facilities" class="nav-link">Facilities</a></li>
            <li class="has-children">
                <a href="#" class="nav-link">Events</a>
                <ul class="dropdown">
                <li><a href="<?php echo base_url('events?section=yoga') ?>" class="nav-link">Yoga Meditation</a></li>
                <li><a href="<?php echo base_url('events?section=taichi') ?>" class="nav-link">Taichi</a></li>
                <li><a href="<?php echo base_url('events?section=lectures') ?>" class="nav-link">Lectures</a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url('gallery')?>" class="nav-link">Gallery</a></li>
            <li><a href="<?php echo base_url('#contact-section') ?>" class="nav-link">Contact Us</a></li>
            </ul>
        </nav>
        </div>


        <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

    </div>
</div>

</header>