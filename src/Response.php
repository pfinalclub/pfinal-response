<?php
/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2019/3/11
 * Time: 10:45
 *
 *
 *                      _ooOoo_
 *                     o8888888o
 *                     88" . "88
 *                     (| ^_^ |)
 *                     O\  =  /O
 *                  ____/`---'\____
 *                .'  \\|     |//  `.
 *               /  \\|||  :  |||//  \
 *              /  _||||| -:- |||||-  \
 *              |   | \\\  -  /// |   |
 *              | \_|  ''\---/''  |   |
 *              \  .-\__  `-`  ___/-. /
 *            ___`. .'  /--.--\  `. . ___
 *          ."" '<  `.___\_<|>_/___.'  >'"".
 *        | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *        \  \ `-.   \_ __\ /__ _/   .-` /  /
 *  ========`-.____`-.___\_____/___.-`____.-'========
 *                       `=---='
 *  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
 *           佛祖保佑       永无BUG     永不修改
 *
 */

namespace pf\response;

use pf\response\build\Base;

class Response
{
    protected $link;

    protected function driver()
    {
        $this->link = new Base();
        return $this;
    }

    public function __call($name, $arguments)
    {
        if (is_null($this->link)) {
            $this->driver();
        }
        return call_user_func_array([$this->link, $name], $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([static::single(), $name], $arguments);
    }

    public static function single()
    {
        static $link;
        if (is_null($link)) {
            $link = new static();
        }
        return $link;
    }

}