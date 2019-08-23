<?php session_start();
global $admin;
require_once("model/UserManager.php");
require_once("model/ArticleManager.php");
require_once("model/FolderManager.php");
require_once("model/DocumentManager.php");
require_once("model/RoleManager.php");
require_once("model/BureauManager.php");
require_once("model/Form.php");
require_once('model/Web.php');
require_once('model/Bureau.php');
require_once('model/Hadith.php');
require_once('model/Annonce.php');
require_once('api/model/Managers.php');
require_once('model/global.php');

/** Web client mtza*/

function getSitePage()
{
    $page = 'view/web/home.php';
    require_once($page);
}
function getActivitePage()
{
    $page = 'view/web/activite.php';
    require_once($page);
}

function getArticlePage($id)
{
    $page = 'view/web/article.php';
    require_once($page);
}

function getCategorieActivite($id)
{
    $page = 'view/web/activiteCat.php';
    require_once($page);
}

function getGaleriePhoto()
{
    $page = 'view/web/photo.php';
    require_once($page);
}

function getGalerieVideo()
{
    $page = 'view/web/video.php';
    require_once($page);
}

function getOrganePage()
{
    $page = 'view/web/organe.php';
    require_once($page);
}

function getOrganigrammePage()
{
    $page = 'view/web/organigramme.php';
    require_once($page);
}

function getBePage()
{
    $page = 'view/web/be.php';
    require_once($page);
}

/** Web client mtza*/

    /* The following function return the panel page*/
function getPanel()
{
    $page = 'view/fronted/panelView.php';
    require_once($page);
}
    /* The following function return the login page */
function getLoginPage()
{
    $page = 'view/fronted/loginView.php';
    require_once($page);
}

    /* The following function return the register page*/
function getRegisterPage()
{
    $page = 'view/fronted/registerView.php';
    require_once($page);
}

 /* The following function return the add hire page*/
function getAddUserView()
{
    require_once('view/fronted/addUserView.php');
}
 

    /* The following function return the article page*/
function getaddArticleView()
{
    require_once('view/fronted/addArticleView.php');
}

/* The following function return the folder page*/
function getaddFolderView()
{
    require_once('view/fronted/addFolderView.php');
}

/* The following function return the document page*/
function getaddDocumentView()
{
    require_once('view/fronted/addDocumentView.php');
}

/* The following function return the image page*/
function getaddImagesView()
{
    require_once('view/fronted/addImagesView.php');
}

  /* The following function return the manage user page*/
function getManageUserView()
{
    require_once('view/fronted/manageUserView.php');
} 

    /* The following function return the show article page*/
function getShowArticleView()
{
    require_once('view/fronted/showArticleView.php');
}

   
/* The following function return the show Documentation page*/
function getShowDocumentationView()
{
    require_once('view/fronted/showDocumentationView.php');
}

/* The following function return the show Galerie page*/
function getShowGalerieView()
{
    require_once('view/fronted/showGalerieView.php');
}

/* The following function return the show Galerie page*/
function getShowImagesSlideView()
{
    require_once('view/fronted/showImagesSlideView.php');
}


    /* The following function connect the user to the web application */
function connectUsers($last_name, $first_name, $email, $phone_number, $mdp, $mdp2)
{

    $userManager = new UserManager($last_name, $first_name, $email, $phone_number, 0, $mdp, $mdp2);
    $verif = $userManager->connectUser();

    if ($verif == 'ok') {
        $userManager->sessionUser();

    } else {
        throw new Exception($verif, 1);

    }
}

 /* The following function create an account in the web application */
function createAccounts($code, $password, $passowrd2)
{

    $userManager = new UserManager(0, 0, 0, 0, 0, 0, 0);
    $verif = $userManager->verifPassword($password, $passowrd2);

    if ($verif == 'ok') {
        $res = $userManager->createAccount($code, $password);
        if ($res == 'ok') {
            header('Location: index.php?login');
        } else {
            global $erreur;
            return $erreur = $res;
        }
    } else {
        global $erreur;
        return $erreur = $verif;
    }
}

    /* The following function subscribe the user in the web application */
function addUsers($last_name, $first_name, $email, $phone_number, $bureau)
{

    $userManager = new UserManager($last_name, $first_name, $email, $phone_number, $bureau, 0, 0);
    $verif = $userManager->verifUser();

    if ($verif == 'ok') {
        if ($userManager->addUser()) {
            if ($userManager->SendMail() == 1) {
                header('Location: index.php?action=showUV');
            }
        }
    } else {
        global $erreur;
        return $erreur = $verif;
    }
}

    /* The following function subscribe the user in the web application */
function editUsers($last_name, $first_name, $email, $phone_number, $bureau, $id)
{

    $userManager = new UserManager($last_name, $first_name, $email, $phone_number, $bureau, 0, 0);
    $verif = $userManager->verifUser();

    if ($verif == 'ok') {
        if ($userManager->updateUser($id)) {
            header('Location: index.php?action=showUV');
        }
    } else {
        global $erreur;
        return $erreur = $verif;
    }
}


function getUser()
{
    $user = new UserManager(0, 0, 0, 0, 0, 0, 0);
    return $user->getUser();
}

function getUsersToUpdate($user)
{
    $data = new UserManager(0, 0, 0, 0, 0, 0, 0);
    return $data->getUserToUpdate($user);
}

function getUserRole()
{
    $user = new UserManager(0, 0, 0, 0, 0, 0, 0);
    return $user->getUserRole();
}


    /* The following function add role for the user in the web application */
function editRoles($types, $read_role = null, $write_role = null, $users)
{

    $roleManager = new RoleManager($types, $read_role, $write_role, $users);
    if ($roleManager->editRole()) {
        header('Location: index.php');
    }
}

      /* The following function add role for the user in the web application */
function addRoles($types, $read_role, $write_role, $users)
{

    $roleManager = new RoleManager($types, $read_role, $write_role, $users);
    if ($roleManager->addRole() == 1) {
        header('Location: index.php');
    }
}

function getRole()
{
    $role = new RoleManager(0, 0, 0, 0);
    return $role->getRole();
}  

    /* The following function add the article in the web application */
function addArticles($path, $data)
{
    $res = Manager::is_not_empty($data, null);
    if ($res!=1) {
        return $res;
    }
    if (!Managers::isExit('type_article', 'label', $data['type']) && !is_int($data['type'])) {
        $url = API_ROOT_PATH."/type_article/label/".$data['type'];
        $res = Managers::file_post_contents($url,['label'=>$data['type']]);
        $res = json_decode($res, true);
        if (!$res['error']) {
            $article = new ArticleManager(0,0,0,0);
            $data['type'] = $article->getId();
        }else {
            return $res['message'];
        }
    }

    $data['content'] = str_replace("<img", "<img class=\"col-lg-12 col-md-6\"", $data['content']);
    $data['url'] =ArticleManager::addImg($data['name'], $data['url']);
    unset($data['name']);
    $res = Managers::file_post_contents($path, $data);
    $res = json_decode($res, true);
    if (!$res['error']) {
        header('Location: index.php?action=panel');
    }else {
        return $res['message'];
    }
}

    /* The following function edit the article in the web application */
function editArticles($user, $title, $type, $content, $name, $url, $id)
{
    $content = str_replace("<img", "<img class=\"col-lg-12 col-md-6\"", $content);
    $articleManager = new ArticleManager($user, $title, $type, $content);

    if ($articleManager->editArticle($id, $name, $url)) {
        header('Location: index.php?action=panel');
    } else {
        global $error;
        $error = "Une erreur s'est produite";
        echo $error;
    }
}

  /* The following function add the article in the web application */
function likes($id, $like)
{
    $articleManager = new ArticleManager(0, 0, 0, 0, 0);

    if ($articleManager->like($id, $like)) {
        header('Location: index.php?action=panel');
    }
}

function nbArticles()
{
    $all = new ArticleManager(0, 0, 0, 0, 0);
    return $all->nbArticle();
}

function getArticles($id=null)
{
    $data = new ArticleManager(0, 0, 0, 0, 0);
    return $data->getArticle($id);
}

function getType_articles()
{
    $data = new ArticleManager(0, 0, 0, 0, 0);
    return $data->getType_article();
}

function addType_articles($label)
{
    $data = new ArticleManager(0, 0, 0, 0, 0);
    return $data->addType_article($label);
}

// this function get the ID of the last line of type_article
function getId()
{
    $product = new ArticleManager(0, 0, 0, 0, 0);
    return $product->getId();
}

 /* The following function add the folder in the web application */
function addFolders($user, $type, $label)
{
    $articleManager = new FolderManager($user, $type, $label);

    if ($articleManager->addFolder()) {
        if ($type == 'Galerie') {
            header('Location: index.php?action=showGalerie');
        } else {
            header('Location: index.php?action=showDocumentation');
        }
    }
}

function getFolders($type)
{
    $product = new FolderManager(0, 0, 0);
    return $product->getFolder($type);
}

function deleteFolders($folder, $type)
{
    $product = new FolderManager(0, 0, 0);
    if ($product->deleteFolder($folder)) {
        if ($type == 'Galerie') {
            header('Location: index.php?action=showGalerie');
        } else {
            header('Location: index.php?action=showDocumentation');
        }
    }
}

function deleteArticles($id)
{
    $article = new ArticleManager(0, 0, 0, 0);
    if ($article->deleteArticle($id)) {
        header('Location: index.php?panel=go');
    }
}

function deleteFiles($folder, $file, $type)
{
    $product = new DocumentManager();
    if ($product->deleteFile(null, $file)) {
        if ($type == 'Galerie') {
            header('Location: index.php?action=showGalerie&galerie='.$folder);
        } else {
            header('Location: index.php?action=showDocumentation&document='.$folder);
        }
    }
}

function getDocumentsToDelete($folder)
{
    $product = new FolderManager(0, 0, 0);
    return $product->getDocumentToDelete($folder);
}

/* The following function add the files in the web application */
function addFiles($label, $type, $size, $url, $folder, $user)
{
    $documentManager = new DocumentManager();
    //echo ('<br>' . $label . ' ' . $type . ' ' . $size  . $url . '(url)' . $folder . '<br>'); die();
    if ($documentManager->addFile($label, $type, $size, $url, $folder, $user)) {
        header('Location: index.php?action=panel');
    }
}

function getFolderName($folder)
{
    $documentManager = new DocumentManager();
    return $documentManager->getFolder($folder);
}

function getFiles($folder)
{
    $documentManager = new DocumentManager();
    return $documentManager->getDocument($folder);
}

// function extract_get($index)
// {
//     if (!empty($_GET[$index])) {
//         $GLOBALS[$index] = $_GET[$index];
//     } else {
//         $GLOBALS[$index] = null;
//     }
// }

function extract_post($indexs = [])
{
    if (count($indexs) != 0) {
        foreach ($indexs as $index) {
            if (!empty($_POST[$index])) {
                $GLOBALS[$index] = $_POST[$index];
            } else {
                return null;
            }
        }
    }




}

function is_not_empty($fields = [])
{
    if (count($fields) != 0) {
        foreach ($fields as $field) {
            if (empty($_POST[$field]) && trim(isset($_POST[$field]) == "")) {
                return false;
            }
        }
        return true;
    }
}

function getIcone($name)
{
    global $admin;
    $extension = pathinfo($name, PATHINFO_EXTENSION);

    if ($extension == "pdf") {
        return "public/img/pdf.png";
    } elseif ($extension == "doc" || $extension == "docx") {
        return "public/img/word.png";
    } elseif ($extension == "odp") {
        return "public/img/odp.png";
    } elseif ($extension == "odt") {
        return "public/img/odt.png";
    } elseif ($extension == "ppt") {
        return "public/img/ppt.png";
    } else {
        return "public/img/unkonow.png";
    }

}

function addInput($type, $name, $placeholder, $minlenth, $require)
{
    $form = new Form();
    return $form->input($type, $name, $placeholder, $minlenth, $require);
}

function error($error)
{
    $erreur = new Manager();
    $erreur->error($error);
}

/** Web client mtza*/

function getVideoArticles()
{
    $product = new ArticleManager(0, 0, 0, 0, 0);
    return $product->getVideoArticle();
}

function getPhotoArticles()
{
    $product = new ArticleManager(0, 0, 0, 0, 0);
    return $product->getPhotoArticle();
}

function getPhotoArticlesType($id)
{
    $product = new ArticleManager(0, 0, 0, 0, 0);
    return $product->getPhotoArticleType($id);
}
function Article($id)
{
    $product = new ArticleManager(0, 0, 0, 0, 0);
    $id = $_GET['id'];
    return $product->Article($id);
}

function getArticleType($id)
{
    $product = new ArticleManager(0, 0, 0, 0, 0);
    $id = $_GET['id'];
    return $product->getArticleType($id);
}

function addData($data, $table)
{
    $url = API_ROOT_PATH. "/object/$table";
    $res = Manager::addHadith($url, $data);
    if (isset($res['error'])) {
        $res = json_decode($res, true);
        if (!$res['error']) {
            header('Location: index.php?action=hadith');
        }else {
            return $res['message'];
        }
    }else {
        return $res['message'];
    }
}

function listeActivite()
{
    $web = new Web();
    return $web->listeActivite();
}

function nbBureau()
{
    $all = new Bureau();
    return $all->nbBE();
}

function nbSection()
{
    $all = new Bureau();
    return $all->nbSection();
}

function nbSsection()
{
    $all = new Bureau();
    return $all->nbSsection();
}

function getLogoBureau()
{
    $all = new Bureau();
    return $all->getLogo();
}

function getHadiths()
{
    $all = new Hadith();
    return $all->getHadith();
}

function getAnnonces()
{
    $all = new Annonce();
    return $all->getAnnonce();
}

function lastAnnonce($id)
{
    $all = new Annonce();
    return $all->lastAnnonce($id);
}

/** Web client mtza*/
