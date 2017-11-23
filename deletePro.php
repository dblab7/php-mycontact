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

	//삭제를 클릭했을 경우 id를 전달받는다. 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	//id 키를 조건으로 1건 삭제한다. 
	$query = "delete from mycontact where id = " . $id;

	$db->queryDB($query);
	$db->deleteDB();

	//삭제 후 초기 화면으로 이동 
	echo "<script type='text/javascript'>alert('삭제되었습니다.');</script>";
	echo "<script type='text/javascript'>location.replace('./list.php');</script>";
?>
<body>
</html>