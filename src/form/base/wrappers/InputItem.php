<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\base\wrappers;

    use Coco\layui\base\common\LayuiDomSectionBase;
    use Coco\layui\form\base\InputDom;
    use Coco\layui\form\base\Label;
    use Coco\layui\form\base\Tips;

    class InputItem extends LayuiDomSectionBase
    {
        public mixed $labelStr = '';
        public mixed $tipsStr  = '';

        public function __construct()
        {
            parent::__construct();

            $this->label    = Label::ins();
            $this->inputDom = InputDom::ins();
            $this->tips     = Tips::ins();

            $template = <<<'CONTENTS'
{:INNER_CONTENTS:}
CONTENTS;
            parent::__construct($template);
        }

        /**
         * @param mixed $labelStr
         */
        public function setLabelStr(mixed $labelStr): static
        {
            $this->labelStr = $labelStr;

            return $this;
        }

        /**
         * @param mixed $tipsStr
         */
        public function setTipsStr(mixed $tipsStr): static
        {
            $this->tipsStr = $tipsStr;

            return $this;
        }

        protected function beforeRender(): void
        {
            $this->label->setInnerContents($this->labelStr);
            $this->inputDom->prependToNode($this->label);

            $this->inputDom->inner(function(InputDom $this_, array &$_i) {
                $_i[] = '{:INNER_CONTENTS:}';
            });

            if ($this->tipsStr)
            {
                $this->tips->setInnerContents($this->tipsStr);
                $this->inputDom->appendToNode($this->tips);
            }

            $this->setSubsectionWithoutEval('INNER_CONTENTS', $this->inputDom);

            parent::beforeRender();
        }

        public function block(): static
        {
            $this->inputDom->block();

            return $this;
        }

        public function inline(): static
        {
            $this->inputDom->inline();

            return $this;
        }
    }