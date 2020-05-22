
<?php
require('models/Biographie.php');
require('models/BiographieManager.php');
require('models/EpisodeManager.php');
require('models/Episode.php');
require('models/CommentaireManager.php');
require('models/Commentaire.php');
class BackController {
    
    public function afficherPageErreur()
    {
        if(!isset($_SESSION['identifiant']) || !isset($_SESSION['motdepasse'])) {
            $message = 'Accès interdit'; 
            header('Location: index.php?route=login');
        }
       
    }
    

    public function afficherAdminHome()
    {
        $this->afficherPageErreur();
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbManager = new EpisodeManager($db);
        $episodes = $dbManager->readAll();


        require('views/ViewBackend/AdminHome.php');
    }

    public function enregistrerBiographie ()
    {
       
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
       
        $dbManager = new BiographieManager($db);
            
        $dbManager->create($_POST['text']);
     
    }

    public function enregistrerEpisode()
    {
        
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
       
        $dbManager = new EpisodeManager($db);
        
        $data = ['contenu' => $_POST['textEpisode'], 'titre' => $_POST['titreEpisode']];
        
        $episode = new Episode($data);
        $dbManager->create($episode);
        
    }
    public function afficherUpdateEpisode($id)
    {
        $this->afficherPageErreur();
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $dbManager = new EpisodeManager($db); 
        $episode = $dbManager->read($id); 
        require('views/ViewBackend/UpdateEpisode.php');
      
    }
    public function enregistrerUpdateEpisode($id)
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
       
        $dbManager = new EpisodeManager($db);
        
        $data = ['contenu' => $_POST['modifierTextEpisode'], 'titre' => $_POST['modifierTitreEpisode'], 'id' =>$id ];
        $updateEpisode = new Episode($data);
        $dbManager->update($updateEpisode);
        $this->afficherAdminHome();
 
        
    }

    public function supprimerEpisode($id)
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
       
        $dbManager = new EpisodeManager($db);
        $episode = $dbManager->delete($id);
        $this->afficherAdminHome();
 
        
    }


    public function enregistrerComment($episodeId)
    {
        $bd = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
       
        $dbManager = new CommentaireManager($bd);
        $data = ['nomUtilisateur' => $_POST['pseudo'], 'contenu' => $_POST['comment'], 'episodeId' =>$episodeId, 'signale'=> false];
        $commentaire = new Commentaire($data);

        $dbManager->create($commentaire);
        
    }

    public function afficherAddEpisode()
    { 
        $this->afficherPageErreur();
       require('views/ViewBackend/AddEpisode.php');
    }

    public function afficherAddBiographie()
    { 
        $this->afficherPageErreur();
       require('views/ViewBackend/AddBiographie.php');
    }

    public function deconnecter()
    { 
       session_destroy();
       header('Location: index.php?route=home');
    }
       
}


        