<?php

class CommentaireManager
{
    private $_bd;

    public function __construct($bd)
    {
        $this->setBD($bd);
    }

    public function create(Commentaire $commentaire)
    {

        $query = $this->_bd->prepare('INSERT INTO commentaires(nom_utilisateur, signale, contenu, episode_id) VALUES (:nomUtilisateur, :signale, :contenu, :episodeId)');

        $query->bindValue(':nomUtilisateur', $commentaire->getNomUtilisateur());
        $query->bindValue(':signale', intval($commentaire->getSignale()));
        $query->bindValue(':contenu', $commentaire->getContenu());
        $query->bindValue(':episodeId', $commentaire->getEpisodeId());
        $query->execute();
        $dataBDD = ['id' => $this->_bd->lastInsertId()];
        $commentaire->hydrate($dataBDD);
    }

    public function update(Commentaire $commentaire)
    {
        
        $query = $this->_bd->prepare('UPDATE commentaires SET nom_utilisateur = :nom_utilisateur; contenu = :contenu, signale = :siglane, episode_id = :episode_id');

        $query->bindValue(':nom_utilisateur', $commentaire->getNomUtilisateur());
        $query->bindValue(':signale', $commentaire->getSignale());
        $query->bindValue(':contenu', $commentaire->getContenu());
        $query->bindValue(':EpisodeId', $commentaire->getEpisodeId());
     
        $query->execute();

    }

    public function readAll($episodeId)
    {   
       
        $commentaires = [];
        $query = $this->_bd->prepare('SELECT * FROM commentaires WHERE  episodeId = :episode_id');
        $query->bindValue(':episode_id', $episodeId);
        $query->execute();

        while ($infosCommentaire = $query->fetch(PDO::FETCH_ASSOC))
        {
            $commentaires[] = new Commentaire($infosCommentaire);
    
        }
       
        return $commentaires;
    }   

    public function read($nomUtilisateur)
    {
        $query = $this->_bd->prepare('SELECT nom_utilisateur, signale, contenu, billet_id FROM commentaires WHERE nom_utilisateur = :nom_utilisateur');
        $query->binValue(':nom_utilisateur', $nomUtilisateur->getNomUtilisateur);
        $query->execute();

        $infosCommentaire = $query->fetch(PDO::FETCH_ASSOC);
        return new Commentaire ($infosCommentaire);


    }

    public function delete(Commentaire $commentaire)
    {
        $query = $this->_db->prepare('DELETE FROM commentaires WHERE id = :id');  
        $query-> bindValue(':id', $commentaire->getId());
        $query->execute();
    }

    public function bd()
    {
        return $this->_db;
    }
    public function setBd(PDO $bd)
    {
        $this ->_bd = $bd;
    } 

}