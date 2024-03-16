<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    use Coco\htmlBuilder\dom\others\JSCode;
    use Coco\layui\base\common\LayuiCustomAttrs;
    use Coco\layui\base\common\LayuiDomSectionBase;
    use Coco\layui\form\traits\OptionsTrait;

    class Collapse extends Div
    {
        use OptionsTrait;

        public function __construct()
        {
            parent::__construct();

            $this->getAttr('class')->clearValue()->addAttr("layui-collapse");

            $this->cardRegistry       = LayuiCustomAttrs::ins();
            $this->cardHeaderRegistry = LayuiCustomAttrs::ins();
        }

        public function setAccordion(): static
        {
            $this->attrsRegistry->appendAttrRaw("lay-accordion");

            return $this;
        }


        protected function beforeRender(): void
        {
            $contents = [];

            $this->eachOptions(function($id, $data, $isSelected, $isDisabled) use (&$contents) {
                $item = $this->getItemIns();

                $item->cardRegistry       = $this->cardRegistry;
                $item->cardHeaderRegistry = $this->cardHeaderRegistry;

                $item->isSelected($isSelected);
                $item->setInnerContents($data['content']);
                $item->setSubsection('label', $data['label']);

                $contents[] = $item;
            });

            $this->setInnerContents($contents);


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
     
         // 折叠面板点击事件
        layui.element.on('collapse({:lay_filter:})', function(data){
            console.log(data.show); // 得到当前面板的展开状态，true or false
            console.log(data.title); // 得到当前点击面板的标题区域对象
            console.log(data.content); // 得到当前点击面板的内容区域对象
            
            // 显示状态，仅用于演示
            layer.msg('collapse：'+ data.show);
            
        });
    
    })();
    
CONTENTS;

                    parent::__construct($template);
                }
            };
        }


        private function getItemIns()
        {
            return new class extends LayuiDomSectionBase {

                public function __construct()
                {
                    $template = <<<'CONTENTS'
<div class="layui-colla-item {:card_class:}" {:card_attrs:}>
	<div class="layui-colla-title {:header_class:}" {:header_attrs:}>{:label:}</div>
	<div class="layui-colla-content {:__CLASS__:}" {:__ATTRS__:}>
		{:INNER_CONTENTS:}
	</div>
</div>

CONTENTS;
                    parent::__construct($template);
                }

                protected function beforeRender(): void
                {
                    $this->cardRegistry->fillDomId();
                    $this->cardRegistry->fillFilterName();
                    $this->cardHeaderRegistry->fillDomId();
                    $this->cardHeaderRegistry->fillFilterName();

                    $this->setSubsections([
                        "card_class"   => $this->cardRegistry->evalClass(),
                        "card_attrs"   => $this->cardRegistry->evalAttrs(),
                        "header_class" => $this->cardHeaderRegistry->evalClass(),
                        "header_attrs" => $this->cardHeaderRegistry->evalAttrs(),
                    ]);

                    parent::beforeRender();
                }

                public function isSelected($isSelected)
                {
                    $isSelected and $this->attrsRegistry->appendClass('layui-show');

                    return $this;
                }
            };
        }

    }