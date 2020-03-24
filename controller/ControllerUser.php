<?php
class ControllerUser {

    public function index(){
        require_once 'ressources/modele/ModelUser.php';
        require './ressources/composants/templatePage.php';
        $request = $_SERVER['REQUEST_URI'];
        $req = explode("/", $request);
        $modelUser = new ModelUser();
        $userById = ((isset($req["2"])) ? $modelUser->getUserById($req["2"]) : NULL);
        $row = (($userById <> NULL) ? $userById->fetch(PDO::FETCH_ASSOC) : "");

        require_once ('view/user.php');
    }

    public function update(){
        require_once 'ressources/modele/ModelUser.php';

        if(isset($_FILES['Picture'])) { // Check if the file is not empty
            $folder = '.\\storage\\users\\'; // Define the reception folder
            $fileUpload = basename($_FILES['Picture']['name']); // Define the file's name
            $existExtension = array('.png', '.jpg','.gif','.jpeg'); // Define the exist extension for the security
            $extensionFile = strrchr($_FILES['Picture']['name'], '.'); // Get the file's extension
            $fileSizeMax = 10000000; // Define the maximum file's size
            $fileSize = filesize($_FILES['Picture']['tmp_name']); // Get the file's size
            if($fileSize<$fileSizeMax) { // Check if the file does not exceed the maximum size
                if(in_array($extensionFile, $existExtension)) { // Check if the file's extension exist
                    // Replace the special characters
                    $fileUpload = strtr($fileUpload, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                    $fileUpload = preg_replace('/([^.a-z0-9]+)/i', '-', $fileUpload);

                    if (move_uploaded_file($_FILES['Picture']['tmp_name'], $folder . $fileUpload)) { // Move the file from local folder to final folder
                        $uploadReturn = 'Le fichier a bien été déposé.';

                    }else{ $uploadReturn = 'Un problème est survenu, le fichier n\'as pas pu être déposé'; }// UPLOAD ERROR

                }else{ $uploadReturn = 'Vous ne pouvez pas déposer un fichier de type ' . $extensionFile; } // FILE's TYPE ERROR

            }else{ $uploadReturn = 'Le fichier ne doit pas dépasser '.$fileSizeMax  .' mo.'; } // SIZE ERROR

        }else{ $uploadReturn = 'Aucun fichier n\'a été sélectionné.'; } // No file detected - ERROR

        // loading data into $data to update the database
        $data = array(
            'Id' => $_POST['Id'],
            'Level' => $_POST['Level'],
            'LastName' => $_POST['LastName'],
            'FristName' => $_POST['FristName'],
            'Post' => $_POST['Post'],
            'Brith' => $_POST['Brith'],
            'Phone' => $_POST['Phone'],
            'Mail' => $_POST['Mail'],
            'Adress' => $_POST['Adress'],
            'NameTutor' => $_POST['NameTutor'],
            'MailTutor' => $_POST['MailTutor'],
            'pwd' => $_POST['Password'],
            'Picture' => isset($_POST['Picture']) ? $_POST['Picture'] : null,
        );

        $modelUser = new ModelUser();
        $userUpdate = $modelUser->updateUser($data);

        return $uploadReturn;
    }

    public function insert(){
        require_once 'ressources/modele/ModelUser.php';

        if(isset($_FILES['Picture'])) { // Check if the file is not empty
            $folder = '\\storage\\users\\'; // Define the reception folder
            $fileUpload = basename($_FILES['Picture']['name']); // Define the file's name
            $existExtension = array('.png', '.jpg','.gif','.jpeg'); // Define the exist extension for the security
            $extensionFile = strrchr($_FILES['Picture']['name'], '.'); // Get the file's extension
            $fileSizeMax = 100000; // Define the maximum file's size
            $fileSize = filesize($_FILES['Picture']['tmp_name']); // Get the file's size

            if($fileSize<$fileSizeMax) { // Check if the file does not exceed the maximum size
                if(!in_array($extensionFile, $existExtension)) { // Check if the file's extension exist
                    // Replace the special characters
                    $fileUpload = strtr($fileUpload, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                    $fileUpload = preg_replace('/([^.a-z0-9]+)/i', '-', $fileUpload);

                    if (move_uploaded_file($fileUpload, $folder . $fileUpload)) { // Move the file from local folder to final folder
                        $uploadReturn = 'Le fichier a bien été déposé.';

                    } else{ $uploadReturn = 'Un problème est survenu, le fichier n\'as pas pu être déposé'; }// UPLOAD ERROR

                }else{ $uploadReturn = 'Vous ne pouvez pas déposer un fichier de type ' . $extensionFile; } // FILE's TYPE ERROR

            }else{ $uploadReturn = 'Le fichier ne doit pas dépasser '.$fileSizeMax  .' mo.'; } // SIZE ERROR

        }else{ $uploadReturn = 'Aucun fichier n\'a été sélectionné.'; } // No file detected - ERROR

        // loading data into $data to update the database
        $data = array(
            'Level' => $_POST['Level'],
            'LastName' => $_POST['LastName'],
            'FristName' => $_POST['FristName'],
            'Post' => $_POST['Post'],
            'Brith' => $_POST['Brith'],
            'Phone' => $_POST['Phone'],
            'Mail' => $_POST['Mail'],
            'Adress' => $_POST['Adress'],
            'NameTutor' => $_POST['NameTutor'],
            'MailTutor' => $_POST['MailTutor'],
            'pwd' => $_POST['Password'],
            'Picture' => isset($_POST['Picture']) ? $_POST['Picture'] : null,
        );
        $modelUser = new ModelUser();
        $userUpdate = $modelUser->insertUser($data);

        return $uploadReturn;
    }
}
?>