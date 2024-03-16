<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    use Coco\layui\base\common\LayuiDoubleTag;

    class Button extends LayuiDoubleTag
    {
        public function __construct($text = '')
        {
            parent::__construct('button');
            $this->getAttr('class')->clearValue()->addAttr("layui-btn");
            $this->text($text);
        }

        public function text($text): static
        {
            $this->setInnerContents($text);

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

        public function btnSubmit(): static
        {
            $this->attrsRegistry->appendAttrRaw('lay-submit');
            $this->type('submit');

            return $this;
        }

        public function btnReset(): static
        {
            $this->type('reset');

            return $this;
        }

        public function btnButton(): static
        {
            $this->type('button');

            return $this;
        }

        protected function type($type): static
        {
            $this->getAttr('type')->setAttrKv('type', $type);

            return $this;
        }

        public function event($event): static
        {
            $this->attrsRegistry->event($event);

            return $this;
        }

    }