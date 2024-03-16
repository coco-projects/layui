<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\base\wrappers;

    use Coco\layui\base\common\LayuiDomSectionBase;
    use Coco\layui\base\components\Col;
    use Coco\layui\form\base\FormItem;

    class ColItem extends LayuiDomSectionBase
    {
        public function __construct($type = '')
        {
            parent::__construct();

            $this->col      = Col::ins($type);
            $this->formItem = FormItem::ins();

            $template = <<<'CONTENTS'
{:INNER_CONTENTS:}
CONTENTS;
            parent::__construct($template);
        }


        protected function beforeRender(): void
        {
            $this->col->inner(function(Col $this_, array &$_i) {
                $_i[] = $this->formItem->inner(function(FormItem $this_, array &$_i) {
                    $_i[] = '{:INNER_CONTENTS:}';
                });
            });

            $this->setSubsectionWithoutEval('INNER_CONTENTS', $this->col);

            parent::beforeRender();
        }

        public function fullLine(): static
        {
            $this->formItem->fullLine();

            return $this;
        }

        public function addType($type): static
        {
            $this->col->addType($type);

            return $this;
        }
    }