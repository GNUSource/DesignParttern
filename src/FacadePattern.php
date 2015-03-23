<?php
/**
 * This is facade pattern of design pattern
 * 门面模式是一种结构型模式,它为子系统中的一组接口提供一个一致的界面
 * facade pattern模式定义了一个高层次的接口,使得子系统更加容易使用
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */
//  ======================================================
#   门面角色(Facade)
#       此角色将被客户端调用
#       知道哪些子系统负责处理请求
#       将用户的请求指派给适当的子系统
#   子系统角色(subSystem)
#       实现子系统的功能
#       处理由Facade对象指派的任务
#       没有Facade的相关信息,可以被客户端直接调用
//  ======================================================
class Camera {
    public function turnOn() {}
    public function turnOff() {}
    public function rotate($degrees) {}
}

class Light {
    public function turnOn() {}
    public function turnOff() {}
    public function changeBulb() {}
}

class Sensor {
    public function activate() {}
    public function deactivate() {}
    public function trigger() {}
}

class Alarm {
    public function activate() {}
    public function deactivate() {}
    public function ring() {}
    public function stopRing() {}
}

class SecurityFacade {
    private $_camera1, $_camera2;
    private $_light1, $_light2, $_light3;
    private $_sensor;
    private $_alarm;

    public function __construct() {
        $this->_camera1 = new Camera();
        $this->_camera2 = new Camera();

        $this->_light1 = new Light();
        $this->_light2 = new Light();
        $this->_light3 = new Light();

        $this->_sensor = new Sensor();
        $this->_alarm = new Alarm();
    }

    public function activate() {
        $this->_camera1->turnOn();
        $this->_camera2->turnOn();

        $this->_light1->turnOn();
        $this->_light2->turnOn();
        $this->_light3->turnOn();

        $this->_sensor->activate();
        $this->_alarm->activate();
    }

    public  function deactivate() {
        $this->_camera1->turnOff();
        $this->_camera2->turnOff();

        $this->_light1->turnOff();
        $this->_light2->turnOff();
        $this->_light3->turnOff();

        $this->_sensor->deactivate();
        $this->_alarm->deactivate();
    }
}

//  client
$security = new SecurityFacade();
$security->activate();
