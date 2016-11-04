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

  $head = file_get_contents("views/header.html");
  $foot = file_get_contents("views/footer.html");
  $main = file_get_contents("views/main.html");

  echo $head . $main . $foot;