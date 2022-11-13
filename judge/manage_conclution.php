<?php
include('header.php');
$msg="";
$decision="";
$conclution="";
$id="";

if(isset($_POST['submit'])){
    $decision=get_safe_value($con,$_POST['decision']);
	$conclution=get_safe_value($con,$_POST['conclution']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$did=get_safe_value($con,$_GET['id']);
		$sql="select * from conclution where decision='$decision' and conclution='$conclution' and cases_id='$did' ";	
	}else{
		$did=get_safe_value($con,$_GET['id']);
		$sql="select * from conclution where decision='$decision' and conclution='$conclution' and cases_id='$did' and id!='$id'";	
	}
	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Conclution already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into conclution(cases_id,decision,conclution,added_on) values('$did','$decision','$conclution','$added_on')");
			mysqli_query($con,"update cases set court_decision='$decision' where id='$did'");
            mysqli_query($con,"update cases set status='0' where id='$did'");
			
		}else{
			mysqli_query($con,"update conclution set decision='$decision', conclution='$conclution' where cases_id='$did'");
		}
		redirect('taken.php');
	}
}
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
    <div class="container py-3" id="page-container">
        <?php 
        if(isset($_SESSION['msg'])):
        ?>
        <div class="alert alert-<?php echo $_SESSION['msg']['type'] ?>">
            <div class="d-flex w-100">
                <div class="col-11"><?php echo $_SESSION['msg']['text'] ?></div>
                <div class="col-1"><button class="btn-close" onclick="$(this).closest('.alert').hide('slow')"></button></div>
            </div>
        </div>
        <?php 
            unset($_SESSION['msg']);
        endif;
        ?>
        <div class="card">
            <div class="card-header">
                Manage Court Conclution
            </div>
            <div class="card-body">
                <form class="forms-sample" method="post" enctype="multipart/form-data" id="content-form">
                    <div class="card-body">
                      <label for="exampleInputAddress1">Decision</label>
                      <select name="decision" id="" class="form-control" required>
                        <option value="">Select Department</option>
                        <option value="criminal">Criminal</option>
                        <option value="free">Free</option>
                        <option value="canceled">Canceled</option>
                      </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="content" class="control-label">Statement</label>
                        <textarea name="conclution" id="textarea" placeholder="Court Decision statement" id="content" class="summernote" required><?php echo isset($_SESSION['POST']['content']) ? $_SESSION['POST']['content'] : (isset($_GET['page']) ? file_get_contents("./pages/{$_GET['page']}") : '')  ?><?php echo $conclution?></textarea>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2" name="submit" form="content-form">Submit</button>
                <a class="btn btn-sm rounded-0 btn-light" href="./case.php">Cancel</a>
            </div>
        </div>
    </div>
<?php
include('footer.php');
?>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./summernote/summernote-lite.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./summernote/summernote-lite.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <style>
         :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }
        
        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }
        input.form-control.border-0{
            transition:border .3s linear
        }
        input.form-control.border-0:focus{
            box-shadow:unset !important;
            border-color:var(--bs-info) !important
        }
        .note-editor.note-frame .note-editing-area .note-editable, .note-editor.note-airframe .note-editing-area .note-editable {
            background: var(--bs-white);
        }
    </style>
    <script>
      $('.summernote').summernote({
        placeholder: 'Create you Statement here.',
        tabsize: 5,
        height: '50vh',
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>