<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    use Coco\layui\base\common\LayuiDoubleTag;

    class Blockquote extends LayuiDoubleTag
    {
        public function __construct()
        {
            parent::__construct('blockquote');

            $this->getAttr('class')->clearValue()->addAttr("layui-elem-quote");
        }


        public function withBorder(): static
        {
            $this->getAttr('class')->addAttr("layui-quote-nm");

            return $this;
        }
    }