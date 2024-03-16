<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\base;

    use Coco\layui\base\components\Div;

    class FormItem extends Div
    {
        public function __construct()
        {
            parent::__construct();
            $this->getAttr('class')->clearValue()->addAttr("layui-form-item");
        }

        public function fullLine(): static
        {
            $this->getAttr('class')->addAttr("layui-form-text");

            return $this;
        }
    }