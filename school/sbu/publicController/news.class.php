<?php

class newsController extends BaseController {

    protected $templateFile = "index";
    private $modelName = 'news';

    function __construct($smarty, $function = 'index') {
        parent::__construct($smarty, URLController, $this->modelName);
        $this->setDirTemplates('');
        $this->$function();
    }

    public function news() {
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
        if (!empty($_REQUEST['page']) && $_REQUEST['page'] > 0) {
            $page = $_REQUEST['page'];
        } else {
            $page = 1;
        }
        $news_all = new news_all();
        $result = $news_all->page_2('news_all', $page, 3,'news');
        $this->assign('news', $result['data']);
        $this->assign('newsPage', $result['key']);
        $this->setDirTemplates($this->modelName);
        $this->setBaseTemplate(__FUNCTION__);
        $output = $this->fetch();
        $this->assign('right', $output);
    }

    public function rightDetail() {
        if ($_REQUEST['news_id'] > 0) {
            $news_all = new news_all($_REQUEST['news_id']);
            $this->assign('vo', $news_all->vars);
        }
        $this->setDirTemplates('detail');
        $this->setBaseTemplate('right');
        $output = $this->fetch();
        $this->assign('right', $output);
    }

}

?>
