<?php

class homePageController extends BaseController {

    protected $templateFile = "index";
    private $array = array('left', 'right');
    private $modelName = 'homePage';

    function __construct($smarty, $function = 'index') {
        parent::__construct($smarty, URLController, $this->modelName);
        $this->$function();
    }

    function index() {
        $this->setBaseTemplate(__FUNCTION__);
        $this->display();
    }

    function homePage() {
        $this->urlView($this->array);
        $this->setBaseTemplate(__FUNCTION__);
        $this->setDirTemplates('');
        $this->display();
    }

    function left() {
        $this->setDirTemplates('homePage');
        $this->setBaseTemplate(__FUNCTION__);
        $this->assign('state', rand(0, 1));
        $output = $this->fetch();
        $this->assign('left', $output);
    }

    function right() {
        $this->setDirTemplates('homePage');
        $this->setBaseTemplate(__FUNCTION__);
        $output1 = $this->fetch();
        $this->assign('right', $output1);
    }

}

?>