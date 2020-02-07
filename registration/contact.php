<!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			text-align: center;
			background-image: linear-gradient(rgba( 0,0,0,0.6),rgba(0,0,0,0.6)),url('../images/s1.jpg');
			background-size: cover;
			background-position: center;
			font-family: sans-serif; 
		}
		.contact-title{
			margin-top: 100px;
			color: #fff;
			text-transform: uppercase;
			transition: all 4s ease-in-out;
		}
		.contact-title h1{
			font-size: 32px;
			line-height: 10px;
		}
		.contact-title h2{
			font-size: 16px;  
		}
		form{
			margin-top: 50px;
			transition: all 4s ease-in-out;
		}
		.form-control{
			width: 600px;
			background: transparent;
			border: none;
			outline: none;
			border-bottom: 1px solid gray;
			color: #fff ;
			font-size: 18px;
			margin-bottom: 16px;

		}

		input{
			height: 45px;

		}
		form .submit{
			background: #ff5722;
			border-color: transparent;
			color: #fff;
			font-size: 20px;
			font-weight: bold;
			letter-spacing: 2px;
			height: 50px;
			margin-top: 20px;
		}

		form .submit:hover{
			background-color: #f44336;
			cursor: pointer; 
		}
	</style>
</head>
<body>
	<div class="contact-title">
		<h1>Contact Us</h1>
		<h2>We are always ready to serve You</h2>
	</div>

	<div class="contact-form">
		<form id="contact-form" method="post" action="contact-form-handler.php">
			<input type="text" name="name" class="form-control" placeholder="Your Name" required>
			<br>
			<input type="email" name="email" class="form-control" placeholder="Your Email" required>
			<br>
			<textarea  name="message" class="form-control" placeholder="Message" rows="4" required></textarea>
			<br>
			<input type="submit" class="form-control submit" value="SEND MESSAGE">
		</form>
	</div>
</body>
</html>