<?php

require_once '../controller/ControllerUser.php';
if(isset($_POST['envoyer'])){
    $controllerUser = new ControllerUser();
    $controllerUser->update();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="user.php" method="POST">
            <div class="form-group">
                <label for="Level">Status : </label>
                <input type="text" class="form-control" id="Level" name="Level">
            </div>
            <div class="form-group">
                <label for="LastName">Prénom : </label>
                <input type="text" class="form-control" id="LastName" name="LastName">
            </div>
            <div class="form-group">
                <label for="FristName">Nom : </label>
                <input type="text" class="form-control" id="FristName" name="FristName">
            </div>
            <div class="form-group">
                <label for="Brith">Date de Naissance : </label>
                <input type="date" class="form-control" id="Brith" name="Brith">
            </div>
            <div class="form-group">
                <label for="Phone">Téléphone : </label>
                <input type="text" class="form-control" id="Phone" name="Phone">
            </div>
            <div class="form-group">
                <label for="Mail">E-Mail : </label>
                <input type="email" class="form-control" id="MAil" name="MAil">
            </div>
            <div class="form-group">
                <label for="Adress">Adresse : </label>
                <input type="text" class="form-control" id="Adress" name="Adress">
            </div>
            <div class="form-group">
                <label for="NameTutor">Nom Tutuer : </label>
                <input type="text" class="form-control" id="NameTutor" name="NameTutor">
            </div>
            <div class="form-group">
                <label for="MailTutor">Mail  Tuteur : </label>
                <input type="email" class="form-control" id="MailTutor" name="MailTutor">
            </div>
            <div class="form-group">
                <label for="Class">Promotion :</label>
                <input type="text" class="form-control" id="Class" name="Class">
            </div>
            <button type="submit" class="btn btn-primary" name="envoyer">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>




