<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    class Row extends Div
    {
        public function __construct()
        {
            parent::__construct();
            $this->getAttr('class')->clearValue()->addAttr("layui-row");
        }
    }