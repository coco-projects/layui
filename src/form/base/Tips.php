<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\base;

    use Coco\layui\base\components\Div;

    class Tips extends Div
    {
        public function __construct()
        {
            parent::__construct();
            $this->getAttr('class')->addAttrsArray([
                "layui-form-mid",
                "layui-text-em",
            ]);
        }
    }