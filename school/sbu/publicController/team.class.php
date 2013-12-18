<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Team
 *
 * @author Administrator
 */
class teamController extends BaseController {

    //put your code here


    protected $templateFile = "index";
    private $modelName = 'team';

    function __construct($smarty, $function = 'index') {
        parent::__construct($smarty, URLController, $this->modelName);
        $this->setDirTemplates("");
        $this->$function();
    }

    public function team() {
        /**
         * 获取about 右侧和左侧的页面
         */
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
    public function left1() {
        $this->setDirTemplates($this->modelName);
        $this->setBaseTemplate(__FUNCTION__);
        $output = $this->fetch();
        $this->assign('left', $output);
    }

    public function right() {


        if (!empty($_REQUEST['page']) && $_REQUEST['page'] > 0) {
            $page = $_REQUEST['page'];
        } else {
            $page = 1;
        }
        $news_all = new news_all();
        $result = $news_all->page_2('team', $page, 8, 'team');
        $this->assign('team', $result['data']);
        $this->assign('teamPage', $result['key']);

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
        public function right2() {
        $this->setDirTemplates($this->modelName);
        $this->setBaseTemplate(__FUNCTION__);
        $output = $this->fetch();
        $this->assign('right', $output);
    }

    public function details() {
        if ($_REQUEST['team_id'] > 0) {
            $team = new team($_REQUEST['team_id']);
            $this->assign('vo', $team->vars);
        }

        $this->setDirTemplates($this->modelName);
        $this->setBaseTemplate(__FUNCTION__);
        $output = $this->fetch();
        $this->assign('right', $output);
    }

}

?>
