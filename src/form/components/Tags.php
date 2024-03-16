<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\htmlBuilder\dom\others\JSCode;
    use Coco\layui\base\components\Button;
    use Coco\layui\base\components\Div;

    class Tags extends RawInput
    {
        public function __construct()
        {
            parent::__construct();

            $this->hiddenType();
            $this->divContainer = Div::ins();
        }

        protected function beforeRender(): void
        {
            if (!$this->isDisabled)
            {
                $this->newTag();
                $this->allowClose();
            }

            $this->divContainer->attrsRegistry->appendClassArr([
                'layui-btn-container',
                'tag',
                'layui-padding-1',
            ]);

            $this->scriptSection->setSubsection('ele_id', $this->divContainer->attrsRegistry->getDomId());

            $btns = explode(',', $this->value);

            $items = [];
            foreach ($btns as $id => $data)
            {
                $itemBtn = Button::ins()->btnButton();
                $itemBtn->text("<span class='tag_text'>{$data}</span>");

                $itemBtn->attrsRegistry->appendAttrKv('lay-id', $id);
                $itemBtn->attrsRegistry->appendClass('tag-item');

                $items[] = $itemBtn;
            }

            $this->divContainer->setInnerContents($items);
            $this->appendToNode($this->divContainer);

            $this->setSubsection('value', $this->value);

            $this->scriptSection->setSubsection('input_id', $this->attrsRegistry->getDomId());
            $this->scriptSection->setSubsection('lay_filter', $this->divContainer->attrsRegistry->getFilterName());

            parent::beforeRender();
        }

        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {

                protected array $defaultValue = [
                    "is_unique" => 'false',
                    "rule"      => '[]',
                ];

                public function __construct()
                {
                    $template = <<<'CONTENTS'
    
    (function () {
        var baseConfig = {};
        var userConfig = {};
    
    
        let tagRules = {
            "number": {
                "msg"     : "必须为数字",
                "callback": function (input) {
                    return /\d+/ig.test(input);
                }
            }
        };
        
        let filterName = "{:lay_filter:}";
    
        var config = Object.assign({}, userConfig, baseConfig);
        layui.tag.render(filterName,config);
    
        layui.tag.on("add("+filterName+")", function (data) {
            let inputValue = $(data.othis).text();
            let allValue   = (data.elem).find(".tag_text");
    
            let rule = {:rule:};
    
            for (let ruleKey in rule)
            {
                let ruleName = rule[ruleKey];
                if (tagRules[ruleName] !== undefined)
                {
                    let result = tagRules[ruleName]["callback"](inputValue);
    
                    if (result === false)
                    {
                        layui.layer.msg(tagRules[ruleName]["msg"]);
                        return false;
                    }
                }
            }
    
            let values = [];
            allValue.each(function (k, v) {
                values.push($(v).text());
            });
            
            let isUnique = {:is_unique:};
    
            if (isUnique) {
                if (values.indexOf(inputValue) !== -1) {
                    layui.layer.msg('标签 '+inputValue+' 已经存在，不能重复输入');
                    return false;
                }
            }
            
    
            values.push(inputValue);
    
            $("#{:input_id:}").val(values.join());
        });
    
        layui.tag.on("delete("+filterName+")", function (data) {
    
            let deleteValue = $(this).parents("button").find(".tag_text").text();
            let allValue    = (data.elem).find(".tag_text");
    
            let values = [];
            allValue.each(function (k, v) {
                values.push($(v).text());
            });
    
            let index = values.indexOf(deleteValue);
            if (index !== -1)
            {
                values.splice(index, 1);
            }
    
            $("#{:input_id:}").val(values.join());
        });
    
    })();

CONTENTS;
                    parent::__construct($template);
                }
            };
        }

        protected function newTag(): static
        {
            $this->divContainer->attrsRegistry->appendAttrKv('lay-newTag', 'true');

            return $this;
        }

        protected function allowClose(): static
        {
            $this->divContainer->attrsRegistry->appendAttrKv('lay-allowclose', 'true');

            return $this;
        }

        public function setRule(array $rule): static
        {
            $this->scriptSection->setSubsection('rule', json_encode($rule));

            return $this;
        }

        public function setUnique(): static
        {
            $this->scriptSection->setSubsection('is_unique', 'true');

            return $this;
        }
    }