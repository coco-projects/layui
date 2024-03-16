<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\htmlBuilder\dom\others\JSCode;

    class IconPicker extends RawInput
    {
        public function __construct()
        {
            parent::__construct();

            $this->setValue('layui-icon-success');
        }

        protected function beforeRender(): void
        {
            $this->scriptSection->setSubsection('id', $this->attrsRegistry->getDomId());
            parent::beforeRender();
        }

        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {

                public function __construct()
                {
                    $template = <<<'CONTENTS'
    
    (function () {
        layui.iconPicker.render({
            // 选择器，推荐使用input
            elem: "#{:id:}",
        
            // 数据类型：fontClass/unicode，推荐使用fontClass
            type: "fontClass",
        
            // 是否开启搜索：true/false
            search: true,
        
            // 是否开启分页
            page: false,
        
            // 每页显示数量，默认12
            limit: 16,
            
            cellWidth: "20%",
        
            // 点击回调
            click: function (data) {
            },
            
            // 渲染成功后的回调
            success: function (d) {
            }
        });
    })();

CONTENTS;
                    parent::__construct($template);
                }
            };
        }

    }