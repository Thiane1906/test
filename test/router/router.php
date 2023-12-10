<?php
require_once("../controller/contactController.php");


class Router
{
    public function __construct()
    {
        //recupération de l'URI
        $uri=$_SERVER["REQUEST_URI"];
        //ELIMINATION Du 1er / et du dernier /
        $url= substr($uri, 1);
        //decomposition du lien en format controlleur/action
        $link=explode("/", $url);
        $ctrl=$link[0];
        if ($link[0]) {
            # code...
            $mtd=$link[1];
        }

        //chargement par défaut de la page home
        if (isset($ctrl) && $ctrl) {
            // echo "controller existe";
        }
        else {
            $ctrl='contact';           
            require_once "../controller/".strtolower($ctrl)."Controller.php";
            $classeController=ucfirst(strtolower($ctrl));
            $ctr=new $classeController;
        }
        //localisation du controller
        $filename="../controller/".strtolower($ctrl)."Controller.php";

        if (file_exists($filename)) {
            // echo "Le fichier $filename existe.";
        } else {
            // echo "Le fichier $filename n'existe pas.";
            
        }
        //Verifier si la méthode appellée existe
        if (isset($mtd) && $mtd) {
            array_shift($link);
            array_shift($link);

            require_once $filename;
            $classeController=ucfirst(strtolower($ctrl));
            $ctr=new $classeController;
            //Requérir le fichier et creer l'instance
            if (method_exists($ctr, $mtd)) {
                // echo "Methode existe"
                call_user_func_array([$ctr, $mtd], $link);
            } else {
                echo "Page not found";
                
            }
        } else {
            // if (!$ctrl) {
            // }
            $ctrl="contact";
            $mtd='displayContact';
            require_once $filename;
            $classeController=ucfirst(strtolower($ctrl));
            $ctr=new $classeController;
            call_user_func([$ctr, $mtd], []);
            
        }
    }
}
