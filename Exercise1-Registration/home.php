<?php
$fullname_error=""; $Name_error=""; $pass_error=""; $confpass_error=""; $email_error="";
$birthdate_error=""; $nssf_error=""; $phone_error=""; $msg="";
$fullname= $username = $password = $confirmpass = $email = $phone = $birthdate = $socialSecurity = "";

if(isset($_POST['Submit'])){
if(empty($_POST['fullName'])){
  $fullname_error= 'FullName is required';
} else{
  $fullname= $_POST['fullName'];
  if (!preg_match("/^[a-zA-Z\s]+$/", $fullname)) {
      $fullname_error = 'Name must only contain letters';
  }
}
if (empty($_POST['username'])) {
  $Name_error = 'Username is required';
}
if (empty($_POST['password'])) {
  $pass_error = 'Password is required';
} else{
  $password= $_POST['password'];
  if (strlen($password)<8) 
		{
			$pass_error ='Invalid password';
		}
}
if(empty($_POST['confirmPass'])){
  $confpass_error= 'Confirmation Password is required';
}else{
  $confirmpass= $_POST['confirmPass'];
  if($confirmpass != $password)
  {
    $confpass_error = 'Password did not match';
  }
}
if(empty($_POST['email'])){
  $email_error= 'Email is required';
}else{
  $email= $_POST['email'];
  if(!preg_match( '/^([A-Za-z0-9_])+\@([A-Za-z0-9_])+\.([A-Za-z]{2,4})$/' ,$email))
  {
    $email_error= 'Enter a valid email(example: example_2@gmail.com)';
  }
}
if(empty($_POST['phone'])){
  $phone_error= 'Phone Number is required';
}else{
  $phone= $_POST['phone'];
  if(!preg_match('/^((0[13-9])|(7[0168])|(81[0-9]))(\d{6})$/', $phone))
  {
    $phone_error= 'Enter a valid phone number';
  }
}
if (empty($_POST['birth'])) {
  $birthdate_error = 'Date of Birth is required';
}
if(empty($_POST['socialSecurity']))
{
  $nssf_error='Social security  number is required';
}else{
  $msg='Registration Successful';
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    .alert{
      color:darkred;
      font-size:15px;
    }
    </style>
    <title>Exercise 1</title>
</head>
<body>
<div class="container">
<div class="login-box">

 <div class="row">

    <div class="col-md-6 login-left">
        <h2> Register Here</h2>
     <form action="home.php" method="post">
        <div class="form-group">
          <label> Full Name </label>
          <input type="text" name="fullName" class="form-control" placeholder="Enter Full Name" value="<?php echo $fullname; ?>">
          <span class="alert"> <?php echo $fullname_error; ?></span>
        </div>

        <div class="form-group">
          <label> Username </label>
          <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $username; ?>">
          <span class="alert"> <?php echo $Name_error; ?></span>
        </div>

        <div class="form-group">
          <label> Password </label>
          <input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php echo $password; ?>">
          <span class="alert"> <?php echo $pass_error; ?></span>
        </div>

        <div class="form-group">
          <label> Confirm Password </label>
          <input type="password" name="confirmPass" class="form-control" placeholder="Enter Confirmation Password" value="<?php echo $confirmpass; ?>">
          <span class="alert"> <?php echo $confpass_error; ?></span>
        </div>

        <div class="form-group">
          <label> Email </label>
          <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>">
          <span class="alert"> <?php echo $email_error; ?></span>
        </div>

        <div class="form-group">
          <label> Phone </label>
          <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php echo $phone; ?>">
          <span class="alert"> <?php echo $phone_error; ?></span>
        </div>

        <div class="form-group">
          <label> Date of Birth </label>
          <input type="date" name="birth" class="form-control" onfocus = "(this.type='date')" onblur = "(this.type='text')" value="<?php echo $birthdate; ?>">
          <span class="alert"> <?php echo $birthdate_error; ?></span>
        </div>

        <div class="form-group">
          <label> Social Security Number </label>
          <input type="text" name="socialSecurity" class="form-control" placeholder="Enter Social Security Number" value="<?php echo $socialSecurity; ?>">
          <span class="alert"> <?php echo $nssf_error; ?></span>
        </div>

        <button type="submit" name="Submit" class="btn btn-primary"> Register </button>
        <span class="alert"> <?php echo $msg; ?></span>
     </form>
    </div>

    <div class="col-md-6 login-right">
        <h2> Login Here</h2>
     <form action="safe.php" method="post">
        <div class="form-group">
          <label> Username </label>
          <input type="text" name="Username" class="form-control" placeholder="Enter Username" required>
        </div>

        <div class="form-group">
          <label> Password </label>
          <input type="password" name="Password" class="form-control" placeholder="Enter Password" required>
        </div>

        <button type="submit" name="Submit_Login" class="btn btn-primary"> Login </button>
         
     </form>
    </div>

 </div>

</div>

</div>
</body>
</html>
