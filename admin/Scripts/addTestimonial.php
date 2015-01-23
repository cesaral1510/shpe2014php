<?php
  session_start();
  if(isset($_SESSION['Logged'])){
    require("connect.php");
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $body = addslashes($_POST['body']);
    var_dump($_POST);
    var_dump($_FILES);
    //set default timezone
    date_default_timezone_set('US/Eastern');

    //What file extensions are allowed to upload
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["testImage"]["name"]);
    $extension = end($temp);

    $fname = strtolower($extension);
    //check the file extension
    //Creates a tmp copy of file
    while (true) {
     $filename = uniqid('IMG_') . '.' . $extension;
     if (!file_exists(sys_get_temp_dir() . $filename)) break;
    }
    echo $filename;
     if ((($_FILES["testImage"]["type"] == "image/gif")
    || ($_FILES["testImage"]["type"] == "image/jpeg")
    || ($_FILES["testImage"]["type"] == "image/jpg")
    || ($_FILES["testImage"]["type"] == "image/pjpeg")
    || ($_FILES["testImage"]["type"] == "image/x-png")
    || ($_FILES["testImage"]["type"] == "image/png"))
    && ($_FILES["testImage"]["size"] < 30000000)
    && in_array($fname, $allowedExts))
      {
      if ($_FILES["testImage"]["error"] > 0)
        {
        echo "Return Code: " . "<br>";
        }
      else
        {
        
    	
    	//Saving the tmp copy of the file into specified location
        if (file_exists("../img/Testimonials/" . $filename))
          {
          echo $filename . " already exists."."<br>";
          }
        else
          {
        	  //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        	  //echo "Type: " . $_FILES["file"]["type"] . "<br>";
        	  //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        	  //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    	  
            move_uploaded_file($_FILES["testImage"]["tmp_name"],"C:/wamp/www/SHPE2014php/img/Testimonials/" . $filename);
            
      	 
        	  $link_img = "img/Testimonials/".$filename;
        	  //adding testImage into photo table in phpMyAdmin
        	  $sql = "INSERT INTO `testimonials` (`testID`,`firstName`,`lastName`, `link_img`, `body`) "
        	  ."VALUES ('','$firstName','$lastName','$link_img', '$body');";
        	  if(!mysqli_query($dbConnect, $sql)){
        		  echo"Error: ". mysqli_error($dbConnect);

        		}else{
              echo "Success";
              echo "testID{".mysqli_insert_id($dbConnect)."}testID|";
              echo "link_img{".$link_img."}link_img";
            }    		
    		
           }
        }
      }
    else
      {
      echo "<h2>invalid file type!</h2>";
      }
  }else{
    header("Location: ../login.php");
  }
?>