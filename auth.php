<?php 
session_start();
include 'db_conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email)) {
		header("Location: login.php?error=Emel perlu diisi");
	}else if (empty($password)){
		header("Location: login.php?error=Katalaluan perlu diisi&email=$email");
	}else {
		$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
		$stmt->execute([$email]);

		if ($stmt->rowCount() === 1) {
			$user = $stmt->fetch();

			$user_id = $user['id'];
			$user_email = $user['email'];
			$user_password = $user['password'];
			$user_full_name = $user['full_name'];

			if ($email === $user_email) {
				if (password_verify($password, $user_password)) {
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_email'] = $user_email;
					$_SESSION['user_full_name'] = $user_full_name;
					header("Location: index.php");

				}else {
					header("Location: login.php?error=email atau password salah&email=$email");
				}
			}else {
				header("Location: login.php?error=email atau password salah&email=$email");
			}
		}else {
			header("Location: login.php?error=email atau password salah&email=$email");
		}
	}
}
