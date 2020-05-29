
<?php
require('models/Admin.php');
require('models/AdminManager.php');


class FrontController
{
    public function voirBiographie()
    {
        $dbManager = new BiographieManager();
        $contenuBiographie = $dbManager->read();
        require('views/frontend/BiographieView.php');
    }


    public function afficherAllEpisodes()
    {
        $dbManager = new EpisodeManager();
        $episodes = $dbManager->readAll();

        require('views/frontend/AllEpisodesView.php');
    }

    public function afficherEpisode($id)
    {
        $dbManager = new EpisodeManager();
        $episode = $dbManager->read($id);

        $commentaires = $this->recupererCommentaires($id);

        require('views/frontend/EpisodeView.php');
    }

    public function recupererCommentaires($episodeId)
    {
        $dbManager = new CommentaireManager();
        return $dbManager->readAll($episodeId);
    }

    public function afficherLogin()
    {
        $dbManager = new AdminManager();

        if (isset($_POST['connecter']) && isset($_POST['identifiant']) && isset($_POST['motdepasse'])) {


            $monAdmin = $dbManager->exist($_POST['identifiant'], $_POST['motdepasse']);
            if (!$monAdmin) {

                $message = 'Identifiant ou mot de passe inccoret, Veuillez réessayer .';
            } else {
                session_start();
                $_SESSION['identifiant'] = $_POST['identifiant'];
                $_SESSION['motdepasse'] = $_POST['motdepasse'];

                header('Location: index.php?route=admin');
                exit();
            }
        }
        require('views/frontend/LoginView.php');
    }

    public function afficherHome()
    {
        $dbManager = new EpisodeManager();
        $episodeRecent= $dbManager->recupereEpisodeRecent();
        require('views/frontend/HomeView.php');
    }

}
