<?php

class news_all extends Basic {

    function news_all($id=null) {
        $this->child_name = strtolower(__CLASS__);
        parent::__constructor($this->child_name);
        if ($id) {
            $obj[ 'news_id'] = $id;
            $this->initialize($obj);
        }
    }
    
    function getNewsByNew(){
        $this->clearUp();
        $this->addOrderBy('news_time DESC');
        $this->randOffset(5);
        $this->initialize();
        
        return $this->vars_all;
    }

}

?>