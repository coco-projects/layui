<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\base;

    use Coco\layui\base\common\LayuiDoubleTag;

    class Label extends LayuiDoubleTag
    {
        public function __construct()
        {
            parent::__construct('label');
            $this->getAttr('class')->addAttr("layui-form-label");
        }

        public function for($value): static
        {
            $this->attrsRegistry->appendAttrKv('for', $value);

            return $this;
        }
    }