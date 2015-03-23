<?php
/**
 * This is adapter pattern of design pattern
 * 适配器模式是一种结构型模式,它将一个类的接口转接成用户所期待的.
 * 一个适配器使得因接口不兼容而不能在一起工作的类工作在一起,做法是将类别自己的接口包裹在一个已存在的类中
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */

/**
 * Interface Target
 * 目标接口
 */
interface Target
{
    public function sampleMethod1();
    public function sampleMethod2();
}

/**
 * Class Adaptee
 * 源角色
 */
class Adaptee
{
    public function sampleMethod1()
    {
        return 'this is method1 of adatee';
    }
}

class Adapter extends Adaptee implements Target
{
    private $_adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->_adaptee = $adaptee;
    }

    public function sampleMethod1()
    {
        return $this->_adaptee->sampleMethod1();
    }

    public function sampleMethod2()
    {
        return 'this is method2 of adapter';
    }
}

$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);
echo $adapter->sampleMethod1();
echo $adapter->sampleMethod2();
