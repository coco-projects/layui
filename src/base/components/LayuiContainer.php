<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;
    
    class LayuiContainer extends Div
    {
        public function __construct()
        {
            parent::__construct();
            $this->layuiContainer();
        }

        public function layuiContainer(): static
        {
            $this->getAttr('class')->clearValue()->addAttr("layui-container");

            return $this;
        }

        public function pearContainer(): static
        {
            $this->getAttr('class')->clearValue()->addAttr("pear-container");

            return $this;
        }

        public function layuiFluid(): static
        {
            $this->getAttr('class')->clearValue()->addAttr("layui-fluid");

            return $this;
        }
    }