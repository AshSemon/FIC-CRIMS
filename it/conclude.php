<?php
include('header.php');
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=date('Y-m-d'). '00-00-00';
                        $end=date('Y-m-d'). '23-59-59';
                        $sql="select * from conclution where added_on between '".date('Y-m-d')." 00-00-00' and '".date('Y-m-d')." 23-59-59' and decision='free'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                        ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Free</h4>
                            <h5 class="font-weight-normal">Today Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 24 Hours</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=strtotime(date('Y-m-d'));
                        $start=strtotime("-7 day",$start);
                        $start=date('Y-m-d',$start);
                        $end=date('Y-m-d'). '23-59-59';

                        $sql="select * from conclution where added_on between '$start' and '".date('Y-m-d')." 23-59-59' and decision='free'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                         ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Free</h4>
                            <h5 class="font-weight-normal">Week Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 7 Days</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=strtotime(date('Y-m-d'));
                        $start=strtotime("-30 day",$start);
                        $start=date('Y-m-d',$start);
                        $end=date('Y-m-d'). '23-59-59';
                        $sql="select * from conclution where added_on between '$start' and '".date('Y-m-d')." 23-59-59' and decision='free'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                         ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Free</h4>
                            <h5 class="font-weight-normal">Month Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 30 Days</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=strtotime(date('Y-m-d'));
                        $start=strtotime("-365 day",$start);
                        $start=date('Y-m-d',$start);
                        $end=date('Y-m-d'). '23-59-59';
                        $sql="select * from conclution where added_on between '$start' and '".date('Y-m-d')." 23-59-59' and decision='free'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                         ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Free</h4>
                            <h5 class="font-weight-normal">Year Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 365 Days</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=date('Y-m-d'). '00-00-00';
                        $end=date('Y-m-d'). '23-59-59';
                        $sql="select * from conclution where added_on between '".date('Y-m-d')." 00-00-00' and '".date('Y-m-d')." 23-59-59' and decision='criminal'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                        ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Criminals</h4>
                            <h5 class="font-weight-normal">Today Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 24 Hours</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=strtotime(date('Y-m-d'));
                        $start=strtotime("-7 day",$start);
                        $start=date('Y-m-d',$start);
                        $end=date('Y-m-d'). '23-59-59';

                        $sql="select * from conclution where added_on between '$start' and '".date('Y-m-d')." 23-59-59' and decision='criminal'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                         ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Criminals</h4>
                            <h5 class="font-weight-normal">Week Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 7 Days</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=strtotime(date('Y-m-d'));
                        $start=strtotime("-30 day",$start);
                        $start=date('Y-m-d',$start);
                        $end=date('Y-m-d'). '23-59-59';
                        $sql="select * from conclution where added_on between '$start' and '".date('Y-m-d')." 23-59-59' and decision='criminal'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                         ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Criminals</h4>
                            <h5 class="font-weight-normal">Month Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 30 Days</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=strtotime(date('Y-m-d'));
                        $start=strtotime("-365 day",$start);
                        $start=date('Y-m-d',$start);
                        $end=date('Y-m-d'). '23-59-59';
                        $sql="select * from conclution where added_on between '$start' and '".date('Y-m-d')." 23-59-59' and decision='criminal'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                         ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Criminals</h4>
                            <h5 class="font-weight-normal">Year Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 365 Days</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=date('Y-m-d'). '00-00-00';
                        $end=date('Y-m-d'). '23-59-59';
                        $sql="select * from conclution where added_on between '".date('Y-m-d')." 00-00-00' and '".date('Y-m-d')." 23-59-59' and decision='canceled'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                        ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Canceled</h4>
                            <h5 class="font-weight-normal">Today Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 24 Hours</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=strtotime(date('Y-m-d'));
                        $start=strtotime("-7 day",$start);
                        $start=date('Y-m-d',$start);
                        $end=date('Y-m-d'). '23-59-59';

                        $sql="select * from conclution where added_on between '$start' and '".date('Y-m-d')." 23-59-59' and decision='canceled'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                         ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Canceled</h4>
                            <h5 class="font-weight-normal">Week Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 7 Days</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=strtotime(date('Y-m-d'));
                        $start=strtotime("-30 day",$start);
                        $start=date('Y-m-d',$start);
                        $end=date('Y-m-d'). '23-59-59';
                        $sql="select * from conclution where added_on between '$start' and '".date('Y-m-d')." 23-59-59' and decision='canceled'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                         ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Canceled</h4>
                            <h5 class="font-weight-normal">Month Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 30 Days</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-weight-light mb-4">
                        <?php
                        $start=strtotime(date('Y-m-d'));
                        $start=strtotime("-365 day",$start);
                        $start=date('Y-m-d',$start);
                        $end=date('Y-m-d'). '23-59-59';
                        $sql="select * from conclution where added_on between '$start' and '".date('Y-m-d')." 23-59-59' and decision='canceled'";
                        $res=mysqli_query($con,$sql);
                        if($row=mysqli_num_rows($res)){
                            echo"<h4 class='mb-0'>".$row."</h4>";
                        }else{
                            echo"<h4 class='mb-0'>0</h4>";
                        }
                         ?>
                    </h1>
                    <div class="d-flex flex-wrap align-items-center">
                        <div>
                            <h4 class="font-weight-normal">Canceled</h4>
                            <h5 class="font-weight-normal">Year Cases</h5>
                            <p class="text-muted mb-0 font-weight-light">Last 365 Days</p>
                        </div>
                        <i class="mdi mdi-account-card-details icon-lg text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <style>
    .add-btn{
    text-transform: uppercase;
    border: none;
    font-family: inherit;
    padding: 10px 28px;
    cursor: pointer;
    transition: all 0.3s ease-out;
    }
    </style>
<?php
include('footer.php');
?>