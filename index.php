<?php 

  $msg = "";

  if ($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']){
    header('HTTP/1.0 401 Unauthorized');
    http_response_code(401);
    exit;
  } else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      require('model/user.php');
      require('UserHandler.php');

      $userHandler = new UserHandler();

      $user = new User(
        $_POST['name'], 
        $_POST['email'],
        $_POST['pass'],
        $_POST['phone'],
        $_POST['company'],
        $_POST['birthdate']
      );

      $message = $userHandler->Create($user);

      if ($message == 'Success'){
        $msg = "<div class='form-group has-success'>" . "<label class='control-label' for='#'>User added Successfully</label>" . "</div>";
      } else {
        $msg = "<div class='form-group has-error'>" . "<label class='control-label' for='#'>Duplicated User</label>" . "</div>";
      }
      
    }

    http_response_code(200);
  }

  $head = file_get_contents('views/header.html');
  $foot = file_get_contents('views/footer.html');
  $main = file_get_contents('views/main.html');
  $form = file_get_contents('views/form.html');

  echo $head . $main . "<p><b>$msg</b></p>". $form . $foot;