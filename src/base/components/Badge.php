<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    class Badge extends Span
    {
        public function __construct($text = '')
        {
            parent::__construct();
            $this->getAttr('class')->clearValue()->addAttr("layui-badge");
            $this->text($text);
        }

        public function text($text): static
        {
            $this->setInnerContents($text);

            return $this;
        }

        public function dot(): static
        {
            $this->getAttr('class')->clearValue()->addAttr("layui-badge-dot");

            return $this;
        }

        public function rim(): static
        {
            $this->getAttr('class')->clearValue()->addAttr("layui-badge-rim");

            return $this;
        }
    }