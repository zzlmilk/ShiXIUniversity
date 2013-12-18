<?php

class BaseController {

    protected $templateTool;
    private $url;
    private $array = array('left'); //该模块下 右侧界面
    private $modelName = '';

    public function __construct($templateTool, $url, $model) {
        $this->templateTool = $templateTool;
        $this->templateFile = $this->templateFile . '.tpl';
        $this->url = $url . 'pageredirst.php?action=' . $model . '&functionname=';
        $this->modelName = $model;
        if (!empty($_REQUEST['rightName'])) {
            array_push($this->array, $_REQUEST['rightName']);
        } else {
            array_push($this->array, 'right');
        }
    }

    public function display() {
        $this->templateTool->display($this->templateFile);
    }
    public function fetch(){
        $output = $this->templateTool->fetch($this->templateFile);
        return $output;
    }

    public function setDirTemplates($dirName) {
        if ($dirName != '') {
            $this->templateTool->template_dir = FOOT . 'templates/' . $dirName . '/';
        } else {
            $this->templateTool->template_dir = FOOT . 'templates/';
        }
    }

    public function getTemplateFile() {
        return $this->templateFile;
    }

    public function assign($name, $value) {
        $this->templateTool->assign($name, $value);
    }

    public function setBaseTemplate($templateFile) {
        $this->templateFile = $templateFile . '.tpl';
        $this->setCssName($templateFile);
    }

    public function setTemplate($templateFile) {
        if($templateFile == 'homePage'){
            $this->setDirTemplates('');
        }
        $this->templateFile = $templateFile . '.tpl';
    }

    public function setCssName($functioname) {
        $this->assign('__FUNCTION__', $functioname);
    }

    public function jsJump($url, $msg) {
        if ($url == -1) {
            exit('<script>alert("' . $msg . '");history.go(-1);</script>');
        }
        else
            exit('<script>alert("' . $msg . '");window.location.href="' . $url . '";</script>');
    }

    public function urlView() {
        $action = $this->modelName. 'Controller';
        if (count($this->array) > 0 && is_array($this->array)) {
            foreach ($this->array as  $vdata) {
               // $url = $this->url . $vdata;
               $pageController = new $action($this->templateTool, $vdata);
                //$result = $this->urlReturnResult($url);
//                if ($kdata == 0) {
//                    $name = 'left';
//                } else {
//                    $name = 'right';
//                }
//                $this->assign($name, $result);
            }
        }
    }

    public function urlReturnResult($url, $data = '') {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $msg = curl_exec($ch);
        curl_close($ch);
        return $msg;
    }

}

?>