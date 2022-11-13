<?php 
include('header.php');
$msg="";
$reappoint="";
$id="";



if(isset($_POST['submit'])){
	$reappoint=get_safe_value($con,$_POST['reappoint']);
	
	if($id==''){
		$did=get_safe_value($con,$_GET['id']);
		$sql="select * from hearing where reappoint='$reappoint' and id='$did' ";	
	}else{
		$did=get_safe_value($con,$_GET['id']);
		$sql="select * from hearing where reappoint='$reappoint' and id='$did' and id!='$id'";	
	}
	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Reappointment already added";
	}else{
		if($id==''){
			$did=get_safe_value($con,$_GET['id']);
			mysqli_query($con,"update hearing set reappoint='$reappoint' where id='$did'");
		}else{
			$did=get_safe_value($con,$_GET['id']);
			mysqli_query($con,"update hearing set reappoint='$reappoint' where cases_id='$did'");
		}
		redirect('taken.php');
	}
}
?>
<div class="main-panel">
    <div class="content-wrapper">
		<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Reappointment</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
					<div class="form-group">
                      <label for="exampleInputName1" required>Appoint Date</label>
					  <input type="datetime-local" name="reappoint" class="form-control" placeholder="Appoint Date" >
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