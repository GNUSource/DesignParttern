<?php
/**
 * This is bridge pattern of design pattern
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */

/**
 * Class Abstraction
 * 抽象化角色,抽象化给出的定义,并保存一个对实现化对象的引用
 */
abstract class Abstraction
{
    protected $imp;
    public function operationImp()
    {
        $this->imp->operationImp();
    }
}

/**
 * Class RefinedAbstraction
 * 修正抽象化角色,扩展抽象化角色,改变和修正父类对抽象化的定义
 */
class RefinedAbstraction extends Abstraction
{
    public function __construct(Implementor $imp)
    {
        $this->imp = $imp;
    }

    public function operation()
    {
        $this->imp->operationImp();
    }
}

/**
 * Class Implementor
 * 实现化角色, 给出实现化角色的接口，但不给出具体的实现。
 */
abstract class Implementor
{
    abstract public function operationImp();
}

/**
 * Class ConcreteImplementorA
 * 具体化角色A
 */
class ConcreteImplementorA extends Implementor
{
    public function operationImp() {}
}

/**
 * Class ConcreteImplementorB
 * 具体化角色B
 */
class ConcreteImplementorB extends Implementor
{
    public function operationImp() {}
}

//  client
$abstraction = new RefinedAbstraction(new ConcreteImplementorA());
$abstraction->operation();

$abstraction = new RefinedAbstraction(new ConcreteImplementorB());
$abstraction->operation();