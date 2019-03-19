<?php
/**
 * Created by PhpStorm.
 * User: yangjiang
 * Date: 2019/3/19
 * Time: 17:56
 */
abstract class Lession{
    protected $_num = 0;

    public function __construct(int $num)
    {
        $this->_num = $num;
    }

    abstract public function getCost();
    abstract public function getType();
}

abstract class Arts extends Lession{
    protected $dis = 0.8;
    protected $title = "文科";
}

abstract class Science extends Lession{
    protected $dis = 0.7;
    protected $title = "理科";
}

//文科英语
class EnglishArts extends Arts{

    public function getCost(){

    }

    public function getType(){

    }
}

//理科英语
class EnglishScience extends Arts{

    public function getCost(){

    }

    public function getType(){

    }
}