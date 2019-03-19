<?php
/**
 * Created by PhpStorm.
 * User: yangjiang
 * Date: 2019/3/19
 * Time: 15:32
 */
//可重用 高内聚 好插入 好修改
abstract class Lession{
    private $_num = 0;
    protected $_strategy = null;

    abstract function getDic();
    abstract function getType();

    public function __construct(int $num, L $strategy)
    {
        $this->_num = $num;
        $this->_strategy = $strategy;
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        $abs = "_".$name;
        return $this->$abs;
    }

    public function getCate()
    {
        // TODO: Implement getCate() method.
        return $this->_strategy->type($this);
    }

    public function getCost()
    {
        // TODO: Implement getCost() method.
        return $this->_strategy->cost($this);
    }
}

class Arts extends Lession{
    private $_type = "文科";
    public function getDic()
    {
        // TODO: Implement getDic() method.
        return 0.8;
    }

    public function getType()
    {
        // TODO: Implement getType() method.
        return $this->_type;
    }


}

class Science extends Lession{
    private $_type = "理科";
    public function getDic()
    {
        // TODO: Implement getDic() method.
        return 0.75;
    }

    public function getType()
    {
        // TODO: Implement getType() method.
        return $this->_type;
    }
}

abstract class L{
    abstract public function cost(Lession $lession);
    abstract public function type(Lession $lession);
}

class English extends L{

    private $price = 8000;
    private $title = "英语";

    public function cost(Lession $lession)
    {
        // TODO: Implement cost() method.
        return "总价格为：".$lession->getDic() * $lession->num * $this->price;
    }

    public function type(Lession $lession)
    {
        // TODO: Implement type() method.
        return "选择的课程是：". $lession->getType().$this->title;
    }
}

class Match extends L{

    private $price = 10000;
    private $title = "数学";

    public function cost(Lession $lession)
    {
        // TODO: Implement cost() method.
        return "总价格为：".$lession->getDic() * $lession->num * $this->price;
    }

    public function type(Lession $lession)
    {
        // TODO: Implement type() method.
        return "选择的课程是：". $lession->getType().$this->title;
    }
}

$english = new Arts(10, new English());
echo $english->getCost();

echo "<hr>";
echo $english->getType();
echo "<hr>";

$match = new Science(10, new Match());

echo $match->getCost();
echo "<hr>";
echo $match->getType();
