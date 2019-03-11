<?php
/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2019/3/11
 * Time: 11:06
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

namespace pf\response\build;

class Base
{
    protected $code;

    protected $content;

    /**
     * 设置响应内容
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * 获取响应内容
     * @return string
     */
    public function getContent()
    {
        if (is_array($this->content)) {
            return json_encode($this->content, JSON_UNESCAPED_UNICODE);
        }
        return is_numeric($this->content) ? strval($this->content) : $this->content;
    }

    public function make($content)
    {
        $this->setContent($content);
        return $this;
    }

    public function string()
    {
        return $this->getContent();
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        return $this->code = $code;
    }

    


}