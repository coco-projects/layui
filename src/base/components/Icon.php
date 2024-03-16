<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    use Coco\layui\base\common\LayuiDoubleTag;

    class Icon extends LayuiDoubleTag
    {
        public function __construct($icon = '')
        {
            parent::__construct('i');
            $this->icon($icon);
        }

        public function icon($icon): static
        {
            $this->getAttr('class')->clearValue()->addAttrsArray([
                "layui-icon",
                "layui-icon-" . $icon,
            ]);

            return $this;
        }
    }