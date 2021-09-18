<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>php-mysql-formdata</title>
    <style>
      body{background-color:#EEEEEE;}
      table{width:100%;text-align:center;}
      table td{border:2px solid grey;text-transform:capitalize;padding:0.5% 0%;} 
      table th{border:1px solid black;text-transform:uppercase;}     
    </style>
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <div class="container mt-3 bg-light">
      <center> <h1>SignUp</h1> </center>
    <form method="get">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Your Name</label>
    <input type="text" class="form-control" name="uName" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your personal details with anyone else.</div>
  </div>       
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="uEmail" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="uPassword">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="ucPassword">
  </div>
  <button type="submit" class="btn btn-primary" name="subbtn">SignUp</button>
  
</form>
<table id="datatbl" border="1" style="margin-top:2rem;">
  <tr>
    <th>User Name</th>
    <th>User Email</th>
    <th>User Password</th>
    <th>Confirm Password</th>
    <th>More</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>
  
    <?php
        $conn = new mysqli($hostname='localhost',$username="root",$password="",$dbname="client");
        if($conn-> connect_error){
            echo 'connection failed  :  '.$conn->connect_error;
        }
        else{
         if(isset($_GET['subbtn'])){
        $name = $_GET["uName"];
        $email = $_GET["uEmail"];
        $password = $_GET["uPassword"];
        $cpassword = $_GET["ucPassword"];
        
        $qry = "INSERT INTO users VALUES(null,'$name','$email','$password','$cpassword')";
        $conn->query($qry);
        
        $qry2 = "select * from users";
        $result = $conn->query($qry2);
        while($row = $result->fetch_assoc()){
        echo "<tr> <td>" .$row['uname']. "</td> ";
        echo "<td>" .$row['uemail']. "</td>"; 
        echo "<td>" .$row['upassword']. "</td>"; 
        echo "<td>" .$row['ucpassword']. "</td> ";
        echo "<td> <a href='details.php/?id=".$row['uId']."'> <button type='button' class='btn btn-info'> View Details </button> </a></td>";
        echo "<td> <a href='update.php/?id=".$row['uId']."'> <button type='button' class='btn btn-primary'> Update Info </button> </a></td>";  
        echo "<td> <a href='delete.php/?id=".$row['uId']."'> <button type='button' class='btn btn-danger'> Delete info</button> </a></td> </tr>"; 
        
      }
        }
        }   
        ?>
      </table>  
      </div>
  </body>
</html>