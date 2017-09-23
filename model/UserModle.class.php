<?php
	class UserModel{

		public $mysqli;
		function __construct() {
			$this->mysqli = new mysqli("localhost","root","","ztstunew");
		}

		function add($name , $age, $password) {
			$sql = "insert into user(name,age,password) value ('{$name}', {$age}, '{$password}')";
			$res = $this->mysqli->query($sql);
			return $res;
		}
		
		function Lists() {
			$sql = "select * from user";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQL_ASSOC);
			return $data;
		}
		function delete(){
			$sql = "delete from user where id = {$id}";
			$res = $this->mysqli -> query($sql);
			return $res;
		}
		function into(){
			$sql  = "select * from user where id = '$id'";
			$res  = $this ->mysqli -> query($sql);
			$data = $res -> fetch_all(MYSQL_ASSOC);
			$info = $data[0];
			return $info;
		}
		function update(){
			$sql = "update user set age = {$age}, name = '{$name}',password = '{$password}' where id = '{$id}'";
			$res = $this ->mysqli ->query($sql);
			return $res;
		}
	}


