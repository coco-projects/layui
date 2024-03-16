<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\htmlBuilder\dom\others\JSCode;

    class RangeDatePicker extends RawInput
    {
        public function __construct()
        {
            parent::__construct();

            $this->setValue('2022-01-01 - 2022-01-05');

        }

        protected function beforeRender(): void
        {
            $this->scriptSection->setSubsection('id', $this->attrsRegistry->getDomId());
            parent::beforeRender();
        }

        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {
                protected array $defaultValue = [
                    "user_config" => '{
        shortcuts: [
            {
                text : "上个月",
                value: function () {
                    var date  = new Date();
                    var year  = date.getFullYear();
                    var month = date.getMonth();
                    return [
                        new Date(year, month - 1, 1),
                        new Date(year, month, 0)
                    ];
                }
            },
            {
                text : "这个月",
                value: function () {
                    var date  = new Date();
                    var year  = date.getFullYear();
                    var month = date.getMonth();
                    return [
                        new Date(year, month, 1),
                        new Date(year, month + 1, 0)
                    ];
                }
            },
            {
                text : "下个月",
                value: function () {
                    var date  = new Date();
                    var year  = date.getFullYear();
                    var month = date.getMonth();
                    return [
                        new Date(year, month + 1, 1),
                        new Date(year, month + 2, 0)
                    ];
                }
            }
        ]
    }',
                ];

                public function __construct()
                {
                    $template = <<<'CONTENTS'
    
    (function () {
        var baseConfig = {elem: "#{:id:}", range : true};
        var userConfig = {:user_config:};
        var config = Object.assign({}, userConfig, baseConfig);
        layui.laydate.render(config);
    })();

CONTENTS;
                    parent::__construct($template);
                }
            };
        }
    }