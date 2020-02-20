<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('NAME', 'sisacademico');


$dataBase = mysqli_connect(HOST, USERNAME, PASSWORD, NAME) or die ('Não foi possível fazer a conexão');