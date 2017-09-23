<?php

	class UserController{
		function add(){
			include "./view/user/add.html";
		}
		function doAdd(){
			$name = $_POST['username'];
			$age = $_POST['age'] ? $_POST['age'] : 0;
			$password = $_POST['password'] ? $_POST['password'] : '';
			if (!$name) {
				header('Refresh:3,Url=index.php?c=User&a=add');
				echo '参数错误发布失败';
				die();
			}
			$userModel = new UserModel();
			$status = $userModel->add($name, $age, $password);
			if ($status) {
				header('Refresh:1,Url=index.php?c=User&a=lists');
				echo '发布成功，1秒后跳转到list';
				die();
			} else {
				header('Refresh:3,Url=index.php?c=User&a=lists');
				echo '发布失败，3秒后跳转到list';
				die();
			}
		}
		function lists(){
			include "./view/user/lists.html";
			$userModel = new UserModel();
			$data = $userModel->Lists();
		}
		function delete(){
			$id = $_GET['id'] 
			$userModel = new UserModel();
			$status = $userModel->delete($id);
			if ($status) {
				header('Refresh:1,Url=index.php?c=User&a=lists');
				echo '删除成功';
				die();
			} else {
				header('Refresh:3,Url=index.php?c=User&a=lists');
				echo '删除失败';
				die();
		}
		function update(){
			$id = $_GET['id'];			
			include './viewnew/update.html';
			$userModel = new UserModel();
			$status = $userModel->into();
		}
		function doUpdate(){
			$id = $_POST['id'];
			$name = $_POST['username'];	
			$age = $_POST['age'];
			$password = $_POST['password'];
			$userModel = new UserModel();
			$status = $userModel->update();
		}
	}
	
	