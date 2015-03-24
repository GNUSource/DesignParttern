<?php
/**
 * This is proxy pattern of design pattern
 * 代理模式是一种结构型模式,它可以为其他对象提供一种代理以控制对这个对象的访问
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */

/**
 * Class Subject
 * 抽象主题角色,定义统一的接口
 */
abstract class Subject
{
    abstract public function action();
}

/**
 * Class RealSubject
 * 真实主题角色
 */
class RealSubject extends Subject
{
    public function __construct()
    {
    }

    public function action()
    {
    }
}

/**
 * Class ProxySubject
 * 代理主题角色
 */
class ProxySubject extends Subject
{
    private $_real_subject = NULL;

    public function __construct()
    {
    }

    public function action()
    {
        $this->_beforeAction();
        if (is_null($this->_real_subject)) {
            $this->_real_subject = new RealSubject();
        }
        $this->_real_subject->action();
        $this->_afterAction();
    }

    private function _beforeAction()
    {
    }

    private function _afterAction()
    {
    }
}

// client
$subject = new ProxySubject();
$subject->action();