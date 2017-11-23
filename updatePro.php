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

//수정하기 버튼 클릭시 입력된 input값을 받아온다. 
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$note = $_POST['note']; 

//전화번호부 추가와 동일 
$uploaddir = 'images/';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
$uploadOk = 1;
$imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);

$modifyfile = $uploaddir . $id . "." . $imageFileType;

//이미지 변경 업로드의 경우 변경된 file경로 + file명을 입력
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $modifyfile)) {
    $img = $modifyfile; 
} else {    //업로드 하지 않을 경우 기존 경로 + 파일명을 그대로 update 
	$img = $_POST['img'];
}

//update query
$query = "update mycontact set name = '".$name."', phone = '".$phone."', email = '".$email."',  note = '".$note."',  img = '".$img."',  img = '".$img."' where id = '".$id."'";

$db->queryDB($query);
$db->deleteDB();

//수정 후 초기화면으로 이동 
echo "<script type='text/javascript'>alert('저장되었습니다. 전화번호부 페이지로 이동합니다.');location.replace('./list.php');</script>";

?>
</body>
</html>