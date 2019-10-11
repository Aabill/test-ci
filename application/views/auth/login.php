<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head>
<body>

<?php echo validation_errors(); ?>
<?php if (isset($error))
{
  echo $error;
}
?>
<?php if (isset($pass))
{
  echo $pass;
  echo $email; 
  echo $verify;
}
?>

<?php echo form_open('login'); ?>



<div class="form-group">
  <label for="email">Email</label>
  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Email">
  <small id="emailHelpId" class="form-text text-muted">Help text</small>
</div>

<div class="form-group">
  <label for="password">Password</label>
  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
</div>

<button type="submit" class="btn btn-primary">Login</button>


<form>
</body>
</html>

