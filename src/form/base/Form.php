<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\base;

    use Coco\htmlBuilder\dom\others\JSCode;
    use Coco\layui\base\common\LayuiDoubleTag;
    use Coco\layui\base\components\Button;
    use MatthiasMullie\Minify\JS;

    class Form extends LayuiDoubleTag
    {
        public function __construct()
        {
            parent::__construct('form');
            $this->getAttr('class')->clearValue()->addAttr("layui-form");

            $this->btnSubmit = Button::ins()->btnSubmit();
            $this->btnSubmit->setInnerContents('提交');
            $this->btnSubmit->attrsRegistry->setCustomFilterName($this->attrsRegistry->getFilterName());

            $this->btnReset = Button::ins()->btnReset();
            $this->btnReset->setInnerContents('重填');
            $this->btnReset->bgCyan();
        }

        public function formRow(): static
        {
            $this->getAttr('class')->addAttr("layui-row");

            return $this;
        }

        public function btnLg(): static
        {
            $this->btnSubmit->lg();
            $this->btnReset->lg();
            return $this;
        }

        public function btnXs(): static
        {
            $this->btnSubmit->xs();
            $this->btnReset->xs();
            return $this;
        }

        public function btnSm(): static
        {
            $this->btnSubmit->sm();
            $this->btnReset->sm();
            return $this;
        }

        public function withBorder(): static
        {
            $this->getAttr('class')->addAttr("layui-form-pane");

            return $this;
        }

        public function actionUrl($url): static
        {
            $this->attrsRegistry->appendAttrKv('action', $url);

            return $this;
        }


        protected function afterRender(string &$sectionContents): void
        {
            if (!$this::$isDebug)
            {
                $minifier = new JS();
                $minifier->add($sectionContents);
                $sectionContents = $minifier->minify();
            }
        }

        protected function beforeRender(): void
        {

            $this->appendSubsectionWithoutEval("INNER_CONTENTS", FormItem::ins()
                ->inner(function(FormItem $this_, array &$_i) {
                    $_i[] = inputDom::ins()->inner(function(inputDom $this_, array &$_i) {
                        $_i[] = $this->btnSubmit;
                        $_i[] = $this->btnReset;
                    });
                }));

            $this->scriptSection->setSubsection('lay_filter', $this->attrsRegistry->getFilterName());

            parent::beforeRender();
        }

        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {

                protected array $defaultValue = [];

                public function __construct()
                {
                    $template = <<<'CONTENTS'

    (function () {
     
        // 提交事件
        layui.form.on("submit({:lay_filter:})", function (data) {
            var field = data.field; // 获取表单全部字段值
            var elem = data.elem; // 获取当前触发事件的元素 DOM 对象，一般为 button 标签
            var elemForm = data.form; // 获取当前表单域的 form 元素对象，若容器为 form 标签才会返回。
            
            console.dir(field)
            console.dir(JSON.stringify(field))
            
            layer.alert(JSON.stringify(field), {
                title: "当前填写的字段值",
                    anim      : -1,
                    isOutAnim: false,
                    shadeClose: true,
                    shade     : 0.5,
                    area      : [
                        "50%",
                        "50%",
                    ],
            });
            
            // 此处可执行 Ajax 等操作
        
            // 阻止默认 form 跳转
            return false;
        });
    
    })();


CONTENTS;

                    parent::__construct($template);
                }
            };
        }

    }