<?php 
  session_start();

  if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) { 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	
</head>
<body>
<script type="text/javascript"> alert("Selamat Sejahtera Puan untuk login password 123 kaedah yang guna encrypt password_hash untuk memudahkan puan boleh login terima kasih");</script>
	  <div class="d-flex justify-content-center align-items-center" style="min-height: 90vh;">
	  	<form class="p-5 rounded shadow" 
	  	      action="auth.php"
	  	      method="post" 
	  	      style="width: 30rem">
	  		<h1 class="text-center pb-0 display-4">SELAMAT DATANG KE HALAMANLOGIN</h1>
			<center><img src="gif/sistem.gif"  width="300px" height="150px"></center>

	  		<?php if (isset($_GET['error'])) { ?>
	  		<div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error'])?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" 
		           class="form-label">Email
		    </label>
		    <input type="email" 
		           name="email" 
		           value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>" 
		           class="form-control" 
		           id="exampleInputEmail1" aria-describedby="emailHelp">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" 
		           class="form-label">Kata laluan
		    </label>
		    <input type="password" 
		           class="form-control" 
		           name="password" 
		           id="exampleInputPassword1">
		  </div>
		  <button type="submit" 
		          class="btn btn-primary">LOGIN
		  </button>
		</form>
	  </div>
</body>
</html>

<?php 
}else {
   header("Location: index.php");
}
 ?>
