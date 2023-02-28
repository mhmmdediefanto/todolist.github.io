<?php

require "function.php";
$id = $_GET['id'];
if(hapus($id)){
    header('Location: ../index.php');
};
