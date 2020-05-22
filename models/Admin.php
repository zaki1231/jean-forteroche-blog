<?php

class Admin
{
    protected $_id;
    protected $_nom;
    protected $_mdp;



    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function nomValide()
    {
        if (!empty($this->_nom) && is_string($this->_nom)) {
            return true;
        }
        return false;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getMdp()
    {
        return $this->_mdp;
    }


    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setNom($nom)
    {
        if (is_string($nom)) {
            $this->_Nom = $nom;
        }
    }

    public function setMdp($mdp)
    {
        if (is_string($mdp)) {
            $this->_mdp = $mdp;
        }
    }
}
