<?php
include('../connection.inc.php');
include('../function.inc.php');
include('../constant.inc.php');
if(!isset($_SESSION['JUDGE_IS_LOGIN'])){
    redirect('login.php');
}
$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];

$page_title='';
if($cur_path=='' || $cur_path=='index.php'){
	$page_title='Judge Dashboard';
}elseif($cur_path=='cases.php' || $cur_path=='case_detail.php' || $cur_path=='manage_cases.php' ){
	$page_title='Manage Cases';
}elseif($cur_path=='staff.php'){
	$page_title='Staff';
}elseif($cur_path=='taken.php' || $cur_path=='manage_hearing.php'){
	$page_title='Manage Hearing';
}elseif($cur_path=='special.php'){
	$page_title='Special Case';
}elseif($cur_path=='closed.php'){
	$page_title='Closed Case';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $page_title?></title>
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
          
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="<?php echo LOGO_IMAGE_SITE_PATH."logo.jpg"?>" alt="logo"/></a>&nbsp;&nbsp;Wolaita Sodo First Instance Court<br>&nbsp;&nbsp;Crime Record Management System<br>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="<?php echo LOGO_IMAGE_SITE_PATH."logo.jpg"?>" alt="logo"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo $_SESSION['JUDGE_USER']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="profile.php">
                <i class="mdi mdi-logout text-primary"></i>
                Profile
              </a>
              <a class="dropdown-item" href="case_history.php">
                <i class="mdi mdi-logout text-primary"></i>
                Cases history
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staff.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Staff</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cases.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Cases</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="special.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Special Cases</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="taken.php">
              <i class="mdi mdi-account-card-details menu-icon"></i>
              <span class="menu-title">Taken Cases</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="closed.php">
              <i class="mdi mdi-account-card-details menu-icon"></i>
              <span class="menu-title">Closed Cases</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
          
        </ul>
      </nav>