<?php

    declare(strict_types = 1);

    namespace Coco\Tests\Unit;

    use Coco\layui\base\components\Card;
    use Coco\layui\base\components\Col;
    use Coco\layui\base\components\Hr;
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
    use Coco\layui\others\utils\fieldUtils\Field;
    use Coco\layui\others\utils\fieldUtils\FieldRegistry;
    use PHPUnit\Framework\TestCase;

    final class Dom3Test extends TestCase
    {
        public function testA()
        {
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
                                    $this_->withBorder();
                                    $this_->actionUrl('test.php');
                                    $this_->attrsRegistry->appendColSpace(16);

                                    $_i[] = Hidden::ins('Hidden_name', 'Hidden_value');

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RawInput1';

                                            $this_->inline();
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

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RawInput2';

                                            $this_->inline();
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

                                    $_i[] = ColItem::ins('md12')->inner(function(ColItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RawInput3';

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

                                    $_i[] = ColItem::ins('md4')->inner(function(ColItem $this_, array &$_i) {
                                        $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RawInput4';

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

                                    $_i[] = ColItem::ins('md4')->inner(function(ColItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RawInput5';

                                            $this_->inline();
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

                                    $_i[] = ColItem::ins('md4')->inner(function(ColItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RawInput6';

                                            $this_->inline();
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

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'ColorPicker';

                                            $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
                                            $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = ColorPicker::ins()->inner(function(ColorPicker $this_, array &$_i) {
                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setValue('#9bff9b');
                                                $this_->setIsDisabled(Document::$var['disabled']);

                                            });
                                        });
                                    });
                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'SingleDatePicker';

                                            $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
                                            $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = SingleDatePicker::ins()
                                                ->inner(function(SingleDatePicker $this_, array &$_i) {
                                                    $this_->setName('name_' . Document::$var['label_']);
                                                    $this_->setValue('2023-11-1');
                                                    $this_->setIsDisabled(Document::$var['disabled']);
                                                });
                                        });
                                    });

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RangeDatePicker';

                                            $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
                                            $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = RangeDatePicker::ins()->inner(function(RangeDatePicker $this_, array &$_i) {
                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setValue('2023-12-11 - 2024-01-19');
                                                $this_->setIsDisabled(Document::$var['disabled']);

                                            });
                                        });
                                    });

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'IconPicker';

                                            $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
                                            $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = IconPicker::ins()->inner(function(IconPicker $this_, array &$_i) {
                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setValue('layui-icon-tips-fill');
                                                $this_->setIsDisabled(Document::$var['disabled']);

                                            });
                                        });
                                    });

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
                                        $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'Slider';

//                                    $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = Slider::ins()->inner(function(Slider $this_, array &$_i) {

                                                $this_->setIsDisabled(Document::$var['disabled']);
                                                $this_->setThemeWarning();
//                                        $this_->setThemeSuccess();
//                                        $this_->setThemeInfo();
//                                        $this_->setThemeDanger();
                                                //$this_->setCustomTheme('');

                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setValue(30);
                                                $this_->setMax(50);
                                                $this_->setMin(10);
                                                $this_->setStep(1);
                                            });
                                        });
                                    });

                                    $_i[] = Col::ins('md6')->inner(function(Col $this_, array &$_i) {
                                        $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
                                            $this_->fullLine();

                                            $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                                Document::$var['label_'] = 'SliderRange';

//                                    $this_->inline();
                                                $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                                $_i[] = SliderRange::ins()->inner(function(SliderRange $this_, array &$_i) {
                                                    $this_->setIsDisabled(Document::$var['disabled']);

//                                        $this_->setThemeWarning();
                                                    $this_->setThemeSuccess();
//                                        $this_->setThemeInfo();
//                                        $this_->setThemeDanger();
                                                    //$this_->setCustomTheme('');

                                                    $this_->setName('name_' . Document::$var['label_']);
                                                    $this_->setValue('25,37');
                                                    $this_->setMax(80);
                                                    $this_->setMin(10);
                                                    $this_->setStep(1);
                                                });
                                            });
                                        });
                                    });

                                    $_i[] = Col::ins('md12')->inner(function(Col $this_, array &$_i) {
                                        $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                    $this_->fullLine();

                                            $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                                Document::$var['label_'] = 'SingleRadio';

                                                $this_->inline();
                                                $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                                $_i[] = SingleRadio::ins()->inner(function(SingleRadio $this_, array &$_i) {
                                                    $this_->inputTitle('title_' . Document::$var['label_']);
                                                    $this_->setName('name_' . Document::$var['label_']);
                                                    $this_->setValue('value_' . Document::$var['label_']);
                                                    $this_->setIsDisabled(Document::$var['disabled']);
                                                    $this_->setIsChecked(true);
                                                });
                                            });
                                        });
                                    });

                                    $_i[] = ColItem::ins('md12')->inner(function(ColItem $this_, array &$_i) {
//                                    $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'SingleCheckbox';

                                            $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = SingleCheckbox::ins()->inner(function(SingleCheckbox $this_, array &$_i) {

                                                $this_->tag();
//                                        $this_->checkBox();
                                                $this_->switch();

                                                $this_->setIsDisabled(Document::$var['disabled']);
                                                $this_->inputTitle('title_' . Document::$var['label_']);
                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setValue('value_' . Document::$var['label_']);
                                                $this_->setIsChecked(true);
                                            });

                                        });
                                    });

                                    $_i[] = ColItem::ins('md12')->inner(function(ColItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RawSelect';

//                                    $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = RawSelect::ins()->inner(function(RawSelect $this_, array &$_i) {

                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setIsDisabled(Document::$var['disabled']);

                                                $this_->setValue(null);
                                                $this_->setValue(8);

                                                $this_->setOptions([
                                                    5 => [
                                                        "label"    => "RawSelect_label5",
                                                        "disabled" => false,
                                                    ],
                                                    6 => [
                                                        "label"    => "RawSelect_label6",
                                                        "group"    => "水果",
                                                        "disabled" => true,
                                                    ],
                                                    8 => [
                                                        "label" => "RawSelect_label8",
                                                        "group" => "蔬菜",
                                                    ],
                                                    7 => [
                                                        "label" => "RawSelect_label7",
                                                        "group" => "水果",
                                                    ],
                                                    9 => [
                                                        "label"    => "RawSelect_label9",
                                                        "selected" => true,
                                                        "disabled" => true,
                                                        "group"    => "蔬菜",
                                                    ],
                                                ]);
                                            });

                                        });
                                    });

                                    $_i[] = ColItem::ins('md12')->inner(function(ColItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RawMultiSelect';

//                                    $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = RawMultiSelect::ins()->inner(function(RawMultiSelect $this_, array &$_i) {
                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setIsDisabled(Document::$var['disabled']);

                                                $this_->skinDanger();
//                                        $this_->skinWarm();
//                                        $this_->skinDefault();
//                                        $this_->skinNormal();

                                                $this_->setValue(null);
//                                        $this_->setValue('5,8');

                                                $this_->setOptions([
                                                    5 => [
                                                        "label"    => "RawMultiSelect_label5",
                                                        "disabled" => false,
                                                        "selected" => true,
                                                    ],
                                                    6 => [
                                                        "label"    => "RawMultiSelect_label6",
                                                        "disabled" => true,
                                                        "selected" => true,
                                                    ],
                                                    8 => [
                                                        "label" => "RawMultiSelect_label8",
                                                    ],
                                                    7 => [
                                                        "label" => "RawMultiSelect_label7",
                                                    ],
                                                    9 => [
                                                        "label"    => "RawMultiSelect_label9",
                                                        "selected" => true,
                                                        "disabled" => true,
                                                    ],
                                                ]);

                                            });

                                        });
                                    });

                                    $_i[] = ColItem::ins('md12')->inner(function(ColItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'Tags';

//                                    $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = Tags::ins()->inner(function(Tags $this_, array &$_i) {

                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setIsDisabled(Document::$var['disabled']);
                                                $this_->setUnique();
                                                $this_->setRule([
                                                    'number',
                                                ]);
                                                $this_->setValue(implode(',', [
                                                    "tags_label6",
                                                    "tags_label7",
                                                    "tags_label8",
                                                    "tags_label9",
                                                ]));

                                            });

                                        });
                                    });

                                    $_i[] = ColItem::ins('md12')->inner(function(ColItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'CheckboxGroup';

//                                    $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = CheckboxGroup::ins()->inner(function(CheckboxGroup $this_, array &$_i) {

//                                        $this_->tag();
                                                $this_->switch();
//                                        $this_->checkBox();

                                                $this_->setIsDisabled(Document::$var['disabled']);
                                                $this_->setName('name_' . Document::$var['label_'] . '_[]');

//                                        $this_->setValue('3,4');
                                                $this_->setValue(null);
                                                $this_->setOptions([
                                                    1 => [
                                                        "label"    => "CheckboxGroup_label1|哈哈",
                                                        "disabled" => true,
                                                        "selected" => true,
                                                    ],
                                                    2 => [
                                                        "label"    => "CheckboxGroup_label2|哈哈",
                                                        "selected" => true,

                                                    ],
                                                    3 => [
                                                        "label" => "CheckboxGroup_label3|哈哈",
                                                    ],
                                                    4 => [
                                                        "label" => "CheckboxGroup_label4|哈哈",
                                                    ],
                                                ]);
                                            });

                                        });
                                    });

                                    $_i[] = ColItem::ins('md12')->inner(function(ColItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RadioGroup';

//                                    $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = RadioGroup::ins()->inner(function(RadioGroup $this_, array &$_i) {

                                                $this_->setIsDisabled(Document::$var['disabled']);
                                                $this_->setName('name_' . Document::$var['label_']);

                                                $this_->setValue(3);
                                                $this_->setValue(null);

                                                $this_->setOptions([
                                                    1 => [
                                                        "label"    => "RadioGroup_label1|哈哈",
                                                        "disabled" => true,
                                                    ],
                                                    2 => [
                                                        "label"    => "RadioGroup_label2|哈哈",
                                                        "selected" => true,
                                                    ],
                                                    3 => [
                                                        "label" => "RadioGroup_label3|哈哈",
                                                    ],
                                                    4 => [
                                                        "label" => "RadioGroup_label4|哈哈",
                                                    ],
                                                ]);
                                            });

                                        });
                                    });

                                    $_i[] = ColItem::ins('md12')->inner(function(ColItem $this_, array &$_i) {
                                        $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'RawTextarea';

//                                    $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = RawTextarea::ins()->inner(function(RawTextarea $this_, array &$_i) {
                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setValue('value_' . Document::$var['label_']);
                                                $this_->setIsDisabled(Document::$var['disabled']);
                                            });

                                        });
                                    });

                                    $_i[] = ColItem::ins('md6')->inner(function(ColItem $this_, array &$_i) {
                                        $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'Tinymce';

//                                    $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = Tinymce::ins()->inner(function(Tinymce $this_, array &$_i) {
                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setValue('value_' . Document::$var['label_']);
                                                $this_->setIsDisabled(Document::$var['disabled']);

                                                $this_->setUploadUrl('http://local.deve:6025/admin/test.php');
                                                $this_->setFieldName('image_upload');
                                                $this_->setHeightAndWidth('500', 'auto');
                                                $this_->setData([
                                                    "key" => "value",
                                                ]);

                                            });

                                        });
                                    });

                                    $_i[] = ColItem::ins('md12')->inner(function(ColItem $this_, array &$_i) {
                                        $this_->fullLine();

                                        $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                            Document::$var['label_'] = 'Transfer';

//                                    $this_->inline();
                                            $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                            $_i[] = Transfer::ins()->inner(function(Transfer $this_, array &$_i) {

                                                $this_->setName('name_' . Document::$var['label_']);
                                                $this_->setIsDisabled(Document::$var['disabled']);
                                                $this_->setTitles('左边标题', '右边标题');
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
                                    });

                                });
                            });

                            $_i[] = Card::ins()->inner(function(Card $this_, array &$_i) {
                                $this_->title('title title');
                                $this_->cardRed();

                                $this_->cardRegistry->fontGreen();
                                $this_->cardRegistry->fontSize(18);
                                $this_->cardRegistry->margin(2);

                                $_i[] = Tab::ins()->inner(function(Tab $this_, array &$_i) {

                                    $title = 'Tab_1';

//                            $this_->setAllowclose();
//                            $this_->setStyleBrief();
                                    $this_->setStyleCard();

                                    $card = Card::ins()->inner(function(Card $this_, array &$_i) {
                                        $this_->title('the form');

                                        $this_->cardRegistry->borderGreen();
//                        $this_->cardRegistry->fontRed();
                                        $this_->cardRegistry->margin(2);

                                        $this_->cardHeaderRegistry->bgGreen();
                                        $this_->cardHeaderRegistry->fontSize(28);

                                        $_i[] = Form::ins()->inner(function(Form $this_, array &$_i) {
                                            $this_->btnXs();
                                            $this_->withBorder();
                                            $this_->actionUrl('test.php');

                                            $_i[] = Hidden::ins('Hidden_name1', 'Hidden_value1');

                                            $_i[] = ColItem::ins('md12')->inner(function(ColItem $this_, array &$_i) {
                                                $this_->fullLine();

                                                $_i[] = InputItem::ins()->inner(function(InputItem $this_, array &$_i) {
                                                    Document::$var['label_'] = 'RawTextarea';

//                                    $this_->inline();
                                                    $this_->setLabelStr('label_' . Document::$var['label_']);
//                                    $this_->setTipsStr('tips_' . Document::$var['label_']);

                                                    $_i[] = RawTextarea::ins()->inner(function(RawTextarea $this_, array &$_i) {
                                                        $this_->setName('name_' . Document::$var['label_']);
                                                        $this_->setValue('value_' . Document::$var['label_']);
                                                        $this_->setIsDisabled(Document::$var['disabled']);
                                                    });

                                                });
                                            });

                                        });

                                    });

                                    $this_->setSelected(3);
                                    $this_->setOptions([
                                        1 => [
                                            "label"   => $title . "_1",
                                            "content" => $card,
                                        ],
                                        2 => [
                                            "label"   => $title . "_2",
                                            "content" => $title . "_2-contents",
                                        ],
                                        3 => [
                                            "label"    => $title . "_3",
                                            "content"  => $title . "_3-contents",
                                            "selected" => true,
                                        ],
                                    ]);
                                });
                            });
                        });

                    });

                });
            });

            $html->render();
            $this->assertTrue(true);
        }

    }
