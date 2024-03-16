<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\tags\CSSCode;
    use Coco\htmlBuilder\dom\tags\JSCode;

    class SingleFileUploader extends ComponentBase
    {
        protected array $defaultValue = [
            "block_or_inline" => 'block',
            "col_type"        => 'md6',
        ];

        public function __construct()
        {
            $template = <<<'CONTENTS'
<div class="layui-col-{:col_type:} {:class:}" {:attrs:}>
{:title:}
<div class="layui-input-{:block_or_inline:}">
    <input value="{:value:}" name="{:name:}" type="text" class="layui-input" id="{:id:}_input_value" disabled>
</div>
<div class="layui-input-block ">
    <div class="layui-margin-2 layui-padding-2 layui-bg-gray">
        <div  class="layui-bg-gray {:disabled:} layui-upload-drag" id="{:id:}_upload_btn" >
            <i class="layui-icon layui-icon-upload"></i>
            <div class="layui-bg-blue layui-padding-2">点击选择文件，或拖拽文件到此区域</div>
        </div>
        <div style="width: 100%;">
            <div class="layui-upload-list" id="{:id:}_upload_text_info" style="display: none;">
                <span class="layui-badge layui-bg-red layui-margin-1" id="{:id:}_upload_text_name"></span>
                <span class="layui-badge layui-bg-blue layui-margin-1" id="{:id:}_upload_text_size"></span>
            </div>
            <div class="layui-progress layui-progress-big" lay-showPercent="yes"  lay-filter="{:lay_filter:}_progress">
                <div class="layui-progress-bar" lay-percent=""></div>
            </div>
            <div id="{:id:}_upload_text_error" class="" style="display: none;">
                <span class="layui-badge layui-bg-red layui-margin-1">上传失败</span>
                <button type="button" class="layui-btn layui-btn-xs upload-reload">重试</button>
            </div>
            <div id="{:id:}_upload_text_success" class="" style="display: none;">
                <span class="layui-badge layui-bg-green layui-margin-1">上传成功</span>
            </div>
            
            <div id="{:id:}_upload_delete" class="" style="display: none;">
                <a class="layui-btn layui-bg-purple layui-btn-xs upload-delete">删除</a>
            </div>
        </div>
    </div>
</div>
{:tips:}
</div>
CONTENTS;
            parent::__construct($template);
        }


        public function setFileField(string $value): static
        {
            $this->scriptSection->setSubsection('field', $value);

            return $this;
        }

        public function setApiUrl(string $value): static
        {
            $this->scriptSection->setSubsection('url', $value);

            return $this;
        }

        public function maxSizeKB(mixed $value): static
        {
            $this->scriptSection->setSubsection('size', $value);

            return $this;
        }


        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {
                protected array $defaultValue = [
                    "id"    => 0,
                    "size"  => 10 * 1024,
                    "field" => 'upload_image',
                    "url"   => '',
                ];

                public function __construct()
                {
                    $template = <<<'CONTENTS'
(function () {
    var upload  = layui.upload;
    var layer   = layui.layer;
    var element = layui.element;
    var $       = layui.$;
    
    let initView = function () {
       
        let file = $("#{:id:}_input_value");
    
        if (file.val())
        {
            $("#{:id:}_upload_delete").show().find('.upload-delete').on("click", function () {
                $("#{:id:}_upload_delete").hide()
                $("#{:id:}_input_value").val('');
                element.progress("{:lay_filter:}_progress", "0%"); // 进度条复位
                $("#{:id:}_upload_text_error").hide();
                $("#{:id:}_upload_text_success").hide();
                $("#{:id:}_upload_text_info").hide();
            });
        }
    }

    initView();
            
    var uploadInst = upload.render({
        elem  : "#{:id:}_upload_btn",
        field  : "{:field:}",
        dataType   : "json",
        accept   : "file",
        size   : {:size:},
        acceptMime   : "*/*",
        url   : "{:url:}",
        before: function (obj) {

            // 预读本地文件示例，不支持ie8
            obj.preview(function (index, file, result) {
                 console.dir(file)
                 $("#{:id:}_upload_text_name").text(file.name);
                 $("#{:id:}_upload_text_size").text(formatSize(file.size));
                 $("#{:id:}_upload_text_info").show();
            });

            element.progress("{:lay_filter:}_progress", "0%"); // 进度条复位

            layer.msg("上传中", {
                icon: 16,
                time: 0
            });
        },
        done  : function (res) {
        
            if (res.code > 0)
            {
                // 若上传失败
                element.progress("{:lay_filter:}_progress", "0%"); // 进度条复位
                layer.msg("上传失败");
            }
            else
            {
                layer.msg("上传成功");

                // 上传成功的一些操作
                $("#{:id:}_upload_text_error").hide();
                $("#{:id:}_upload_text_success").show();
                $("#{:id:}_input_value").val(res.data);
            }

            initView();
        },
        error : function () {
            // 演示失败状态，并实现重传
            $("#{:id:}_upload_text_success").hide();
            $("#{:id:}_upload_text_error").show().find(".upload-reload").on("click", function () {
                uploadInst.upload();
            });
            element.progress("{:lay_filter:}_progress", "0%"); // 进度条复位

        },
        // 进度条
        progress: function (n, elem, e) {
            element.progress("{:lay_filter:}_progress", n + "%");
            if (n == 100)
            {
                layer.msg("上传完毕", {icon: 1});
            }
        }
    });
    
    
})();

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


        protected function init(): void
        {

        }

        protected function initAfterSectionRender(): void
        {
            $this->afterSectionRender['title'] = function(string $nodeName, mixed &$stringable) {
                if ($stringable)
                {
                    $stringable = '<label class="layui-form-label" for="' . $this->getDomId() . '">' . $stringable . '</label>';
                }
            };

            $this->afterSectionRender['tips'] = function(string $nodeName, mixed &$stringable) {
                if ($stringable)
                {
                    $stringable = '<div class="layui-form-mid layui-text-em">' . $stringable . '</div>';
                }
            };
        }

        protected function beforeRender(): void
        {
            $this->setDomId();
            $this->setFilter();

            $this->setSubsection('title', $this->title);
            $this->setSubsection('name', $this->name);
            $this->setSubsection('value', $this->value);
            $this->setSubsection('placeholder', $this->placeholder);
            $this->setSubsection('tips', $this->tips);

            $this->disabled and $this->appendAttrs('disabled');
            $this->checked and $this->appendAttrs('checked');
            $this->selected and $this->appendAttrs('selected');

            $this->setSubsection('attrs', ' ' . implode(' ', $this->attrs));
            $this->setSubsection('class', ' ' . implode(' ', $this->class));

            if ($this->selected)
            {
                $this->setSubsection('disabled', 'layui-hide');
            }

            if ($this->scriptSection instanceof JSCode)
            {
                $this->scriptSection->setSubsection('id', $this->getDomId());
                $this->scriptSection->setSubsection('lay_filter', $this->getFilterName());
                $this->scriptSection->setSubsection('value', $this->value);
            }

        }

        protected function afterRender(string &$sectionContents): void
        {

        }
    }