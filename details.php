<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    
</head>
<body>
    <?php
        $conn = new mysqli($hostname='localhost',$username="root",$password="",$dbname="client");
        if($conn-> connect_error){
            echo 'connection failed  :  '.$conn->connect_error;
        }
        else{ 
        $qry2 = "select * from users where uId=".$_GET['id'];
        $result = $conn->query($qry2);
        if($row = $result->fetch_assoc()){
            echo "<h1>".$row['uname']."'s Information </h1>";
            echo "<table border='1' >
                <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Password</th>
                <th>Confirm Password</th>
                </tr>";
            echo "<tr> <td>" .$row['uname']. "</td> ";
            echo "<td>" .$row['uemail']. "</td>"; 
            echo "<td>" .$row['upassword']. "</td>"; 
            echo "<td>" .$row['ucpassword']. "</td> </tr>";
        }}
    ?>
    </table>
</body>
</html>