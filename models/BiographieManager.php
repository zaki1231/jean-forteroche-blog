<?php

class BiographieManager
{
    private $_bd;

    public function __construct($bd)
    {
        $this->setBD($bd);
    }
        
    public function create($biographie)
    {
        $query = $this->_bd->prepare('INSERT INTO Biographie(contenu) VALUES (:contenu)');
      
        $query->bindValue(':contenu',$biographie);
        $query->execute();  
       
    }

    public function update(Biographie $biographie)
    {
        $query = $this->_bd->prepare('UPDATE Biographie SET contenu = :contenu WHERE id = :id');
        
        $query->bindValue(':contenu', $biographie->getContenu());
        $query->bindValue(':id', $biographie->getId());
        $query->execute();

    }

    public function read()
    {
        $query = $this->_bd->prepare('SELECT * FROM Biographie');
        $query->execute();

        $infosBiographie = $query->fetch(PDO::FETCH_ASSOC);
        return new Biographie($infosBiographie);
    }

    public function delete(Biographie $biographie)
    {
        $query = $this->_bd->prepare('DELETE FROM Biographie WHERE id = :id');  
        $query-> bindValue(':id', $biographie->getId());
        $query->execute();
    }
        public function bd()
        {
            return $this->_bd;
        }
        public function setbd(PDO $bd)
        {
            $this ->_bd = $bd;
        }

}