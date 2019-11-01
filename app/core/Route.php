<?php

namespace core;

class Route {

    /**
     * routing /controller/action
     */
    static public function init() {
        $controllerName = 'main'; //это значение останется в переменной если не произойдет перезапись
        $actionName = 'index'; //это значение останется в переменной если не произойдет перезапись
        $routeItems = explode('/', $_SERVER['REQUEST_URI']); //забирем дополнительный путь документа в домене и разделяем его на список
        array_shift($routeItems); //0-й элемент всегда содержит пустую строку поэтому удаляем его 
        //проверяем последний элемент массива на пустое значение
        //при необходимости удалем его

        if (empty($routeItems[count($routeItems) - 1])) {
            array_pop($routeItems);
        }
        //если в массиве больше двух элементов ,то 404
        if (count($routeItems) > 2) {
            self::error404();
        }

        if (!empty($routeItems[0])) {
            //$controllerName = mb_strtolower(urldecode($routeItems[0]));//для кириллицы
            $controllerName = strtolower($routeItems[0]);
        }
        if (!empty($routeItems[1])) {
            //$actionName = mb_strtolower(urldecode($routeItems[1]));//для кириллицы
            $actionName = strtolower($routeItems[1]);
        }
        //$controllerClassName = mb_convert_case($controllerName, MB_CASE_TITLE);//для кириллицы
        $controllerClassName = 'controllers\\' . ucfirst($controllerName) . 'Controller';
        if (!class_exists($controllerClassName)) {
            self::error404();
        }
        $controller = new $controllerClassName();
        if (!method_exists($controller, $actionName)) {
            self::error404();
        }
        $controller->$actionName();
    }

    static public function error404() {
        //TODO нормальная реализация
        function userValidate($user) {
    $errors = [];
    if (strlen($user['login']) < 6) {
        $errors[] = ('Too short login value');
    }
    if ($user['pass'] !== $user['pass_conf']) {
        $errors[] = 'Password do not match';
    } else if (strlen($user['pass']) < 6) {
        $errors[] = 'Too short password value';
    }
    if (empty($user['email'])) {
        $errors[] = 'Email is required field';
    }
    if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Incorrect email value';
    }
    return $errors;
        }
        http_response_code(404);
        $view = new View();
        $view->render('error_404_view');
        exit();
    }

    static public function redirect(string $url) {
        header('Location:'.$url);
    }

}
