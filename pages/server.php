<?php
session_start();

// initializing variables
$fname = "";
$lname = "";
$email = "";
$password = "";
$nume ="";
$descriere="";
$admin="";
$errors = array(); 
$_SESSION['success'] = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'tw');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) { array_push($errors, "First name is required"); }
  if (empty($lname)) { array_push($errors, "Last name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password;//encrypt the password before saving in the database

  	$query = "INSERT INTO users (fname, lname, email, password) 
  			  VALUES('$fname', '$lname', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../index.php');
  }
  
}
if (isset($_POST['log_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = $password;
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('location: ../index.php');
        }else {
            array_push($errors, "Wrong email/password combination");
        }
    }
  }
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
        header('location: ./admin.php');
    }
}
if (isset($_POST['reg_admin'])) {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $admin = mysqli_real_escape_string($db, $_POST['admin']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($fname)) { array_push($errors, "First name is required"); }
    if (empty($lname)) { array_push($errors, "Last name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if (empty($admin)) { array_push($errors, "Admin is required"); }
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = $password;//encrypt the password before saving in the database
  
        $query = "INSERT INTO users (fname, lname, email, password, admin) 
                  VALUES('$fname', '$lname', '$email', '$password', '$admin')";
        mysqli_query($db, $query);
        header('location: ./admin.php');
    }
    
  }
  error_reporting(0);
$statusMsg = '';
$targetDir = realpath(dirname(getcwd()));
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into aplicari (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                header('location: ../index.php');
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}


if (isset($_POST['reg_status'])) {
  // receive all input values from the form
  $status1 = mysqli_real_escape_string($db, $_POST['status1']);
  $nume = $_SESSION['email'];
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($status)) { array_push($errors, "Status is required"); }
  if (empty($nume)) { array_push($errors, "Name is required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = $password;
    $query = "INSERT INTO statuss (status1, nume) 
                  VALUES('$status1', '$nume')";
    mysqli_query($db, $query);
    header('location: ./admin.php');
  }
  
}