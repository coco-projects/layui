<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\htmlBuilder\dom\others\JSCode;
    use Coco\layui\base\components\Div;

    class Slider extends RawInput
    {
        public function __construct()
        {
            parent::__construct();

            $this->hiddenType();
        }

        protected function beforeRender(): void
        {
            $this->scriptSection->setSubsection('input_id', $this->attrsRegistry->getDomId());

            $div = Div::ins();
            $this->scriptSection->setSubsection('ele_id', $div->attrsRegistry->getDomId());

            $this->prependToNode($div);

            $this->isDisabled and $this->scriptSection->setSubsection('disabled', 'true');
            $this->scriptSection->setSubsection('value', $this->value);

            parent::beforeRender();
        }

        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {
                protected array $defaultValue = [
                    "min"      => 0,
                    "value"    => 0,
                    "max"      => 100,
                    "step"     => 1,
                    "theme"    => '#FF5722',
                    "disabled" => 'false',
                ];

                public function __construct()
                {
                    $template = <<<'CONTENTS'
        
    (function () {
        var baseConfig = {elem: "#{:ele_id:}"};
        var userConfig = {
            "type"    : "default",
            "showstep": true,
            "tips"    : true,
            "input"   : true,
            "range"   : false,
            "value"   : {:value:},
            "min"     : {:min:},
            "max"     : {:max:},
            "step"    : {:step:},
            "theme"   : "{:theme:}",
            "disabled": {:disabled:},
            change    : function (value) {
                $("#{:input_id:}").val(value);
            }
        };
    
        var config = Object.assign({}, userConfig, baseConfig);
        layui.slider.render(config);
    })();

CONTENTS;
                    parent::__construct($template);
                }
            };
        }

        public function setMin(mixed $value): static
        {
            $this->scriptSection->setSubsection('min', $value);

            return $this;
        }

        public function setMax(mixed $value): static
        {
            $this->scriptSection->setSubsection('max', $value);

            return $this;
        }

        public function setStep(mixed $value): static
        {
            $this->scriptSection->setSubsection('step', $value);

            return $this;
        }

        public function setThemeDanger(): static
        {
            $this->scriptSection->setSubsection('theme', "#ff5722");

            return $this;
        }

        public function setThemeWarning(): static
        {
            $this->scriptSection->setSubsection('theme', "#ffb800");

            return $this;
        }

        public function setThemeSuccess(): static
        {
            $this->scriptSection->setSubsection('theme', "#16b777");

            return $this;
        }

        public function setThemeInfo(): static
        {
            $this->scriptSection->setSubsection('theme', "#31bdec");

            return $this;
        }

        public function setCustomTheme(mixed $rgb): static
        {
            $this->scriptSection->setSubsection('theme', $rgb);

            return $this;
        }

    }