<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\htmlBuilder\dom\others\JSCode;
    use Coco\layui\base\components\Div;

    class ColorPicker extends RawInput
    {
        public function __construct()
        {
            parent::__construct();

            $this->hiddenType();

            $this->divContainer = Div::ins();
        }

        protected function beforeRender(): void
        {
            if ($this->isDisabled)
            {
                $div = Div::ins();
                $div->getAttr('style')->setAttrKv('background', $this->value);
                $div->getAttr('class')->addAttrsArray([
                    'layui-input',
                    'layui-padding-2'
                ]);

                $this->prependToNode($div->setInnerContents($this->value));
            }
            else
            {
                $this->prependToNode($this->divContainer);
            }

            $this->scriptSection->setSubsection('ele_id', $this->divContainer->attrsRegistry->getDomId());
            $this->scriptSection->setSubsection('input_id', $this->attrsRegistry->getDomId());
            $this->scriptSection->setSubsection('value', $this->value);

            parent::beforeRender();
        }

        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {
                protected array $defaultValue = [
                    "value" => '#1c97f5',
                ];

                public function __construct()
                {
                    $template = <<<'CONTENTS'

    (function () {
        layui.colorpicker.render({
            elem     : "#{:ele_id:}",
            color    : "{:value:}",
            predefine: true,
            colors   : [
                "#fafafa",
                "#c2c2c2",
                "#ff5722",
                "#ffb800",
                "#16baaa",
                "#31bdec",
                "#1e9fff",
                "#16b777",
                "#a233c6",
                "#2f363c"
            ],
            change     : function (color) {
                $("#{:input_id:}").val(color);
            }
        });
    })();

CONTENTS;
                    parent::__construct($template);
                }
            };
        }

    }