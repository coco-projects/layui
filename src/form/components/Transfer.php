<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\others\JSCode;
    use Coco\layui\base\components\Div;
    use Coco\layui\form\traits\OptionsTrait;

    class Transfer extends RawInput
    {
        use OptionsTrait;

        public function __construct()
        {
            parent::__construct();

            $this->divContainer = Div::ins();
            $this->hiddenType();
        }

        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {
                protected array $defaultValue = [
                    "title_left"  => '未选中',
                    "title_right" => '已选中',
                    "value"       => '',
                    "width"       => 360,
                    "height"      => 360,
                    "data"        => '[]',
                ];

                public function __construct()
                {
                    $template = <<<'CONTENTS'

    (function () {
        let data = {:data:};
    
        let insId = "#ins_{:ele_id:}";
    
        layui.transfer.render({
            elem      : "#{:ele_id:}",
            id        : insId,
            data      : data,
            value     : [{:value:}],
            title     : [
                "{:title_left:}",
                "{:title_right:}"
            ],
            showSearch: true,
            width     : {:width:},
            height    : {:height:},
            text      : {
                none      : "无数据",
                searchNone: "无匹配数据"
            },
            onchange  : function (data, index) {
                let getData = layui.transfer.getData(insId);
    
                let values = getData.map(function (obj) {
                    return obj.value;
                });
    
                $("#{:input_id:}").val(values.join());
            }
        });
        
    })();

CONTENTS;
                    parent::__construct($template);
                }
            };
        }


        protected function beforeRender(): void
        {
            $this->scriptSection->setSubsection('ele_id', $this->divContainer->attrsRegistry->getDomId());
            $this->scriptSection->setSubsection('input_id', $this->attrsRegistry->getDomId());
            $this->setSelected($this->value);

            $items = [];
            $this->eachOptions(function($id, $data, $isSelected, $isDisabled) use (&$contents, &$items, &$groups) {

                $items[] = [
                    "title"    => $data['label'] ?? '',
                    "value"    => $id,
                    "disabled" => $isDisabled,
                    "checked"  => false,
                ];

            }, $selectedIds);

            $this->scriptSection->setSubsection('data', json_encode($items));
            $this->scriptSection->setSubsection('value', implode(',', $selectedIds));
            $this->setValue(implode(',', $selectedIds));

            $this->appendToNode($this->divContainer);

            parent::beforeRender();
        }


        public function setTitles(mixed $left, mixed $right): static
        {
            $this->scriptSection->setSubsection('title_left', $left);
            $this->scriptSection->setSubsection('title_right', $right);

            return $this;
        }

        public function setHeightAndWidth(mixed $height, mixed $width): static
        {
            if (!is_numeric($height))
            {
                $height = '"' . $height . '"';
            }

            if (!is_numeric($width))
            {
                $width = '"' . $width . '"';
            }

            $this->scriptSection->setSubsection('height', $height);
            $this->scriptSection->setSubsection('width', $width);

            return $this;
        }
    }