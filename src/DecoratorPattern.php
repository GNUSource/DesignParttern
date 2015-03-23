<?php
/**
 * This is decoration pattern of design pattern
 * 装饰模式是以对客户透明的方式动态地给一个对象附加上更多的职责
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */

/**
 * Interface Components
 * 抽象构建角色,定义公共行为
 */
interface Components
{
    public function operation();
}

/**
 * Class ConcreteComponent
 * 具体构建角色,定义一个将要接受附加职责的类
 */
class ConcreteComponent implements Components
{
    public function operation()
    {

    }
}

/**
 * Class Decorator
 * 装饰角色
 */
class Decorator implements Components
{
    protected $_component;

    public function __construct(Components $component)
    {
        $this->_component = $component;
    }

    public function operation()
    {
        $this->_component->operation();
    }
}

/**
 * Class ConcreteDecoratorA
 * 具体装饰类
 */
class ConcreteDecoratorA extends Decorator
{
    public function __construct(Components $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        $this->addOperationA();
    }

    public function addOperationA() {}
}

/**
 * Class ConcreteDecoratorB
 * 具体装饰类B
 */
class ConcreteDecoratorB extends Decorator
{
    public function __construct(Components $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        $this->addOperationB();
    }

    public function addOperationB() {}
}

$component = new ConcreteComponent();
$decoratorA = new ConcreteDecoratorA($component);
$decoratorB = new ConcreteDecoratorB($decoratorA);

$decoratorA->operation();
$decoratorB->operation();