<?php
include('header.php');
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
    <div class="card">
    <div class="card-body">
      <h1 class="grid_title" style="text-align:center;">Settings</h1><br>
        <div class="row grid_box">
			<div class="col-12">
                    <div class="form-group">
                        <a href="role.php" class="btn">Work Roles</a>
                    </div>
                    <div class="form-group">
                        <a href="station.php" class="btn">Stations</a>
                    </div>
			</div>
        </div>
    </div>
	</div>
    <style>
        /*button css*/
        .btn{
            font-family: "Roboto", sans-serif;
            font-size: 18px;
            font-weight: bold;
            background: #f5f5f5;
            width: 80%;
            margin: 0 100px 0 100px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
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