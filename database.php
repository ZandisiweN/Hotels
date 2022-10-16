<?php

session_start();
//connect to database
$mysqli = new mysqli('localhost','root','','hotels2020') or die(mysqli_error($mysqli));
$id=0;
$update = false;
$name = '';
$country = '';
$location = '';
$rating = '';
$website = '';
$telephone = '';

if(isset($_POST['save'])){
$name = $_POST['name'];
$country = $_POST['country'];
$location = $_POST['location'];
$rating = $_POST['rating'];
$website = $_POST['website'];
$telephone = $_POST['telephone'];


$mysqli->query( " INSERT INTO hotel_management ( Name , Country , Location , Rating , Website, Telephone) VALUES
 ( '$name','$country','$location','$rating','$website','$telephone' )" ) or die($mysqli->error); 

$_SESSION['message'] = "Record has been Changed!";
$_SESSION['msg_type'] = "success";

header("location:index.php");

}
     
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$mysqli->query("DELETE FROM hotel_management WHERE id=$id") or die($mysqli->error());

$_SESSION['message'] = "Record has been Erased!";
$_SESSION['msg_type'] = "danger";

header("location:index.php");

} 

if(isset($_GET['edit']))
{$id = $_GET['edit'];  
$update = true; 
  $result = $mysqli->query("SELECT * FROM hotel_management WHERE id=$id") or die($mysqli->error);

  if($result->num_rows){
    $row = $result->fetch_array();
    $name = $row['Name'];
    $country = $row['Country'];
    $location = $row['Location'];
    $rating = $row['Rating'];
    $website = $row['Website'];
    $telephone = $row['Telephone'];

  }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $country = $_POST['country'];
    $location = $_POST['location'];
    $rating = $_POST['rating'];
    $website = $_POST['website'];
    $telephone = $_POST['telephone'];
  
    $mysqli->query("UPDATE hotel_management SET Name ='$name',Country ='$country', Location = '$location', Website ='$website',
     Rating = '$rating', Telephone = '$telephone' WHERE id=$id") or die($mysqli->error);
  
    $_SESSION['message'] = "Record Has Been Updated" ;
    $_SESSION['msg_type'] = "Warning" ;
  
    header("location: index.php");
  }