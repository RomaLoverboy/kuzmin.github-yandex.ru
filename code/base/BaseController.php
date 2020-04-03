<?php

namespace base;


class BaseController
{
    protected $method = __METHOD__;
    protected $post;

    public function __construct()
    {
        $this->post = Inquiries::post();
    }

    public function render($params = null, $template)
    {
        $view = new BaseView($params, $template);
        return $view;
    }
}