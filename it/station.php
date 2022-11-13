<?php
include('header.php');
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($con,$_GET['type']);
	$id=get_safe_value($con,$_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from station where id='$id'");
		redirect('station.php');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update station set status='$status' where id='$id'");
		redirect('station.php');
	}

}

$sql="select * from station order by id asc";
$res=mysqli_query($con,$sql);
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        
    <div class="card">
    <div class="card-body">
      <h1 class="grid_title" style="text-align:center;">Wolaita Sodo First Instance Court Stations</h1>
			<a href="manage_station.php" class="btn"><div style="text-align:center;">Add Station</div> </a><br><br>
        <div class="row grid_box">
				  <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr>
                    <th width="10%">S.No #</th>
                    <th width="30%">Station</th>
                    <th width="30%">Address</th>
                    <th width="30%">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(mysqli_num_rows($res)>0){
                  $i=1;
                  while($row=mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $row['station']?></td>
                    <td><?php echo $row['address']?></td>
                                    <td>
                                        <?php if($row['status']==1){ ?>
                                            <a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-danger">Active</label></a>
                                            <?php }else{ ?>
                                            <a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info">Deactive</label></a>
                                            <?php } ?> &nbsp;
                                            <a href="manage_station.php?id=<?php echo $row['id']?>"><label class="badge badge-success">Edit</label></a>&nbsp;
                                            <a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red" style="background:red;">Delete</label></a>
                                    </td>
                  </tr>
                  <?php $i++; } } else { ?>
                  <tr>
                    <td colspan="5">No data found</td>
                  </tr>
						      <?php } ?>
                      </tbody>
              </table>
            </div>
				  </div>
        </div>
    </div>
	</div> 
  <style>
    /*button css*/
    .btn{
        font-size: 18px;
        font-weight: bold;
        background: #c0c0c0;
        width: 50%;
        margin: 0 250px 0 250px;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        display: center;
        color: 000;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-property: box-shadow, transform;
        transition-property: box-shadow, transform;
    }
    .btn:hover, .btn:focus, .btn:active{
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
  </style>
<?php
include('footer.php');
?>