<!DOCTYPE html>
<html>
<head>
	<title>about page</title>
	<meta name="viewport" content="width=device-width", initial-scale="1.0">
	<style>
		*{
			margin: 0;
			padding: 0;
			font-family: "open sans",sans-serrif;
		}
		.about-section{
			width: 100%;
			background: #f1f1f1;
			padding: 40px  0;
			height: 550px;
			
		}
		.inner-width{
			max-width: 1000px;
			overflow: hidden;
			padding: 0 20px;
			margin: auto;
		}
		.about-section h1{
			text-align: center;
		}
		.border{
			width: 100px;
			height: 3px;
			background: #e74c3c;
			margin: 40px auto;
		}
		.about{
			padding-right: 30px;
		}
		.about p{
			text-align: justify;
			margin-bottom: 20px;
		}
		.about a{
			 position: absolute;
			 top: 44%;
			left: 50%;
			transform: translate(-50%,-50%); 
			display: inline-block;
			color: #e74c3c;
			text-decoration: none;
			border:  2px solid #e74c3c;
			border-radius: 24px;
			padding: 8px 40px;
			transition: 0.4s linear;
		}
		.about a:hover{
			color: #fff;
			background: #e74c3c;
		}
	</style>
</head>
<body>
	<div class="about-section">
		<div class="inner-width">
			<h1>About</h1>
			<div class="border"></div>
			<div class="about">
				<p>
					Online examination System is conducting a test online to measure the knowledge of the participants on a given topic. In the olden days everybody had to gather in a classroom at the same time to take an exam. With online examination students can do the exam online, in their own time and with their own device, regardless where they life. You online need a browser and internet connection.
				</p>
				<a href="#">Read More</a>
			</div>
		</div>
</div>
</body>
</html>