<?php

    use Coco\layui\base\components\Card;
    use Coco\layui\base\components\Col;
    use Coco\layui\base\components\LayuiContainer;
    use Coco\layui\base\components\Row;
    use Coco\layui\base\components\Tab;
    use Coco\layui\base\Document;
    use Coco\layui\form\base\Form;
    use Coco\layui\form\base\FormItem;
    use Coco\layui\form\base\wrappers\ColItem;
    use Coco\layui\form\base\wrappers\InputItem;
    use Coco\layui\form\components\ColorPicker;
    use Coco\layui\form\components\Hidden;
    use Coco\layui\form\components\IconPicker;
    use Coco\layui\form\components\RadioGroup;
    use Coco\layui\form\components\RangeDatePicker;
    use Coco\layui\form\components\RawInput;
    use Coco\layui\form\components\RawMultiSelect;
    use Coco\layui\form\components\RawSelect;
    use Coco\layui\form\components\RawTextarea;
    use Coco\layui\form\components\SingleCheckbox;
    use Coco\layui\form\components\SingleDatePicker;
    use Coco\layui\form\components\SingleRadio;
    use Coco\layui\form\components\Slider;
    use Coco\layui\form\components\CheckboxGroup;
    use Coco\layui\form\components\SliderRange;
    use Coco\layui\form\components\Tags;
    use Coco\layui\form\components\Tinymce;
    use Coco\layui\form\components\Transfer;

    require '../vendor/autoload.php';

    //    $basePath = '/admin/';
    $basePath = '/new/coco-layui/resources/';

    Document::$var['title']    = 'layui document';
    Document::$var['disabled'] = false;
    Document::$isDebug         = true;

    $html = Document::ins($basePath)->inner(function(Document $this_, array &$_i) {

        $_i[] = LayuiContainer::ins()->inner(function(LayuiContainer $this_, array &$_i) {
            $this_->attrsRegistry->setCustomDomId('999');
            $this_->attrsRegistry->setCustomFilterName('filterName__');

            $this_->layuiContainer();
//            $this_->layuiFluid();
//            $this_->pearContainer();

            $_i[] = Row::ins()->inner(function(Row $this_, array &$_i) {

                $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                    $this_->addType('md12');

                    $_i[] = Card::ins()->inner(function(Card $this_, array &$_i) {
                        $this_->title('the form');

                        $this_->cardRegistry->borderGreen();
//                        $this_->cardRegistry->fontRed();
                        $this_->cardRegistry->margin(2);

                        $this_->cardHeaderRegistry->bgGreen();
                        $this_->cardHeaderRegistry->fontSize(28);

                        $_i[] = Form::ins()->inner(function(Form $this_, array &$_i) {
//                            $this_->btnXs();

                            $this_->attrsRegistry->appendColSpace(16);
//                            $this_->formRow();
                            $this_->withBorder();
                            $this_->actionUrl('test.php');

                            $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                                $this_->addType('md3');

                                Document::$var['label_'] = 'RawInput1';
                                $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                    $this_->setName('name_' . Document::$var['label_']);
                                    $this_->setValue('value_' . Document::$var['label_']);
                                    $this_->setPlaceholder('placeholder_' . Document::$var['label_']);

                                    $this_->setIsDisabled(Document::$var['disabled']);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                });
                            });

                            $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                                $this_->addType('md3');

                                Document::$var['label_'] = 'RawInput2';
                                $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                    $this_->setName('name_' . Document::$var['label_']);
                                    $this_->setValue('value_' . Document::$var['label_']);
                                    $this_->setPlaceholder('placeholder_' . Document::$var['label_']);

                                    $this_->setIsDisabled(Document::$var['disabled']);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                });
                            });

                            $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                                $this_->addType('md3');

                                Document::$var['label_'] = 'RawInput3';
                                $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                    $this_->setName('name_' . Document::$var['label_']);
                                    $this_->setValue('value_' . Document::$var['label_']);
                                    $this_->setPlaceholder('placeholder_' . Document::$var['label_']);

                                    $this_->setIsDisabled(Document::$var['disabled']);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                });
                            });

                            $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                                $this_->addType('md3');

                                Document::$var['label_'] = 'RawInput4';
                                $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                    $this_->setName('name_' . Document::$var['label_']);
                                    $this_->setValue('value_' . Document::$var['label_']);
                                    $this_->setPlaceholder('placeholder_' . Document::$var['label_']);

                                    $this_->setIsDisabled(Document::$var['disabled']);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                });
                            });


                            $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                                $this_->addType('md6');

                                $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                    $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                        Document::$var['label_'] = 'RawInput5';

//                                    $this_->inline();
                                        $this_->setLabelStr('label_' . Document::$var['label_']);
                                        $this_->setTipsStr('tips_' . Document::$var['label_']);

                                        $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                            $this_->setName('name_' . Document::$var['label_']);
                                            $this_->setValue('value_' . Document::$var['label_']);

                                            $this_->setIsDisabled(Document::$var['disabled']);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                        });
                                    });
                                });
                            });



                            $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                                $this_->addType('md6');

                                $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                    $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                        Document::$var['label_'] = 'RawInput6';

//                                    $this_->inline();
                                        $this_->setLabelStr('label_' . Document::$var['label_']);
                                        $this_->setTipsStr('tips_' . Document::$var['label_']);

                                        $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                            $this_->setName('name_' . Document::$var['label_']);
                                            $this_->setValue('value_' . Document::$var['label_']);

                                            $this_->setIsDisabled(Document::$var['disabled']);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                        });
                                    });
                                });
                            });




                            $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                                $this_->addType('md4');

                                $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                    $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                        Document::$var['label_'] = 'RawInput7';

//                                    $this_->inline();
//                                        $this_->setLabelStr('label_' . Document::$var['label_']);
//                                        $this_->setTipsStr('tips_' . Document::$var['label_']);

                                        $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                            $this_->setName('name_' . Document::$var['label_']);
                                            $this_->setValue('value_' . Document::$var['label_']);

                                            $this_->setIsDisabled(Document::$var['disabled']);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                        });
                                    });
                                });
                            });



                            $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                                $this_->addType('md4');

                                $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                    $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                        Document::$var['label_'] = 'RawInput8';

//                                    $this_->inline();
//                                        $this_->setLabelStr('label_' . Document::$var['label_']);
//                                        $this_->setTipsStr('tips_' . Document::$var['label_']);

                                        $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                            $this_->setName('name_' . Document::$var['label_']);
                                            $this_->setValue('value_' . Document::$var['label_']);

                                            $this_->setIsDisabled(Document::$var['disabled']);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                        });
                                    });
                                });
                            });


                            $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                                $this_->addType('md4');

                                $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                    $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                        Document::$var['label_'] = 'RawInput9';

//                                    $this_->inline();
//                                        $this_->setLabelStr('label_' . Document::$var['label_']);
//                                        $this_->setTipsStr('tips_' . Document::$var['label_']);

                                        $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                            $this_->setName('name_' . Document::$var['label_']);
                                            $this_->setValue('value_' . Document::$var['label_']);

                                            $this_->setIsDisabled(Document::$var['disabled']);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                        });
                                    });
                                });
                            });



                        });
                    });

                });

            });

        });
    });

    echo $html->render();

















