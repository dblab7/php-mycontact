<?php
//mysql connect file 
require_once('./db.php');

$db = new DB();
$db->connectDB();

//전화번호부 리스트 select query 
$query = "select * from mycontact order by id";

//$result 변수에 쿼리 값을 저장 
$result = $db->queryDB($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="style.css" /> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript">
 
		$(function() {
			
			//검색 버튼 클릭시 이벤트 
			$(".search-button").on("click", function() {
				var formData = $("#search-form").serialize();
				
				//검색조건에 맞는 내용만 비동기로 내용 변경 (ajax 사용)
				$.ajax({
					type: "POST",
					url: "search.php",
					data: formData,
					success: function(html){ 
						//검색결과를 table에 초기화한다.  
						$("#list-table").empty();
						$("#list-table").append(html);
					}
				});    
			});
		});
	</script>
</head>
<body>
<div id="list" class=""> 
<div class="link"> 
	<h2>전화번호부</h2>
	<a href = "insertForm.php">전화번호부 추가</a>
</div>

<div id="search">

<!-- 검색 폼 : 이름, 이메일, 비고 검색조건 선택-->
<form name="search-form" id="search-form" method="post" action="search.php" onsubmit="return false;">
	<select name="select" class="select-box">
		<option value="phone">전화번호</option>
		<option value="name">이름</option>
		<option value="email">이메일</option>
		<option value="note">비고</option>
	</select>
    <input type="text" name="search" id="search-box" class='search_box'/>
    <input type="button" value="검색" class="search-button" /><br />
</form>
</div>

<!-- 리스트 폼 : $result 쿼리 값을 행수만큼 반복하여 출력 -->
<table id="list-table" class="table table-bordered bg-dark text-light" border="1">
	<?php
	while($row=mysqli_fetch_assoc($result))
	{
	?>
		<tr>
			<td rowspan="4" class="image-box">
				<img class="image" src="<?=$row['img']?>" />
			</td>
			<td class="label-box">이름</td>
			<td class="text-box">
				<?=$row['name']?>
			</td>
		</tr>
		<tr>
			<td class="label-box">전화번호</td>
			<td class="text-box">
				<?=$row['phone']?>
			</td>
		</tr>
		<tr>
			<td class="label-box">이메일</td>
			<td class="text-box">
				<?=$row['email']?>
			</td>
		</tr>
		<tr>
			<td class="label-box">비고</td>
			<td class="text-box">
				<?=$row['note']?>
			</td>
		</tr>
		<tr class="foot"> 
			<td class="center" colspan="3">
				<a href="updateForm.php?id=<?=$row['id']?>&phone=<?=$row['phone']?>&name=<?=$row['name']?>&email=<?=$row['email']?>&note=<?=$row['note']?>&img=<?=$row['img']?>">수정</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="deletePro.php?id=<?=$row['id']?>">삭제</a>
			</td>
		</tr>
	<?php
	}
	?>
</table>
	<?php 
		//db연결을 종료한다. 
		$db->deleteDB();
	?>
</div>
</body>
</html>