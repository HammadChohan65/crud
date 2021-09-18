<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
        $conn = new mysqli($hostname='localhost',$username="root",$password="",$dbname="client");
        if($conn-> connect_error){
            echo 'connection failed  :  '.$conn->connect_error;
        }
        else{ 
        $qry2 = "select * from users where uId=".$_GET['id'];
        $result = $conn->query($qry2);
        if(!($row = $result->fetch_assoc())){
            echo "data is not available";
        }}
    ?>
<div class="container">
<center> <h1>Update</h1> </center>
    <form method="POST">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Your Name</label>
    <input type="text" class="form-control" name="uName" aria-describedby="emailHelp" value="<?php echo $row['uname']; ?>">
    <div id="emailHelp" class="form-text">We'll never share your personal details with anyone else.</div>
  </div>       
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="uEmail" aria-describedby="emailHelp" value="<?php echo $row['uemail']; ?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="uPassword" value="<?php echo $row['upassword']; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="ucPassword" value="<?php echo $row['ucpassword']; ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="subbtn">Update</button>  
</form>
    </div>
<?php
if(isset($_POST['subbtn'])){
        $name = $_POST["uName"];
        $email = $_POST["uEmail"];
        $password = $_POST["uPassword"];
        $cpassword = $_POST["ucPassword"];

$qry3 = "update users set uname='$name',uemail= '$email',upassword='$password',ucpassword='$cpassword' where uId=".$_GET['id'];
$conn->query($qry3);
if(!($conn->query($qry3))){
    echo "data not Updated";
}}

?>
    
</body>
</html>