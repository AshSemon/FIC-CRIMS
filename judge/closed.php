<?php
include('header.php');
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($con,$_GET['type']);
	$id=get_safe_value($con,$_GET['id']);

    if($type=='take'){
		$take=1;
		mysqli_query($con,"update cases set take='$take' where id='$id'");
        mysqli_query($con,"update cases set judge_id='".$_SESSION['JUDGE_ID']."' where id='$id'");
		redirect('cases.php');
	}

    if($type=='delete'){
		mysqli_query($con,"delete from cases where id='$id'");
		redirect('case.php');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update cases set status='$status' where id='$id'");
		redirect('case.php');
	}

}
$sql="select * from cases where status='0' and judge_id='".$_SESSION['JUDGE_ID']."' order by id desc";
$res=mysqli_query($con,$sql);

?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    font-family: 'Poppins', sans-serif;
}
img{
    width: 100%;
    display: block;
}
.main-wrapper{
    background-color: #fff;
    min-height: 100vh;
    overflow-x: 0;
}
.container{
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 16px;
}
.main-title{
    text-align: center;
}
.main-title h1{
    padding: 16px 0;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 2px;
}
.display-style-btns{
    margin: 10px 0;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    background-color: #fff;
    padding: 16px 0;
    border-radius: 5px;
}
.display-style-btns button{
    border: none;
    font-size: 22px;
    display: inline-block;
    vertical-align: top;
    margin: 0 8px;
    background-color: transparent;
    cursor: pointer;
    transition: all 0.3s ease-out;
}
.display-style-btns button:hover{
    color: #f79410;
}
.active-btn{
    color: #f79410;
}


.item-list{
    margin: 36px 0;
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    row-gap: 32px;
}
.item{
    background-color: #fff;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 4px 0 rgba(15, 4, 4, 0.05);
    transition: all 0.2s ease-out;
}
.item:hover{
    box-shadow: 0 0 10px 1px rgba(0, 4, 4, 0.15);
}
.item-img{
    position: relative;
    overflow: hidden;
}
.item-img img{
    width: 70%;
    margin: 16px auto;
}
.icon-list{
    position: absolute;
    bottom: -100px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease-out;
}
.icon-list button{
    border: none;
    background-color: #202020;
    color: #fff;
    margin: 0 6px;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease-out;
}
.icon-list button:hover{
    background-color: #f4f4f4;
    color: #202020;
}
.item-img:hover .icon-list{
    bottom: 26px;
}
.item-detail{
    padding: 16px;
    color: #202020;
    text-align: center;
}
.item-name{
    font-weight: 500;
    font-size: 18px;
    color: #202020;
    display: block;
}
.item-price{
    margin: 10px 0;
    font-weight: 300;
    display: flex;
    align-items: center;
    justify-content: center;
}
.old-price{
    text-decoration: line-through;
    opacity: 0.6;
}
.new-price{
    color: #f79410;
    font-size: 18px;
    font-weight: 600;
    margin-right: 10px;
}
.item-detail p{
    font-weight: 300;
    opacity: 0.9;
    font-size: 15px;
    line-height: 1.7;
    display: none;
}
.add-btn{
    margin: 16px 0;
    text-transform: uppercase;
    border: none;
    background-color: #202020;
    color: #fff;
    font-family: inherit;
    padding: 10px 28px;
    border: 1px solid #202020;
    cursor: pointer;
    transition: all 0.3s ease-out;
    display: none;
}
.add-btn:hover{
    background-color: #fff;
    color: #202020;
}

/* stylings for details active */
.details-active.item-list{
    grid-template-columns: 100%;
}
.details-active .item{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
}
.details-active .item-detail{
    text-align: left;
}
.details-active .item-price{
    justify-content: flex-start;
}
.details-active .item-detail p{
    display: block;
}
.details-active .item-detail .add-btn{
    display: block;
}



@media screen and (min-width: 678px){
    .item-list{
        grid-template-columns: repeat(2, 1fr);
        gap: 32px;
    }
}

@media screen and (min-width: 768px){
    .item-list{
        grid-template-columns: repeat(3, 1fr);
    }
}

@media screen and (max-width: 576px){
    .details-active .item{
        grid-template-columns: 100%;
    }
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class = "main-title">
            <h3><strong>Case Files</strong></h3>
        </div>
        <div class = "display-style-btns">
            <button type = "button" id = "grid-active-btn">
                <i class = "fas fa-th"></i>
            </button>
            <button type = "button" id = "details-active-btn">
                <i class = "fas fa-list-ul"></i>
            </button>
        </div>
        <div class = "item-list">
                <?php if(mysqli_num_rows($res)>0){
					while($row=mysqli_fetch_assoc($res)){
				?>
                <div class = "item">
                    <div class = "item-img">
                        <a target="_blank" href="<?php echo LOGO_IMAGE_SITE_PATH."3.jpg"?>">
                            <img src="<?php echo LOGO_IMAGE_SITE_PATH."3.jpg"?>"  width="600" height="200"/>
                        </a>
                    </div>
                    <div class = "item-detail">
                        <span href = "#" class = "item-name">Case :  <?php echo $row['casetype']?></span>
                        <span href = "#" class = "item-name">Plaintiff :  <?php echo $row['accuser']?></span>
                        <span href = "#" class = "item-name">Defendent :  <?php echo $row['defendent']?></span>
                        <div class = "item-price">
                            <?php
                            $caseid=$row['caseid'];
                            $sqli="select * from conclution where cases_id='$caseid' order by id desc";
                            $conclution_res=mysqli_query($con,$sqli);
                            if(mysqli_num_rows($conclution_res)>0){
                                while($conclution_row=mysqli_fetch_assoc($conclution_res)){
                            ?>
                            <span href = "#" class = "item-name">Closed Date :  <?php echo $conclution_row['added_on']?></span>
                            <?php } } ?>
                        </div>
                        <?php
                        echo "<h5>Assign to Archive :- ".getArchiveById($row['cachive'])."</h5>"
                        ?>
                        <a href="closed_details.php?id=<?php echo $row['id']?>"><label class="btn btn-primary mr-2 hand_cursor">View Detail</label></a>
                    </div>
                </div>
                <?php 
					} } else { ?>
					<h6 colspan="5">No data found</h6>
				<?php } ?>
</div>
<script>
const itemList = document.querySelector('.item-list');
const gridViewBtn = document.getElementById('grid-active-btn');
const detailsViewBtn = document.getElementById('details-active-btn');

gridViewBtn.classList.add('active-btn');

gridViewBtn.addEventListener('click', () => {
    gridViewBtn.classList.add('active-btn');
    detailsViewBtn.classList.remove('active-btn');
    itemList.classList.remove('details-active');
});

detailsViewBtn.addEventListener('click', () => {
    detailsViewBtn.classList.add('active-btn');
    gridViewBtn.classList.remove("active-btn");
    itemList.classList.add("details-active");
});
</script>
    
<?php
include('footer.php');
?>