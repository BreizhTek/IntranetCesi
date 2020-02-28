
<?php


class User
{


    public function getLastUser()
    {
        // On simule une communication BDD
        $return = new stdClass();
        $return->nom = 'Titi';
        $return->prenom = 'Toto';
        return $return;
    }




}