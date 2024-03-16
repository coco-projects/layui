<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\htmlBuilder\dom\others\JSCode;

    class SingleDatePicker extends RawInput
    {
        public function __construct()
        {
            parent::__construct();

            $this->setValue('2022-01-01');

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
                text : "昨天",
                value: function () {
                    var now = new Date();
                    now.setDate(now.getDate() - 1);
                    return now;
                }
            },
            {
                text : "今天",
                value: function () {
                    return Date.now();
                }
            },
            {
                text : "明天",
                value: function () {
                    var now = new Date();
                    now.setDate(now.getDate() + 1);
                    return now;
                }
            },
            {
                text : "上月今天",
                value: function () {
                    var now   = new Date();
                    var month = now.getMonth() - 1;
                    now.setMonth(month);
                    // 若上个月数不匹配，则表示天数溢出
                    if (now.getMonth() !== month)
                    {
                        now.setDate(0); // 重置天数
                    }
                    return [now];
                }
            },
            {
                text : "下月今天",
                value: function () {
                    var now   = new Date();
                    var month = now.getMonth() + 1;
                    now.setMonth(month);
                    // 若下个月数不匹配，则表示天数溢出
                    if (now.getMonth() !== month)
                    {
                        now.setDate(0); // 重置天数
                    }
                    return [now];
                }
            }
        ]
    }',
                ];

                public function __construct()
                {
                    $template = <<<'CONTENTS'
    
    (function () {
        var baseConfig = {elem: "#{:id:}"};
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