<?php

class View
{

    protected $_head, $_body, $_footer, $_outputBuffer, $_layout = DEFAULT_LAYOUT;

    public function __construct()
    {
    }

    public function render($viewName, $data = null)
    {
        $viewArray = explode('/', $viewName);
        $viewString = implode(DS, $viewArray);
        if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
            if (!empty($data)) {
                extract($data);
            }
            include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
            include(ROOT . DS . 'app' . DS . 'views' . DS . 'layout' . DS . $this->_layout . '.php');
        } else {
            die('The view does not exist');
        }
    }

    public function content($type)
    {
        if ($type === 'head') {
            return $this->_head;
        }
        if ($type === 'body') {
            return $this->_body;
        }
        if ($type === 'footer') {
            return $this->_footer;
        }
        return false;
    }

    public function start($type)
    {
        $this->_outputBuffer = $type;
        ob_start();
    }

    public function end()
    {
        if ($this->_outputBuffer == 'head') {
            $this->_head = ob_get_clean();
        } elseif ($this->_outputBuffer == 'body') {
            $this->_body = ob_get_clean();
        } elseif ($this->_outputBuffer == 'footer') {
            $this->_footer = ob_get_clean();
        } else {
            die('You must first run the start method');
        }
    }

    public function setLayout($path)
    {
        $this->_layout = $path;
    }
}
