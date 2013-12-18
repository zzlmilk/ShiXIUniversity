<?php

class aboutController extends BaseController {

    protected $templateFile = "index";
    private $modelName = 'about';

    function __construct($smarty, $function = 'index') {
        parent::__construct($smarty, URLController, $this->modelName);
        $this->setDirTemplates('');
        $this->$function();
    }

    public function about() {
        $this->urlView();
        $this->setTemplate('homePage');
        $this->setCssName(__FUNCTION__);
        $this->display();
    }

    public function left() {
        $this->setDirTemplates($this->modelName);
        $this->setBaseTemplate(__FUNCTION__);
        $output = $this->fetch();
        $this->assign('left', $output);
    }

    public function right() {
        $this->setDirTemplates($this->modelName);
        $this->setBaseTemplate(__FUNCTION__);
        $output = $this->fetch();
        $this->assign('right', $output);
    }

    public function right1() {
        $this->setDirTemplates($this->modelName);
        $this->setBaseTemplate(__FUNCTION__);
        $output = $this->fetch();
        $this->assign('right', $output);
    }

}

?>
