<?php

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\layui\base\Col;
    use Coco\layui\base\components\Button;
    use Coco\layui\base\components\Card;
    use Coco\layui\base\Document;
    use Coco\layui\base\LayuiContainer;
    use Coco\layui\base\Row;
    use Coco\layui\form\base\Form;
    use Coco\layui\form\base\FormItem;
    use Coco\layui\form\components\CheckboxGroup;
    use Coco\layui\form\components\ColorPicker;
    use Coco\layui\form\components\Date;
    use Coco\layui\form\components\FromSumit;
    use Coco\layui\form\components\Hidden;
    use Coco\layui\form\components\IconPicker;
    use Coco\layui\form\components\RadioGroup;
    use Coco\layui\form\components\RawTextarea;
    use Coco\layui\form\components\Select;
    use Coco\layui\form\components\SelectMulti;
    use Coco\layui\form\components\SingleFileUploader;
    use Coco\layui\form\components\SingleImgUploader;
    use Coco\layui\form\components\SingleSwitch;
    use Coco\layui\form\components\Slider;
    use Coco\layui\form\components\SliderRange;
    use Coco\layui\form\components\Tags;
    use Coco\layui\form\components\Text;
    use Coco\layui\form\components\Textarea;
    use Coco\layui\form\components\Tinymce;
    use Coco\layui\form\components\Transfer;

    require '../vendor/autoload.php';

    //    $basePath = '/admin/';
    $basePath = '/new/coco-layui/resources/';

    DomBlock::$var['title']    = 'layui document';
    DomBlock::$var['disabled'] = false;
    DomBlock::$isDebug         = !false;

    $html = Document::ins($basePath)->process(function(Document $this_, array &$_i) {
        $this_->title(DomBlock::$var['title']);

        $_i[] = LayuiContainer::ins()->process(function(LayuiContainer $this_, array &$_i) {

            /**************************************
             *所有组件通用方法
             **************************************/ /*
                $this_->setSubsections([
                    'container_type' => 'layui-container',
                ]);
            */

            //$this_->setSubsection('container_type', 'layui-container');
            //$this_->setCustomFilter('filter_name');
            //$this_->setCustomDomId('dom_id');
            //$this_->setIsHidden(true);

            /*
            ***************************************
            */
            $this_->layuiContainer();
            //$this_->pearContainer();
            //$this_->layuiFluid();

            $_i[] = Row::ins()->process(function(Row $this_, array &$_i) {
                $this_->appendColSpace(32);

                $_i[] = Col::ins()->process(function(Col $this_, array &$_i) {
                    $this_->colType('md12');

                    $_i[] = Card::ins()->process(function(Card $this_, array &$_i) {
                        $this_->title('卡片');
                        $this_->addCardClass('layui-border-green');
                        $this_->addHeaderClass('layui-bg-green');
//                        $this_->addBodyClass('layui-bg-gray');

                        $_i[] = Form::ins()->process(function(Form $this_, array &$_i) {
                            $this_->withBorder();
                            $this_->setActionUrl('test.php');

                            $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')
                                ->resetText('重新填写')->resetBtnColor('primary')
                                ->setSubmitFilter($this_->getFilterName());

                            /*
                             * --------------------------------------------------------------------------------------------------------------
                             * --------------------------------------------------------------------------------------------------------------
                             * --------------------------------------------------------------------------------------------------------------
                             * --------------------------------------------------------------------------------------------------------------
                             */
                            $_i[] = Hidden::ins('hidden_name', 'hidden_value');

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();
                                $_i[] = Text::ins()->process(function(Text $this_, array &$_i) {

                                    $this_->setColType('md6');

//                                    $this_->none();
//                                    $this_->block();
                                    $this_->inline();

                                    $title = 'Text_1';
                                    $this_->setName($title . '_name');
                                    $this_->setTitle($title . '_title');
                                    $this_->setTips($title . '_tips');
                                    $this_->setCustomFilter('txt');
                                    $this_->setValue($title . '_value');
                                    $this_->setDisabled(DomBlock::$var['disabled']);

                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $this_->fullLine();
                                $_i[] = Textarea::ins()->process(function(Textarea $this_, array &$_i) {

                                    $this_->setColType('md6');

                                    $this_->block();
//                                    $this_->inline();

                                    $title = 'Textarea_1';
                                    $this_->setName($title . '_name');
                                    $this_->setTitle($title . '_title');
                                    $this_->setTips($title . '_tips');
                                    $this_->setCustomFilter('txt');
                                    $this_->setValue($title . '_value');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $_i[] = ColorPicker::ins()->process(function(ColorPicker $this_, array &$_i) {
                                    $title = 'Colorpicker_0';
                                    $this_->setName($title . '_name');
                                    $this_->setValue('#9bff9b');
                                    $this_->setTitle($title . '_title');
                                    $this_->setTips($title . '_tips');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $_i[] = IconPicker::ins()->process(function(IconPicker $this_, array &$_i) {

                                    $title = 'IconPicker_0';
                                    $this_->setName($title . 'name');
                                    $this_->setValue('layui-icon-tips-fill');
                                    $this_->setTitle($title . '_title');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $_i[] = SingleSwitch::ins()->process(function(SingleSwitch $this_, array &$_i) {
                                    $this_->setColType('md6');

                                    //$this_->block();
                                    $this_->inline();

//                                    $this_->tag();
//                                    $this_->switch();
                                    $this_->checkBox();

                                    $title = 'SingleSwitch_0';
                                    $this_->setName($title . '_name');
                                    $this_->setTitle($title . '_title');
                                    //   $this_->setTips($title . '_tips');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                    $this_->setText('ON|OFF');
                                    $this_->setValue(!false);
                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();
                                $_i[] = Date::ins()->process(function(Date $this_, array &$_i) {

                                    $this_->setColType('md6');
//                                    $this_->block();
                                    $this_->inline();

                                    $title = 'Date_0';
                                    $this_->setName($title . '_name');
                                    $this_->setValue('2023-11-1');
                                    $this_->setTitle($title . '_title');
                                    $this_->setTips($title . '_tips');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                    $this_->setPlaceholder('yyyy_MM_dd');
                                    $this_->SimpleDate();

                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();
                                $_i[] = Date::ins()->process(function(Date $this_, array &$_i) {

                                    $this_->setColType('md6');
//                                    $this_->block();
                                    $this_->inline();

                                    $title = 'Date_1';
                                    $this_->setName($title . '_name');
                                    $this_->setValue('2023-11-2 - 2023-11-12');
                                    $this_->setTitle($title . '_title');
                                    $this_->setTips($title . '_tips');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                    $this_->setPlaceholder('yyyy_MM_dd');
                                    $this_->rangeDate();

                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();
                                $_i[] = CheckboxGroup::ins()->process(function(CheckboxGroup $this_, array &$_i) {

                                    $this_->setColType('md6');
                                    $this_->appendColType('xs6');

                                    $this_->block();
//                                    $this_->inline();

//                                    $this_->tag();
                                    $this_->switch();
//                                    $this_->checkBox();

                                    $title = 'Checkbox_1';
                                    $this_->setName($title . '_name[]');
                                    $this_->setTitle($title . '_title');
                                    $this_->setTips($title . '_tips');

                                    $this_->setValue('1,2');
                                    $this_->setValue(null);
                                    $this_->setOptions([
                                        1 => [
                                            "label"    => "radio_label1|哈哈",
                                            "disabled" => true,
                                        ],
                                        2 => [
                                            "label"    => "radio_label2|哈哈",
                                            "selected" => true,

                                        ],
                                        3 => [
                                            "label" => "radio_label3|哈哈",
                                        ],
                                    ]);
                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();
                                $_i[] = RadioGroup::ins()->process(function(RadioGroup $this_, array &$_i) {

                                    $this_->setColType('md6');

                                    $this_->block();
//                                    $this_->inline();

                                    $title = 'Radio_1';
                                    $this_->setName($title . '_name');
                                    $this_->setTitle($title . '_title');
                                    $this_->setTips($title . '_tips');

                                    $this_->setValue(3);
//                                        $this_->setValue(null);
                                    $this_->setOptions([
                                        1 => [
                                            "label"    => "radio_label1|哈哈",
                                            "disabled" => true,
                                        ],
                                        2 => [
                                            "label"    => "radio_label2|哈哈",
                                            "selected" => true,

                                        ],
                                        3 => [
                                            "label" => "radio_label3|哈哈",
                                        ],
                                    ]);

                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();
                                $_i[] = Select::ins()->process(function(Select $this_, array &$_i) {

                                    $this_->setColType('md6');

//                                        $this_->block();
                                    $this_->inline();

                                    $title = 'Select_1';
                                    $this_->setName($title . '_name');
                                    $this_->setTitle($title . '_title');
                                    $this_->setTips($title . '_tips');

                                    $this_->setCustomFilter('aaa');
                                    $this_->setValue(9);
                                    $this_->setValue(null);
                                    $this_->setOptions([
                                        6 => [
                                            "label"    => "radio_label6",
                                            "disabled" => true,
                                        ],
                                        7 => [
                                            "label" => "radio_label7",
                                            "group" => "水果",
                                        ],
                                        8 => [
                                            "label"    => "radio_label8",
                                            "group"    => "蔬菜",
                                            "selected" => true,
                                        ],
                                        9 => [
                                            "label"    => "radio_label9",
                                            //                                                "selected" => true,
                                            "disabled" => true,
                                            "group"    => "蔬菜",
                                        ],
                                    ]);

                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $_i[] = SelectMulti::ins()->process(function(SelectMulti $this_, array &$_i) {
                                    $this_->setColType('md6');

                                    $title = 'SelectMulti_1';
                                    $this_->setName($title . '_name');
                                    $this_->setTitle($title . '_title');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                    $this_->setValue('6,8');
                                    $this_->setValue(null);

//                                    $this_->skinDanger();
                                    $this_->skinWarm();
//                                    $this_->skinDefault();
//                                    $this_->skinNormal();

                                    $this_->setOptions([
                                        6 => [
                                            "label"    => "SelectMulti_label6",
                                            "disabled" => true,
                                        ],
                                        7 => [
                                            "label" => "SelectMulti_label7",
                                        ],
                                        8 => [
                                            "label"    => "SelectMulti_label8",
                                            "selected" => true,
                                        ],
                                        9 => [
                                            "label"    => "SelectMulti_label9",
                                            "selected" => true,
                                            "disabled" => true,
                                        ],
                                    ]);

                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $this_->fullLine();

                                $_i[] = Slider::ins()->process(function(Slider $this_, array &$_i) {
                                    $this_->setColType('md6');

                                    $this_->setThemeWarning();
                                    //$this_->setThemeSuccess();
                                    //$this_->setThemeInfo();
                                    //$this_->setThemeDanger();
                                    //$this_->setCustomTheme('');

                                    $title = 'Slider_1';
                                    $this_->setName($title . '_name');
                                    $this_->setValue(22);
                                    $this_->setMax(50);
                                    $this_->setMin(10);
                                    $this_->setStep(1);
                                    $this_->setThemeInfo();
                                    $this_->setTitle($title . '_title');
                                    $this_->setTips($title . '_tips');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $this_->fullLine();
                                $_i[] = SliderRange::ins()->process(function(SliderRange $this_, array &$_i) {
                                    $this_->setColType('md6');

                                    //$this_->setThemeWarning();
                                    //$this_->setThemeSuccess();
                                    $this_->setThemeInfo();
                                    //$this_->setThemeDanger();
                                    //$this_->setCustomTheme('');

                                    $title = 'SliderRange_1';
                                    $this_->setName($title . 'name');
                                    $this_->setValue('11,75');
                                    $this_->setMax(100);
                                    $this_->setMin(0);
                                    $this_->setStep(1);
                                    $this_->setTips($title . '_tips');
                                    $this_->setTitle($title . '_title');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $this_->fullLine();

                                $_i[] = Tags::ins()->process(function(Tags $this_, array &$_i) {
                                    $this_->setColType('md6');
                                    $title = 'Tags_1';

                                    $this_->setTitle($title . '_title');
                                    $this_->setName($title . '_name');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                    $this_->setUnique();
                                    $this_->setRule([
                                        'number',
                                    ]);
                                    $this_->setValue([
                                        "tags_label6",
                                        "tags_label7",
                                        "tags_label8",
                                        "tags_label9",
                                    ]);

                                });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $this_->fullLine();
                                $_i[] = Transfer::ins()->process(function(Transfer $this_, array &$_i) {
                                    $this_->setColType('md6');
                                    $this_->block();

                                    $title = 'Transfer_1';
                                    $this_->setName($title . '_name');
                                    $this_->setTitle($title . '_title');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                    $this_->setTitles('左边标题', '右边标题');
//                                    $this_->setHeightAndWidth('auto', 300);
                                    $this_->setHeightAndWidth(300, 250);

                                    $this_->setValue('6,8,11');
                                    $this_->setValue(null);
                                    $this_->setOptions([
                                        6  => [
                                            "label"    => "Transfer_label6",
                                            "disabled" => true,
                                        ],
                                        7  => [
                                            "label" => "Transfer_label7",
                                        ],
                                        8  => [
                                            "label"    => "Transfer_label8",
                                            "selected" => true,
                                        ],
                                        9  => [
                                            "label"    => "Transfer_label9",
                                            "selected" => true,
                                            "disabled" => true,
                                        ],
                                        10 => [
                                            "label"    => "Transfer_label10",
                                            "selected" => true,
                                        ],
                                        11 => [
                                            "label"    => "Transfer_label11",
                                            "selected" => true,
                                            "disabled" => true,
                                        ],
                                    ]);

                                });
                            });

                            $_i[] = FormItem::ins()->process(callback: function(FormItem $this_, array &$_i) {
                                $this_->fullLine();

                                $_i[] = SingleFileUploader::ins()
                                    ->process(function(SingleFileUploader $this_, array &$_i) {
                                        $this_->setColType('md6');

                                        $title = 'SingleFileUploader_0';
                                        $this_->setName($title . '_name');
                                        $this_->setValue($title . '_value');
                                        $this_->maxSizeKB(30 * 1024);
                                        $this_->setTitle($title . '_title');
                                        $this_->setTips($title . '_tips');
                                        $this_->setDisabled(DomBlock::$var['disabled']);
                                        $this_->setApiUrl('http://local.deve:6025/admin/test.php');
                                        $this_->setFileField('imageeee');
                                    });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $this_->fullLine();

                                $_i[] = SingleImgUploader::ins()
                                    ->process(function(SingleImgUploader $this_, array &$_i) {
                                        $this_->setColType('md6');

                                        $title = 'SingleImgUploader_0';
                                        $this_->setName($title . '_name');
                                        $this_->setValue($title . '_value');
                                        $this_->maxSizeKB(3 * 1024);
                                        $this_->setTitle($title . '_title');
                                        $this_->setTips($title . '_tips');
                                        $this_->setDisabled(DomBlock::$var['disabled']);
                                        $this_->setApiUrl('http://local.deve:6025/admin/test.php');
                                        $this_->setPreview('http://local.deve:6025/admin/1.png');
                                        $this_->setFileField('imageeee');
                                    });
                            });

                            $_i[] = FormItem::ins()->process(function(FormItem $this_, array &$_i) {
                                $this_->fullLine();
                                $_i[] = Tinymce::ins()->process(function(Tinymce $this_, array &$_i) {
                                    $this_->setColType('md12');

                                    $title = 'Tinymce_1';
                                    $this_->setName($title . '_name');
                                    $this_->setValue($title . '--Tinymce_1_value');
                                    $this_->setTitle($title . '_title');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                    $this_->setUploadUrl('http://local.deve:6025/admin/test.php');
                                    $this_->setFieldName('image_upload');
                                    $this_->setHeightAndWidth('500', 'auto');
                                    $this_->setData([
                                        "key" => "value",
                                    ]);
                                });
                            });

                            /*
                             * --------------------------------------------------------------------------------------------------------------
                             * --------------------------------------------------------------------------------------------------------------
                             * --------------------------------------------------------------------------------------------------------------
                             * --------------------------------------------------------------------------------------------------------------
                             */

                            $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')
                                ->resetText('重新填写')->resetBtnColor('primary')
                                ->setSubmitFilter($this_->getFilterName());

                        });
                    });

                });
            });

        });
    });

    print_r($html->render());