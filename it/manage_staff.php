<?php
include('header.php');
$msg="";
$name="";
$username="";
$password="";
$email="";
$gender="";
$dob="";
$image="";
$station_id="";
$address="";
$phone="";
$role_id="";
$id="";

$image_status='required';

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from cuser where id='$id'"));
	$name=$row['name'];
    $username=$row['username'];
	  $password=$row['password'];
    $email=$row['email'];
    $gender=$row['gender'];
    $dob=$row['dob'];
    $image=$row['image'];
    $station_id=$row['station_id'];
    $address=$row['address'];
    $phone=$row['phone'];
    $role_id=$row['role_id'];
    $image_status='';
}

if(isset($_POST['submit'])){
	  $name=get_safe_value($con,$_POST['name']);
    $username=get_safe_value($con,$_POST['username']);
	  $password=get_safe_value($con,$_POST['password']);
	  $email=get_safe_value($con,$_POST['email']);
    $gender=get_safe_value($con,$_POST['gender']);
    $dob=get_safe_value($con,$_POST['dob']);
    $station_id=get_safe_value($con,$_POST['station_id']);
    $address=get_safe_value($con,$_POST['address']);
    $phone=get_safe_value($con,$_POST['phone']);
    $role_id=get_safe_value($con,$_POST['role_id']);
	  $added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from cuser where username='$username'";
	}else{
		$sql="select * from cuser where username='$username' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Employee Username already added";
	}else{
		if($id==''){
			$image=$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],STAFF_IMAGE_SERVER_PATH.$_FILES['image']['name']);
			mysqli_query($con,"insert into cuser(name,username,password,email,gender,dob,station_id,address,phone,role_id,status,added_on,image) values('$name','$username','$password','$email','$gender','$dob','$station_id','$address','$phone','$role_id',1,'$added_on','$image')");
		}else{
            $image_condition='';
            if($_FILES['image']['name']!=''){
                $image=$_FILES['image']['name'];
			    move_uploaded_file($_FILES['image']['tmp_name'],STAFF_IMAGE_SERVER_PATH.$_FILES['image']['name']);
                $image_condition=", image='$image'";
            }
            $sql="update cuser set name='$name', username='$username', password='$password', email='$email', gender='$gender', dob='$dob', station_id='$station_id', address='$address', phone='$phone', role_id='$role_id' $image_condition where id='$id'";
			mysqli_query($con,$sql);
		}
		
		redirect('staf.php');
	}
}
?>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
			<h3 class="card-title ml10"><strong>Wolaita Sodo First Instance Court</strong>&nbsp;<small>Form</small></h3>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" required value="<?php echo $name?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" name="username" class="form-control" id="exampleInputName1" placeholder="Username" required value="<?php echo $username?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Password</label>
                      <input type="text" name="password" class="form-control" id="exampleInputName1" placeholder="Password" required value="<?php echo $password?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value="<?php echo $email?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Image</label>
                      <input type="file" class="form-control" placeholder="Defendent Image" name="image" <?php echo $image_status?>>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <select name="gender" class="form-control" id="exampleSelectGender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputDate1">Date of Birth</label>
                      <input type="date" name="dob" class="form-control" id="exampleInputCity1" required value="<?php echo $dob?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress1">Phone Number</label>
                      <input type="tel" name="phone" class="form-control" id="exampleInputCity1" placeholder="Phone Number" required value="<?php echo $phone?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress1">Address</label>
                      <input type="text" name="address" class="form-control" id="exampleInputCity1" placeholder="Location" required value="<?php echo $address?>">
                    </div>

                    <?php
                    $res_station=mysqli_query($con,"select * from station where status='1' order by station asc");
                    ?>
                    <div class="form-group">
                      <label for="exampleInputAddress1">Station</label>
                      <select name="station_id" id="" class="form-control" required>
                        <option value="">Select Station</option>
                          <?php
                          while($row_station=mysqli_fetch_assoc($res_station)){
                            echo "<option value='".$row_station['id']."'>".$row_station['station']."</option>";
                          }
                          ?>
                      </select>
                    </div>

                    <?php
                    $res_role=mysqli_query($con,"select * from role where status='1' order by role asc");
                    ?>
                    <div class="form-group">
                      <label for="exampleSelectGender">Work Role</label>
                      <select name="role_id" id="" class="form-control" required>
                        <option value="">Select Work Role</option>
                          <?php
                          while($row_role=mysqli_fetch_assoc($res_role)){
                            echo "<option value='".$row_role['id']."'>".$row_role['role']."</option>";
                          }
                          ?>
                      </select>
                      </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <div style="color:red;margin-top: 15px;"><?php echo $msg?></div>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
<?php
include('footer.php');
?>