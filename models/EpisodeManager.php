<?php

require_once('Manager.php');


class EpisodeManager extends Manager
{

    public function __construct()
    {
        parent::__construct();
    }
    public function create(Episode $Episode)
    {
        $query = $this->_bd->prepare('INSERT INTO Episode(contenu, titre) VALUES (:contenu, :titre)');

        $query->bindValue(':contenu', $Episode->getContenu());
        $query->bindValue(':titre', $Episode->getTitre());
        $query->execute();

        $dataBDD = ['id' => $this->_bd->lastInsertId()];
        $Episode->hydrate($dataBDD);
    }

    public function update(Episode $Episode)
    {
        $query = $this->_bd->prepare('UPDATE Episode SET contenu = :contenu, titre = :titre WHERE id = :id');

        $query->bindValue(':contenu', $Episode->getContenu());
        $query->bindValue(':titre', $Episode->getTitre());
        $query->bindValue(':id', $Episode->getId());
        $query->execute();

        $dataBDD = ['id' => $this->_bd->lastInsertId()];
        $Episode->hydrate($dataBDD);
    }

    public function readAll()
    {
        $episodes = [];
        $query = $this->_bd->prepare('SELECT * FROM Episode');
        $query->execute();

        while ($infosEpisodes = $query->fetch(PDO::FETCH_ASSOC)) {
            $episodes[] = new Episode($infosEpisodes);
        }
        return $episodes;
    }

    public function read($id)
    {
        $query = $this->_bd->prepare('SELECT * FROM Episode WHERE id = :id');

        $query->bindValue(':id', $id);
        $query->execute();

        $infosEpisode = $query->fetch(PDO::FETCH_ASSOC);
        return new Episode($infosEpisode);
    }

    public function delete($Episode)
    {
        $query = $this->_bd->prepare('DELETE FROM Episode WHERE id = :id');
        $query->bindValue(':id', $Episode);

        $query->execute();
    }

    public function recupereEpisodeRecent()
    {
        $query = $this->_bd->prepare('SELECT * FROM Episode ORDER BY datePublication DESC');
        $query->execute();

        $episodeRecent = $query->fetch(PDO::FETCH_ASSOC);
        return new Episode($episodeRecent);
    }
}
