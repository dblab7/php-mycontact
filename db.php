<?php
class DB{
	private $db;
	private $result;
	
	public function connectDB(){ 
		//db연결정보 입력 url, mysql id, password, dbname 
		$this->db = mysqli_connect("localhost", "root", "", "kmong");

		//charset UTF8로 설정 
		mysqli_set_charset($this->db, "utf8");
		if(mysqli_connect_errno()){
			printf("Connect failed: %s\n", mysqli_connect_errno());
			exit();
		}
	}

	//select update delte 쿼리 실행
	public function queryDB($query){
		$result = mysqli_query($this->db, $query);
		return $result;
	}

	//db 연결을 종료한다. 
	public function deleteDB(){
		mysqli_close($this->db);
	}
}
?>