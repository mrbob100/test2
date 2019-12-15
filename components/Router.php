<?php
/**
 * Created by PhpStorm.
 * User: vladymir
 * Date: 05.12.19
 * Time: 13:07
 */
class Router
{

    private $routes;
    public $pattern;

    public function __construct()
    {
   $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);

    }

// Return type

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    public function run()
    {
        $uri = $this->getURI();
        $this->pattern = "/option/";
        $result=preg_match($this->pattern, $uri);
        if ($result) {

            $urioff=explode('=',$uri);
            $uri=$urioff[1];
        }

        foreach ($this->routes as $uriPattern => $path) {

            if(preg_match("~$uriPattern~", $uri)) {

                /*				echo "<br>Где ищем (запрос, который набрал пользователь): ".$uri;
                                echo "<br>Что ищем (совпадение из правила): ".$uriPattern;
                                echo "<br>Кто обрабатывает: ".$path; */

                // Получаем внутренний путь из внешнего согласно правилу.

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                /*				echo '<br>Нужно сформулировать: '.$internalRoute.'<br>'; */

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);


                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;


                $controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                /*$result = $controllerObject->$actionName($parameters); - OLD VERSION */
                /*$result = call_user_func(array($controllerObject, $actionName), $parameters);*/
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }

        }
    }
}