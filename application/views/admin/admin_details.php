  <!-- Nav pills -->
  <ul class="nav nav-pills border p-2 m-2" role="tablist">
    <!-- <li class="nav-item dropdown ">
    <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#">Company Details</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" data-toggle="pill" href="#about">About</a>
      <a class="dropdown-item" data-toggle="pill" href="#mission">Mission</a>
      <a class="dropdown-item" data-toggle="pill" href="#vision">Vision</a>
      <a class="dropdown-item" data-toggle="pill" href="#goal">Goals</a>
      <a class="dropdown-item" data-toggle="pill" href="#goal">Organizational Chart</a>
    </div>
    </li> -->
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#about">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#mission">Mission</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#vision">Vision</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#goal">Goals</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#org_chart">Organizational Chart</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1">FAQ's</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu2">Facilities</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <?php include 'company_details/about.php'; ?>

    <?php include 'company_details/mission.php'; ?>

    <?php include 'company_details/vision.php'; ?>
    
    <?php include 'company_details/goal.php'; ?>

    <?php include 'company_details/faqs.php'; ?>

    <?php include 'company_details/org_chart.php'; ?>

    <?php include 'company_details/facilities.php'; ?>


    
  </div>
</div>