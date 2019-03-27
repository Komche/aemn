<?php
require_once('../FolderManager.php');

function getDocumentsToDelete($folder)
{
    $product = new FolderManager(0, 0, 0);
    return $product->getDocumentToDelete($folder);
}

$error = "Attention ce dossier n'est pas vide, le contenu sera supprimé aussi";


$q = $_REQUEST['q'];
$sup = getDocumentsToDelete($q);

if ($sup) {
    echo ($error);
}