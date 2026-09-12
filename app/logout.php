<?php

require_once __DIR__ . '/incs/functions.php';

session_start();
session_unset();
session_destroy();

redirect('index.php');
