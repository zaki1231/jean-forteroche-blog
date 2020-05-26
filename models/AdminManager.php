<?php
require_once('Manager.php');

class AdminManager extends Manager
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create(Admin $admin)
    {
        $query = $this->_bd->prepare('INSERT INTO Admin(nom, mdp) VALUES (:nom, :mdp)');

        $query->binvalue(':nom', $admin->getNom());
        $query->binvalue(':mdp', $admin->getMdp());
        $query->execute();

        $dataBDD = ['id' => $this->_bd->lastInsertId()];
        $admin->hydrate($dataBDD);
    }

    public function update(Admin $admin)
    {
        $query = $this->_bd->prepare('UPDATE admin SET nom = :nom, mdp = :mdp WHERE id = :id');

        $query->bindvalue(':nom', $admin->getNom());
        $query->bindvalue(':mdp', password_hash($admin->getMdp(), PASSWORD_BCRYPT));
        $query->bindValue(':id', $admin->getId());
        $query->execute();
    }

    public function exist($id, $mdp)
    {
        $query = $this->_bd->prepare('SELECT nom, mdp FROM Admin WHERE nom = :nom');
        
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
        $query = $this->_bd->prepare('SELECT nom, mdp FROM Admin WHERE nom= :nom AND mdp = :mdp');
        $query->binValue(':nom', $admin->getNom());
        $query->binValue(':mdp', $admin->getMdp());
        $query->execute();

        $infosAdmin = $query->fetch(PDO::FETCH_ASSOC);
        return new Admin($infosAdmin);
    }

    public function delete(Admin $admin)
    {
        $query = $this->_bd->prepare('DELETE FROM admin WHERE id = :id');  
        $query-> bindValue(':id', $admin->getId());
        $query->execute();
    }
}