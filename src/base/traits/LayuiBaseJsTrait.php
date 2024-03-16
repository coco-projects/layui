<?php

    declare(strict_types = 1);
    namespace Coco\layui\base\traits;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\htmlBuilder\dom\others\CSSCode;
    use Coco\htmlBuilder\dom\others\JSCode;
    use Coco\htmlBuilder\dom\tags\Script;

    /**
     * 需要加事件就使用，为组件添加一个script 标签，写js代码
     */
    trait LayuiBaseJsTrait
    {
        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {

                protected array $defaultValue = [];

                public function __construct()
                {
                    $template = <<<'CONTENTS'

layui.use(getMods(), function () {
    let $ = layui.$;
   
    {:INNER_CONTENTS:}
    
});

CONTENTS;

                    parent::__construct($template);
                }
            };
        }

        protected function makeStyleSection(): void
        {
            $this->styleSection = new class extends CSSCode {

                protected array $defaultValue = [];

                public function __construct()
                {
                    $template = <<<'CONTENTS'
   
CONTENTS;
                    parent::__construct($template);
                }
            };
        }

        protected function initStatic():void
        {
            if (static::$rootNode instanceof DomBlock)
            {
                $this->jsCustomDomSection(Script::ins()->rawCode($this->scriptSection));
                $this->cssCustomRawCode($this->styleSection->render());
            }

        }

    }