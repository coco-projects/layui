<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\base;

    use Coco\layui\base\components\Div;

    class InputDom extends Div
    {
        public function __construct()
        {
            parent::__construct();
            $this->block();
        }

        public function block(): static
        {
            $this->getAttr('class')->clearValue()->addAttr("layui-input-block");

            return $this;
        }

        public function inline(): static
        {
            $this->getAttr('class')->clearValue()->addAttr("layui-input-inline");

            return $this;
        }
    }