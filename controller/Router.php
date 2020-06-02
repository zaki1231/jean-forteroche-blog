<?php
require('controller/FrontController.php');
require('controller/BackController.php');


class Router
{

    private $_FrontController;
    private $_BackController;

    public function __construct()
    {
        $this->_FrontController  = new FrontController();
        $this->_BackController = new BackController();
    }

    public function route()
    {
        if (isset($_GET['route'])) {
            if ($_GET['route'] === 'bio') {
                $this->_FrontController->voirBiographie();
            } elseif ($_GET['route'] === 'home') {
                $this->_FrontController->afficherHome();
            } elseif ($_GET['route'] === 'login') {
                $this->_FrontController->afficherLogin();
            } elseif ($_GET['route'] === 'admin') {
                $this->_BackController->afficherAdminHome();
            } elseif ($_GET['route'] === 'newEpisode') {
                $this->_BackController->afficherAddEpisode();
            } elseif ($_GET['route'] === 'addBiographie') {
                $this->_BackController->afficherAddBiographie();
            } elseif ($_GET['route'] === 'episodes') {
                $this->_FrontController->afficherAllEpisodes();
            } elseif ($_GET['route'] === 'deconnexion') {
                $this->_BackController->deconnecter();

            } elseif (strpos($_GET['route'], 'supprimerEpisode-') !== false) {
                $idchaine = explode("-", $_GET['route'])[1];
                $id = intval($idchaine);
                $this->_BackController->supprimerEpisode($id);

            } elseif (strpos($_GET['route'], "episode-") !== false) {
                $idchaine = explode("-", $_GET['route'])[1];
                $episodeId = intval($idchaine);
                $this->_FrontController->afficherEpisode($episodeId);

            } elseif (strpos($_GET['route'], 'ajouterCommentaire-') !==false){
               
                $idchaine = explode("-", $_GET['route'])[1];
                $episodeId = intval($idchaine);
                $this->_BackController->enregistrerComment($episodeId);
          

            } elseif (strpos($_GET['route'], "commentaire-") !==false) {
                $idchaine = explode("-", $_GET['route'])[1];
                $commentaireId = intval($idchaine);
                $commentaire = $this->_BackController->recupererCommentaire($commentaireId);
                $this->_BackController->signalerCommentaire($commentaire);
                
            } elseif (strpos($_GET['route'], 'supprimerCommentaire-') !== false) {
                $idchaine = explode("-", $_GET['route'])[1];
                $id = intval($idchaine);
                $this->_BackController->supprimerCommentaire($id);

            } elseif (strpos($_GET['route'], "AffichageModifierEpisode-") !== false) {
                $idchaine = explode("-", $_GET['route'])[1];
                $id = intval($idchaine);
                $this->_BackController->afficherUpdateEpisode($id);
                
            } elseif (strpos($_GET['route'], "ModifierEpisode-") !== false) {
                if (isset($_POST['modifierTextEpisode']) && isset($_POST['modifierTitreEpisode'])) {
                    $idchaine = explode("-", $_GET['route'])[1];
                    $id = intval($idchaine);
                    $this->_BackController->enregistrerUpdateEpisode($id);
                }
            }elseif($_GET['route'] === 'commentaire'){

                $this->_BackController->afficherCommentaireSignale();

            }
        }

        if (isset($_POST['text'])) {
            $this->_BackController->enregistrerBiographie();
        } elseif (isset($_POST['textEpisode']) && isset($_POST['titreEpisode'])) {
            $this->_BackController->enregistrerEpisode();
        }
    }
}
