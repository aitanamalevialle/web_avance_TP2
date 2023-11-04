<?php

// Définition d'une constante de chemin utilisée dans l'application.
define('PATH_DIR', 'https://e2395216.webdev.cmaisonneuve.qc.ca/MalevialleA_web_avance_TP2%20/');

// Inclusion des fichiers nécessaires pour le fonctionnement du MVC.
require_once('controller/Controller.php');
require_once('library/RequirePage.php');
require_once __DIR__.'/vendor/autoload.php';
require_once('library/Twig.php');

// Récupération de l'URL demandée par le client et décomposition en segments.
$url = isset($_GET["url"]) ? explode ('/', ltrim($_GET["url"], '/')) : '/';

// Fonction pour gérer l'affichage d'une erreur 404.
function showError404() {
    header("HTTP/1.0 404 Not Found");
    // Utilisation de Twig pour rendre la page d'erreur 404.
    echo Twig::render('error404.php');
    // Arrêt du script pour éviter l'exécution de code supplémentaire.
    exit;
}

// Gestion du routage de la requête HTTP.
if($url == '/'){
    // Si aucune route spécifique n'est fournie, charge le contrôleur par défaut (Home).
    require_once('controller/ControllerHome.php');
    $controller = new ControllerHome;
    echo $controller->index(); 
} else {
    // Construit le chemin du fichier du contrôleur basé sur le premier segment de l'URL.
    $requestURL = ucfirst($url[0]);
    $controllerPath = __DIR__."/controller/Controller".$requestURL.".php";
    // Vérifie si le fichier du contrôleur existe.
    if (file_exists($controllerPath)) {
        require_once($controllerPath);
        $controllerName = 'Controller'.$requestURL;
        if (class_exists($controllerName)) {
            $controller = new $controllerName;
            $method = $url[1] ?? 'index';
            if (method_exists($controller, $method)) {
                // Appelle la méthode sur le contrôleur avec les paramètres supplémentaires de l'URL.
                echo call_user_func_array([$controller, $method], array_slice($url, 2));
            } else {
                // Si la méthode n'existe pas, affiche une erreur 404.
                showError404();
            }
        } else {
            // Si la classe du contrôleur n'existe pas, affiche une erreur 404.
            showError404();
        }
    } else {
        // Si le fichier du contrôleur n'existe pas, affiche une erreur 404.
        showError404();
    }
}

?>