<?php

class Biographie
{
    protected $_id;
    protected $_contenu;

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

}    