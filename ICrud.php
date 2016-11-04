<?php

  interface ICrud {

    public function Create($object);

    public function ReadOne($object);
    public function ReadAll();

    public function Update($object);

    public function Delete($object);
  }