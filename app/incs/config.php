<?php

$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

if ($baseUrl === '/' || $baseUrl === '.') {
    $baseUrl = '';
}