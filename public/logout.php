<?php

session_start();
session_destroy();

header("Location:http://localhost/SE/index.html");
?>