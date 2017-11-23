<?php 
	//수정 클릭시 get방식으로 기존 값들을 전달한다. 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$name = $_GET['name'];
		$phone = $_GET['phone'];
		$email = $_GET['email'];
		$note = $_GET['note'];
		$img = $_GET['img'];
	} 
?>

<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="style.css" />
<script>
	//다시작성 버튼을 클릭하면 input 값들을 초기화한다. 
	function refresh() {
		document.getElementById("updateForm").reset();
	}
</script>
</head>
<body>
<div id="update_form">
<!-- upload form-->
<form method="post" action="updatePro.php" id="updateForm" enctype="multipart/form-data">
<table border="1">
	<tr class="hidden">
		<td class="id">id</td>
		<td><input type="text" name="id" value="<?=$id?>"/></td>
	</tr>
	<tr>
		<td class="title">이름</td>
		<td><input type="text" name="name" value="<?=$name?>"/></td>
	</tr>
	<tr>
		<td class="title">전화번호</td>
		<td><input type="text" name="phone" value="<?=$phone?>"/></td>
	</tr>
	<tr>
		<td class="title">이메일</td>
		<td><input type="text" class="input" name="email" value="<?=$email?>"/></td>
	</tr>
	<tr>
		<td class="title">비고</td>
		<td><input type="text" class="input" name="note" value="<?=$note?>"/></td>
	</tr>
	<tr>
		<td class="title">이미지 업로드</td>
		<td><input type="file" class="input" name="fileToUpload" id="fileToUpload"/><img class="image" src="<?=$img?>" /></td>
		<td class="hidden">
			<input type="text" name="img" value="<?=$img?>" />
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
		<input type="submit" class="buttonSet" value="수정하기" />
		<input type="button" class="buttonSet" onclick="refresh();" value="다시작성" />
		</td>
	</tr>
</table>
</form>
</div>
</body>
</html>