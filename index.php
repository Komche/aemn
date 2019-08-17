<?php
require('controller/fronted.php');



if (isset($_SESSION["id"])) {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "panel") {// tableau de bord
            if (isset($_GET['like']) && isset($_GET['article'])) {
                likes($_GET['article'],$_GET['like']);
            }
            getPanel();
        } elseif ($_GET['action'] == "addU") {// ajouter un utilisateur 
            if (isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['email']) && isset($_POST['phone_number'])) {

                addUsers($_POST['last_name'], $_POST['first_name'], $_POST['email'], $_POST['phone_number']);
            }
            getAddUserView();
        } elseif ($_GET['action'] == "showUV") {// gérer des utilisateurs
            if (!empty($_POST['role'])) {
                if (isset($_POST['type']) && isset($_POST['read']) || isset($_POST['write']) && isset($_POST['user'])) {
                    if(!isset($_POST['read'])) $_POST['read']=null;
                    if(!isset($_POST['write'])) $_POST['write']=null;

                    // declacration
                    $type = $_POST['type'];
                    $read = $_POST['read'];
                    $write = $_POST['write'];
                    $user = $_POST['user'];
                    $role = $_POST['role'];

                    editRoles($type, $read, $write, $user);
                }
            } else {
                if (isset($_POST['type']) && (isset($_POST['read']) || isset($_POST['write'])) && isset($_POST['user'])) {
                   
                    if(!isset($_POST['read'])) $_POST['read']=null;
                    if(!isset($_POST['write'])) $_POST['write']=null;

                    // declacration
                    $type = $_POST['type'];
                    $read = $_POST['read'];
                    $write = $_POST['write'];
                    $user = $_POST['user'];

                    addRoles($type, $read, $write, $user);
                }
            }
            getManageUserView();
        } elseif ($_GET['action'] == "modif" && isset($_GET['user'])) {// modifier un utilisateur

            if (isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['email']) && isset($_POST['phone_number'])) {
                editUsers($_POST['last_name'], $_POST['first_name'], $_POST['email'], $_POST['phone_number'],$_GET['user']);
            }
            getAddUserView();
        } elseif ($_GET['action'] == "addAV") {// ajouter un article
            if(isset($_POST['other'])){
                $type = $_POST['other'];
            }elseif (isset($_POST['type'])) {
                $type = $_POST['type'];
            }

            if (isset($_SESSION['id']) && isset($_POST['content']) && isset($_FILES['url']) && isset($type)) {
                if(isset($_POST['other']) ){
                    addType_articles($_POST['other']);
                    $id = getId();
                    addArticles($_SESSION['id'], $id, $_POST['content'], $_FILES['url']['name'], $_FILES['url']['tmp_name']);
                }elseif (isset($_POST['type']) ) {
                    addArticles($_SESSION['id'], $type, $_POST['content'], $_FILES['url']['name'], $_FILES['url']['tmp_name']);
                }

            }
            getAddArticleView();
        } elseif ($_GET['action'] == "modif" && isset($_GET['article'])) { // modifier un article
            
            if (isset($_POST['other'])) {
                $type = $_POST['other'];
            } elseif (isset($_POST['type'])) {
                $type = $_POST['type'];
            }
            //print_r($_POST); die("yes");
            if (isset($_SESSION['id']) && isset($_POST['content']) && isset($_FILES['url']) && isset($type)) {
                if (isset($_POST['other'])) {
                    addType_articles($_POST['other']);
                    $id = getId();
                    editArticles($_SESSION['id'], $id, $_POST['content'], $_FILES['url']['name'],$_FILES['url']['tmp_name'], $_GET['article']);
                } elseif (isset($_POST['type'])) {
                    
                    editArticles($_SESSION['id'], $type, $_POST['content'], $_FILES['url']['name'],$_FILES['url']['tmp_name'],$_GET['article']);
                }
            }
            getAddArticleView();
        } elseif ($_GET['action'] == "showAV") {// afficher article
            getShowProductView();
        } elseif ($_GET['action'] == "addFV") {// ajouter un dossier
            extract_post(['label', 'type']);
            if (isset($_SESSION['id']) && is_not_empty(['label', 'type'])) {
                
                addFolders($_SESSION['id'], $type, $label);
                
            }
            getaddFolderView();
        }elseif ($_GET['action'] == "addDocV") {// ajouter un fichier
            extract_post(['type', 'folder']);
            if (isset($_SESSION['id']) && is_not_empty(['folder', 'type']) && !empty($_FILES['images'])) {
                
                addFiles($_FILES['images']['name'],$_FILES['images']['type'],$_FILES['images']['size'],$_FILES['images']['tmp_name'],$folder,$_SESSION['id']);
                
            }
            getaddDocumentView();
        }elseif ($_GET['action'] == "showGalerie") {// afficher des images
            //extract_get('galerie');
            getShowGalerieView();
        }elseif ($_GET['action'] == "showDocumentation") {// afficher des documents
            //extract_get('document');
            getShowDocumentationView();
        }elseif ($_GET['action'] == "addImg") {// ajouter des images défilante
            if (isset($_SESSION['id']) && !empty($_FILES['images'])) {
                
                addFiles($_FILES['images']['name'],$_FILES['images']['type'],$_FILES['images']['size'],$_FILES['images']['tmp_name'],0,$_SESSION['id']);
                
            }
            getaddImagesView();
        }elseif ($_GET['action'] == "showSlide") {// afficher des images défilantes
            getShowImagesSlideView();
        }elseif ($_GET['action'] == "addBuro") {// ajouter un bureau
            extract_post(['nom_bureau', 'statut']);
            if (isset($_SESSION['id']) && !empty($_FILES['logo'])) {
                
                BureauManager::addBureau($nom_bureau, $_FILES['logo']['name'],$statut,$_FILES['logo']['tmp_name']);
                
            }
            require_once('view/fronted/addBureauView.php');
        }elseif ($_GET['action'] == "showBuro") {// afficher des bureau
            //extract_get('galerie');
            getShowBuroView();
        }  

    } else {
        if (isset($_GET['like']) && isset($_GET['article'])) {
            likes($_GET['article'],$_GET['like']);
        }
        getPanel();
    }


} else {
    if (isset($_GET['register'])) {

        if (isset($_POST['code']) && isset($_POST['mdp']) && isset($_POST['mdp2'])) {
            createAccounts($_POST['code'], $_POST['mdp'], $_POST['mdp2']);
        }
        getRegisterPage();
    } elseif (isset($_GET['login'])) {

        if (isset($_POST['email']) && isset($_POST['mdp'])) {
            connectUsers(0, 0, $_POST['email'], 0, $_POST['mdp'], 0);
            header('Location: index.php?panel=go');
        }
        getLoginPage();
    } elseif (isset($_GET['action'])) {
        if ($_GET['action'] == "admin") { 
            getLoginPage();
        } elseif ($_GET['action'] == "activite") { 
            if($_GET['id']){
                $id = $_GET['id'];
                getCategorieActivite($id);
            } else {
                getActivitePage();
            }
        } elseif ($_GET['action'] == "photo") { 
            getGaleriePhoto();
        } elseif ($_GET['action'] == "article") { 
            if($_GET['id']){
                $id = $_GET['id'];
                getArticlePage($id);
            } else {
                getActivitePage();
            }
        } elseif ($_GET['action'] == "video") { 
            getGalerieVideo();
        } elseif ($_GET['action'] == "organe") { 
            getOrganePage();
        } elseif ($_GET['action'] == "be") { 
            getBePage();
        } elseif ($_GET['action'] == "organigramme") { 
            getOrganigrammePage();
        }
    } else {
        if (isset($_POST['email']) && isset($_POST['mdp'])) {
            connectUsers(0, 0, $_POST['email'], 0, $_POST['mdp'], 0);
            header('Location: index.php?panel=go');

        }
        getSitePage();
    }
}
