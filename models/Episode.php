<?php

class Episode
{
    protected $_id;
    protected $_contenu;
    protected $_titre;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {        
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key); 
            
            if (method_exists($this, $method)) 
            {
                $this->$method($value); 
            }
        }
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getContenu()
    {
        return $this->_contenu;
    }

    public function geTtitre()
    {
        return $this->_titre;
    }

    public function setId($id)
    {
        $id = (int) $id;
        
        if ($id > 0)
        {
            $this->_id = $id;
        }
    }

    public function setContenu($contenu)
    {
        if (is_string($contenu))
        {
            $this->_contenu = $contenu ;
        }
    }

    public function setTitre($titre)
    {
        if (is_string($titre))
        {
            $this->_titre = $titre ;
        }
    }

}   
