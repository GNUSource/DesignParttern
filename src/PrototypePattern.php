<?php
/**
 * This is prototype pattern of design pattern
 * 原型模式是一种创建者模式,其特点在于通过"复制"一个已经存在的实例来返回新的实例,而不是新建实例
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */

/**
 * Interface Prototype
 * 抽象原型接口,申明一个克隆自己的接口
 */
interface Prototype
{
    public function copy();
}

/**
 * Class ConcretePrototype
 * 具体原型,实现一个克隆自己的操作
 */
class ConcretePrototype implements Prototype
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function copy()
    {
        return clone $this;
    }

    public function __toString()
    {
        return $this->_name . '';
    }
}

class Demo
{
    /**
     * @var int $index 标记已经创建了多少个实例
     */
    static $index = 0;

    /**
     *
     * Class construct
     */
    public function __construct()
    {
        self::$index++;
    }

    public function __toString()
    {
        return '我是第' . self::$index . '个实例.';;
    }
}

// client
$demo = new Demo();
$object1 = new ConcretePrototype($demo);
$object2 = $object1->copy();
echo $object1 . PHP_EOL . $object2;
