<?php 

require "libs/boot.php";
require "libs/controller.php";
require "libs/view.php";
require "libs/model.php";
require 'libs/database.php';
require 'libs/session.php';

require 'config/path.php';
require 'config/database.php';
Session::init();
$app = new Boot();