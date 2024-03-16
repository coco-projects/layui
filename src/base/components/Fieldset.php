<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    use Coco\layui\base\common\LayuiDomSectionBase;
    use Coco\layui\base\common\LayuiDoubleTag;

    class Fieldset extends LayuiDomSectionBase
    {
        public function __construct($title = '')
        {
            $this->fieldset = LayuiDoubleTag::ins('fieldset');
            $this->title    = LayuiDoubleTag::ins('legend');
            $this->box      = Div::ins();

            $this->fieldset->getAttr('class')->addAttr("layui-elem-field");
            $this->box->getAttr('class')->addAttr("layui-field-box");

            $template = <<<'CONTENTS'
{:INNER_CONTENTS:}
CONTENTS;
            parent::__construct($template);
            $this->title($title);
        }

        public function title($title): static
        {
            $this->title->setInnerContents($title);

            return $this;
        }

        protected function beforeRender(): void
        {
            $this->fieldset->inner(function(LayuiDoubleTag $this_, array &$_i) {
                $_i[] = $this->title->inner(function(LayuiDoubleTag $this_, array &$_i) {
                });

                $_i[] = $this->box->inner(function(LayuiDoubleTag $this_, array &$_i) {
                    $_i[] = '{:INNER_CONTENTS:}';
                });
            });

            $this->setSubsectionWithoutEval('INNER_CONTENTS', $this->fieldset->render());

            parent::beforeRender();
        }
    }