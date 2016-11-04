<?php

  /*require('db.php');

  $config = parse_ini_file("config.ini", true);

  $servername = $config['development']['host'];
  $dbname = $config['development']['database'];
  $username = $config['development']['user'];
  $password = $config['development']['password'];

  $context = new DB("mysql:host=$servername;dbname=$dbname", $username, $password);
  
  $message = $context->addUser(
    "Carlos", 
    "cilp2912@gmail.com",
    "tierra1.",
    "3338428732",
    "NA"
  );

  $msg = json_encode(
    array(
      'message' => $message
    )
  );

  echo $msg;
  
  unset($context);*/

  require('model/user.php');
      require('UserHandler.php');

      $userHandler = new UserHandler();

      $user = new User(
        "Carlos", 
        "cilp2912@gmail.com",
        "tierra1.",
        "3338428732",
        "NA"
      );

      $message = $userHandler->Create($user);

      echo json_encode(array('message' => $message));