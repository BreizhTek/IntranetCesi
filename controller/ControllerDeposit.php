<?php

$Deposit = new ControllerDeposit();

class ControllerDeposit
{
    function __construct() {
        require_once './ressources/composants/templatePage.php';
        require_once './view/Deposit.php';
    }
    public function upload(){

        if(isset($_FILES['selectedFile'])) // Check if the file is not empty
        {
            $folder = '.\\storage\\'; // Define the reception folder
            $fileUpload = basename($_FILES['selectedFile']['name']); // Define the file's name
            $forbiddenExtension = array('.php'); // Define the forbidden extension for the security
            $extensionFile = strrchr($_FILES['selectedFile']['name'], '.'); // Get the file's extension
            $fileSizeMax = 100000; // Define the maximum file's size
            $fileSize = filesize($_FILES['selectedFile']['tmp_name']); // Get the file's size

            if($fileSize<$fileSizeMax) // Check if the file does not exceed the maximum size
            {
                if(!in_array($extensionFile, $forbiddenExtension)) // Check if the file's extension is not forbidden
                {
                    // Replace the special characters
                    $fileUpload = strtr($fileUpload, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                    $fileUpload = preg_replace('/([^.a-z0-9]+)/i', '-', $fileUpload);

                    if (move_uploaded_file($_FILES['selectedFile']['tmp_name'], $folder . $fileUpload)) // Move the file from local folder to final folder
                    {
                        $uploadReturn = 'Le fichier a bien été déposé.';

                    } else{ $uploadReturn = 'Un problème est survenu, le fichier n\'as pas pu être déposé'; }// UPLOAD ERROR

                }else{ $uploadReturn = 'Vous ne pouvez pas déposer un fichier de type ' . $extensionFile; } // FILE's TYPE ERROR

            }else{ $uploadReturn = 'Le fichier ne doit pas dépasser '.$fileSizeMax  .' mo.'; } // SIZE ERROR

        }else{ $uploadReturn = 'Aucun fichier n\'a été sélectionné.'; } // No file detected - ERROR

        return $uploadReturn;
    }

    public function suppression(){

        $address = "upload\\"; // folder address.
        if (isset($_GET['fileName'])) // Check if file name if empty
        {
            if ($_GET['fileName'] != "." && "..") {

                $fileName = '' . $address . $_GET['fileName'] . '';
                unlink($fileName); // Delete file
                echo 'Le fichier ' . $_GET['fileName'] . ' a bien été supprimmé.<br>';
            }
        }
    }

    public function display(){

        $folderAddress = "upload\\"; // Define the folder's address
        $openFolder = Opendir($folderAddress); // Open folder
        $i = 0;
        while ($file = readdir($openFolder)) // Get the name's file into foler opened
        {
            if ($file != "." && $file != "..") {
                $downloadFile[$i] = $file;
                $i++;
            }
        }
    }
}

?>



