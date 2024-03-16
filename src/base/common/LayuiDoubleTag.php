<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\common;

    use Coco\htmlBuilder\dom\DomSection;
    use Coco\htmlBuilder\dom\DoubleTag;
    use Coco\layui\base\traits\ClassTrait;

    class LayuiDoubleTag extends DoubleTag
    {
        use ClassTrait;

        public function __construct($tagName = '')
        {
            parent::__construct($tagName);
            $this->attrsRegistry = LayuiCustomAttrs::ins();
        }

        protected function makeScriptSection(): void
        {
            parent::makeScriptSection();
        }

        protected function makeStyleSection(): void
        {
            parent::makeStyleSection();
        }

        protected function init(): void
        {
            parent::init();
        }

        protected function initAfterSectionRender(): void
        {
            parent::initAfterSectionRender();
        }

        public function initSripts()
        {
            if ($this->getRootNode() instanceof DomSection)
            {
                $this->getRootNode()->scriptSection->appendSubsectionWithoutEval("INNER_CONTENTS", $this->scriptSection);
            }
        }

        protected function beforeRender(): void
        {
            $this->initSripts();
            $this->attrsRegistry->fillDomId();
            $this->attrsRegistry->fillFilterName();
            parent::beforeRender();
        }

        protected function afterRender(string &$sectionContents): void
        {
            parent::afterRender($sectionContents);
        }
    }