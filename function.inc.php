<?php
function pr($arr){
    echo'<pre>';
    print_r($arr);
}
function prx($arr){
    echo'<pre>';
    print_r($arr);
    die();
}
function get_safe_value($con,$str){
    if($str!=''){
        $str=trim($str);
        return mysqli_real_escape_string($con,$str);
    }
}
function redirect($link){
    ?>
    <script>
        window.location.href='<?php echo $link?>'
    </script>
    <?php
    die();
}
function getArchiveById($id){
    global $con;
    $sql="select name,phone from cuser where role_id='8' and id='$id'";
    $data=array();
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        return $row['name'].' ('.$row['phone'].')';
    }else{
        return 'Not Assigned';
    }
}
function getJudgeById($id){
    global $con;
    $sql="select name from cuser where role_id='9' and id='$id'";
    $data=array();
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        return $row['name'];
    }else{
        return 'Not Assigned';
    }
}
function getAppointById($id){
    global $con;
    $sqli="select appoint from appoint where status='1'";
    $data=array();
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        return $row['appoint'];
    }else{
        return 'Not Assigned';
    }
}
function getClosedDateById($id){
    global $con;
    $sqli="select added_on from conclution where id='$id'";
    $data=array();
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        return $row['added_on'];
    }else{
        return 'Not Closed';
    }
}

?>