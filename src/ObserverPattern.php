<?php
/**
 * This is observer pattern of design pattern
 * 观察者模式是一种行为型模式,它定义对象间的一种一对多的依赖关系,
 * 当一个对象的状态发生改变时,所有依赖于它的对象得到通知并自动更新
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */

/**
 * Interface Subject
 * 抽象主题角色
 */
interface Subject
{
    public function attach(Observer $observer); // 增加一个新的观察者对象

    public function detach(Observer $observer); // 删除一个已注册过的观察者对象

    public function notifyObservers(); // 通知所有注册过的观察者对象
}

/**
 * Class ConcreteSubject
 * 具体主题角色
 */
class ConcreteSubject implements Subject
{
    private $_observers;

    public function __construct()
    {
        $this->_observers = array();
    }

    public function attach(Observer $observer)
    {
        return array_push($this->_observers, $observer);
    }

    public function detach(Observer $observer)
    {
        $index = array_search($observer, $this->_observers);
        if ($index === FALSE || !array_key_exists($index, $this->_observers)) {
            return FALSE;
        }
        unset($this->_observers[$index]);
        return TRUE;
    }

    public function notifyObservers()
    {
        if (!is_array($this->_observers)) {
            return FALSE;
        }
        foreach ($this->_observers as $observer) {
            $observer->update();
        }
        return TRUE;
    }

}

/**
 * Interface Observer
 * 抽象观察者角色
 */
interface Observer
{
    public function update(); // 更新方法
}

/**
 * Class ConcreteObserver
 * 具体观察者角色
 */
class ConcreteObserver implements Observer
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function update()
    {
    }
}

$subject = new ConcreteSubject();

/* 添加第一个观察者 */
$observer1 = new ConcreteObserver('Mac');
$subject->attach($observer1);
$subject->notifyObservers(); // 主题变化，通知观察者

/* 添加第二个观察者 */
$observer2 = new ConcreteObserver('Win');
$subject->attach($observer2);
$subject->notifyObservers();

$subject->detach($observer1);
$subject->notifyObservers();