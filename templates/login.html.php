<div id="login" class="auth">
	<div class="header">
		<a href="index.php"><img src="images/logo.svg" alt="logo" width="50px" height="50px"></a>
		<h1>Let's Get Started</h1>
	</div>
	<div class="nav">
		<div class="nav-item active">
			<p>Login</p>
		</div>
		<div class="nav-item">
			<a href="index.php?user/register">Register</a>
		</div>
	</div>
	<div class="body">
		<div class="container">
			<form action="" method="post">
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
				<button type="submit" name="login" class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>
</div>