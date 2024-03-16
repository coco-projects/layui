<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    use Coco\layui\base\common\LayuiDoubleTag;

    class A extends LayuiDoubleTag
    {
        public function __construct($text = '')
        {
            parent::__construct('a');
            $this->text($text);
        }

        public function text($text): static
        {
            $this->setInnerContents($text);

            return $this;
        }

        public function href($href): static
        {
            $this->getAttr('href')->setAttrKv('href', $href);

            return $this;
        }

        public function _blank(): static
        {
            $this->getAttr('target')->setAttrKv('target', '_blank');

            return $this;
        }

        public function _parent(): static
        {
            $this->getAttr('target')->setAttrKv('target', '_parent');

            return $this;
        }

        public function _self(): static
        {
            $this->getAttr('target')->setAttrKv('target', '_self');

            return $this;
        }

        public function _top(): static
        {
            $this->getAttr('target')->setAttrKv('target', '_top');

            return $this;
        }

        public function btn(): static
        {
            $this->getAttr('class')->addAttr("layui-btn");

            return $this;
        }

        public function lg(): static
        {
            $this->getAttr('class')->addAttr("layui-btn-lg");

            return $this;
        }

        public function sm(): static
        {
            $this->getAttr('class')->addAttr("layui-btn-sm");

            return $this;
        }

        public function xs(): static
        {
            $this->getAttr('class')->addAttr("layui-btn-xs");

            return $this;
        }

        public function disabled(): static
        {
            $this->getAttr('class')->addAttr("layui-btn-disabled");

            return $this;
        }

        public function radius(): static
        {
            $this->getAttr('class')->addAttr("layui-btn-radius");

            return $this;
        }

        public function fluid(): static
        {
            $this->getAttr('class')->addAttr("layui-btn-fluid");

            return $this;
        }

        public function event($event): static
        {
            $this->attrsRegistry->event($event);

            return $this;
        }

    }