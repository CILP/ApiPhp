<?php 

  $msg = "";

  if ($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']){
    http_response_code(404);
    exit;
  } else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      require('model/user.php');
      require('UserHandler.php');

      $userHandler = new UserHandler();

      echo $_POST['birthdate'] . '\n';

      $user = new User(
        $_POST['name'], 
        $_POST['email'],
        $_POST['pass'],
        $_POST['phone'],
        $_POST['company'],
        $_POST['birthdate']
      );

      $message = $userHandler->Create($user);

      $msg = json_encode(
        array(
          'message' => $message,
          'birth' => $user->getBirthDate()
        )
      );
      
    } else {
      $msg = $_SERVER['REQUEST_METHOD'] . $_SERVER['PATH_INFO'];
    }

    http_response_code(200);
  }

  $head = file_get_contents('views/header.html');
  $foot = file_get_contents('views/footer.html');
  $main = file_get_contents('views/main.html');
  $form = file_get_contents('views/form.html');

  echo $head . $main . "<p><b>$msg</b></p>". $form . $foot;