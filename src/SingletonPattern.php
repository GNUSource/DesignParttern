<?php
/**
 * Singleton Pattern(单例模式)
 *
 * @author hkf <876946649@qq.com>
 * @version 0.1.0
 */

/**
 * Class Singleton
 * 一个类能够返回对象的一个引用(永远都是同一个)和获得该实例的方法
 * (必须是静态方法,通常使用getInstance这个名称)
 */
class Singleton
{
    private static $_instance = NULL;

    //  私有构造方法
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Singleton();
        }
        return self::$_instance;
    }

    //  防止克隆实例
    public function __clone()
    {
        die('Clone is not allowed.' . E_USER_ERROR);
    }
}