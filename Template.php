<?php

namespace Nagata;

use Nagata\Text;
use Nagata\Html;

class Template {

    protected $template_path;
    protected $layout_path;
    protected $root_path;
    protected $layout;
    protected $template;
    public $Html;
    public $Text;

    public function __construct($container) {
        $this->root_path = $container['settings']['app_path'];
        $this->setLayoutPath($container['settings']['layout_path']);
        $this->setTemplatePath($container['settings']['template_path']);
        $this->layout();
        $this->Html = new Html($container);
        $this->Text = new Text();
    }

    public function setLayoutPath($path) {
        $this->layout_path = $path . DIRECTORY_SEPARATOR;
    }

    public function setTemplatePath($path) {
        $this->template_path = $this->template_path . $path . DIRECTORY_SEPARATOR;
    }

    //set layout
    public function layout($layout = 'default') {
        $this->layout = $layout;
    }

    //set variables
    public function set($key, $value) {
        $this->values[$key] = $value;
    }

    public function render($template) {
        $templatePath = $this->template_path . ltrim($template . ".phtml", DS);
        if (!file_exists($templatePath)) {
            die('Não foi possível encontrar o template ' . $templatePath . '.');
        }
        @extract($this->values);
        ob_start();
        require $templatePath;
        $html = ob_get_clean();
        echo $this->_render_layout($html);
    }

    public function _render_layout($_content) {
        @extract($this->values);
        $layout_path = $this->layout_path . ltrim($this->layout . '.phtml', DS);
        if ($this->layout !== null) {
            if (!file_exists($layout_path)) {
                die('Não foi possível encontrar o layout ' . $templatePath . '.');
            }
            ob_start();
            require $layout_path;
            $_content = ob_get_clean();
        }
        return $_content;
    }

}
