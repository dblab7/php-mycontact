<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>


<?php 
require_once('db.php');
$db = new DB();
$db->connectDB();

//먼저 max id 값 + 1로 키값을 조회한다. 
$get_sql = "select ifnull(max(id),0)+1 as id from mycontact"; 
$result = $db->queryDB($get_sql);
$resc = mysqli_fetch_row($result); 
$id = $resc[0]; 

//이미지 업로드 폴더경로를 지정한다. 
$uploaddir = 'images/'; 
//경로명 + 파일명 
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
//업로드 파일의 확장자 
$imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);

//업로드된 이미지는 서버에 저장될때 id.확장자로 파일명을 변경한다. 
$modifyfile = $uploaddir . $id . "." . $imageFileType;

//이상 없으면 업로드 
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $modifyfile)) {
} 

//insert form에서 입력한 값 변수에 저장 
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$note = $_POST['note'];
$img = $modifyfile; 

//insert 
$query = "insert into mycontact(id, name, phone, email, note, img, reg_date) values('".$id."', '".$name."', '".$phone."', '".$email."', '".$note."', '".$img."', now())";

$db->queryDB($query);
$db->deleteDB();

//초기화면으로 이동 
echo "<script type='text/javascript'>alert('저장되었습니다. 전화번호부 페이지로 이동합니다.');location.replace('./list.php');</script>";

?>
</body>
</html>