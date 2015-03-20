<?php
/**
 * This is builder pattern of software design pattern
 * 建造者模式可以很好的将一个对象的实现与相关的“业务”逻辑分离开来，
 * 从而可以在不改变事件逻辑的前提下，使增加(或改变)实现变得非常容易。
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */

/**
 * 产品类
 *
 * Class Product
 */
class Product
{
    /**
     *
     * @var array
     */
    private $_parts;

    /**
     * Class construct
     */
    public function __construct()
    {
        $this->_parts = array();
    }

    public function add($part)
    {
        return array_push($this->_parts, $part);
    }
}

/**
 * 抽象建造者
 * Builder角色：定义抽象接口(定义通用功能)
 *
 * Class Builder
 */
abstract class Builder
{
    public abstract function buildPart1();

    public abstract function buildPart2();

    public abstract function getResult();
}

/**
 * 具体建造者
 * Concrete角色：实现抽象建造者接口,创建产品(定义某产品具有的所有功能)
 *
 * Class ConcreteBuilder
 */
class ConcreteBuilder extends Builder
{
    private $_product;

    public function __construct()
    {
        $this->_product = new Product();
    }

    public function buildPart1()
    {
        $this->_product->add("Part1");
    }

    public function buildPart2()
    {
        $this->_product->add("Part2");
    }

    public function getResult()
    {
        return $this->_product;
    }
}

/**
 * 导演者
 * Director角色：调用具体建造者生产产品(定义某产品最终具有的功能)
 *
 * Class Director
 */
class Director
{
    /**
     * Class construct
     * 调用具体Builder类,来生产Product并决定Product所具有的"业务"
     *
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $builder->buildPart1();
        $builder->buildPart2();
    }
}

// client
$buidler = new ConcreteBuilder();
$director = new Director($buidler);
$product = $buidler->getResult();
var_dump($product);
?>