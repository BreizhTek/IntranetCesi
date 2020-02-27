<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>test</title>
</head>
<body>
<?php
    if (empty($_GET)) {
        require_once 'controller/ControllerUser.php';
        $controllerUser = new ControllerUser();
        $controllerUser->index();
    }
?>
</body>
</html>


