<?php

	error_reporting( ~E_NOTICE ); // avoid notice

	require_once 'dbconfig.php';

	if(isset($_POST['btnsave']))
	{
		$uname = $_POST['name'];// user name
		$email = $_POST['email'];
		$message = $_POST['message'];


		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO users( name, email, message)
			 VALUES(:uname, :uemail, :umsg)');
			$stmt->bindParam(':uname',$uname);
			$stmt->bindParam(':uemail',$email);
			$stmt->bindParam(':umsg',$message);


			if($stmt->execute())
			{
        echo "<script>
        alert('your message has been sent succesfully, we will reply soon. Thank You');
        </script>";
        header("refresh:5;contact.php");
				// $successMSG = "your msg sent ...";
				// header("refresh:5;contact.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ethnomedicine|Contact</title>
	<link rel="shortcut icon" type="image/ico" href="icons/favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" type="text/css" href="modal.css">
  <script src="modal.js" type="text/javascript"></script>

</head>

<body>
<div style="height:120px;">
  <ul id="nv2">
    <a  href="Index.php"><img src="logo/2.png" alt="logo"/ height="90px" id="logo" style="float:left; margin-left:20px; "></a>
		<li id="nv"><a  href="udata.php">Deposit</a></li>
<li id="nv"><a class="active"  href="contact.php">Feedback</a></li>
	  <li id="nv"><a href="members.php">Team</a></li>
  <li id="nv"><a href="about.php">About</a></li>
  <li id="nv"><a  href="Index.php">Home</a></li>
</ul>
</div>
<h3 style="text-align: Center;" class="text-warning"> </h3>

<div class="container">
  <form method="post">
    <label for="fname">Name</label>
    <input type="text" id="name" name="name" placeholder="Your name.." required>
		<label for="lname">Email</label>
    <input type="text" id="email" name="email" placeholder="Your email id.." required>
    <label for="subject">Message</label>
    <textarea id="subject" name="message" placeholder="Your Message.." style="height:200px"></textarea>

    <input type="submit" value="Submit" name="btnsave">
  </form>
	<br>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
