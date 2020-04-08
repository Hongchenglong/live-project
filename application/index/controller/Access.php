<?php

namespace app\index\controller;

header("content-type:text/html;charset=utf-8");


class Access extends BaseController
{
    /**
     * 显示功能
     */
    public function display()
    {

        return $this->fetch();


    }
}
