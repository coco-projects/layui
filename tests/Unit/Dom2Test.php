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
    use Coco\layui\form\base\InputDom;
    use Coco\layui\form\base\Label;
    use Coco\layui\form\base\Tips;
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


    final class Dom2Test extends TestCase
    {
        public function testA()
        {
            $basePath = '/new/coco-layui/resources/';

            Document::$var['title']    = 'layui document';
            Document::$var['disabled'] = false;
            Document::$isDebug         = !false;

            $html = Document::ins($basePath)->inner(function(Document $this_, array &$_i) {

                $_i[] = LayuiContainer::ins()->inner(function(LayuiContainer $this_, array &$_i) {
                    $this_->attrsRegistry->setCustomDomId('999');
                    $this_->attrsRegistry->setCustomFilterName('filterName__');

//            $this_->layuiContainer();
                    $this_->layuiFluid();
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
                                    $this_->btnXs();
                                    $this_->withBorder();
                                    $this_->actionUrl('test.php');

                                    $_i[] = Hidden::ins('Hidden_name', 'Hidden_value');

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = Label::ins()->setInnerContents('RawInput_1');
                                        $_i[] = InputDom::ins()->inner(function(InputDom $this_, array &$_i) {
                                            $this_->inline();

                                            $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                                $title = 'RawInput_1';
                                                $this_->laySkin('danger');

                                                $this_->setName($title . '_name');
                                                $this_->setValue($title . '_value');

//                                        $this_->setIsDisabled(true);
//                                        $this_->setIsSelected(true);
//                                        $this_->setIsChecked(true);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                            });
                                        });
                                        $_i[] = Tips::ins()->setInnerContents('RawInput_1_tips');

                                        $_i[] = Label::ins()->setInnerContents('RawInput_1');
                                        $_i[] = InputDom::ins()->inner(function(InputDom $this_, array &$_i) {
                                            $this_->inline();

                                            $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                                $title = 'RawInput_1';
                                                $this_->laySkin('danger');

                                                $this_->setName($title . '_name');
                                                $this_->setValue($title . '_value');

//                                        $this_->setIsDisabled(true);
//                                        $this_->setIsSelected(true);
//                                        $this_->setIsChecked(true);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                            });
                                        });
                                        $_i[] = Tips::ins()->setInnerContents('RawInput_1_tips');

                                    });

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = Label::ins()->setInnerContents('RawInput_1');
                                        $_i[] = InputDom::ins()->inner(function(InputDom $this_, array &$_i) {
                                            $this_->inline();

                                            $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                                $title = 'RawInput_2';
                                                $this_->laySkin('danger');

                                                $this_->setName($title . '_name');
                                                $this_->setValue($title . '_value');

//                                        $this_->setIsDisabled(true);
//                                        $this_->setIsSelected(true);
//                                        $this_->setIsChecked(true);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                            });
                                        });

                                        $_i[] = Tips::ins()->setInnerContents('RawInput_1_tips');
                                    });

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = Label::ins()->setInnerContents('RawInput_1');
                                        $_i[] = InputDom::ins()->inner(function(InputDom $this_, array &$_i) {
                                            $this_->block();

                                            $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                                $title = 'RawInput_2';
                                                $this_->laySkin('danger');

                                                $this_->setName($title . '_name');
                                                $this_->setValue($title . '_value');

//                                        $this_->setIsDisabled(true);
//                                        $this_->setIsSelected(true);
//                                        $this_->setIsChecked(true);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                            });
                                        });

                                        $_i[] = Tips::ins()->setInnerContents('RawInput_1_tips');
                                    });

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = Label::ins()->setInnerContents('RawInput_1');
                                        $_i[] = InputDom::ins()->inner(function(InputDom $this_, array &$_i) {
                                            $this_->block();

                                            $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                                $title = 'RawInput_2';
                                                $this_->laySkin('danger');

                                                $this_->setName($title . '_name');
                                                $this_->setValue($title . '_value');

//                                        $this_->setIsDisabled(true);
//                                        $this_->setIsSelected(true);
//                                        $this_->setIsChecked(true);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                            });
                                        });

//                                $_i[] = Tips::ins()->setInnerContents('RawInput_1_tips');
                                    });

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = Label::ins()->setInnerContents('RawInput_1');
                                        $_i[] = InputDom::ins()->inner(function(InputDom $this_, array &$_i) {
                                            $this_->inline();

                                            $_i[] = ColorPicker::ins()->inner(function(ColorPicker $this_, array &$_i) {
                                                $title = 'Colorpicker_0';
                                                $this_->setName($title . '_name');
                                                $this_->setValue('#9bff9b');
                                            });
                                        });

                                        $_i[] = Tips::ins()->setInnerContents('RawInput_1_tips');
                                    });

                                    $_i[] = SingleDatePicker::ins()->inner(function(SingleDatePicker $this_, array &$_i) {
                                        $title = 'SingleDatePicker_1';
                                        $this_->setName($title . '_name');
                                        $this_->setValue('2023-11-1');
                                    });

                                    $_i[] = RangeDatePicker::ins()->inner(function(RangeDatePicker $this_, array &$_i) {

                                        $title = 'RangeDatePicker_1';
                                        $this_->setName($title . '_name');
                                        $this_->setValue('2023-12-11 - 2024-01-19');
                                    });

                                    $_i[] = Slider::ins()->inner(function(Slider $this_, array &$_i) {

//                                $this_->setThemeWarning();
//                                $this_->setThemeSuccess();
//                                $this_->setThemeInfo();
                                        $this_->setThemeDanger();
                                        //$this_->setCustomTheme('');

                                        $title = 'Slider_1';
                                        $this_->setName($title . '_name');
                                        $this_->setValue(30);
                                        $this_->setMax(50);
                                        $this_->setMin(10);
                                        $this_->setStep(1);
                                    });

                                    $_i[] = IconPicker::ins()->inner(function(IconPicker $this_, array &$_i) {
                                        $title = 'IconPicker_0';
                                        $this_->setName($title . 'name');
                                        $this_->setValue('layui-icon-tips-fill');
                                    });

                                    $_i[] = SliderRange::ins()->inner(function(SliderRange $this_, array &$_i) {

//                                $this_->setThemeWarning();
//                                $this_->setThemeSuccess();
                                        $this_->setThemeInfo();
//                                $this_->setThemeDanger();
                                        //$this_->setCustomTheme('');

                                        $title = 'SliderRange_1';
                                        $this_->setName($title . '_name');
                                        $this_->setValue('25,37');
                                        $this_->setMax(80);
                                        $this_->setMin(10);
                                        $this_->setStep(1);
                                    });

                                    $_i[] = SingleRadio::ins()->inner(function(SingleRadio $this_, array &$_i) {
                                        $title = 'SingleRadio_1';

                                        $this_->inputTitle($title . '_title');
                                        $this_->setName($title . '_name');
                                        $this_->setValue($title . '_value');
//                                $this_->setIsDisabled(true);
                                        $this_->setIsChecked(true);
                                    });

                                    $_i[] = SingleCheckbox::class::ins()->inner(function(SingleCheckbox $this_, array &$_i) {
                                        $title = 'SingleCheckbox_1';

//                                $this_->tag();
                                        $this_->switch();

                                        $this_->layText($title . '_text');
                                        $this_->setName($title . '_name');
                                        $this_->setValue($title . '_value');
//                                $this_->setIsDisabled(true);
                                        $this_->setIsChecked(true);
                                    });

                                    $_i[] = RawTextarea::ins()->inner(function(RawTextarea $this_, array &$_i) {
                                        $title = 'RawTextarea_1';

                                        $this_->setName($title . '_name');
                                        $this_->setValue($title . '_value');
                                        $this_->setIsDisabled(true);
                                    });

                                    $_i[] = RawSelect::ins()->inner(function(RawSelect $this_, array &$_i) {
                                        $title = 'RawSelect_1';

                                        $this_->setName($title . '_name');
//                                $this_->setIsDisabled(true);

                                        $this_->setValue(null);
//                                $this_->setValue(8);

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

                                    $_i[] = RawMultiSelect::ins()->inner(function(RawMultiSelect $this_, array &$_i) {
                                        $title = 'RawMultiSelect_1';

                                        $this_->setName($title . '_name');
//                                $this_->setIsDisabled(true);

//                                    $this_->skinDanger();
                                        $this_->skinWarm();
//                                $this_->skinDefault();
//                                    $this_->skinNormal();

//                                $this_->setValue(null);
                                        $this_->setValue('8,5');

                                        $this_->setOptions([
                                            5 => [
                                                "label"    => "RawMultiSelect_label5",
                                                "disabled" => false,
                                            ],
                                            6 => [
                                                "label"    => "RawMultiSelect_label6",
                                                "group"    => "水果",
                                                "disabled" => true,
                                            ],
                                            8 => [
                                                "label" => "RawMultiSelect_label8",
                                                "group" => "蔬菜",
                                            ],
                                            7 => [
                                                "label" => "RawMultiSelect_label7",
                                                "group" => "水果",
                                            ],
                                            9 => [
                                                "label"    => "RawMultiSelect_label9",
                                                "selected" => true,
                                                "disabled" => true,
                                                "group"    => "蔬菜",
                                            ],
                                        ]);

                                    });

                                    $_i[] = Tags::ins()->inner(function(Tags $this_, array &$_i) {
                                        $title = 'Tags_1';

                                        $this_->setName($title . '_name');
                                        $this_->setIsDisabled(false);
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

                                    $_i[] = CheckboxGroup::ins()->inner(function(CheckboxGroup $this_, array &$_i) {

//                                $this_->tag();
//                                $this_->switch();
                                        $this_->checkBox();

                                        $title = 'CheckboxGroup_1';
                                        $this_->setName($title . '_name[]');

                                        $this_->setValue('1,2');
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

                                    $_i[] = RadioGroup::ins()->inner(function(RadioGroup $this_, array &$_i) {

                                        $title = 'RadioGroup_1';
                                        $this_->setName($title . '_name');

                                        $this_->setValue(3);
//                                $this_->setValue(null);

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

                            $_i[] = Card::ins()->inner(function(Card $this_, array &$_i) {
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

                                    $_i[] = FormItem::ins()->inner(function(FormItem $this_, array &$_i) {
//                                $this_->fullLine();

                                        $_i[] = Label::ins()->setInnerContents('RawInput_1');
                                        $_i[] = InputDom::ins()->inner(function(InputDom $this_, array &$_i) {
                                            $this_->inline();

                                            $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                                $title = 'RawInput_11';
                                                $this_->laySkin('danger');

                                                $this_->setName($title . '_name');
                                                $this_->setValue($title . '_value');

//                                        $this_->setIsDisabled(true);
//                                        $this_->setIsSelected(true);
//                                        $this_->setIsChecked(true);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                            });
                                        });
                                        $_i[] = Tips::ins()->setInnerContents('RawInput_1_tips');

                                        $_i[] = Label::ins()->setInnerContents('RawInput_1');
                                        $_i[] = InputDom::ins()->inner(function(InputDom $this_, array &$_i) {
                                            $this_->inline();

                                            $_i[] = RawInput::ins()->inner(function(RawInput $this_, array &$_i) {
                                                $title = 'RawInput_12';
                                                $this_->laySkin('danger');

                                                $this_->setName($title . '_name');
                                                $this_->setValue($title . '_value');

//                                        $this_->setIsDisabled(true);
//                                        $this_->setIsSelected(true);
//                                        $this_->setIsChecked(true);
//                                        $this_->setAffixEye();
//                                        $this_->setAffixNumber();
                                            });
                                        });
                                        $_i[] = Tips::ins()->setInnerContents('RawInput_1_tips');

                                    });

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
