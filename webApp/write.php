<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config["host"],$config["dbuser"],$config["dbpw"],$config["dbname"],$config["dbport"]);
  $result = mysqli_query($conn,'SELECT * FROM topic');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>생활코딩</title>
    <!-- Bootstrap -->
    <link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body id="target">
  <div class="container">
    <header class="jumbotron text-center">
       <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" id="logo" alt="생활코딩" class="img-circle">
        <h1><a href="index.php">JavaScript</a></h1>
    </header>
    <div class="row">
    <nav class="col-md-3">
      <ol class="nav nav-pills nav-stacked">
        <?php
          while($row = mysqli_fetch_assoc($result)){
            echo '<li><a href="index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
          }
        ?>
      </ol>
    </nav>
    <div class="col-md-9">

      <article>
      	<form action="process.php" method="POST">

          <div class="form-group">
            <label for="form-title">제목</label>
            <input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 적어주세요.">
          </div>
          <div class="form-group">
            <label for="form-author">작성자</label>
            <input type="text" class="form-control" name="author" id="form-author" placeholder="작성자를 입력해주세요.">
          </div>
          <div class="form-group">
            <label for="form-description">본문</label>
            <textarea class="form-control" name="description"  id="form-description" rows="8" cols="40" placeholder="본문을 입력해주세요."></textarea>
          </div>
          <input type="hidden" role="uploadcare-uploader" />
          <input type="submit" class="btn btn-default btn-lg" name="name" >
        </form>
      </article>
    <hr>
    <div id="control">
      <div class="btn-group" role="group" aria-label="...">
        <input type="button" value="white" class="btn btn-default btn-lg" onclick="document.getElementById('target').className='white'"/>
        <input type="button" value="black" class="btn btn-default btn-lg" onclick="document.getElementById('target').className='black'" />
      </div>
        <a href="write.php" class="btn btn-success btn-lg">쓰기</a>

    </div>
    </div>

    </div>

    <script>
      UPLOADCARE_PUBLIC_KEY = "bb726d987822ada81eb9";
    </script>
    <script charset="utf-8" src="//ucarecdn.com/widget/2.10.0/uploadcare/uploadcare.full.min.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/580ffb0a9ca1830bdc9d4b59/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();


      //role의 값이 uploadcare-uploader인 태그를 업로드 위젯으로 만들어라.
      var singleWidget = uploadcare.SingleWidget('[role=uploadcare-uploader]');
      // 그 위젯을 통해서 업로드가 끝났을 때
      singleWidget.onUploadComplete(function(info){
        //id 값이 descriptiton 인 태그의 값 뒤에 업로드한 이미지 파일의 주소를 이미지 태그와 함께 첨부해라.
        document.getElementById('description').value = document.getElementById('description').value + '<img class="img-responsive" src="' + info.cdnUrl +'">';
      });
    </script>
    <!--End of Tawk.to Script-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </div>

</body>
</html>
