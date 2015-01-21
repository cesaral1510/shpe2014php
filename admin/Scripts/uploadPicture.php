<?php
  session_start();
  if(isset($_SESSION['Logged'])){
    require("connect.php");
    $Gallery = $_POST['Gallery'];
    $CaptionEnglish = $_POST['CaptionEnglish'];
    $CaptionSpanish = $_POST['CaptionSpanish'];
    var_dump($_POST);
    var_dump($_FILES);
    //set default timezone
    date_default_timezone_set('US/Eastern');

    //What file extensions are allowed to upload
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["Picture"]["name"]);
    $extension = end($temp);

    $fname = strtolower($extension);
    //check the file extension
    //Creates a tmp copy of file
    while (true) {
     $filename = uniqid('IMG_') . '.' . $extension;
     if (!file_exists(sys_get_temp_dir() . $filename)) break;
    }
    echo $filename;
     if ((($_FILES["Picture"]["type"] == "image/gif")
    || ($_FILES["Picture"]["type"] == "image/jpeg")
    || ($_FILES["Picture"]["type"] == "image/jpg")
    || ($_FILES["Picture"]["type"] == "image/pjpeg")
    || ($_FILES["Picture"]["type"] == "image/x-png")
    || ($_FILES["Picture"]["type"] == "image/png"))
    && ($_FILES["Picture"]["size"] < 30000000)
    && in_array($fname, $allowedExts))
      {
      if ($_FILES["Picture"]["error"] > 0)
        {
        echo "Return Code: " . "<br>";
        header('Location: ../adminOptions.php?alert=pictureAddFail');

        }
      else
        {
        
    	
    	//Saving the tmp copy of the file into specified location
        if (file_exists("../images/" . $filename))
          {
          echo $filename . " already exists."."<br>";
          header('Location: ../adminOptions.php?alert=pictureAddFail');

          }
        else
          {
    	  //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    	  //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    	  //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    	  //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    	  
          move_uploaded_file($_FILES["Picture"]["tmp_name"],"../images/" . $filename);
          
    	 
      	  $Link = "images/".$filename;
      	  //adding picture into photo table in phpMyAdmin
      	  $sql = "INSERT INTO `image` (`ID`,`Gallery`,`Link`, `CaptionSpanish`, `CaptionEnglish`) "
      	  ."VALUES ('','$Gallery','$Link','$CaptionSpanish', '$CaptionEnglish');";
      	  if(!mysqli_query($dbConnect, $sql)){
      		  echo"Error: ". mysqli_error($dbConnect);
            header('Location: ../adminOptions.php?alert=pictureAddFail');

      		}
      	  else{
      		  header('Location: ../adminOptions.php?alert=pictureAddSuccess');
      		}
    		
    		
           }
        }
      }
    else
      {
      echo "<h2>invalid file type!</h2>";
      header('Location: ../adminOptions.php?alert=pictureAddFail');
      }
  }else{
    header("Location: ../login.php");
  }
?>