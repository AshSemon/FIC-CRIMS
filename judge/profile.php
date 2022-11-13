<?php
include('header.php');
if(!isset($_SESSION['JUDGE_ID'])){
	redirect('login.php');
}
function getUserDetailsByidonly(){
	global $con;
	$data['id']='';
    $data['name']='';
    $data['dob']='';
	$data['email']='';
	$data['phone']='';
    $data['address']='';
    $data['station']='';
    $data['department']='';
    $data['password']='';
	
	if(isset($_SESSION['JUDGE_ID'])){
		$row=mysqli_fetch_assoc(mysqli_query($con,"select * from cuser where id=".$_SESSION['JUDGE_ID']));
		$data['id']=$row['id'];
        $data['name']=$row['name'];
		$data['dob']=$row['dob'];
        $data['email']=$row['email'];
		$data['phone']=$row['phone'];
        $data['address']=$row['address'];
        $data['password']=$row['password'];
	}
	return $data;
}
$getUserDetails=getUserDetailsByidonly();
if(isset($_POST['profile_submit'])){
    $id=$getUserDetails['id'];
    $name=get_safe_value($con,$_POST['name']);
    $phone=get_safe_value($con,$_POST['phone']);
    $email=get_safe_value($con,$_POST['email']);
    $address=get_safe_value($con,$_POST['address']);

    $sql="update cuser set name='$name', email='$email', address='$address', phone='$phone' where id='$id'";
    mysqli_query($con,$sql);
    redirect('profile.php');
}
if(isset($_POST['password_submit'])){
    $id=$getUserDetails['id'];
    $old_password=get_safe_value($con,$_POST['old_password']);
    $new_password=get_safe_value($con,$_POST['new_password']);
    $confirm_password=get_safe_value($con,$_POST['confirm_password']);
    
    $data_pw=$data['password'];
    if($data_pw==$old_password){
        if($new_password==$confirm_password){
            $sql="update cuser set password='$new_password'where id='$id'";
            mysqli_query($con,$sql);
        }
    }
    redirect('profile.php');
}
?>
<link rel="stylesheet" href="assets/stylee.css">
<div class="main-panel">
    <div class="content-wrapper">
        <div class="myaccount-area">
            <div class="container">
                <div class="row">
                    <div class="ml-auto mr-auto col-lg-12">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">your account information </a></h5>
                                    </div>
                                    <div id="my-account-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <form method="post" id="frmProfile">
                                                <div class="billing-information-wrapper">
                                                    <div class="account-info-wrapper">
                                                        <h5>Personal Details</h5>
                                                    </div>
                                                    <div class="row">
                                                        <input type="hidden" name="user_id" value="<?php echo $getUserDetails['id']?>">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Name</label>
                                                                <input type="text" name="name" required value="<?php echo $getUserDetails['name']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Date of Birth</label>
                                                                <input type="date"name="dob" required value="<?php echo $getUserDetails['dob']?>" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Phone Number</label>
                                                                <input type="text" name="phone" value="<?php echo $getUserDetails['phone']?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Email Address</label>
                                                                <input type="email" name="email" value="<?php echo $getUserDetails['email']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Address</label>
                                                                <input type="address" name="address" value="<?php echo $getUserDetails['address']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <div class="billing-back">
                                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                        </div>
                                                        <div class="billing-btn">
                                                            <button type="submit" id="profile_submit" name="profile_submit">Update</button>
                                                        </div>
                                                    </div>
                                                    <div id="form_msg"></div>
                                                </div>
                                                <input type="hidden" name="type" value="profile">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                    </div>
                                    <div id="my-account-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <form method="post" id="frmPassword">
                                                <div class="billing-information-wrapper">
                                                    <div class="account-info-wrapper">
                                                        <h5>Your Password</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Old Password</label>
                                                                <input type="password" name="old_password" required >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>New Password</label>
                                                                <input type="password" name="new_password" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>confirm Password</label>
                                                                <input type="password" name="confirm_password" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <div class="billing-back">
                                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                        </div>
                                                        <div class="billing-btn">
                                                            <button type="submit" id="password_submit" name="password_submit">Change</button>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="type" value="password">
                                                    <div id="password_form_msg"></div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include('footer.php');?>