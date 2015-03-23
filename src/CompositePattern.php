<?php
/**
 * This is composite pattern of design pattern
 * 合成模式是一种结构型模式,它将对象组合成树形结构以表示"部分-整体"的层次结构。
 * Composite使用户对单个对象和组合对象的使用具有一致性。
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */

/**
 * Interface Component
 * 抽象角色,给参加组合的对象规定一个接口,实现所有类共有接口的缺省行为.
 */
interface Component
{
    /**
     * 返回自己的实例
     *
     * @return mixed
     */
    public function getComposite();
    public function operation();
}

/**
 * Class Composite
 * 树叶组件角色
 */
class Composite implements Component
{
    private $_composites;
    public function __construct()
    {
        $this->_composites = [];
    }

    public function getComposite()
    {
        return $this;
    }

    public function operation()
    {
        foreach($this->_composites as $composite) {
            $composite->operation();
        }
    }

    public function add(Component $component)
    {
        $this->_composites[] = $component;
    }

    public function remove(Component $component)
    {
        foreach($this->_composites as $key => $composite) {
            if ($component == $composite) {
                unset($this->_composites[$key]);
            }
        }
        array_values($this->_composites);
    }
}

/**
 * Class Leaf
 * 叶子角色
 */
class Leaf implements Component
{
    private $_name;
    public function __comstruct($name)
    {
        $this->_name = $name;
    }

    public function operation() {}

    public function getComposite()
    {
        return null;
    }
}

//  client
$leaf1 = new Leaf('first');
$leaf2 = new Leaf('second');

$composite = new Composite();
$composite->add($leaf1);
$composite->add($leaf2);
$composite->operation();