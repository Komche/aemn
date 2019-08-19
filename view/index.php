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

                addUsers($_POST['last_name'], $_POST['first_name'], $_POST['email'], $_POST['phone_number'], $_POST['bureau']);
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
                editUsers($_POST['last_name'], $_POST['first_name'], $_POST['email'], $_POST['phone_number'], $_POST['phone_number'], $_GET['user']);
            }
            getAddUserView();
        } elseif ($_GET['action'] == "addAV") {// ajouter un article
            if(isset($_POST['other']) && isset($_POST['url']))
            {
                $type = $_POST['other'];
                $url = $_POST['url'];
            } elseif (isset($_POST['type']) && isset($_POST['url']))
            {
                $type = $_POST['type'];
                $url = $_POST['url'];
            }elseif (isset($_POST['other']) && isset($_FILES['url'])) {
                $type = $_POST['other'];
                $url = $_FILES['url'];
            }elseif (isset($_POST['type']) && isset($_FILES['url'])) {
                $type = $_POST['type'];
                $url = $_FILES['url'];
            }

            if (isset($_SESSION['id']) && isset($_POST['content']) && isset($url) && isset($type) && isset($_POST['category'])) {
                if(isset($_POST['other']) && isset($_POST['url'])){
                    addType_articles($_POST['other']);
                    $id = getId();
                    addArticles($_SESSION['id'], $id, $_POST['category'], $_POST['title'], $_POST['content'], null, $url);
                }elseif (isset($_POST['type']) && isset($_POST['url'])) {
                    addArticles($_SESSION['id'], $type, $_POST['category'], $_POST['title'], $_POST['content'], null, $url);
                }elseif (isset($_POST['other']) && isset($_FILES['url'])) {
                    addType_articles($_POST['other']);
                    $id = getId();
                    addArticles($_SESSION['id'], $id, $_POST['category'], $_POST['title'], $_POST['content'], $url['name'], $url['tmp_name']);
                }elseif (isset($_POST['type']) && isset($_FILES['url'])) {
                    addArticles($_SESSION['id'], $type, $_POST['category'], $_POST['title'], $_POST['content'], $url['name'], $url['tmp_name']);
                }

            }
            getAddArticleView();
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