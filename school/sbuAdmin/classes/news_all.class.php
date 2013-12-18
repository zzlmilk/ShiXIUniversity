<?php

class news_all extends Basic {

    function news_all($id=null) {
        $this->child_name = strtolower(__CLASS__);
        $this->dbname = 'sbu';
        parent::__constructor($this->child_name);
        if ($id) {
            $obj['news_id'] = $id;
            $this->initialize($obj);
        }
    }

}

?>