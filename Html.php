<?php

namespace Nagata;

class Html {

    protected $routes;
    protected $request;
    public $styles = [];
    public $scripts = [];

    public function __construct($container) {
        $this->routes = $container->get('router');
        $this->request = $container->get('request');
        $this->base_url = $this->request->getUri()->getBaseUrl();
    }

    public function addStyles($uri) {
        if (is_array($uri)) {
            foreach ($uri as $uri2) {
                $this->addStyles($uri2);
            }
        } elseif (!in_array($uri, $this->styles)) {
            $this->styles[] = $uri;
        }
    }

    /* show css */

    public function css() {
        $_css_html = '';
        foreach ($this->styles as $css) {
            if (preg_match('(http|https)', $css)) {
                $_css_html .= '<link href = "' . $css . '" rel = "stylesheet" type = "text/css" />';
            } else {
                $_css_html .= '<link href = "css/' . $css . '.css" rel = "stylesheet" type = "text/css" />';
            }
        }
        echo $_css_html;
    }

    /* Stylesheet javascript add */

    public function addScripts($uri) {
        if (is_array($uri)) {
            foreach ($uri as $uri2) {
                $this->addScripts($uri2);
            }
        } elseif (!in_array($uri, $this->scripts)) {
            $this->scripts[] = $uri;
        }
    }

    /* show css */

    public function js() {
        $_js_html = '';
        foreach ($this->scripts as $js) {
            if (preg_match('(http|https)', $js)) {
                $_js_html .= '<script src = "' . $js . '"></script>';
            }else {
                $_js_html .= '<script src = "js/' . $js . '.js"></script>';
            }
        }
        echo $_js_html;
    }

    //set template

    public function pathFor($route_name, $array = [], $args = []) {
        return $this->routes->pathFor($route_name, $array, $args);
    }

    public function image($img, $class = "") {
        return '<img src = "img/' . $img . '" class = "' . $class . '"/>';
    }

    public function confirm_link($id, $url) {
        return '<form action="' . $url . '" method="POST" onsubmit="return confirm(\'Deseja mesmo excluir o registro?\')" >'
                . "<input type='hidden' name='id' value='" . $id . "'/>"
                . "<button class='btn-flat' type='submit'><i class='material-icons'>delete</i></button>"
                . "</form>";
    }

}
