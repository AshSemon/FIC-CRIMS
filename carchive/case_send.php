<?php
$msg="";
// Create connection
$con = mysqli_connect("localhost:3306","root","","jcrms");
// Check connection
if(isset($_POST['submit'])){
  $caseid= $_POST['caseid'];
  $priority=$_POST['priority'];
  $casetype= $_POST['casetype'];
	$accuser=$_POST['accuser'];
	$agender=$_POST['agender'];
	$adob=$_POST['adob'];
	$aaddress=$_POST['aaddress'];
	$aphone=$_POST['aphone'];
	$awork=$_POST['awork'];
	$pstatement=$_POST['pstatement'];
	$defendent=$_POST['defendent'];
	$dgender=$_POST['dgender'];
	$ddob=$_POST['ddob'];
	$dmother=$_POST['dmother'];
	$dfather=$_POST['dfather'];
	$dfamily=$_POST['dfamily'];
	$daddress=$_POST['daddress'];
	$dphone=$_POST['dphone'];
  $dwork=$_POST['dwork'];
	$dstatement=$_POST['dstatement'];
  $cine=$_POST['cine'];
	$accusation=$_POST['accusation'];
	$imprisioned=$_POST['imprisioned'];
	$arn=$_POST['arn'];
  $detective=$_POST['detective'];
  $prosecuter=$_POST['prosecuter'];
  $witness=$_POST['witness'];
  $statement=$_POST['statement'];
  $invest_statement=$_POST['invest_statement'];
  $pro_statement=$_POST['pro_statement'];
  $judge=$_POST['judge'];
  $court_decision=$_POST['court_decision'];
  $court_statement=$_POST['court_statement'];
  $decision_date=$_POST['decision_date'];
  
  $added_on=date('Y-m-d h:i:s');
  if($id==''){
		$sql="select * from decided where caseid='$caseid' ";
	}else{
		$sql="select * from decided where caseid='$caseid' and id!='$id'";
	}
  if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Case already Sended";	
	}else{
    mysqli_query($con,"insert into decided(caseid,priority,casetype,accuser,agender,adob,aaddress,aphone,awork,pstatement,defendent,dgender,ddob,dmother,dfather,dwork,dfamily,daddress,dphone,dstatement,cine,accusation,imprisioned,arn,investigated,prosecutor,court_statement,witness,statement,invest_statement,pro_statement,status,added_on,judge,court_decision,decision_date) values('$caseid','$priority','$casetype','$accuser','$agender','$adob','$aaddress','$aphone','$awork','$pstatement','$defendent','$dgender','$ddob','$dmother','$dfather','$dwork','$dfamily','$daddress','$dphone','$dstatement','$cine','$accusation','$imprisioned','$arn','$detective','$prosecuter','$court_statement','$witness','$statement','$invest_statement','$pro_statement',1,'$added_on','$judge','$court_decision','$decision_date')");
    function redirect($link){
      ?>
      <script>
          window.location.href='<?php echo $link?>'
      </script>
      <?php
      die();
    }
    redirect('closed.php');
  }
}
?>
<?php
session_start();
$con=mysqli_connect("localhost:3306","root","","ccrms");
include('../function.inc.php');
include('../constant.inc.php');

if(!isset($_SESSION['CARCHIVE_IS_LOGIN'])){
    redirect('login.php');
}
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);

  $sql="SELECT * FROM cases where id='$id' ORDER BY id desc";
  $res=mysqli_query($con,$sql);

  if(mysqli_num_rows($res)>0){
    mysqli_query($con,"update cases set sended='1' where id='$id'");
    $courtRow=mysqli_fetch_assoc($res);
  }else{
    redirect('index.php');
  }
}else{
  redirect('index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Case Send</title>
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!--<link rel="stylesheet" href="assets/css/added.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
          <a class="navbar-brand brand-logo" href="index.php"><img src="<?php echo LOGO_IMAGE_SITE_PATH."logo.jpg"?>" alt="logo"/></a>&nbsp;&nbsp;Wadu Anba Police Station<br>&nbsp;&nbsp;Crime Record Management System<br>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="<?php echo LOGO_IMAGE_SITE_PATH."logo.jpg"?>" alt="logo"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo $_SESSION['CARCHIVE_USER_NAME']?></span>
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
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
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
            <a class="nav-link" href="closed.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
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
<!-- partial -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
			<h1 class="grid_title ml10 ml15">Send Case to Justice Department</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="accordion">
                      <div class="form-group">
                          <label for="exampleInputName1">Case ID</label>
                          <input type="text" class="form-control" placeholder="Case ID" name="caseid" required value="<?php echo $courtRow['caseid']?>"readonly>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputName1">Case priority</label>
                          <input type="text" class="form-control" placeholder="Case ID" name="priority" required value="<?php echo $courtRow['priority']?>"readonly>
                      </div>
							        <!--- 1 ---> 
                      <div class="contentBx">
                        <div class="label"><b>I.</b> <b>Accuser Information</b></div>
                        <div class="content">
                          <br>
                          <div class="form-group">
                            <label for="exampleInputName1">Case Type</label>
                            <input type="text" class="form-control" placeholder="Case Type" name="casetype" required value="<?php echo $courtRow['casetype']?>"readonly>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputName1">Plaintiff *</label>
                            <input type="text" class="form-control" placeholder="Accuser Name" name="accuser" required value="<?php echo $courtRow['accuser']?>"readonly>
                          </div>
                            <div class="form-group">
                              <label for="gender" class=" form-control-label">Gender</label>
                              <input type="text" class="form-control" placeholder="Accuser Gender" name="agender" value="<?php echo $courtRow['agender']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Date of Birth</label>
                              <input type="text" class="form-control" placeholder="Date of Birth" name="adob" value="<?php echo $courtRow['adob']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Address *</label>
                              <input type="text" class="form-control" placeholder="Address" name="aaddress" value="<?php echo $courtRow['aaddress']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Phone Number *</label>
                              <input type="text" class="form-control" placeholder="Phone Number" name="aphone" value="<?php echo $courtRow['aphone']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Work</label>
                              <input type="text" class="form-control" placeholder="Work" name="awork" value="<?php echo $courtRow['awork']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Plaintiff's statement *</label>
                              <textarea class="form-control" placeholder="Plaintiff's statement" name="pstatement" id="" cols="30" rows="10" required readonly><?php echo $courtRow['pstatement']?></textarea>
                            </div>

                        </div>
                      </div>
                                    <!--- 2 --->
                      <div class="contentBx">
                        <div class="label"><b>II.</b> <b>Defendent Information</b> </div>
                        <div class="content">
                          <br>
                            <div class="form-group">
                              <label for="exampleInputName1">Defendent *</label>
                              <input type="text" class="form-control" placeholder="Accused Name" name="defendent" required value="<?php echo $courtRow['defendent']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Image</label>
                              <input type="file" class="form-control" placeholder="Defendent Image" name="image" >
                              
                            </div>

                            <div class="form-group">
                              <label for="gender" class=" form-control-label">Gender *</label>
                              <input type="text" class="form-control" placeholder="Defendent Gender" name="dgender" required value="<?php echo $courtRow['dgender']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Date of Birth</label>
                              <input type="text" class="form-control" placeholder="Date of Birth" name="ddob" value="<?php echo $courtRow['ddob']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Mother Name</label>
                              <input type="text" class="form-control" placeholder="Accused Mother Name" name="dmother" value="<?php echo $courtRow['dmother']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Father Name</label>
                              <input type="text" class="form-control" placeholder="Accused Father Name" name="dfather" value="<?php echo $courtRow['dfather']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Family Status</label>
                              <input type="text" class="form-control" placeholder="Family Status" name="dfamily" value="<?php echo $courtRow['dfamily']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Address</label>
                              <input type="text" class="form-control" placeholder="Address" name="daddress" value="<?php echo $courtRow['daddress']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Phone</label>
                              <input type="text" class="form-control" placeholder="Phone" name="dphone" value="<?php echo $courtRow['dphone']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Work</label>
                              <input type="text" class="form-control" placeholder="Work" name="dwork" value="<?php echo $courtRow['dwork']?>"readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Defendent's statement</label>
                              <textarea class="form-control" placeholder="Defendent's statement" name="dstatement" id="" cols="30" rows="10" readonly><?php echo $courtRow['dstatement']?></textarea>
                            </div>
                        </div>
                      </div>
                                    <!--- 3 --->
                      <div class="contentBx">
                        <div class="label"><b>III.</b> <b>Case Information</b> </div>
                        <div class="content">
                        <br>
                          <div class="form-group">
                            <label for="exampleInputName1">Crime Cine *</label>
                            <input type="text" class="form-control" placeholder="Crime Cine" name="cine" required value="<?php echo $courtRow['cine']?>"readonly>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputName1">Accusation Date *</label>
                            <input type="text" class="form-control" placeholder="Accusation Date" name="accusation" required value="<?php echo $courtRow['accusation']?>"readonly>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputName1">Imprisioned Date</label>
                            <input type="text" class="form-control" placeholder="Imprisioned Date" name="imprisioned" value="<?php echo $courtRow['imprisioned']?>"readonly>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputName1">Arrested Register Number</label>
                            <input type="text" class="form-control" placeholder="Arrested Register Number" name="arn" value="<?php echo $courtRow['arn']?>"readonly>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputName1">Investigated by :</label>
                            <input type="text" class="form-control" placeholder="Investigater Name" name="detective" required value="<?php echo $courtRow['investigated']?>"readonly>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Prosecuter :</label>
                            <input type="text" class="form-control" placeholder="Investigater Name" name="prosecuter" required value="<?php echo $courtRow['prosecutor']?>"readonly>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Judge</label>
                            <input type="text" class="form-control" placeholder="Archive Name" name="judge" required value="<?php echo getJudgeById($courtRow['judge_id'])?>"readonly>
                          </div>

                          <div class="form-group" id="dish_box1">
                            <label for="exampleInputEmail3"><b>Witness Form</b></label>
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Witness Name" name="witness" value="<?php echo $courtRow['witness']?>"readonly>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Witness Statement" name="statement" value="<?php echo $courtRow['statement']?>"readonly>
                                </div>
                            </div>           
                          </div>

                            <div class="form-group">
                              <label for="exampleInputName1">INVERSTIGATION's statement</label>
                              <textarea class="form-control" placeholder="INVERSTIGATION statement" name="invest_statement" id="" cols="30" rows="10" readonly><?php echo $courtRow['invest_statement']?></textarea>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Prosecution statement</label>
                              <textarea class="form-control" placeholder="Prosecution statement" name="pro_statement" id="" cols="30" rows="10" readonly><?php echo $courtRow['pro_statement']?></textarea>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Court Decision*</label>
                              <input type="text" class="form-control" placeholder="Court Decision" name="court_decision" required value="<?php echo $courtRow['court_decision']?>"readonly>
                            </div>

                            <?php 
                            $conclution_res=mysqli_query($con,"select * from conclution where cases_id='".$courtRow['id']."' order by id asc");
                            while($conclution_row=mysqli_fetch_assoc($conclution_res)) {
                            ?>
                            <div class="form-group">
                              <label for="exampleInputName1">Court Decision Statement</label>
                              <input type="text" class="form-control" placeholder="Decision Date" name="decision_date" required value="<?php echo $courtRow['added_on']?>"readonly><br>
                              <textarea class="form-control" placeholder="Court Decision Statement" name="court_statement" id="" cols="30" rows="10" readonly><?php echo $conclution_row['conclution']?></textarea>
                            </div>
                            <?php } ?>
                        </div>
                      <button type="submit" class="btn btn-primary mr-2 mt8" name="submit">Submit</button>
                      <div class="error mt8"><?php echo $msg?></div>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
            
		 </div>
         <style>
			 .mt8{
				 margin-top:8px;
			 }
             .error{
                 color:red;
             }
		 </style>
<?php
include('footer.php');
?>