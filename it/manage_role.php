<?php
include('header.php');
$msg="";
$role="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from role where id='$id'"));
	$role=$row['role'];
}

if(isset($_POST['submit'])){
	$role=get_safe_value($con,$_POST['role']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from role where role='$role' ";
	}else{
		$sql="select * from role where role='$role' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Work Role already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into role(role,status,added_on) values('$role',1,'$added_on')");
		}else{
			mysqli_query($con,"update role set role='$role' where id='$id'");
		}
		
		redirect('role.php');
	}
}
?>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
			<h3 class="card-title ml10"><strong>Wolaita Sodo First Instance Court Work Roles</strong>&nbsp;<small>Form</small></h3>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputAddress1">Work role</label>
                      <input type="text" name="role" class="form-control" id="exampleInputCity1" placeholder="Work role" required value="<?php echo $role?>">
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