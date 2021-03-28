<?php
/*
* We are going to use SESSiON variables to store file name, So first we start the session.
*/
  session_start();

  $target_file1 = basename($_FILES["sourceFile"]["name"]);
  $_SESSION['file1'] = $target_file1;

  $target_file2 = basename($_FILES["targetFile"]["name"]);
  $_SESSION['file2'] = $target_file2;

  // Check if files are actual Excel files or not
  $fileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
  $fileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
  if($fileType1 != "xlsx" || $fileType2 != "xlsx") {
    echo "Sorry, only XLSX files are allowed.";
    session_unset();
    session_destroy();
    echo '<br><a href="index.html">Try again?</a>';
  }else{
    if (file_exists($target_file1) && file_exists($target_file2)) {      //Here we check if file(s) are already uploaded or not.
       header("location: form.php");                                   //If 'true' then user is redirected to next web page
    }else{
      if (move_uploaded_file($_FILES["sourceFile"]["tmp_name"], $target_file1) && move_uploaded_file($_FILES["targetFile"]["tmp_name"], $target_file2)) { //if 'false' then try to upload files.
        /*echo "The file ". htmlspecialchars($tmpSourceFileName). " has been uploaded.<br>";
        echo "The file ". htmlspecialchars($tmpTargetFileName). " has been uploaded.<br>";*/
          header("location: form.php");                                //Redirection, if upload operation is successful.
      } else {
        echo "Sorry, there was an error uploading your file(s).";        //Else end the session.
        session_unset();
        session_destroy();
      }
    }
  }
?>
