
<?php
require('models/Admin.php');
require('models/AdminManager.php');



class FrontController
{

    public function voirBiographie()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbManager = new BiographieManager($db);
        $contenuBiographie = $dbManager->read();
        require('views/ViewFrontend/BiographieView.php');
    }


    public function afficherAllEpisodes()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbManager = new EpisodeManager($db);
        $episodes = $dbManager->readAll();

        require('views/ViewFrontend/AllEpisodesView.php');
    }
    public function afficherEpisode($id)
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbManager = new EpisodeManager($db);
        $episode = $dbManager->read($id);

        $commentaires = $this->recupererCommentaires($id);

        require('views/ViewFrontend/EpisodeView.php');
    }

    public function recupererCommentaires($episodeId)
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbManager = new CommentaireManager($db);
        return $dbManager->readAll($episodeId);
    }

    public function afficherHome()
    {
        require('views/ViewFrontend/HomeView.php');
    }


    public function afficherContact()
    {
        require('views/ViewFrontend/ContactView.php');
    }



    public function afficherLogin()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dbManager = new AdminManager($db);

        if (isset($_POST['connecter']) && isset($_POST['identifiant']) && isset($_POST['motdepasse'])) {


            $monAdmin = $dbManager->exist($_POST['identifiant'], $_POST['motdepasse']);
            if (!$monAdmin) {

                $message = 'Identifiant ou mot de passe inccoret';
            } else {
                session_start();
                $_SESSION['identifiant'] = $_POST['identifiant'];
                $_SESSION['motdepasse'] = $_POST['motdepasse'];
        
                    header('Location: index.php?route=admin');
                    exit();
            }
        }
        require('views/ViewFrontend/LoginView.php');
    }

    
}
