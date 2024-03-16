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
                                    $this_->setColType('md3');
                                    $this_->padding(2);

//                                    $this_->block();
//                                    $this_->inline();
                                    $this_->none();


                                    $title = 'Text_0';
                                    $this_->setName($title . '_name');
//                                    $this_->setTitle($title . '_title');
//                                    $this_->setTips($title . '_tips');
                                    $this_->setCustomFilter('txt');
                                    $this_->setValue($title . '_value');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                });

                                $_i[] = Text::ins()->process(function(Text $this_, array &$_i) {
                                    $this_->setColType('md3');
                                    $this_->padding(2);

//                                    $this_->block();
//                                    $this_->inline();
                                    $this_->none();


                                    $title = 'Text_1';
                                    $this_->setName($title . '_name');
//                                    $this_->setTitle($title . '_title');
//                                    $this_->setTips($title . '_tips');
                                    $this_->setCustomFilter('txt');
                                    $this_->setValue($title . '_value');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                });

                                $_i[] = Text::ins()->process(function(Text $this_, array &$_i) {
                                    $this_->setColType('md3');
                                    $this_->padding(2);

//                                    $this_->block();
                                    $this_->inline();
//                                    $this_->none();

                                    $title = 'Text_2';
                                    $this_->setName($title . '_name');
//                                    $this_->setTitle($title . '_title');
//                                    $this_->setTips($title . '_tips');
                                    $this_->setCustomFilter('txt');
                                    $this_->setValue($title . '_value');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
                                });

                                $_i[] = Text::ins()->process(function(Text $this_, array &$_i) {
                                    $this_->setColType('md3');
                                    $this_->padding(2);

//                                    $this_->block();
                                    $this_->inline();
//                                    $this_->none();


                                    $title = 'Text_3';
                                    $this_->setName($title . '_name');
//                                    $this_->setTitle($title . '_title');
//                                    $this_->setTips($title . '_tips');
                                    $this_->setCustomFilter('txt');
                                    $this_->setValue($title . '_value');
                                    $this_->setDisabled(DomBlock::$var['disabled']);
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