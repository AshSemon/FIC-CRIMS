<?php
include('header.php');
$msg="";
$station="";
$address="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from station where id='$id'"));
	$station=$row['station'];
	$address=$row['address'];
}

if(isset($_POST['submit'])){
	$station=get_safe_value($con,$_POST['station']);
	$address=get_safe_value($con,$_POST['address']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from station where station='$station'";
	}else{
		$sql="select * from station where station='$station' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Station already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into station(station,address,status,added_on) values('$station','$address',1,'$added_on')");
		}else{
			mysqli_query($con,"update station set station='$station', address='$address' where id='$id'");
		}
		
		redirect('station.php');
	}
}
?>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
			<h3 class="card-title ml10"><strong>Wolaita Sodo First Instance Court Stations</strong>&nbsp;<small>Form</small></h3>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputAddress1">Station Name</label>
                      <input type="text" name="station" class="form-control" id="exampleInputCity1" placeholder="Station Name" required value="<?php echo $station?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress1">Address</label>
                      <input type="text" name="address" class="form-control" id="exampleInputCity1" placeholder="Address" required value="<?php echo $address?>">
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