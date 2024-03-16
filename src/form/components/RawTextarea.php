<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\layui\base\common\LayuiDoubleTag;
    use Coco\layui\form\traits\InputTrait;

    class RawTextarea extends LayuiDoubleTag
    {
        use InputTrait;

        public function __construct()
        {
            parent::__construct('textarea');

        }

        protected function beforeRender(): void
        {
            $this->getAttr('name')->setAttrKv('name', $this->name);
            $this->getAttr('class')->addAttr('layui-textarea');
            $this->setInnerContents($this->value);

            $this->isDisabled and $this->getAttr('disabled')->setAttrsString('disabled');
//            $this->isChecked and $this->getAttr('checked')->setAttrsString('checked');
//            $this->isSelected and $this->getAttr('selected')->setAttrsString('selected');

            parent::beforeRender();
        }
    }