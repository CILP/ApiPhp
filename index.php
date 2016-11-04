<?php 

  /*require('db.php');

  echo "Hola Mundo\n";

  $config = parse_ini_file("config.ini", true);
  echo $config['development']['host'] . "\n";

  $servername = $config['development']['host'];
  $dbname = $config['development']['database'];
  $username = $config['development']['user'];
  $password = $config['development']['password'];

  $context = new DB("mysql:host=$servername;dbname=$dbname", $username, $password);
  $context->addUser('Prueba', 'mail@mail.com');
  
  unset($context);*/

  $msg = "";

  if ($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']){
    http_response_code(404);
    exit;
  } else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      $msg = json_encode(
        array(
          'name' => $_POST['name'],
          'email' => $_POST['email'],
          'password' => $_POST['pass'],
          'phone' => $_POST['phone'],
          'company' => $_POST['company'],
        )
      );
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