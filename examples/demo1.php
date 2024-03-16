<?php

    use Coco\layui\base\common\LayuiDoubleTag;
    use Coco\layui\base\common\LayuiSingleTag;
    use Coco\layui\base\components\Badge;
    use Coco\layui\base\components\Blockquote;
    use Coco\layui\base\components\Br;
    use Coco\layui\base\components\Button;
    use Coco\layui\base\components\A;
    use Coco\layui\base\components\ButtonContainer;
    use Coco\layui\base\components\ButtonGroup;
    use Coco\layui\base\components\Card;
    use Coco\layui\base\components\Col;
    use Coco\layui\base\components\Collapse;
    use Coco\layui\base\components\Fieldset;
    use Coco\layui\base\components\Hr;
    use Coco\layui\base\components\Icon;
    use Coco\layui\base\components\LayuiContainer;
    use Coco\layui\base\components\Panel;
    use Coco\layui\base\components\Row;
    use Coco\layui\base\components\Tab;
    use Coco\layui\base\Document;

    require '../vendor/autoload.php';

    //    $basePath = '/admin/';
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
                    $this_->addType('md6');

                    $_i[] = Card::ins()->inner(function(Card $this_, array &$_i) {
                        $this_->title('the title');

                        $this_->cardRegistry->borderGreen();
                        $this_->cardRegistry->fontRed();
                        $this_->cardRegistry->fontSize(28);
                        $this_->cardRegistry->margin(2);

                        $this_->cardHeaderRegistry->bgGreen();
                        $this_->cardHeaderRegistry->fontSize(28);

                        $_i[] = "hello";
                        $_i[] = LayuiSingleTag::ins('hr')->inner(function(LayuiSingleTag $this_, array &$_i) {
                            $this_->borderOrange();
                        });

                        $_i[] = LayuiDoubleTag::ins('div')->inner(function(LayuiDoubleTag $this_, array &$_i) {
                            $this_->bgBlue();
                            $this_->padding(2);

                            $_i[] = "world";

                            $_i[] = LayuiDoubleTag::ins('span')->inner(function(LayuiDoubleTag $this_, array &$_i) {
                                $this_->fontCyan();

                                $_i[] = Icon::ins('ok')->inner(function(Icon $this_, array &$_i) {
                                    $this_->bgRed();
                                });
                            });
                        });

                        $_i[] = LayuiDoubleTag::ins('div')->inner(function(LayuiDoubleTag $this_, array &$_i) {

                            $_i[] = Badge::ins('精选1');

                            $_i[] = Badge::ins('精选3')->bgBlack();
                            $_i[] = Badge::ins('精选3')->bgBlue();
                            $_i[] = Badge::ins('精选3')->bgCyan();
                            $_i[] = Badge::ins('精选3')->bgGray();
                            $_i[] = Badge::ins('精选3')->bgGreen();
                            $_i[] = Badge::ins('精选3')->bgOrange();
                            $_i[] = Badge::ins('精选3')->bgPurple();
                            $_i[] = Badge::ins('精选3')->bgRed();
                        });

                        $_i[] = LayuiDoubleTag::ins('div')->inner(function(LayuiDoubleTag $this_, array &$_i) {

                            $_i[] = Badge::ins('精选4')->rim()->borderBlack();
                            $_i[] = Badge::ins('精选4')->rim()->borderBlue();
                            $_i[] = Badge::ins('精选4')->rim()->borderCyan();
                            $_i[] = Badge::ins('精选4')->rim()->borderGray();
                            $_i[] = Badge::ins('精选4')->rim()->borderGreen();
                            $_i[] = Badge::ins('精选4')->rim()->borderOrange();
                            $_i[] = Badge::ins('精选4')->rim()->borderPurple();
                            $_i[] = Badge::ins('精选4')->rim()->borderRed();
                        });

                        $_i[] = LayuiDoubleTag::ins('div')->inner(function(LayuiDoubleTag $this_, array &$_i) {

                            $_i[] = Badge::ins()->dot()->bgBlack();
                            $_i[] = Badge::ins()->dot()->bgBlue();
                            $_i[] = Badge::ins()->dot()->bgCyan();
                            $_i[] = Badge::ins()->dot()->bgGray();
                            $_i[] = Badge::ins()->dot()->bgGreen();
                            $_i[] = Badge::ins()->dot()->bgOrange();
                            $_i[] = Badge::ins()->dot()->bgPurple();
                            $_i[] = Badge::ins()->dot()->bgRed();
                        });

                    });
                });

                $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                    $this_->addType('md6');

                    $_i[] = Card::ins()->inner(function(Card $this_, array &$_i) {
                        $this_->cardRegistry->borderBlue();
                        $this_->cardRegistry->fontPurple();
                        $this_->cardRegistry->fontSize(28);
                        $this_->cardRegistry->margin(2);

                        $this_->cardHeaderRegistry->borderBlue();
                        $this_->cardHeaderRegistry->bgBlue();

                        $_i[] = "hello1";
                        $_i[] = Br::ins();
                        $_i[] = "hello2";
                        $_i[] = Hr::ins()->inner(function(LayuiSingleTag $this_, array &$_i) {
                            $this_->borderBlue();
                        });

                        $_i[] = "world3";

                        $_i[] = Hr::ins()->inner(function(LayuiSingleTag $this_, array &$_i) {
                            $this_->borderBlue();
                        });

                        $_i[] = Button::ins()->inner(function(Button $this_, array &$_i) {
                            $this_->text(Icon::ins('ok'));
                            $this_->lg();
                            $this_->btnReset();
                            $this_->bgBlue();
                            $this_->event('save');
                            $this_->fluid();
                        });

                        $_i[] = ButtonContainer::ins()->inner(function(ButtonContainer $this_, array &$_i) {
                            $this_->padding(2);

                            $_i[] = Button::ins('按钮1')->inner(function(Button $this_, array &$_i) {
                                $this_->lg();
                                $this_->btnReset();
                                $this_->bgRed();
                                $this_->event('add');
                                $this_->radius();
                            });
                            $_i[] = Button::ins('按钮2')->inner(function(Button $this_, array &$_i) {
                                $this_->lg();
                                $this_->btnSubmit();
                                $this_->bgGreen();
                                $this_->event('edit');
                                $this_->radius();
                            });
                            $_i[] = Button::ins('按钮3')->inner(function(Button $this_, array &$_i) {
                                $this_->lg();
                                $this_->bgCyan();
                                $this_->event('edit');
                                $this_->radius();
                            });
                        });

                        $_i[] = ButtonGroup::ins()->inner(function(ButtonGroup $this_, array &$_i) {
                            $this_->padding(2);

                            $_i[] = Button::ins('按钮1')->inner(function(Button $this_, array &$_i) {
                                $this_->lg();
                                $this_->btnReset();
                                $this_->bgRed();
                                $this_->event('add');
                                $this_->radius();
                            });
                            $_i[] = Button::ins('按钮2')->inner(function(Button $this_, array &$_i) {
                                $this_->lg();
                                $this_->btnSubmit();
                                $this_->bgGreen();
                                $this_->event('edit');
                                $this_->radius();
                            });
                            $_i[] = Button::ins('按钮3')->inner(function(Button $this_, array &$_i) {
                                $this_->lg();
                                $this_->bgGray();
                                $this_->event('edit');
                                $this_->radius();
                            });
                        });

                    });
                });

                $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                    $this_->addType('md6');

                    $_i[] = Card::ins()->inner(function(Card $this_, array &$_i) {
                        $this_->title('the title');

                        $this_->cardRegistry->borderGreen();
                        $this_->cardRegistry->fontRed();
                        $this_->cardRegistry->margin(2);

                        $this_->cardHeaderRegistry->bgGreen();
                        $this_->cardHeaderRegistry->fontSize(28);

                        $_i[] = Blockquote::ins()->inner(function(Blockquote $this_, array &$_i) {
                            $this_->withBorder();

                            $_i[] = LayuiDoubleTag::ins('div')->inner(function(LayuiDoubleTag $this_, array &$_i) {

                                $_i[] = Badge::ins('精选1');

                                $_i[] = Badge::ins('精选3')->bgBlack();
                                $_i[] = Badge::ins('精选3')->bgBlue();
                                $_i[] = Badge::ins('精选3')->bgCyan();
                                $_i[] = Badge::ins('精选3')->bgGray();
                                $_i[] = Badge::ins('精选3')->bgGreen();
                                $_i[] = Badge::ins('精选3')->bgOrange();
                                $_i[] = Badge::ins('精选3')->bgPurple();
                                $_i[] = Badge::ins('精选3')->bgRed();
                            });

                            $_i[] = LayuiDoubleTag::ins('div')->inner(function(LayuiDoubleTag $this_, array &$_i) {

                                $_i[] = Badge::ins('精选4')->rim()->borderBlack();
                                $_i[] = Badge::ins('精选4')->rim()->borderBlue();
                                $_i[] = Badge::ins('精选4')->rim()->borderCyan();
                                $_i[] = Badge::ins('精选4')->rim()->borderGray();
                                $_i[] = Badge::ins('精选4')->rim()->borderGreen();
                                $_i[] = Badge::ins('精选4')->rim()->borderOrange();
                                $_i[] = Badge::ins('精选4')->rim()->borderPurple();
                                $_i[] = Badge::ins('精选4')->rim()->borderRed();
                            });

                            $_i[] = LayuiDoubleTag::ins('div')->inner(function(LayuiDoubleTag $this_, array &$_i) {

                                $_i[] = Badge::ins()->dot()->bgBlack();
                                $_i[] = Badge::ins()->dot()->bgBlue();
                                $_i[] = Badge::ins()->dot()->bgCyan();
                                $_i[] = Badge::ins()->dot()->bgGray();
                                $_i[] = Badge::ins()->dot()->bgGreen();
                                $_i[] = Badge::ins()->dot()->bgOrange();
                                $_i[] = Badge::ins()->dot()->bgPurple();
                                $_i[] = Badge::ins()->dot()->bgRed();
                            });

                        });
                        $_i[] = Hr::ins();

                        $_i[] = Fieldset::ins()->inner(function(Fieldset $this_, array &$_i) {

                            $this_->fieldset->borderPurple();
                            $this_->box->bgGreen();

                            $this_->title('helloFieldset');
                            $_i[] = Badge::ins('精选1666');

                        });
                        $_i[] = Hr::ins();

                        $_i[] = Panel::ins()->inner(function(Panel $this_, array &$_i) {
                            $this_->padding(3);

                            $_i[] = A::ins('A tag 0')->href('https://baidu.com')->_blank();

                            $_i[] = Br::ins();

                            $_i[] = A::ins('A tag 1')->bgGreen();
                            $_i[] = Br::ins();
                            $_i[] = A::ins('A tag 2')->fontBlue();
                            $_i[] = Br::ins();
                            $_i[] = A::ins('A tag 3')->fontPurple()->bgGray();
                            $_i[] = Br::ins();
                            $_i[] = A::ins(Icon::ins('add-1'))->fontPurple()->bgOrange();
                            $_i[] = Br::ins();
                            $_i[] = A::ins(Icon::ins('ok'))->btn()->fontPurple()->bgOrange();

                        });

                    });
                });

                $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                    $this_->addType('md6');

                    $_i[] = Card::ins()->inner(function(Card $this_, array &$_i) {
                        $this_->title('title title');
                        $this_->cardRed();

                        $this_->cardRegistry->fontGreen();
                        $this_->cardRegistry->fontSize(18);
                        $this_->cardRegistry->margin(2);

                        $_i[] = Collapse::ins()->inner(function(Collapse $this_, array &$_i) {
                            $title = 'Collapse_0';
                            $this_->setAccordion();

//                            $this_->cardHeaderRegistry->bgPurple();
                            $this_->cardRegistry->bgBlue();
                            $this_->cardRegistry->fontSize(18);
                            $this_->cardRegistry->margin(2);

                            $this_->setSelected(null);
//                            $this_->setSelected(2);
//                            $this_->setSelected('3');
//                            $this_->setSelected('2,3');

                            $this_->setOptions([
                                1 => [
                                    "label"    => $title . "_1",
                                    "selected" => true,
                                    "content"  => Panel::ins()->inner(function(Panel $this_, array &$_i) {
                                        $this_->margin(1);
                                        $this_->padding(2);
                                        $this_->fontRed();

                                        $_i[] = 'hello1';

                                    }),
                                ],
                                2 => [
                                    "label"    => $title . "_2",
                                    "selected" => true,
                                    "content"  => Blockquote::ins()->inner(function(Blockquote $this_, array &$_i) {
                                        $this_->margin(3);
                                        $this_->padding(2);
                                        $this_->withBorder();

                                        $_i[] = 'hello2';

                                    }),
                                ],
                                3 => [
                                    "label"   => $title . "_3",
                                    "content" => Card::ins()->inner(function(Card $this_, array &$_i) {
                                        $this_->title('card title');
                                        $this_->margin(3);
                                        $this_->padding(2);
                                        $this_->bgPurple();

                                        $_i[] = 'hello3';

                                    }),
                                ],
                            ]);

                        });
                    });
                });

                $_i[] = Col::ins()->inner(function(Col $this_, array &$_i) {
                    $this_->addType('md6');

                    $_i[] = Card::ins()->inner(function(Card $this_, array &$_i) {
                        $this_->title('title title');
                        $this_->cardRed();

                        $this_->cardRegistry->fontGreen();
                        $this_->cardRegistry->fontSize(18);
                        $this_->cardRegistry->margin(2);

                        $_i[] = Tab::ins()->inner(function(Tab $this_, array &$_i) {

                            $title = 'Tab_0';

//                            $this_->setAllowclose();
//                            $this_->setStyleBrief();
//                            $this_->setStyleCard();

                            $this_->setSelected(1);
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

                    $_i[] = Card::ins()->inner(function(Card $this_, array &$_i) {
                        $this_->title('title title');
                        $this_->cardRed();

                        $this_->cardRegistry->fontGreen();
                        $this_->cardRegistry->fontSize(18);
                        $this_->cardRegistry->margin(2);

                        $_i[] = Tab::ins()->inner(function(Tab $this_, array &$_i) {

                            $title = 'Tab_1';

                            $this_->setAllowclose();
                            $this_->setStyleBrief();
//                            $this_->setStyleCard();

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

                            $this_->setSelected(3);
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

                });

            });

        });
    });

    echo $html->render();