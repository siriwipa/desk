<?php include("setting.php"); ?>
<?php

date_default_timezone_set("Asia/Bangkok");


  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $color = $_POST['color'];
  $lineid = $_POST['lineid'];
  $district = $_POST['district'];
  $amphoe = $_POST['amphoe'];
  $province = $_POST['province'];
  $zipcode = $_POST['zipcode'];
 
  



  $message = date("d-m-Y H:i:s") ."\n".
 
    "--- Power Factor Saver --- \n".
  
    "ชื่อ-นามสกุล : ".$name."\n".
    "เบอร์โทร : ".$phone."\n".
    "Line ID : ".$lineid."\n".
    "สีโต๊ะ : ".$color."\n". 
    "ที่อยู่  "." \n".
    "ตำบล : ".$district."\n". 
    "อำเภอ : ".$amphoe."\n". 
    "จังหวัด : ".$province."\n". 
    "รหัสไปรษณีย์ : ".$zipcode."\n". 
   

    
    "-----------";

  sendlinemesg($message,$lineToken);

  header('Content-Type: text/html; charset=utf-8');
  $res = notify_message($message);


  function sendlinemesg($message,$lineApi)
  {
      
      define('LINE_API', "https://notify-api.line.me/api/notify");
      define('LINE_TOKEN', $lineApi);
      
      function notify_message($message)
      {
  
          $queryData = array('message' => $message);
          $queryData = http_build_query($queryData, '', '&');
          $headerOptions = array(
              'http' => array(
                  'method' => 'POST',
                  'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                  . "Authorization: Bearer " . LINE_TOKEN . "\r\n"
                  . "Content-Length: " . strlen($queryData) . "\r\n",
                  'content' => $queryData,
              ),
          );
          $context = stream_context_create($headerOptions);
          $result = file_get_contents(LINE_API, false, $context);
          $res = json_decode($result);
          return $res;
  
      }
  
  }



?>
<!DOCTYPE html>
<html lang="th">
<head>
    <title>นาฬิกามังกรทอง</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="theme-color" content="#fa9e00">

    <link media="all" type="text/css" rel="stylesheet" href="css/salepage.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">





   

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/css/uikit.css">
    <link rel="stylesheet" href="./jquery.Thailand.js/dist/jquery.Thailand.min.css">

</head>



<body style="padding-bottom: 80px;">

    <div class="container">

    </div>

    <div class="uk-container uk-padding" style="background-color: #fdfdfd;" id="form1">
        <center><h1>ทำการสั่งซื้อเรียบร้อยเเล้ว...เจ้าหน้าที่จะติดต่อกลับ <br> ขอบคุณที่ใช้บริการ</h1></center>
        <br>
        <a href="index.html" class="BuyButton" id="BuyButton">
            <button type="submit" class="uk-input uk-width-1-1" style="background-color: #fa9e00;">สั่งซื้ออีกครั้ง</button></a>
        


        <br><br><br>



    </div>

    
</body>
</html>
