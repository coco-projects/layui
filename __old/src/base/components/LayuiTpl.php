<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    use Coco\htmlBuilder\dom\tags\JSCode;
    use Coco\htmlBuilder\dom\tags\Script;
    use Coco\layui\base\LayuiBase;
    use Coco\layui\base\traits\LayuiJsTrait;

    class LayuiTpl extends LayuiBase
    {
        use LayuiJsTrait;

        protected array $defaultValue = [];

        public string $layuiTpl = '';
        public string $targetId = '';
        public string $openTag  = '{{';
        public string $closeTag = '}}';
        public array  $tplData  = [];

        public function __construct()
        {
            $template = <<<'CONTENTS'
CONTENTS;
            parent::__construct($template);
        }

        protected function initAfterSectionRender(): void
        {

        }

        protected function beforeRender(): void
        {
            $this->setDomId();
            $this->setFilter();

            $this->setSubsection('attrs', ' ' . implode(' ', $this->attrs));
            $this->setSubsection('class', ' ' . implode(' ', $this->class));
            ($this->scriptSection instanceof JSCode) and $this->scriptSection->setSubsection('id', $this->getDomId());
            ($this->scriptSection instanceof JSCode) and $this->scriptSection->setSubsection('lay_filter', $this->getFilterName());

            $this->scriptSection->setSubsections([
                "tpl_data"  => json_encode($this->tplData),
                "target_id" => ($this->targetId),
                "open_tag"  => ($this->openTag),
                "close_tag" => ($this->closeTag),
            ]);

            $this->scriptSection->prependSubsectionWithoutEval("INNER_CONTENTS", <<<AAA

(function () {
     var data = {:tpl_data:};


    layui.laytpl.config({
        open : "{:open_tag:}",
        close : "{:close_tag:}",
    });

    // 获取模板字符
    var getTpl = document.getElementById("tpl_{:id:}").innerHTML;

    // 视图对象
    var elemView = document.getElementById("{:target_id:}");

    layui.laytpl(getTpl).render(data, function (str) {
        elemView.innerHTML = str;
    });
})();
    
AAA
            );

            $this->initStatic();

            $t = Script::ins($this->layuiTpl, false);
            $t->getAttr('type')->setAttrKv('type', 'text/html');
            $t->getAttr('id')->setAttrKv('id', 'tpl_' . $this->getDomId());
            $this->jsCustomDomSection($t);

        }


        /**
         * @param string $layuiTpl
         *
         * @return $this
         */
        public function setLayuiTpl(string $layuiTpl): static
        {
            $this->layuiTpl = $layuiTpl;

            return $this;
        }

        /**
         * @param string $targetId
         *
         * @return $this
         */
        public function setTargetId(string $targetId): static
        {
            $this->targetId = $targetId;

            return $this;
        }

        /**
         * @param array $tplData
         *
         * @return $this
         */
        public function setTplData(array $tplData): static
        {
            $this->tplData = $tplData;

            return $this;
        }

        /**
         * @param string $openTag
         * @param string $closeTag
         *
         * @return $this
         */
        public function setTag(string $openTag, string $closeTag): static
        {
            $this->openTag  = $openTag;
            $this->closeTag = $closeTag;

            return $this;
        }


    }