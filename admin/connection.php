<?php
include("../config/database.php");
global $connection;
    $connection = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD);
