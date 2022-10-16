<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link rel="icon" href="image\Daco_4104998.png">
    <link rel="stylesheet" href="style.css">
    


  </head>
<body>

<?php require_once 'database.php'; ?>

<?php 

if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>" >

<?php

 echo $_SESSION['message']; 
 unset($_SESSION['message']);

?>

</div>

<?php endif ?>

<?php 
$mysqli = new mysqli('localhost','root','','hotels2020') or 
die(mysqli_error($mysqli));
$result = $mysqli->query(" SELECT * FROM  hotel_management") or die($mysqli->error);
?>

<div class ="table-container">
 <table>
  <thead>
			<tr>
				<th>Name</th>
				<th>Country</th>
				<th>Location</th>
				<th>Rating</th>
				<th>Website</th>
				<th>Telephone</th>
				<th colspan="2">Action</th>
			</tr>
    </thead>
    <?php  
    
    while ($column = $result->fetch_assoc()):?>

		<tbody>
			<tr>
				<td><?php echo $column['Name'];?></td>
				<td><?php echo $column['Country'];?></td>
				<td><?php echo $column['Location'];?></td>
				<td><?php echo $column['Rating'];?></td>
				<td><?php echo $column['Website'];?></td>
				<td><?php echo $column['Telephone'];?></td>
				<td>
             
            <a style="float: left;margin:10px;" href="index.php?edit=<?php echo $column['id']; ?>" class="btn btn-info" >Edit</a>  
         
           
            <a style="float: right;margin:10px;" href="database.php?delete=<?php echo $column['id']; ?>" class="btn btn-danger">Delete</a>
       
        </td>
      </tr>
      <?php endwhile; ?>
		</tbody>
	</table>
</div>


<main>
 
 <?php

function pre_r($array){
echo '<pre>';
print_r($array);
echo '</pre>';
}

?> 


<div id="container">
      <div class="form-wrap">
        <h1>Add a Hotel</h1><br>
        <p>Hotel Industry directory</p>
        
        <img class="logo" src="image\Daco_4104998.png" alt="logo">

        <form action="database.php" method="POST" >

        <input type="hidden"  name="id"  value="<?php echo $id; ?>"/>

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>" id="name" placeholder="Enter name of hotel..." />
          </div>
         
          <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country"  value="<?php echo $country; ?>" id="country" placeholder="..." />
          </div>
          <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location"   value="<?php echo $location; ?>" id="location" placeholder="Include city name..." />
          </div>
         
          <div class="form-group">
            <label for="rating">Rating</label>
            <input type="double" name="rating"  value="<?php echo $rating; ?>" id="rating" placeholder="..."  />
          </div>
          <div class="form-group">
            <label for="website">Website</label>
            <input type="text" name="website" id="website"  value="<?php echo $website; ?>" placeholder="..." />
          </div>
          <div class="form-group">
            <label for="telephone">Telephone</label>
            <input type="double" name="telephone" id="telephone"  value="<?php echo $telephone; ?>" placeholder="Include your country code..."/>
          </div>

          <div class="form-group">
          <?php
            if ($update == true):
          ?>
           <button type="submit" name="update" class="updatebtn">Update</button>
            <?php else: ?>
          <button type="submit" name="save" class="addbtn"><b>Add Listing...<b></button>
          <?php endif; ?> 
          </div>
           <p class="bottom-text">
            By clicking the Add listing button, you agree to our
            <a href="#">Terms & Conditions</a> and
            <a href="#">Privacy Policy</a>
          </p> 
        </form>
      </div>
    


</div>

</main>
  
</body>
</html>