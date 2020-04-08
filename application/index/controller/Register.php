<?php

namespace app\index\controller;

header("content-type:text/html;charset=utf-8");


class Register extends BaseController
{
    
    public function register()
    {

        return $this->fetch();


    }
}
