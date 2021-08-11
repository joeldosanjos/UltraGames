<?php
$conecta = new PDO("mysql:host=localhost;dbname=ultragames", "root", "");
$conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
