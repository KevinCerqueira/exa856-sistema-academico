<?php
session_start();
if(isset($_SESSION['ID'])){
	header('Location: painel.php');
    exit();
}
include('_head.php');
?>
<body>
    <div class="container-fluid bg-light text-center">
        <div id="corpo" class="bg-primary rounded">
            <form class="" action="login.php" method="POST">

            </form>
        </div>
    </div>
</body>