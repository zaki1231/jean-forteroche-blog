<?php
require('models/Biographie.php');
require('models/BiographieManager.php');
require('models/EpisodeManager.php');
require('models/Episode.php');
require('models/CommentaireManager.php');
require('models/Commentaire.php');

class BackController
{

    public function afficherPageErreur()
    {
        if (!isset($_SESSION['identifiant']) || !isset($_SESSION['motdepasse'])) {
            $message = 'Accès interdit';
            header('Location: index.php?route=login');
        }
    }
  

    public function afficherAdminHome()
    {
        $this->afficherPageErreur();
        $dbManager = new EpisodeManager();
        $episodes = $dbManager->readAll();
        require('views/backend/BackHomeView.php');
    }

    public function enregistrerBiographie()
    {
        $dbManager = new BiographieManager();
        $dbManager->create($_POST['text']);
    }

    public function enregistrerEpisode()
    {
        $dbManager = new EpisodeManager();
        $data = ['contenu' => $_POST['textEpisode'], 'titre' => $_POST['titreEpisode']];

        $episode = new Episode($data);
        $dbManager->create($episode);
    }
    public function afficherUpdateEpisode($id)
    {
        $this->afficherPageErreur();
        $dbManager = new EpisodeManager();
        $episode = $dbManager->read($id);
        require('views/backend/UpdateEpisodeView.php');
    }
    public function enregistrerUpdateEpisode($id)
    {
        $dbManager = new EpisodeManager();
        $data = ['contenu' => $_POST['modifierTextEpisode'], 'titre' => $_POST['modifierTitreEpisode'], 'id' => $id];

        $updateEpisode = new Episode($data);
        $dbManager->update($updateEpisode);
        $this->afficherAdminHome();
    }

    public function supprimerEpisode($id)
    {
        $dbManager = new EpisodeManager();
        $episode = $dbManager->delete($id);
        $this->afficherAdminHome();
    }


    public function enregistrerComment($episodeId)
    {
        var_dump('coucou');
        $dbManager = new CommentaireManager();
        $data = ['nomUtilisateur' => $_POST['pseudo'], 'contenu' => $_POST['comment'], 'episodeId' => $episodeId, 'signale' => 0];

        $commentaire = new Commentaire($data);
        $dbManager->create($commentaire);
        header('Location: index.php?route=episode-' . $commentaire->getEpisodeId() . '#ancre-commentaire');
       
    }

    public function recupererCommentaire($commentaireId)
    {
        $dbManager = new CommentaireManager();
        $commentaire = $dbManager->read($commentaireId);
        return $commentaire;
    }

    public function signalerCommentaire(Commentaire $commentaire)
    {
        $dbManager = new CommentaireManager();
        if (isset($_SESSION['idCommentaire'. $commentaire->getId()])  ) {

            $message = 'commentaire deja signalé';
    
            $episodeManager = new EpisodeManager();
            $episodeId = $commentaire->getEpisodeId();
            $episode = $episodeManager->read($episodeId);
            $commentaires = $dbManager->readAll($episodeId);
            $commentaireIdSignale = $commentaire->getId();
            require('views/frontend/EpisodeView.php');
        
        }else{

        $data = ['signale' => $commentaire->getSignale() + 1];
        $commentaire->hydrate($data);
        $dbManager->update($commentaire);

        session_start();
        $_SESSION['idCommentaire'.$commentaire->getId()] = $commentaire->getId();
        header('Location: index.php?route=episode-' . $commentaire->getEpisodeId());
        }
        
    }

    public function afficherCommentaireSignale()
    {
        $this->afficherPageErreur();

        $dbManager = new CommentaireManager();
        $commentaires = $dbManager->readCommentaireSignale();
        require('views/backend/CommentaireView.php');
    }
    public function supprimerCommentaire($commentaireId)
    {
        $dbManager = new CommentaireManager();
        $episode = $dbManager->delete($commentaireId);
        $this->afficherCommentaireSignale();
    }

    public function afficherAddEpisode()
    {
        $this->afficherPageErreur();
        require('views/backend/AddEpisodeView.php');
    }

    public function afficherAddBiographie()
    {
        $this->afficherPageErreur();
        $dbManager = new BiographieManager();
        $biographie = $dbManager->read();
        require('views/backend/AddBiographieView.php');
    }

    public function deconnecter()
    {
        session_destroy();
        header('Location: index.php?route=home');
    }
    
}
