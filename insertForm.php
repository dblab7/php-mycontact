<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="style.css" />
<script>
	//다시작성 버튼을 클릭하면 input 값들을 초기화한다. 
	function refresh() {
		document.getElementById("insertForm").reset();
	}
</script>
</head>
<body>
<div id="insert_form">
<!-- insert form --> 
<form method="post" action="insertPro.php" id="insertForm" enctype="multipart/form-data">
<table border="1">
	<tr>
		<td class="title">이름</td>
		<td><input type="text" name="name" /></td>
	</tr>
	<tr>
		<td class="title">전화번호</td>
		<td><input type="text" name="phone" /></td>
	</tr>
	<tr>
		<td class="title">이메일</td>
		<td><input type="text" class="input" name="email" /></td>
	</tr>
	<tr>
		<td class="title">비고</td>
		<td><input type="text" class="input" name="note" /></td>
	</tr>
	<tr>
		<td class="title">이미지 업로드</td>
		<td><input type="file" class="input" name="fileToUpload" id="fileToUpload"/></td>
	</tr>
	<tr>
		<td align="center" colspan="2">
		<input type="submit" class="buttonSet" value="추가하기" />
		<input type="button" class="buttonSet" onclick="refresh();" value="다시작성" />
		</td>
	</tr>
</table>
</form>
</div>
</body>
</html>