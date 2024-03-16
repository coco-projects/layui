<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\htmlBuilder\dom\others\JSCode;
    use Coco\layui\base\components\Div;

    class Tinymce extends RawTextarea
    {
        public function __construct()
        {
            parent::__construct();

            $this->divContainer = Div::ins();
            $this->attrsRegistry->appendStyleKv('display', 'none');
        }

        protected function makeScriptSection(): void
        {
            $this->scriptSection = new class extends JSCode {
                protected array $defaultValue = [
                    "width"       => '"100%"',
                    "height"      => 600,
                    "upload_url"  => '',
                    "field_name"  => 'file_upload',
                    "data"        => '{}',
                    "user_config" => '{}',
                ];

                public function __construct()
                {
                    $template = <<<'CONTENTS'
    
    (function () {
        var userConfig = {:user_config:};
    
        var baseConfig = {
            elem                         : "#{:ele_id:}",
            height                       : {:height:},
            width                        : {:width:},
            images_upload_url            : "{:upload_url:}",
            resize                       : true,
            automatic_uploads            : true,
            paste                        : true,
            paste_data_images            : true,
            statusbar                    : true,
            paste_webkit_styles          : "all",
            paste_retain_style_properties: "all",
            smart_paste                  : false,
            paste_remove_styles_if_webkit: false,
            autosave_interval: '5s',
            plugins                      : "autosave code paste kityformula-editor quickbars print preview searchreplace autolink fullscreen image link media codesample table charmap hr advlist lists wordcount imagetools indent2em",
            toolbar                      : "preview_contents preview- code | undo redo | kityformula-editor forecolor backcolor bold italic underline strikethrough | indent2em alignleft aligncenter alignright alignjustify outdent indent | link bullist numlist image table codesample | formatselect fontselect fontsizeselect",
            menubar                      : "file edit insert format table",
            quickbars_selection_toolbar  : "cut copy | bold italic underline strikethrough ",
            menu                         : {
                file  : {
                    title: "文件",
                    items: "fullscreen newdocument | print | wordcount |StoreDraft Restoredraft RemoveDraft"
                },
                edit  : {
                    title: "编辑",
                    items: "undo redo | cut copy paste pastetext selectall | searchreplace"
                },
                format: {
                    title: "格式",
                    items: "bold italic underline strikethrough superscript subscript | formats | forecolor backcolor | removeformat"
                },
                table : {
                    title: "表格",
                    items: "inserttable tableprops deletetable | cell row column"
                }
            },
    
            form                         : {
                name: "{:field_name:}",
                data: {:data:}
            },
    
            init_instance_callback: function (editor) {
                editor.on("NodeChange", function (e) {
                    $("#{:input_id:}").text(editor.getContent());
                });
            },
    
    
            setup: function (editor) {
                editor.ui.registry.addButton("preview_contents", {
                    // text    : "preview contents",
                    icon    : "preview",
                    onAction: function () {
                        layer.open({
                            type      : 1,
                            anim      : -1,
                            isOutAnim: false,
                            shadeClose: true,
                            shade     : 0.5,
                            area      : [
                                "80%",
                                "80%"
                            ],
                            content   : "<div style=\"padding: 12px;\">" + editor.getContent() + "</div>"
                        });
                    }
                });
            }
    
            /*
            menu   : {
                custom: {
                    title: "Custom Menu",
                    items: "undo redo myCustomMenuItem"
                }
            },
            menubar: "file edit custom",
            toolbar: "mysidebar",
            setup  : function (editor) {
                editor.ui.registry.addMenuItem("myCustomMenuItem", {
                    text    : "My Custom Menu Item",
                    onAction: function () {
                        alert("Menu item clicked");
                    }
                });
    
                editor.ui.registry.addSidebar("mysidebar", {
                    tooltip: "My sidebar",
                    icon   : "comment",
                    onSetup: function (api) {
                        console.log("Render panel", api.element());
                    },
                    onShow : function (api) {
                        console.log("Show panel", api.element());
                        api.element().innerHTML = "Hello world!";
                    },
                    onHide : function (api) {
                        console.log("Hide panel", api.element());
                    }
                });
            },*/
    
        };
    
        var config = Object.assign({}, userConfig, baseConfig);
    
        layui.tinymce.render(config);
    
    })();

CONTENTS;

                    parent::__construct($template);
                }
            };
        }

        protected function beforeRender(): void
        {
            $this->scriptSection->setSubsection('ele_id', $this->divContainer->attrsRegistry->getDomId());
            $this->scriptSection->setSubsection('input_id', $this->attrsRegistry->getDomId());
            $this->divContainer->setInnerContents($this->value);

            $this->appendToNode($this->divContainer);

            parent::beforeRender();
        }


        public function setUploadUrl(mixed $value): static
        {
            $this->scriptSection->setSubsection('upload_url', $value);

            return $this;
        }

        public function setData(mixed $data): static
        {
            $this->scriptSection->setSubsection('data', json_encode($data));

            return $this;
        }

        public function setFieldName(mixed $value): static
        {
            $this->scriptSection->setSubsection('field_name', $value);

            return $this;
        }

        public function setHeightAndWidth(mixed $height, mixed $width): static
        {
            if (!is_numeric($height))
            {
                $height = '"'.$height.'"';
            }

            if (!is_numeric($width))
            {
                $width = '"'.$width.'"';
            }


            $this->scriptSection->setSubsection('height', $height);
            $this->scriptSection->setSubsection('width', $width);

            return $this;
        }
    }