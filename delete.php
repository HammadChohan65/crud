<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete user info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
        $conn = new mysqli($hostname='sql201.epizy.com',$username="epiz_29772140",$password="itFflImvxSzkX",$dbname="epiz_29772140_client");
        if($conn-> connect_error){
            echo 'connection failed  :  '.$conn->connect_error;
        }
        else{ 
            //alert start
        echo " <div class='container'>
          <div class='alert alert-warning alert-dismissible d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              This Info Will Delete Permanently! Are You Sure You Want to Delete this Info?
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
          </div>";

          //alert end
        echo "<form method='post' id='form1'>";
            echo "<input type='submit' class='btn btn-primary' name='contbtn' value='Continue'>";
            echo "<a href='../index.php'> <button type='button' class='btn btn-danger' name='cancbtn'>Cancel</button> </a>";
        echo "</form>";
            if(isset($_POST['contbtn'])){
                $qry2 = "delete from users where uId=".$_GET['id'];
                $conn->query($qry2);
                if($conn->query($qry2)){
                    echo "<script> document.getElementById('form1').style.display='none'</script>";
                    echo "<div class='alert alert-success  fade show' role='alert'>
  <strong>Congratulations!</strong> This information have been removed.
</div>";       
                }
            }
            // if(isset($_GET['cancbtn'])){
                
            // }
        echo "</div>";    
        }
    ?>
    </table>
</body>
</html>