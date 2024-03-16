<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\htmlBuilder\dom\others\JSCode;
    use Coco\layui\base\common\LayuiDoubleTag;
    use Coco\layui\form\traits\OptionsTrait;

    class Tab extends Div
    {
        use OptionsTrait;

        public function __construct()
        {
            parent::__construct();
            $this->getAttr('class')->addAttr("layui-tab");

            $this->ul = LayuiDoubleTag::ins('ul');
            $this->ul->getAttr('class')->addAttr("layui-tab-title");

            $this->div = Div::ins();
            $this->div->getAttr('class')->addAttr("layui-tab-content");

        }

        protected function beforeRender(): void
        {
            $labels   = [];
            $contents = [];

            $this->eachOptions(function($id, $data, $isSelected, $isDisabled) use (&$contents, &$labels) {

                $titleItem = $this->getTitleItem();
                $titleItem->setLayid($id);
                $titleItem->isSelected($isSelected);
                $titleItem->setInnerContents($data['label'] ?? '');

                $contentsItem = $this->getTabContentItem();
                $contentsItem->isSelected($isSelected);
                $contentsItem->setInnerContents($data['content'] ?? '');

                $labels[]   = $titleItem;
                $contents[] = $contentsItem;

            }, $selectedIds);

            $this->ul->setInnerContents($labels);
            $this->div->setInnerContents($contents);

            $this->appendInnerContents($this->ul);
            $this->appendInnerContents($this->div);

            $this->scriptSection->setSubsection('lay_filter', $this->attrsRegistry->getFilterName());

            parent::beforeRender();
        }

        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {

                protected array $defaultValue = [];

                public function __construct()
                {
                    $template = <<<'CONTENTS'

    (function () {
     
         // tab 切换事件
        layui.element.on('tab({:lay_filter:})', function(data){
          console.log(this); // 当前 tab 标题所在的原始 DOM 元素
          console.log(data.index); // 得到当前 tab 项的所在下标
          console.log(data.elem); // 得到当前的 tab 容器
          
          layer.msg('tab：'+ data.index);
        });
    
    })();
    
CONTENTS;

                    parent::__construct($template);
                }
            };
        }

        private function getTitleItem()
        {
            return new class extends LayuiDoubleTag {

                public function __construct()
                {
                    parent::__construct('li');
                }

                public function isSelected($isSelected)
                {
                    if ($isSelected)
                    {
                        $this->getAttr('class')->addAttr("layui-this");
                    }

                    return $this;
                }

                public function setLayid($layId)
                {
                    $this->attrsRegistry->appendAttrKv('lay-id', $layId);

                    return $this;
                }
            };
        }

        private function getTabContentItem()
        {
            return new class extends Div {
                public function __construct()
                {
                    parent::__construct();
                    $this->getAttr('class')->addAttr("layui-tab-item");
                }

                public function isSelected($isSelected)
                {
                    if ($isSelected)
                    {
                        $this->getAttr('class')->addAttr("layui-show");
                    }

                    return $this;
                }
            };
        }

        public function setAllowclose(): static
        {
            $this->attrsRegistry->appendAttrKv('lay-allowclose', 'true');

            return $this;
        }

        public function setStyleBrief(): static
        {
            $this->getAttr('class')->addAttr("layui-tab-brief");

            return $this;
        }

        public function setStyleCard(): static
        {
            $this->getAttr('class')->addAttr("layui-tab-card");

            return $this;
        }

    }