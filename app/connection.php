<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('NAME', 'epiz_25231414_sisacademico');


$dataBase = mysqli_connect(HOST, USERNAME, PASSWORD, NAME) or die ('Não foi possível fazer a conexão');