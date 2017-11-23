<?php
require_once('db.php');
$db = new DB();
$db->connectDB();

//검색 버튼을 클릭 
if(isset($_POST['search'])){    //검색 text가 있을 경우 
    $search = $_POST['search'];     //검색 text 
    $select = $_POST['select'];     //검색 조건 
    $query = ""; 
    
    //각 조건으로 select문을 다르게 설정한다. 
    if($select == "phone") {
        $query = "SELECT * FROM mycontact WHERE phone LIKE '%" . $search . "%' ORDER BY id";
    } 
    else if($select == "name") {
        $query = "SELECT * FROM mycontact WHERE name LIKE '%" . $search . "%' ORDER BY id";
    } 
    else if($select == "email") {
        $query = "SELECT * FROM mycontact WHERE email LIKE '%" . $search . "%' ORDER BY id";
    }
    else if($select == "note") {
        $query = "SELECT * FROM mycontact WHERE note LIKE '%" . $search . "%' ORDER BY id";
    }
    
    //결과값을 $result에 저장 
    $result = $db->queryDB($query);
    //결과 table html 코드를 저장할 변수 
    $end_result = ''; 

    //행수만큼 반복하여 추가 
    while($row=mysqli_fetch_assoc($result))
	{
	
		$end_result .= '<tr>';
		$end_result .= '	<td rowspan="4" class="image-box">';
		$end_result .= '		<img class="image" src="'.$row['img'].'" />';
		$end_result .= '	</td>';
		$end_result .= '	<td class="label-box">이름</td>';
		$end_result .= '	<td class="text-box">';
		$end_result .= '		'.$row['name'].'';
		$end_result .= '	</td>';
        $end_result .= '</tr>';
        $end_result .= '<tr>';
		$end_result .= '	<td class="label-box">전화번호</td>';
		$end_result .= '	<td class="text-box">';
		$end_result .= '		'.$row['phone'].'';
		$end_result .= '	</td>';
		$end_result .= '</tr>';
		$end_result .= '<tr>';
		$end_result .= '	<td class="label-box">이메일</td>';
		$end_result .= '	<td class="text-box">';
		$end_result .= '		'.$row['email'].'';
		$end_result .= '	</td>';
		$end_result .= '</tr>';
		$end_result .= '<tr>';
		$end_result .= '	<td class="label-box">비고</td>';
		$end_result .= '	<td class="text-box">';
		$end_result .= '		'.$row['note'].'';
		$end_result .= '	</td>';
		$end_result .= '</tr>';
		$end_result .= '<tr class="foot"> ';
		$end_result .= '	<td class="center" colspan="3">';
        $end_result .= '		<a href="updateForm.php?id='.$row['id'].'&phone='.$row['phone'].'&name='.$row['name'].'&email='.$row['email'].'&note='.$row['note'].'&img='.$row['img'].'">수정</a>';
        $end_result .= '        &nbsp;&nbsp;&nbsp;&nbsp;'; 
		$end_result .= '		<a href="deletePro.php?id='.$row['id'].'">삭제</a>';
		$end_result .= '	</td>';
        $end_result .= '</tr>';
    }

    //검색 결과가 있을 경우 html 코드 callback 
    if($end_result != "") {
        echo $end_result;
    }
    //검색 결과가 없을 경우 에러 메시지 callback
    else {
        echo "결과값이 없습니다."; 
    }
    


    $db->queryDB($query);
    
    $db->deleteDB();
}
?>