<?php

class ModelUser
{
    private function connect() {
        try {
            $db = new PDO(DSN,USER,PASS);
        } catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
        return $db;
    }

   public function getUserAll(){
        $sql = "SELECT * 
                    FROM users";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        return $statement;
    }

    public function getUserById($id){
        $sql = "SELECT * 
                    FROM users
                    WHERE users.Id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement;
    }

    public function getUsersByClass($idClass){

        $request = $this->connect()->prepare("SELECT u.Id, u.Last_name, u.First_name FROM users u WHERE u.Id_Class = :idClass;");

        $request->bindValue(':idClass', $idClass);
        $request->execute();

        return $request->fetchAll();
    }



    public function updateUser($data)
    {
        $db = database();
        $sql = "UPDATE users
                    SET
                        users.Level = :level,
                        users.Last_name = :last_name,
                        users.First_name = :first_naeme,
                        users.Birth = :birth,
                        users.Post = :post,
                        users.Phone = :phone,
                        users.Address = :address,
                        users.Tutor = :tutor,
                        users.Tutor_mail = :tutor_mail,
                        users.Mail = :mail,
                        users.Password = :pwd,
                        users.Picture = :picture
                           WHERE users.Id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(":id", $data['Id']);
        $statement->bindValue(":level", $data['Level'],PDO::PARAM_INT);
        $statement->bindValue(":last_name", $data['LastName'],PDO::PARAM_STR);
        $statement->bindValue(":first_naeme", $data['FristName'],PDO::PARAM_STR);
        $statement->bindValue(":birth", $data['Brith'],PDO::PARAM_STR);
        $statement->bindValue(":post", $data['Post'],PDO::PARAM_STR);
        $statement->bindValue(":phone", $data['Phone'],PDO::PARAM_INT);
        $statement->bindValue(":address", $data['Adress'],PDO::PARAM_STR);
        $statement->bindValue(":tutor", $data['NameTutor'],PDO::PARAM_STR);
        $statement->bindValue(":tutor_mail", $data['MailTutor'],PDO::PARAM_STR);
        $statement->bindValue(":mail", $data['Mail'],PDO::PARAM_STR);
        $statement->bindValue(":pwd", $data['pwd'],PDO::PARAM_STR);
        $statement->bindValue(":picture", $data['Picture'],PDO::PARAM_STR);
        $statement->execute();
        return $statement;
    }

    public function insertUser($data){
        $sql = "INSERT INTO users
                    (
                        Level,
                        Last_name,
                        First_name,
                        Birth,
                        Post,
                        Picture,
                        Phone,
                        Address,
                        Tutor,
                        Tutor_mail,
                        Mail,
                        Password
                    )
                    VALUES
                    (
                        :level,
                        :last_name,
                        :first_naeme,
                        :birth,
                        :post,
                        :picture,
                        :phone,
                        :address,
                        :tutor,
                        :tutor_mail,
                        :mail,
                        :pwd
                    )";

        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(":level", $data['Level'],PDO::PARAM_INT);
        $statement->bindValue(":last_name", $data['LastName'],PDO::PARAM_STR);
        $statement->bindValue(":first_naeme", $data['FristName'],PDO::PARAM_STR);
        $statement->bindValue(":birth", $data['Brith'],PDO::PARAM_STR);
        $statement->bindValue(":post", $data['Post'],PDO::PARAM_STR);
        $statement->bindValue(":phone", $data['Phone'],PDO::PARAM_INT);
        $statement->bindValue(":address", $data['Adress'],PDO::PARAM_STR);
        $statement->bindValue(":tutor", $data['NameTutor'],PDO::PARAM_STR);
        $statement->bindValue(":tutor_mail", $data['MailTutor'],PDO::PARAM_STR);
        $statement->bindValue(":mail", $data['Mail'],PDO::PARAM_STR);
        $statement->bindValue(":pwd", $data['pwd'],PDO::PARAM_STR);
        $statement->bindValue(":picture", $data['Picture'],PDO::PARAM_STR);
        $statement->execute();
        return $statement;
    }
}