<?php

// initializing variables
$nume = "";
$descriere = "";
$errors = array(); 
$_SESSION['success'] = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'tw');

// REGISTER USER
if (isset($_POST['reg_job'])) {
  // receive all input values from the form
  $nume = mysqli_real_escape_string($db, $_POST['nume']);
  $descriere = mysqli_real_escape_string($db, $_POST['descriere']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($nume)) { array_push($errors, "Name is required"); }
  if (empty($descriere)) { array_push($errors, "Description is required"); }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM jobs WHERE nume='$nume' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['nume'] === $nume) {
      array_push($errors, "Name already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password;//encrypt the password before saving in the database

  	$query = "INSERT INTO jobs (nume, descriere) 
  			  VALUES('$nume', '$descriere')";
  	mysqli_query($db, $query);
  	$_SESSION['nume'] = $nume;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../admin.php');
  }
  
}
  ?>