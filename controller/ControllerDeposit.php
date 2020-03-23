<?php


class ControllerDeposit
{
     public function index() {
//         require './ressources/composants/templatePage.php';
           require './view/deposit.php';
      }

    public function upload(){

        if(isset($_FILES['selectedFile'])) // Check if the file is not empty
        {
            $folder = '.\\storage\\'; // Define the reception folder
            $forbiddenExtension = array('.php'); // Define the forbidden extension for the security
            $fileSizeMax = 100000; // Define the maximum file's size
            $uploadReturn = array();

            foreach ($_FILES['selectedFile']['tmp_name'] as $key => $tmpName) {
                unset($fileUpload, $extensionFile, $fileSize, $fileTmp);

                $fileUpload = $_FILES['selectedFile']['name'][$key]; // Define the file's name
                $extensionFile = $_FILES['selectedFile']['type'][$key]; // Get the file's extension
                $fileSize = $_FILES['selectedFile']['size'][$key]; // Get the file's size
                $fileTmp = $_FILES['selectedFile']['tmp_name'][$key];

                if ($fileSize < $fileSizeMax) // Check if the file does not exceed the maximum size
                {
                    if (!in_array($extensionFile, $forbiddenExtension)) // Check if the file's extension is not forbidden
                    {
                        // Replace the special characters
                        $fileUpload = strtr($fileUpload, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                        $fileUpload = preg_replace('/([^.a-z0-9]+)/i', '-', $fileUpload);

                        if (move_uploaded_file($fileTmp, $folder . $fileUpload)) // Move the file from local folder to final folder
                        {
                            array_push($uploadReturn, array('name' => $fileUpload, 'message' => 'Le fichier a bien été déposé'));
                        } else {
                            array_push($uploadReturn, array('name' => $fileUpload, 'message' => 'Un problème est survenu, le fichier n\'as pas pu être déposé'));
                        }// UPLOAD ERROR

                    } else {

                        array_push($uploadReturn,  array('name' => $fileUpload, 'message' => 'Vous ne pouvez pas déposer un fichier de type ' . $extensionFile));
                    } // FILE's TYPE ERROR

                } else {
                   array_push($uploadReturn, array('name' => $fileUpload, 'message' => 'Le fichier ne doit pas dépasser ' . $fileSizeMax . ' mo.'));
                } // SIZE ERROR
            }
        }else{ $uploadReturn = 'Aucun fichier n\'a été sélectionné.'; } // No file detected - ERROR

        return json_encode($uploadReturn);
    }

    public function suppression(){

        $folderAddress = ".\\storage\\"; // folder address.
        if (isset($_GET['fileName'])) // Check if file name if empty
        {
            if ($_GET['fileName'] != "." && "..") {

                $fileName = '' . $folderAddress . $_GET['fileName'] . '';
                unlink($fileName); // Delete file
                echo 'Le fichier ' . $_GET['fileName'] . ' a bien été supprimmé.<br>';
            }
        }
    }

    public function display(){

        $folderAddress = ".\\storage\\"; // Define the folder's address
        $openFolder = Opendir($folderAddress); // Open folder
        $i = 0;
        if(isset($openFolder)){

            return json_encode('e');
        }else {
            while ($file = readdir($openFolder)) // Get the name's file into foler opened
            {
                if ($file != "." && $file != "..") {
                    $fileList[$i] = $file;
                    $i++;
                }
            }

            closedir($openFolder);
            return json_encode($fileList);
        }
    }

    public function folderCreation($p_folderName,  $p_folderPath){

        if (!mkdir($p_folderPath)) {
            return json_encode(array('message' => 'Un problème est survenu. Veuillez réessayer.', 'name' => $p_folderName));
        }
        return json_encode(array('message' => 'Le dossier ' . $p_folderName . ' à bien été crée', 'name' => $p_folderName));
    }
}



?>



