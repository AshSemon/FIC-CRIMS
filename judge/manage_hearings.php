<?php
include('header.php');
$msg="";
$hearing="";
$id="";

if(isset($_POST['submit'])){
	$hearing=get_safe_value($con,$_POST['hearing']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$did=get_safe_value($con,$_GET['id']);
		$sql="select * from hearing where hearing='$hearing' and cases_id='$did' ";	
	}else{
		$did=get_safe_value($con,$_GET['id']);
		$sql="select * from hearing where hearing='$hearing' and cases_id='$did' and id!='$id'";	
	}
	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Hearing already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into hearing(cases_id,hearing,added_on) values('$did','$hearing','$added_on')");
			mysqli_query($con,"update cases set hearing='1' where id='$did'");
			
		}else{
			mysqli_query($con,"update hearing set hearing='$hearing' where cases_id='$did'");
		}
		
		redirect('taken.php');
	}
}
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
      <div class="container">
        <br>
        <h1 class="text-center">COURT HEARING</h1>
        <br>
        <span id="instructions" style="color:red;"></span>
        <form class="forms-sample" method="post" id="content-form">
          <div class="form-group">
            <textarea class="form-control" name="hearing" id="textarea" cols="30" rows="20"></textarea>
          </div>
          <button type="submit" class="btn btn-success mr-2" name="submit" form="content-form">Submit</button>
        </form><br>
          <button id="start" class="btn btn-primary">Start Recording</button>
          <button id="load" class="btn btn-secondary">Load File</button>
          <button id="clear" class="btn btn-danger">Clear Text</button>
        
      </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
var SpeechRecognition = window.webkitSpeechRecognition;

var recognition = new SpeechRecognition();
let saveHandle

var Textbox = $("#textarea");
var instructions = $("#instructions");

var Content = "";

recognition.continuous = true;

recognition.onresult = function (event) {
  var current = event.resultIndex;

  var transcript = event.results[current][0].transcript;

  Content += transcript;
  Textbox.val(Content);
};

$("#start").on("click", function (e) {
  if ($(this).text() == "Stop Recording") {
    $(this).html("Start Recording");
    $("#instructions").html("");
    recognition.stop();
  } else {
    $(this).html("Stop Recording");
    $("#instructions").html("Voice Recognition is on");
    if (Content.length) {
      Content += " ";
    }
    recognition.start();
  }
});

$("#saveas").click(function (e) {
  saveText(Content);
});

async function saveText(content) {
  const opts = {
    type: "save-file",
    accepts: [
      {
        description: "Text file",
        extensions: ["txt"],
        mimeTypes: ["text/plain"],
      },
    ],
  };
  const handle = await window.chooseFileSystemEntries(opts);

  const writable = await handle.createWritable();
  // Write the contents of the file to the stream.
  await writable.write(content);
  // Close the file and write the contents to disk.
  await writable.close();
}

$("#load").click(function () {
    if($(this).html() == "Modify Changes"){
        saveFile(saveHandle,Content)
    }else{
    $(this).html("Modify Changes")
  loadFile();
    }
});
async function getNewFileHandle() {
  
  const handle = await window.chooseFileSystemEntries();
  return handle;
}
async function loadFile() {

  saveHandle = await getNewFileHandle()

  if(await verifyPermission(saveHandle,true)){
 
  // Request permission, if the user grants permission, return true.
    const file = await saveHandle.getFile();
    const contents = await file.text();
    console.log(contents);
    Content += contents;
    $("textarea").val(contents);
  }}

  async function saveFile(saveHandle,content){
    const writable = await saveHandle.createWritable();
    // Write the contents of the file to the stream.
    await writable.write(content);
    // Close the file and write the contents to disk.
    await writable.close();

    alert("File Changes were Saved")
  }

  async function verifyPermission(fileHandle, withWrite) {
    const opts = {};
    if (withWrite) {
      opts.writable = true;
    }
    // Check if we already have permission, if so, return true.
    if (await fileHandle.queryPermission(opts) === 'granted') {
      return true;
    }
    // Request permission to the file, if the user grants permission, return true.
    if (await fileHandle.requestPermission(opts) === 'granted') {
      return true;
    }
    // The user did nt grant permission, return false.
    return false;
  }

$("#clear").click(function () {
  Textbox.val("");
  $("#load").html("Load File")
  Content = ""
  $("#start").html("Start Recording")
});

Textbox.on("input", function () {
  Content = $(this).val();
});
    </script>
<?php
include('footer.php');
?>