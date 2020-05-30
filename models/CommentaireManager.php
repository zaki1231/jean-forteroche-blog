<?php

require_once('Manager.php');

class CommentaireManager extends Manager
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create(Commentaire $commentaire)
    {

        $query = $this->_bd->prepare('INSERT INTO commentaires(nomUtilisateur, signale, contenu, episodeId) VALUES (:nomUtilisateur, :signale, :contenu, :episodeId)');

        $query->bindValue(':nomUtilisateur', $commentaire->getNomUtilisateur());
        $query->bindValue(':signale', $commentaire->getSignale());
        $query->bindValue(':contenu', $commentaire->getContenu());
        $query->bindValue(':episodeId', $commentaire->getEpisodeId());
        $query->execute();
        $dataBDD = ['id' => $this->_bd->lastInsertId()];
        $commentaire->hydrate($dataBDD);
    }

    public function update(Commentaire $commentaire)
    {

        $query = $this->_bd->prepare('UPDATE commentaires SET nomUtilisateur = :nomUtilisateur, contenu = :contenu, signale = :signale, episodeId = :episodeId WHERE id = :id');

        $query->bindValue(':nomUtilisateur', $commentaire->getNomUtilisateur());
        $query->bindValue(':signale', $commentaire->getSignale());
        $query->bindValue(':contenu', $commentaire->getContenu());
        $query->bindValue(':episodeId', $commentaire->getEpisodeId());
        $query->bindValue(':id', $commentaire->getId());

        $query->execute();
    }

    public function readAll($episodeId)
    {
        $commentaires = [];
        $query = $this->_bd->prepare('SELECT * FROM commentaires WHERE  episodeId = :episode_id');
        $query->bindValue(':episode_id', $episodeId);
        $query->execute();

        while ($infosCommentaire = $query->fetch(PDO::FETCH_ASSOC)) {
            $commentaires[] = new Commentaire($infosCommentaire);
        }

        return $commentaires;
    }

    public function read($id)
    {
        $query = $this->_bd->prepare('SELECT * FROM commentaires WHERE id= :id');
        $query->bindValue(':id', $id);
        $query->execute();

        $infosCommentaire = $query->fetch(PDO::FETCH_ASSOC);

        return new Commentaire($infosCommentaire);
    }
    public function readCommentaireSignale()
    {
        $commentaireSignale = [];

        $query = $this->_bd->prepare('SELECT * FROM commentaires WHERE signale >= 1 ORDER BY signale DESC');
        $query->execute();

        while ($infosCommentaire = $query->fetch(PDO::FETCH_ASSOC)) {
            $commentaireSignale[] = new Commentaire($infosCommentaire);
        }

        return $commentaireSignale;
    }

    public function delete($commentaire)
    {

        $query = $this->_bd->prepare('DELETE FROM commentaires WHERE id = :id');
        $query->bindValue(':id', $commentaire);
        $query->execute();
    }


    
}
