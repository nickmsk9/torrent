<?php

require_once __DIR__ . '/incs/functions.php';

setcookie('test', 'Nick', time() - 3600);

echo $_COOKIE['test'];