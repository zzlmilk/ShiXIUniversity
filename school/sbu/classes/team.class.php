<?php

class team extends Basic {

    function team($id=null) {
        $this->child_name = strtolower(__CLASS__);
        parent::__constructor($this->child_name);
        if ($id) {
            $obj[ 'team_id'] = $id;
            $this->initialize($obj);
        }
    }
}

?>