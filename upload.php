<?php 
include 'db.php' ;
$target_path = "uploads/";  
$target_path = $target_path.basename( $_FILES['photo']['name']);   
  
//if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {  
  //  echo "File uploaded successfully!";  
//}
 //else{  
   // echo "Sorry, file not uploaded, please try again!";  
//}  
?>  