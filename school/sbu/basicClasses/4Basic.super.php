<?php

/*
 * Created on 2009-11-12
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
ini_set('date.timezone', 'Asia/Shanghai');
include '2DB_con.php';
class Basic extends Query {

    public $vars;
    public $vars_all;
    public $vars_number;
    protected $col_name;
    protected $error;
    protected $mem;
    protected $child_name;
    protected $error_code = 0;

//    function __constructor() {
//        try {
//            if (empty($this->child_name)) {
//                throw new Exception("wrong child config");
//            }
////            $this->mem =  new Memcache;
////            $this->mem->connect('127.0.0.1', 11211) or die ("Could not connect");
//            parent::__constructor($this->child_name);
//        } catch (Exception $e) {
//            echo $e;
//        }
//    }
    public function __construct() {
        try {
            parent::__constructor($this->child_name);
        } catch (Exception $e) {
            echo $e;
        }
    }

    function getVar() {
        $records = $this->selectQuery();
        if ($records) {
            $this->vars = $records[0];
            $this->vars_all = $records[1];
            $this->vars_number = count($this->vars_all);
        } else {
            $this->vars_number = 0;
        }
    }

    function initialize($condition = null) {
        if ($condition != null) {
            $this->addCondition($condition);
        }
        $this->getVar();
    }

    function overrideCondition($condition) {
        if ($condition != null) {
            $this->addCondition($condition, 1);
        }
    }

    function loadAll() {
        $orderBy[] = array($this->table . '_id' => 'ASC');
        $this->addOrderBy($orderBy);
        $records = $this->selectQuery(2);
        $return_data = array();
        if ($records) {
            foreach ($records as $key => $value) {
                $return_data[$value[$this->table . '_id']] = $value;
            }
        }
        return $return_data;
    }

    function selectObject($condition) {
        $this->clearUp();
        $this->addCondition($condition);
    }

    function showError($message) {
        echo $message;
        exit();
    }

    function changeTable($table) {
        $this->changeDataTable($table);
        $this->clearUp();
    }

    function t($text, $parse_br = false, $quote_style = ENT_NOQUOTES) {
        if (is_numeric($text))
            $text = (string) $text;

        if (!is_string($text))
            return null;

        if (!$parse_br) {
            $text = str_replace(array("\r", "\n", "\t"), ' ', $text);
        } else {
            $text = nl2br($text);
        }

        $text = stripslashes($text);
        $text = htmlspecialchars($text, $quote_style, 'UTF-8');

        return $text;
    }

    function updateVars($update = null) {
        $this->addUpdate($this->vars);
        $this->updateQuery();
    }

    /**
     * 用于更新已经定义了的类属性自动过滤不属于类的数组内element
     * @param <type> $array
     */
    function updateAttributes($array) {
        foreach ($array as $key => $val) {
            if (isset($this->vars[$key])) {
                $this->vars[$key] = $val;
            }
        }
        $this->updateVars();
    }

    public function update($update = null, $mode = 0) {
        parent::addUpdate($update, $mode);
        parent::updateQuery();
    }

    function remove() {
        $this->deleteQuery();
    }

    function insert($insert) {
        $id = $this->insertQuery($insert);
        return $id;
    }

    function getTotalRecord($condition = null) {
        if ($condition != null) {
            $this->selectObject($condition);
        }
        return $this->getRecordRow();
    }

    function setQueryMode($mode) {
        $this->mode = $mode;
    }

    function getColumns() {
        $this->col_name = $this->getTableColumn($this->table);
        return $this->col_name;
    }

    public function setOffset($offset) {
        $this->addOffset($offset, $this->_limit);
    }

    public function setLimit($limit) {

        $this->_limit = $limit;
    }

    /**
     * set limit of class
     * @param <type> $limit
     */
    public function changeLimit($limit) {
        $this->limit = $limit;
    }

    public function totalRow() {
        return $this->getTotalRow();
    }

    /**
     * 用于将var_all的参数转化成数组needle是需要转换的名称，$restrict是大于0的标准
     * @param <type> $needle
     * @param <type> $restrict
     * @return <type> array
     */
    public function varsToArray($needle, $restrict = NULL) {
        $array = array();
        if ($this->vars_all) {
            foreach ($this->vars_all as $purchase) {
                if (!empty($restrict)) {
                    if ($purchase[$restrict] > 0) {
                        $array[] = $purchase[$needle];
                    }
                } else {
                    $array[] = $purchase[$needle];
                }
            }
        }
        return $array;
    }

    /**
     *  使用对象的形式来添加数组
     */
    public function insertObject($object, $tableField) {
        foreach ($tableField as $fieldValue) {
            if (!empty($object->$fieldValue)) {
                $insert[$fieldValue] = $object->$fieldValue;
            }
        }
        $id = $this->insert($insert);
        return $id;
    }

    /**
     * 组装成json  如错误代码 则直接返回错误代码的json
     * 判断传进来的值 是否为数组 如不为数组 则定义数组类型
     * 调用setErrorrCode 函数 判断是否有PHP 错误 如有PHP 错误 则优先把错误代码设置为PHP错误代码
     * 调用getErrorInfo 函数 获取该错误代码的提示内容
     * 返回json
     */
    public function AssemblyJson($jsonArray = null, $type = 0) {
        $logs = apiLog . date("Y-m-d-H-i") . '_value.log';
        if (count($jsonArray) == 0) {
            $jsonArray = array();
        }

        $this->setErrorCode($this->error_code);
        if ($this->error_code != 0) {
            $errorStatus = $this->getErrorInfo($this->error_code);
            $errorObject = new stdClass();
            $errorObject->error_status = $this->error_code;
            $errorObject->status_info = $errorStatus;
            $jsonArray['error'] = $errorObject;
        }
        $jsonArray1 = json_encode($jsonArray);
        log_write($jsonArray1, $logs);
        if ($type == 0) {
            $callback = isset($_GET["callback"]) ? $_GET["callback"] : "callback";
            $jsonArray1 = mb_check_encoding($jsonArray1, 'UTF-8') ? $jsonArray1 : mb_convert_encoding($jsonArray1, 'UTF-8', 'gbk');
            echo $callback . "(" . $jsonArray1 . ")";
            die;
        } else {
            echo $jsonArray1;
            die;
        }
    }

    /**
     * 设定错误代码
     */
    public function setErrorCode($errorCode) {
        /**
         * 判断是否有PHP错误
         */
        if (count(error_get_last()) > 0) {
            $this->error_code = 100;
        } else {
            $this->error_code = $errorCode;
        }
    }

    /**
     * 获取错误代码表达的内容
     */
    public function getErrorInfo() {
        $errorListArray = include ROOT_DIR . 'Config/bootstrap/error_list.php';
        if (!empty($errorListArray[$this->error_code])) {
            return $errorListArray[$this->error_code];
        }
    }

    function page_2($table, $page, $pagesize, $modelName, $where = 1, $orderby = 1) {
        $$table = new $table();
        $$table->addCondition($where, 1);
        if ($orderby != 1) {
            $$table->addOrderBy($orderby);
        }

        $$table->initialize();
        $Page_size = $pagesize;
        $init = 1;
        $page_len = 6;
        $count = $$table->vars_number;
        $page_count = ceil($count / $Page_size);

        $max_p = $page_count;
        $pages = $page_count;
        if (empty($page) || $page < 0) {  //判断传送的页码
            $page = 1;
        } else {
            
        }
        $offset = $Page_size * ($page - 1);
        $$table->addCondition($where, 1);
        $$table->addOffset($offset, $Page_size);
        $$table->initialize();
        $array['data'] = $$table->vars_all;
        $page_len = ($page_len % 2) ? $page_len : $page_len + 1; //页码个数
        $pageoffset = ($page_len - 1) / 2; //页码个数左右偏移量
        if ($page_count != 1) {
            $key1 = '<div class="pageWarp">';
//        $key1.="<span>$page/$pages</span>&nbsp;";    //第几页,共几页
//        if ($page != 1) {
//            $key1.="&nbsp;&nbsp;<a href=\"" . $php . "?page=1&" . $str . "\">首页</a> ";     //第一页
//            $key1.="&nbsp;&nbsp;<a href=\"" . $php . "?page=" . ($page - 1) . "&" . $str . "\">上一页</a>"; //上一页
//        } else {
//            $key1.="&nbsp;&nbsp;首页 "; //第一页
//            $key1.="&nbsp;&nbsp;上一页"; //上一页
//        }
            if ($pages > $page_len) {//如果当前页小于等于左偏移
                if ($page <= $pageoffset) {
                    $init = 1;
                    $max_p = $page_len;
                } else {//如果当前页大于左偏移/如果当前页码右偏移超出最大分页数
                    if ($page + $pageoffset >= $pages + 1) {
                        $init = $pages - $page_len + 1;
                    } else {//左右偏移都存在时的计算
                        $init = $page - $pageoffset;
                        $max_p = $page + $pageoffset;
                    }
                }
            }
            for ($i = $init; $i <= $max_p; $i++) {
                if ($i == $page) {
                    $key1.=' <a class="pageStyle1">' . $i . '</a>';
                } else {
                    $key1.='<a class="pageStyle2" href="javascript:void(0)" onclick="dataPage(' . $i . ',\'' . $modelName . '\')">' . $i . '</a>';
                }
            }

//        if ($page != $pages) {
//            $key1.=" &nbsp;&nbsp;<a href=" . $php . "?page=" . ($page + 1) . "&" . $str . ">下一页</a> "; //下一页
//            $key1.="&nbsp;&nbsp;<a href=" . $php . "?page={$pages}&" . $str . ">最后一页</a>"; //最后一页
//        } else {
//            $key1.="&nbsp;&nbsp;下一页 "; //下一页
//            $key1.="&nbsp;&nbsp;最后一页"; //最后一页
//        }
            $key1.='</div>';
        } else{
            $key1 = '';
        }

        $array['key'] = $key1;
        return $array;
    }

}

?>
