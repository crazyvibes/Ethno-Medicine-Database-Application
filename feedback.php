<?php
include 'connection.php';
require_once 'dbconfig.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ethnomedicine|Feedback</title>
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
  <div style="height:120px;" >
    <ul id="nv2" style="z-index: +1;">
      <a  href="Index.php"><img src="logo/2.png" alt="logo"/ height="90px" id="logo" style="float:left; margin-left:20px; " ></a>
      <li id="nv"><a href="logout.php">Logout</a></li>
      <li id="nv"><a  href="contact.php">Feedback</a></li>
      <li id="nv"><a href="members.php">Team</a></li>
    <li id="nv"><a href="about.php">About</a></li>
    <li id="nv"><a  href="Index.php">Home</a></li>
  </ul></div>
  <label id="lbl" style="float: right;" ><?php echo 'Welcome '.$_SESSION['login_user']; ?></label>

  <div class="container">

  <h2 class="text-warning">User's Feedback</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th align="center"><strong>S.No</strong></th>
<!-- <th align="center"><strong>Id</strong></th> -->
<th align="center"><strong>Name</strong></th>
<th align="center"><strong>Email</strong></th>
<th align="center"><strong>Message</strong></th>
</tr>
</thead>

<?php
$count=1;
$sel_query="Select * from users ORDER BY sno desc;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>

<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["message"]; ?></td>
<td align="center">
<a href="?delete_id=<?php echo $row['sno']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"> Delete</a>


</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<?php
if( isset($_GET['delete_id']) )
{
$id = $_GET['delete_id'];
$sql= $DB_con->prepare("DELETE FROM users WHERE sno='$id'");
$sql->execute();
echo "delete Successfully";
}
?>

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</div>
</body>
</html>
