<!DOCTYPE html>
<html lang="en">

<head>

<style>
.error {color: #FF0000;}
</style>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Crud Form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
<center>
<?php
include 'db.php' ;
$nameErr = $regnoErr = $dobErr= $genderErr = $emailErr=  $phoneErr= $courseErr= $photoErr="";
$name = $regno = $dob = $gender = $email = $phone= $course= $photo="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required!";
  } 
  else 
    {
      $name = get($_POST["name"]);
    }
 
  if (empty($_POST["regno"])) {
    $regnoErr = "Register number is required!";
  } 
  else 
    {
      $regno = get($_POST["regno"]);
    }

  if (empty($_POST["dob"])) {
    $dobErr = "DOB is required!";
  } 
  else 
    {
      $dob = get($_POST["dob"]);
    }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required!";
  } 
  else 
    {
      $gender = get($_POST["gender"]);
    }
  

  if (empty($_POST["email"])) {
    $emailErr = "Email Id is required!";
  } 
  else 
    {
      $email = get($_POST["email"]);
    }
 
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone No is required!";
  } 
  else 
    {
      $phone = get($_POST["phone"]);
    }
 
  if (empty($_POST["course"])) {
    $courseErr = "Course is required!";
  } 
  else 
    {
      $course = get($_POST["course"]);
    }

    /*if (empty($_POST["photo"])) {
    $photoErr = "Photo is required!";
  } 
  else 
    {
      $photo = get($_POST["photo"]);
    }*/
    

  /* $target_path = "uploads/"; 
   $photoName = $_FILES['photo']['name'];
   $target_path = $target_path.basename($_FILES['photo']['name']);
   if(isset($photoName))
   {
    move_uploaded_file($_FILES['photo']['tmp_name'], $target_path);
   }*/
  

// Check if form was submitted
if(isset($_POST['submit'])) {

    // Configure upload directory and allowed file types
    $upload_dir = 'uploads'.DIRECTORY_SEPARATOR;
    $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
    
    // Define maxsize for files i.e 2MB
    $maxsize = 2 * 1024 * 1024;

    // Checks if user sent an empty form
    if(!empty(array_filter($_FILES['photo']['name']))) {

        // Loop through each file in files[] array
        foreach ($_FILES['photo']['tmp_name'] as $key => $value) {
            
            $file_tmpname = $_FILES['photo']['tmp_name'][$key];
            $file_name = $_FILES['photo']['name'][$key];
            $file_size = $_FILES['photo']['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

            // Set upload file path
            $filepath = $upload_dir.$file_name;

            // Check file type is allowed or not
            if(in_array(strtolower($file_ext), $allowed_types)) {

                // Verify file size - 2MB max
                if ($file_size > $maxsize)      
                    echo "Error: File size is larger than the allowed limit.";

                // If file with name already exist then append time in
                // front of name of the file to avoid overwriting of file
                if(file_exists($filepath)) {
                    $filepath = $upload_dir.time().$file_name;
                    
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        
                        echo "{$file_name} successfully uploaded <br />";
                    }
                    else {                  
                        echo "Error uploading {$file_name} <br />";
                    }
                }
                else {
                
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        echo "{$file_name} successfully uploaded <br />";
                    }
                    else {                  
                        echo "Error uploading {$file_name} <br />";
                    }
                }
            }
            else {
                
                // If file extension not valid
                echo "Error uploading {$file_name} ";
                echo "({$file_ext} file type is not allowed)<br / >";
            }
        }
    }
    else {
        
        // If no files selected
        echo "No files selected.";
    }
}

              
    if ($name !="" && $regno !="" && $dob !="" && $gender !="" && $email !="" && $phone !="" && $course !="" && $photo!="" ) 
    {

       $query="insert into forms(name,regno,dob,gender,email,phone,course,photo)values('$name','$regno','$dob','$gender','$email','$phone','$course','$photo')";
        $run=mysqli_query($conn,$query); 

    if($run)
    {
        //echo"Registered successfully!";
      header('locaion:update.php');
    }
    
}
}





function get($form) 
{
  $form = trim($form);
  $form = stripslashes($form);
  $form= htmlspecialchars($form);
  return $form;
}

?>
    </center>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <center>
                    <h1 class="title"><b>REGISTRATION FORM </b></h1>
                    </center>
                    <form method="POST" action=""  enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b>Name</b><span class="error">*</span></label>
                                    <input class="input--style-4" type="text" name="name">
                                    <span class="error"><?php echo $nameErr;?></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b>Register Number</b><span class="error">*</span></label>
                                    <input class="input--style-4" type="text" name="regno">
                                    <span class="error"><?php echo $regnoErr;?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="input-group-icon">
                                    <label class="label"><b>DOB</b><span class="error">*</span></label>
                                        <input class="" type="date" name="dob">
                                        <i class=""></i>
                                        <span class="error"><?php echo $dobErr;?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="p-t-10">
                                    <label class="label"><b>Gender</b><span class="error">*</span></label>
                                        <label class="radio-container m-r-46">Male
                                            <input type="radio" name="gender" value="Male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Female">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Others
                                            <input type="radio" name="gender" value="Others">
                                            <span class="checkmark"></span>
                                        </label>
                                        <span class="error"><?php echo $genderErr;?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b>Email</b><span class="error">*</span></label>
                                    <input class="input--style-4" type="email" name="email">
                                    <span class="error"><?php echo $emailErr;?></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b>Phone Number</b><span class="error">*</span></label>
                                    <input class="input--style-4" type="text" name="phone">
                                    <span class="error"><?php echo $phoneErr;?></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label"><b>Course</b><span class="error">*</span></label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="course">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Lamp </option>
                                    <option>Python</option>
                                    <option>Java</option>
                                   
                                </select>
                                <div class="select-dropdown"></div>
                                <span class="error"><?php echo $courseErr;?></span>
                            </div>
                        </div>
                        <div class="col-2">
                                <div class="input-group" style="max-width: 1000px; min-width: 500px;">
                                    <label class="label"><b>Upload Profile</b><span class="error">*</span></label>
                                    <input class="input--style-4" type="file" name="photo[]" multiple>
                                    <span class="error "style="color:red; font-size:16px;"  > jpg / jpeg/ png /max=2MB format allowed<?php echo $photoErr;?></span>
                                </div>
                            </div>
                        
                         <div class="p-t-25">
                            <button class="btn btn--radius-2 btn--blue" name="submit" type="submit">Submit</button>
                            <button class="btn btn--radius-2 btn--green"><a href="update.php" class="button" title="cancel" style="text-decoration: none; color: floralwhite;">Cancel</a></button> 
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->