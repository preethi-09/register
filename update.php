<?php
include 'db.php';
/*$sql="SELECT * FROM forms";
$result=$conn->query($sql);
$result = mysqli_query($conn,"SELECT *FROM college");
session_start();


if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
    $sql = "DELETE FROM `forms` WHERE `id`='$id'";
     $result = $conn->query($sql);
     if ($result == TRUE) 
     {
        echo "Record deleted successfully.";
        header('location:update.php');
    }
    else
    {
        echo "Error:" . $sql . "<br>" . $conn->error;
          }
} */
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students Details</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <!--  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>  -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>  
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>  
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"> </script>
  <!-- <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script> -->
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  
</head>
<body>

        <a href="" class="btn btn-success">Insert</a> 
    
   
<center></center>
    
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>confirm Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($row=$result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>               
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['confirm']; ?></td>
                     

                   <td><a href="" class="btn btn-primary">Update</a></td>
                    
                    <td><input type="button"  name="delete" value="Delete" class="del btn btn-primary"></td>

                   
                    
           </tr>
                <?php
            }?>
        </tbody>
    </table>

    
    
            
     
        <script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});</script>
        </tbody>
</body>
</html>