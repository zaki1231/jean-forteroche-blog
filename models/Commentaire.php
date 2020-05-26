<?php

class Commentaire
{
    protected $_id;
    protected $_nomUtilisateur;
    protected $_signale;
    protected $_contenu;
    protected $_episodeId;


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

    public function getId()
    {
        return $this->_id;
    }

    public function getContenu()
    {
        return $this->_contenu;
    }

    public function getNomUtilisateur()
    {
        return $this->_nomUtilisateur;
    }

    public function getSignale()
    {
        return $this->_signale;
    }

    public function getEpisodeId()
    {
        return $this->_episodeId;
    }

    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setContenu($contenu)
    {
        if (is_string($contenu)) {
            $this->_contenu = $contenu;
        }
    }

    public function setSignale($signale)
    {
        $signale = intval($signale);
        if (is_int($signale)) {
            $this->_signale = $signale;
        }
    }

    public function setNomUtilisateur($nomUtilisateur)
    {
        if (is_string($nomUtilisateur)) {
            $this->_nomUtilisateur = $nomUtilisateur;
        }
    }

    public function setEpisodeId($episodeId)
    {
        $episodeId = (int) $episodeId;

        if ($episodeId > 0) {
            $this->_episodeId = $episodeId;
        }
    }
}
