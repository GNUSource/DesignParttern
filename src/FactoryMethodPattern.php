<?php
/**
 * This is factory method pattern of design pattern
 * 工厂方法模式是一种创建型模式,这种模式使用"工厂"概念来完成对象的创建而不用具体说明这个对象
 * 在OOP中,工厂通常是一个用来创建其他对象的对象,工厂是构造方法的抽象,用来实现不同的分配方案.
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */

class Button{/* ...*/}
class WinButton extends Button{/* ...*/}
class MacButton extends Button{/* ...*/}

interface ButtonFactory{
    public function createButton($type);
}

class MyButtonFactory implements ButtonFactory{
    // 实现工厂方法
    public function createButton($type){
        switch($type){
            case 'Mac':
                return new MacButton();
            case 'Win':
                return new WinButton();
        }
    }
}