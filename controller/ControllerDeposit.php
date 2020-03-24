<?php
    require_once "ressources/modele/ModelDeposit.php";

class ControllerDeposit
{
    private $deposit;

    public function __construct()
    {
        $this->deposit = new ModelDeposit(); // Create instance
    }

     public function index() {
//         require './ressources/composants/templatePage.php';
           require './view/deposit.php';
      }

    public function upload(){

        if(isset($_FILES['selectedFile'])) // Check if the file is not empty
        {
            $folder = '.\\storage\\'; // Define the reception folder
            $forbiddenExtension = array('.php'); // Define the forbidden extension for the security
            $fileSizeMax = 250000000; // Define the maximum file's size
            $uploadReturn = array();

            foreach ($_FILES['selectedFile']['tmp_name'] as $key => $tmpName) {
                unset($fileUpload, $extensionFile, $fileSize, $fileTmp);

                $fileUpload = $_FILES['selectedFile']['name'][$key]; // Define the file's name
                $extensionFile = $_FILES['selectedFile']['type'][$key]; // Get the file's extension
                $fileSize = $_FILES['selectedFile']['size'][$key]; // Get the file's size
                $fileTmp = $_FILES['selectedFile']['tmp_name'][$key];

                if ($fileSize <= $fileSizeMax) // Check if the file does not exceed the maximum size
                {
                    if (strlen($fileUpload) < 250) {
                        if (!in_array($extensionFile, $forbiddenExtension)) // Check if the file's extension is not forbidden
                        {
                            // Replace the special characters
                            $fileUpload = strtr($fileUpload, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                            $fileUpload = preg_replace('/([^.a-z0-9]+)/i', '-', $fileUpload);

                            if (move_uploaded_file($fileTmp, $folder . $fileUpload)) // Move the file from local folder to final folder
                            {
                                if ($this->deposit->insertFile($fileUpload, $fileSize, 'f') == true) {
                                    array_push($uploadReturn, array('name' => $fileUpload, 'message' => 'Le fichier a bien été déposé', 'size' => $fileSize, 'author' => $_SESSION['First_name'].' '.$_SESSION['Last_name'] , 'messageType' => 's'));
                                } else {
                                    array_push($uploadReturn, array('name' => $fileUpload, 'message' => 'Un problème est survenu, le fichier n\'as pas pu être déposé', 'size' => $fileSize, 'messageType' => 'e'));
                                }

                            } else {

                                array_push($uploadReturn, array('name' => $fileUpload, 'message' => 'Un problème est survenu, le fichier n\'as pas pu être déposé', 'messageType' => 'e'));
                            }// UPLOAD ERROR

                        } else {

                            array_push($uploadReturn, array('name' => $fileUpload, 'message' => 'Vous ne pouvez pas déposer un fichier de type ' . $extensionFile, 'messageType' => 'e'));
                        } // FILE's TYPE ERROR

                    } else {
                        array_push($uploadReturn, array('name' => $fileUpload, 'message' => 'Le fichier ne doit pas dépasser ' . $fileSizeMax . ' mo.', 'messageType' => 'e'));
                    } // SIZE ERROR
                }else{
                    $uploadReturn = array('message' => 'Le nom du fichier ne doit pas dépasser les 250 charactères.', 'messageType' => 'e'); // Too much name character - ERROR
                }
            }
        }else{ $uploadReturn = array('message' => 'Aucun fichier n\'a été sélectionné.', 'messageType' => 'e'); } // No file detected - ERROR

        return json_encode($uploadReturn);
    }

    public function delete(){

        $folderAddress = "./storage/"; // folder address.
        if (isset($_POST['name'])) // Check if  name if empty
        {
                $fileName = $folderAddress . $_POST['name'];
                unlink($fileName); // Delete file
                $this->deposit->deleteFile();

                return true;

        }else{
            return false;
        }
    }

    public function display(){

       $fileList = $this->deposit->displayFile();
       if ($fileList != false) {
           foreach ($fileList as $key => $file) {
               $fileList[$key] = $file;
           }
           return json_encode($fileList);
       }else{
           return json_encode(false);
       }


    }

    public function folderCreation($p_folderName,  $p_folderPath){

        echo $p_folderName;
        echo $p_folderPath;

        if (!mkdir($p_folderPath)) {
            return json_encode(array('message' => 'Un problème est survenu. Veuillez réessayer.', 'name' => $p_folderName));
        }
        if ($this->deposit->insertFile($p_folderName, 0, 'd') == true) {
            return json_encode(array('message' => 'Le dossier ' . $p_folderName . ' à bien été créé', 'name' => $p_folderName, 'author' => $_SESSION['First_name'] . ' ' . $_SESSION['Last_name']));
        }
    }
}

?>



