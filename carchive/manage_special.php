<?php 
include('header.php');
$msg="";
$appoint="";
$id="";



if(isset($_POST['submit'])){
	$appoint=get_safe_value($con,$_POST['appoint']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$did=get_safe_value($con,$_GET['id']);
		$sql="select * from appoint where appoint='$appoint' and cases_id='$did' ";	
	}else{
		$did=get_safe_value($con,$_GET['id']);
		$sql="select * from appoint where appoint='$appoint' and cases_id='$did' and id!='$id'";	
	}
	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Appointment already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into appoint(cases_id,appoint,status,added_on) values('$did','$appoint',1,'$added_on')");
			mysqli_query($con,"update cases set court='added' where id='$did'");
		}else{
			mysqli_query($con,"update appoint set appoint='$appoint' where cases_id='$did'");
		}
		redirect('special.php');
	}
}
?>
<div class="main-panel">
    <div class="content-wrapper">
		<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Appointment</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
					<div class="form-group">
                      <label for="exampleInputName1" required>Appoint Date</label>
					  <input type="datetime-local" name="appoint" class="form-control" placeholder="Appoint Date" >
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button><br>
					<span class="error mt8"><?php echo $msg ?></span>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        <style>
			.error{
				color:red;
			}
			.mt8{
				margin-top:8px;
			}
		</style>
<?php include('footer.php');?>