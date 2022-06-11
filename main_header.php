<?php

include('./config/Database.php');
require_once('./requests/UserRequest.php');
require_once('./models/User.php');
require_once('./util.php');
session_start();
clearError();
