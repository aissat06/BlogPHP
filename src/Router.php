<?php
namespace App;

use AltoRouter;

class Router {
    
    /**
     * viewPath
     *
     * @var String
     */
    private $viewPath;    
    /**
     * router
     *
     * @var AltoRouter
     */
    private $router;

    public function __construct(String $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new AltoRouter();
    }

    public function get(String $url, String $view, ?String $name = null) :self{
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    public function run(): self{
        // on demande a AltoRouter s'il y a une correspondance entre l'url et une route qui est enregistré
        $match = $this->router->match();
        $view = $match['target'];
        // dd($view); //la suite de path (ex:post/index)

        //Enclenche la temporisation de sortie(arrete l'affichage de contenu et le mettre dans la memoire tampon)
        ob_start();
        require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
        $content = ob_get_clean();
        require $this->viewPath . DIRECTORY_SEPARATOR . 'layouts/default.php';
        return $this;
    }
}