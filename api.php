<?php

  require('model/user.php');
  require('UserHandler.php');

  $userHandler = new UserHandler();

  /*
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/ApiPhp/api.php");
    xhr.setRequestHeader('Authorization', 'Basic YWJjOjEyMw==');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send('op={"operation": "GET", "user": {"name": "Carlos", "email": "cilp2912@gmail.com"}}');
  */
  /*
    DELETE
    GET-ALL
    GET
    UPDATE
  */
  if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('HTTP/1.0 401 Unauthorized');
    exit;
  } else {
    
    $user = $_SERVER['PHP_AUTH_USER'];
    $pass = $_SERVER['PHP_AUTH_PW'];

    if ($user == 'abc' && $pass == '123'){
      
      # User with credentials
      # Serve api operation
      
      if (!isset($_POST['op'])){
        echo 'Operation not especified';
      } else {

        $op = json_decode($_POST['op'], true);
        
        switch ($op['operation']){

          case 'GET':
          $userHandler->ReadOne($op['user']['email']);
          break;
        }
      }

    } else {

      # User without crdentials
      echo 'Usuario sin permisos';
    }
    
  }
  