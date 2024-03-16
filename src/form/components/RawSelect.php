<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\layui\base\common\LayuiDoubleTag;
    use Coco\layui\form\traits\InputTrait;
    use Coco\layui\form\traits\OptionsTrait;

    class RawSelect extends LayuiDoubleTag
    {
        use OptionsTrait;
        use InputTrait;

        public function __construct()
        {
            parent::__construct('select');

            $this->attrsRegistry->appendAttrRaw('lay-search');
        }

        protected function beforeRender(): void
        {
            $this->getAttr('name')->setAttrKv('name', $this->name);
            $this->isDisabled and $this->getAttr('disabled')->setAttrsString('disabled');
            $this->setSelected($this->value);

            parent::beforeRender();

            $contents = [];
            $groups   = [];
            $items    = [];

            $this->eachOptions(function($id, $data, $isSelected, $isDisabled) use (&$contents, &$items, &$groups) {
                $item = $this->getItemIns();
                $item->setIsDisabled($isDisabled);
                $item->setIsSelected($isSelected);
                $item->setValue($id);
                $item->setInnerContents($data['label']);

                if (isset($data['group']))
                {
                    $groups[$data['group']][] = $item;
                }
                else
                {
                    $items[] = $item;
                }
            });

            $contents = array_merge($contents, $items);

            $t = [];
            foreach ($groups as $k => $v)
            {
                $t[] = '<optgroup label="' . $k . '">';
                $t   = array_merge($t, $v);
                $t[] = '</optgroup>';
            }

            $contents = array_merge($contents, $t);

            $this->setInnerContents($contents);
        }


        private function getItemIns()
        {
            return new class extends LayuiDoubleTag {
                use InputTrait;

                public function __construct()
                {
                    parent::__construct('option');
                }

                protected function beforeRender(): void
                {
                    $this->getAttr('value')->setAttrKv('value', $this->value);
                    $this->isDisabled and $this->getAttr('disabled')->setAttrsString('disabled');
                    $this->isSelected and $this->getAttr('selected')->setAttrsString('selected');

                    parent::beforeRender();
                }

            };
        }

    }