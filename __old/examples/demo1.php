<?php

    use Coco\htmlBuilder\dom\DomBlock;
    use Coco\layui\base\Col;
    use Coco\layui\base\components\Badge;
    use Coco\layui\base\components\Blockquote;
    use Coco\layui\base\components\Br;
    use Coco\layui\base\components\Button;
    use Coco\layui\base\components\ButtonContainer;
    use Coco\layui\base\components\ButtonGroup;
    use Coco\layui\base\components\Card;
    use Coco\layui\base\components\Collapse;
    use Coco\layui\base\components\Fieldset;
    use Coco\layui\base\components\Hr;
    use Coco\layui\base\components\LayuiTpl;
    use Coco\layui\base\components\panel;
    use Coco\layui\base\components\Tab;
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

            $_i[] = Card::ins()->process(function(Card $this_, array &$_i) {
                $this_->title('卡片');
                $this_->addCardClass('layui-border-green');
                $this_->addHeaderClass('layui-bg-green');
//                        $this_->addBodyClass('layui-bg-gray');

                $_i[] = Row::ins()->process(function(Row $this_, array &$_i) {
                    $this_->appendColSpace(32);

                    $_i[] = Col::ins()->process(function(Col $this_, array &$_i) {
                        $this_->colType('md6');

                        $_i[] = Tab::ins()->setCustomFilter()->process(function(Tab $this_, array &$_i) {

                            $title = 'Tab_0';

                            //$this_->setAllowclose();
                            //$this_->setStyleBrief();
                            //$this_->setStyleCard();

                            $this_->setSelected(2);
                            $this_->setSelected(null);
                            $this_->setOptions([
                                1 => [
                                    "label"   => $title . "_1",
                                    "content" => $title . "_1-contents",
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

                    $_i[] = Col::ins()->process(function(Col $this_, array &$_i) {
                        $this_->colType('md6');

                        $_i[] = Tab::ins()->setCustomFilter()->process(function(Tab $this_, array &$_i) {

                            $title = 'Tab_1';

                            $this_->setAllowclose();
                            $this_->setStyleBrief();
                            //$this_->setStyleCard();

                            $this_->setSelected(2);
                            $this_->setSelected(null);
                            $this_->setOptions([
                                1 => [
                                    "label"   => $title . "_1",
                                    "content" => $title . "_1-contents",
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

                    $_i[] = Col::ins()->process(function(Col $this_, array &$_i) {
                        $this_->colType('md12');

                        $_i[] = Collapse::ins()->setCustomFilter()->process(function(Collapse $this_, array &$_i) {

                            $title = 'Collapse_0';
                            $this_->setAccordion();
                            $this_->addCardClass('layui-border-green');
//                            $this_->addHeaderClass('layui-bg-gray');

                            $this_->setSelected('2,3');
                            $this_->setOptions([
                                1 => [
                                    "label"    => $title . "_1",
                                    "selected" => true,
                                    "content"  => Panel::ins()->process(function(Panel $this_, array &$_i) {
                                        $this_->margin(3);
                                        $this_->padding(5);

                                        $_i[] = 'hello1';

                                    }),
                                ],
                                2 => [
                                    "label"    => $title . "_2",
                                    "selected" => true,
                                    "content"  => Blockquote::ins()->process(function(Blockquote $this_, array &$_i) {
                                        $this_->margin(3);
                                        $this_->padding(5);
                                        $this_->withBorder();

                                        $_i[] = 'hello2';

                                    }),
                                ],
                                3 => [
                                    "label"    => $title . "_3",
                                    "selected" => true,
                                    "content"  => Card::ins()->process(function(Card $this_, array &$_i) {
                                        $this_->title('card title');
                                        $this_->addCardClass('layui-border-red');
                                        $this_->addHeaderClass('layui-bg-red');
                                        $this_->margin(3);

                                        $_i[] = 'hello3';

                                    }),
                                ],
                            ]);
                        });

                    });

                    $_i[] = Col::ins()->process(function(Col $this_, array &$_i) {
                        $this_->colType('md6');

                        $_i[] = Tab::ins()->setCustomFilter()->process(function(Tab $this_, array &$_i) {

                            $title = 'Tab_2';

//                            $this_->setAllowclose();
//                            $this_->setStyleBrief();
                            $this_->setStyleCard();

                            $this_->setSelected(2);
                            $this_->setOptions([
                                1 => [
                                    "label"   => $title . "_1",
                                    "content" => $title . "_1-contents",
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

                    $_i[] = Col::ins()->process(function(Col $this_, array &$_i) {
                        $this_->colType('md6');

                        $_i[] = Fieldset::ins()->title('Fieldset')->process(function(Fieldset $this_, array &$_i) {
                            $this_->headerBorderBlue();
                            $this_->addBodyClass('layui-bg-gray');
                            $this_->margin(3);
                            $this_->padding(5);

                            $_i[] = Badge::ins('徽章1');
                            $_i[] = Badge::ins('徽章2')->bgBlack();
                            $_i[] = Badge::ins('徽章3')->bgBlue();
                            $_i[] = Badge::ins('徽章4')->bgCyan();
                            $_i[] = Badge::ins('徽章5')->bggray();
                            $_i[] = Badge::ins('徽章6')->bgGreen();
                            $_i[] = Badge::ins('徽章7')->bgOrange();
                            $_i[] = Badge::ins('徽章8')->bgPurple();
                            $_i[] = Badge::ins('徽章9')->bgRed();
                            $_i[] = Br::ins();

                            $_i[] = Badge::ins('徽章1')->rim();
                            $_i[] = Badge::ins('徽章2')->rim()->borderBlack();
                            $_i[] = Badge::ins('徽章3')->rim()->borderBlue();
                            $_i[] = Badge::ins('徽章4')->rim()->borderCyan();
                            $_i[] = Badge::ins('徽章5')->rim()->bordergray();
                            $_i[] = Badge::ins('徽章6')->rim()->borderGreen();
                            $_i[] = Badge::ins('徽章7')->rim()->borderOrange();
                            $_i[] = Badge::ins('徽章8')->rim()->borderPurple();
                            $_i[] = Badge::ins('徽章9')->rim()->borderRed();
                            $_i[] = Br::ins();

                            $_i[] = Badge::ins()->dot()->bgBlack();
                            $_i[] = Badge::ins()->dot()->bgBlue();
                            $_i[] = Badge::ins()->dot()->bgCyan();
                            $_i[] = Badge::ins()->dot()->bggray();
                            $_i[] = Badge::ins()->dot()->bgGreen();
                            $_i[] = Badge::ins()->dot()->bgOrange();
                            $_i[] = Badge::ins()->dot()->bgPurple();
                            $_i[] = Badge::ins()->dot()->bgRed();
                        });
                    });

                    $_i[] = Col::ins()->process(function(Col $this_, array &$_i) {
                        $this_->colType('md12');

                        $_i[] = Panel::ins()->process(function(Panel $this_, array &$_i) {
                            $this_->margin(3);
                            $this_->padding(5);
//                            $this_->bgColor('gray');

                            $_i[] = Button::ins('普通1')->btnButton()->event('edit');
                            $_i[] = Button::ins('', 'add-1')->btnColorPrimary()->event('add')->btnRadius();
                            $_i[] = Button::ins('提交表单')->btnSizeSm()->btnColorDanger()->btnSubmit();
                            $_i[] = Button::ins('重填')->btnSizeXs()->btnColorNormal()->btnReset();
                            $_i[] = Button::ins('禁用')->btnSizeLg()->btnColorWarm()->btnDisabled();
                            $_i[] = Hr::ins()->borderGreen();

                            $_i[] = ButtonGroup::ins()->process(function(ButtonGroup $this_, array &$_i) {
                                $_i[] = Button::ins('普通ButtonGroup')->btnColorPrimary()->btnSizeXs();
                                $_i[] = Button::ins('普通ButtonGroup')->btnColorDanger()->btnSizeXs();
                                $_i[] = Button::ins('普通ButtonGroup')->btnColorWarm()->btnSizeXs();
                            });

                            $_i[] = Hr::ins()->borderRed();
                            $_i[] = ButtonContainer::ins()->process(function(ButtonContainer $this_, array &$_i) {
                                $_i[] = Button::ins('普通ButtonContainer')->btnColorPrimary();
                                $_i[] = Button::ins('普通ButtonContainer')->btnColorDanger();
                                $_i[] = Button::ins('普通ButtonContainer')->bgCyan();
                            });

                            $_i[] = Hr::ins()->borderPurple();
                            $_i[] = ButtonContainer::ins()->process(function(ButtonContainer $this_, array &$_i) {

                                $_i[] = ButtonGroup::ins()->process(function(ButtonGroup $this_, array &$_i) {
                                    $_i[] = Button::ins('普通ButtonGroup')->btnColorPrimary()->btnSizeXs();
                                    $_i[] = Button::ins('普通ButtonGroup')->btnColorDanger()->btnSizeXs();
                                    $_i[] = Button::ins('普通ButtonGroup')->btnColorWarm()->btnSizeXs();
                                });

                                $_i[] = Br::ins();

                                $_i[] = ButtonGroup::ins()->process(function(ButtonGroup $this_, array &$_i) {
                                    $_i[] = Button::ins('普通ButtonGroup')->btnColorPrimary()->btnSizeXs();
                                    $_i[] = Button::ins('普通ButtonGroup')->btnColorDanger()->btnSizeXs();
                                    $_i[] = Button::ins('普通ButtonGroup')->btnColorWarm()->btnSizeXs();
                                });

                            });

                            $_i[] = Hr::ins()->borderOrange();
                            $_i[] = \Coco\layui\base\components\A::ins('A标签 1')->fontRed()->href('#')->_blank();
                            $_i[] = \Coco\layui\base\components\A::ins('A标签 2')->fontGreen()->href('#')->_blank();
                            $_i[] = \Coco\layui\base\components\A::ins('A标签 3')->fontOrange()->href('#')->_blank();

                            $_i[] = Hr::ins()->borderBlue();
                            $_i[] = Button::ins('普通btnFluid')->btnColorNormal()->btnFluid();

                        });
                    });

                    $_i[] = Col::ins()->process(function(Col $this_, array &$_i) {
                        $this_->colType('md12');

                        $_i[] = Blockquote::ins()->process(function(Blockquote $this_, array &$_i) {
                            $this_->margin(2);
                            $this_->padding(2);
                            $this_->withBorder();

                            $_i[] = "<div id='tpl_test'></div>";
                            $_i[] = LayuiTpl::ins()->process(function(LayuiTpl $this_, array &$_i) {

                                $title = 'LayuiTpl_0';

                                $this_->setLayuiTpl(<<<AAA
<h3>姓名：{#= d.name #}</h3>
<p>性别：{#= d.sex ? '男' : '女' #}</p>
AAA
                                );
                                $this_->setTag('{#', '#}');
                                $this_->setTargetId('tpl_test');
                                $this_->setTplData([
                                    "name" => $title . "-hello",
                                    "sex"  => 1,
                                ]);
                            });

                        });
                    });

                    $_i[] = Col::ins()->process(function(Col $this_, array &$_i) {
                        $this_->colType('md12');

                        $_i[] = Blockquote::ins()->process(function(Blockquote $this_, array &$_i) {
                            $this_->margin(2);
                            $this_->padding(2);
                            $this_->withBorder();

                            $_i[] = Button::ins('普通');
                            $_i[] = Button::ins('普通1')->btnButton()->event('edit');
                            $_i[] = Button::ins('普通2')->btnColorPrimary()->event('add')->btnRadius();
                            $_i[] = Button::ins('提交表单')->btnSizeSm()->btnColorDanger()->btnSubmit();
                            $_i[] = Button::ins('重填')->btnSizeXs()->btnColorNormal()->btnReset();
                            $_i[] = Button::ins('禁用')->btnSizeLg()->btnColorWarm()->btnDisabled();

                        });
                    });

                });
            });

        });
    });

    print_r($html->render());