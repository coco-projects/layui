<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\htmlBuilder\dom\others\JSCode;
    use Coco\layui\base\components\Div;
    use Coco\layui\base\components\Span;

    class SliderRange extends RawInput
    {
        public function __construct()
        {
            parent::__construct();

            $this->hiddenType();
        }

        protected function beforeRender(): void
        {
            $t          = explode(',', $this->value);
            $valueStart = (int)($t[0] ?? 0);
            $valueEnd   = (int)($t[1] ?? 0);

            $this->scriptSection->setSubsection('input_id', $this->attrsRegistry->getDomId());

            $div1 = Div::ins();

            $div2 = Div::ins()->inner(function(Div $this_, array &$_i) use ($div1) {
                $_i[] = '值 : ';
                $_i[] = Span::ins()->inner(function(Span $this_, array &$_i) use ($div1) {
                    $this_->attrsRegistry->setCustomDomId('slider_start_' . $div1->attrsRegistry->getDomId());
                    $_i[] = '{:start_value:}';
                });

                $_i[] = ' - ';
                $_i[] = Span::ins()->inner(function(Span $this_, array &$_i) use ($div1) {
                    $this_->attrsRegistry->setCustomDomId('slider_end_' . $div1->attrsRegistry->getDomId());
                    $_i[] = '{:end_value:}';
                });
            });

            $this->appendToNode($div1);
            $this->appendToNode($div2);

            $this->scriptSection->setSubsection('ele_id', $div1->attrsRegistry->getDomId());
            $this->isDisabled and $this->scriptSection->setSubsection('disabled', 'true');

            $this->scriptSection->setSubsection('start_value', $valueStart);
            $this->scriptSection->setSubsection('end_value', $valueEnd);

            $this->setSubsection('start_value', $valueStart);
            $this->setSubsection('end_value', $valueEnd);

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
            "range"   : true,
            "value"   : [{:start_value:}, {:end_value:}],
            "min"     : {:min:},
            "max"     : {:max:},
            "step"    : {:step:},
            "theme"   : "{:theme:}",
            "disabled": {:disabled:},
            change    : function (value) {
                    $("#{:input_id:}").val(value[0]+','+value[1]);
                    
                    $("#slider_start_{:ele_id:}").text(value[0]);
                    $("#slider_end_{:ele_id:}").text(value[1]);
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