<?php

class AdminManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function create(Admin $admin)
    {
        $query = $this->_db->prepare('INSERT INTO Admin(nom, mdp) VALUES (:nom, :mdp)');

        $query->binvalue(':nom', $admin->getNom());
        $query->binvalue(':mdp', $admin->getMdp());
        $query->execute();

        $dataBDD = ['id' => $this->_db->lastInsertId()];
        $admin->hydrate($dataBDD);
    }

    public function update(Admin $admin)
    {
        $query = $this->_db->prepare('UPDATE admin SET nom = :nom, mdp = :mdp WHERE id = :id');

        $query->bindvalue(':nom', $admin->getNom());
        $query->bindvalue(':mdp', password_hash($admin->getMdp(), PASSWORD_BCRYPT));
        $query->bindValue(':id', $admin->getId());
        $query->execute();
    }

    public function exist($id, $mdp)
    {
        $query = $this->_db->prepare('SELECT nom, mdp FROM Admin WHERE nom = :nom');
        $query-> bindValue(':nom' , $id);

        $query->execute();
    
        $infosAdmin = $query->fetch(PDO::FETCH_ASSOC);
        
        
     


        if($infosAdmin == false)
        {
            return false;
        }else
        {
            return password_verify($mdp, $infosAdmin["mdp"]);
        }

    }


    public function read(Admin $admin)
    {
        $query = $this->_db->prepare('SELECT nom, mdp FROM Admin WHERE nom= :nom AND mdp = :mdp');
        $query->binValue(':nom', $admin->getNom());
        $query->binValue(':mdp', $admin->getMdp());
        $query->execute();

        $infosAdmin = $query->fetch(PDO::FETCH_ASSOC);
        return new Admin($infosAdmin);
    }

    public function delete(Admin $admin)
    {
        $query = $this->_db->prepare('DELETE FROM admin WHERE id = :id');  
        $query-> bindValue(':id', $admin->getId());
        $query->execute();
    }

    public function db()
    {
        return $this->_db;
    }
    public function setDb(PDO $db)
    {
        $this ->_db = $db;
    } 

}