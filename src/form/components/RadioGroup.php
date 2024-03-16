<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\layui\base\components\Div;
    use Coco\layui\form\traits\InputTrait;
    use Coco\layui\form\traits\OptionsTrait;

    class RadioGroup extends Div
    {
        use OptionsTrait;
        use InputTrait;

        public function __construct()
        {
            $this->skin = '';

            parent::__construct();

            
        }

        protected function beforeRender(): void
        {
            parent::beforeRender();

            $this->setSelected($this->value);

            $items = [];

            $this->eachOptions(function($id, $data, $isSelected, $isDisabled) use (&$contents, &$items, &$groups) {
                $item = SingleRadio::ins();
                $item->setIsDisabled($isDisabled);
                $item->setIsChecked($isSelected);
                $item->setValue($id);
                $item->setName($this->name);
                $item->laySkin($this->skin);
                $item->inputTitle($data['label'] ?? '');

                $items[] = $item;
            });

            $this->setInnerContents($items);
        }
    }