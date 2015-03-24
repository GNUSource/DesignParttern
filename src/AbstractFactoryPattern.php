<?php
/**
 * This is abstract factory pattern of design pattern
 * 抽象工厂模式提供一个创建一系列相关或相互依赖对象的接口,而无需指定它们具体的类
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */
class Button{}
class Border{}
class MacButton extends Button{}
class WinButton extends Button{}
class MacBorder extends Border{}
class WinBorder extends Border{}

interface AbstractFactory {
    public function CreateButton();
    public function CreateBorder();
}

class MacFactory implements AbstractFactory{
    public function CreateButton(){ return new MacButton(); }
    public function CreateBorder(){ return new MacBorder(); }
}
class WinFactory implements AbstractFactory{
    public function CreateButton(){ return new WinButton(); }
    public function CreateBorder(){ return new WinBorder(); }
}