<?php
  $conn = mysqli_connect("localhost","root","0330gogh","opentutorials","3307");
  $sql = "SELECT * FROM user WHERE name='".$_GET['name']."' AND password='".$_GET['password']."'";
  $result = mysqli_query($conn,$sql);
  var_dump($result);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if($result->num_rows==0 ){

          echo "누신지?";
      }else{
  echo "안녕하세요.주인님";
      }
     ?>

  </body>
</html>
