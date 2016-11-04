<?php 

  $msg = "";

  if ($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']){
    http_response_code(404);
    exit;
  } else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      require('db.php');

      
      $config = parse_ini_file("config.ini", true);

      $servername = $config['development']['host'];
      $dbname = $config['development']['database'];
      $username = $config['development']['user'];
      $password = $config['development']['password'];

      
      $context = new DB("mysql:host=$servername;dbname=$dbname", $username, $password);

      $message = $context->addUser(
        $_POST['name'], 
        $_POST['email'],
        $_POST['pass'],
        $_POST['phone'],
        $_POST['company']
      );

      $msg = json_encode(
        array(
          'message' => $message
        )
      );

      unset($context);
      
    } else {
      $msg = $_SERVER['REQUEST_METHOD'] . $_SERVER['PATH_INFO'];
    }

    http_response_code(200);
  }

  $head = file_get_contents("views/header.html");
  $foot = file_get_contents("views/footer.html");
  $main = file_get_contents("views/main.html");
  $form = file_get_contents("views/form.html");

  echo $head . $main . "<p><b>$msg</b></p>". $form . $foot;