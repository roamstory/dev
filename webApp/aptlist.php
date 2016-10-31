<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>
  <body>
    <script>
    $( document ).ready(function() {
    $.ajax({
        type : "GET" //"POST", "GET"
      , url : "http://www.juso.go.kr/addrlink/addrLinkApi.do" //Request URL
      , dataType : "html" //전송받을 데이터의 타입
      , timeout : 30000 //제한시간 지정
      , async : false //true, false
      , cache : false  //true, false
      , data:{
		    confmKey : 'U01TX0FVVEgyMDE2MTAyODE3MzE1MjE2MDY2',
			   keyword : '마북로'
    }
      , contentType: false
      , processData: false
      , error : function(request, status, error) {
       //통신 에러 발생시 처리
      alert("code : " + request.status + "\r\nmessage : " + request.reponseText);
      }
      , success : function(response, status, request) {
        //통신 성공시 처리
        console.log(response);
      }
      });
    });
    </script>
  </body>
</html>
