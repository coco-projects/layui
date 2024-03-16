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
    use Coco\layui\others\utils\Field;
    use Coco\layui\others\utils\FieldRegistry;

    require '../vendor/autoload.php';

    /****
     ******************************************************************************
     ******************************************************************************
     ******************************************************************************
     */

    $info = [
        "id"       => 1,
        "age"      => 23,
        "username" => 'hello',
        "hobby[]"  => '1,2',
    ];

    $registery = FieldRegistry::ins();

//    $registery->setModel(FieldRegistry::MODE_EDIT);
//    $registery->setModel(FieldRegistry::MODE_ADD);

    $registery->setRecord($info);

    $registery[] = Field::ins('用户名', 'username', Text::ins())->setDataMap([
        "tips"        => "_tips",
        "placeholder" => "_placeholder",
    ])->setMakeCallback(function(Text $domIns, FieldRegistry $registery, Field $field) {
        $formItem = FormItem::ins();

        $domIns->setColType('md6');
        $domIns->setName($field->getFieldName());
        $domIns->setTips($field->getFieldName() . $field->getDataField('tips'));
        $domIns->setPlaceholder($field->getFieldName() . $field->getDataField('placeholder'));

        switch ($registery->getModel())
        {
            case $registery::MODE_ADD :
                $formItem->fullLine();
                $domIns->setTitle($field->getTitle() . 'MODE_ADD');
//                $domIns->inline();
                $domIns->block();

                break;
            case $registery::MODE_EDIT :
                $domIns->setTitle($field->getTitle() . 'MODE_EDIT');

                $domIns->setValue($registery->getRecordByName($field->getFieldName()));
                $domIns->setDisabled(true);
                break;

            case $registery::MODE_BATCH_MODIFILY :
                $domIns->setTitle($field->getTitle() . 'MODE_BATCH_MODIFILY');

                break;

            case $registery::MODE_SEARCH :
                $domIns->setTitle($field->getTitle() . 'MODE_SEARCH');

                break;

            default :
                break;
        }

        $formItem->setInnerContents($domIns);
        return $formItem;
    });

    $registery[] = Field::ins('年龄', 'age', Text::ins())->setDataMap([
        "tips"        => "_tips",
        "placeholder" => "_placeholder",
    ])->setMakeCallback(function(Text $domIns, FieldRegistry $registery, Field $field) {
        $formItem = FormItem::ins();

        $domIns->setTitle($field->getTitle());
        $domIns->setName($field->getFieldName());
        $domIns->setTips($field->getFieldName() . $field->getDataField('tips'));
        $domIns->setPlaceholder($field->getFieldName() . $field->getDataField('placeholder'));

        switch ($registery->getModel())
        {
            case $registery::MODE_ADD :
                $domIns->setTitle($field->getTitle() . 'MODE_ADD');

                break;
            case $registery::MODE_EDIT :
                $domIns->setTitle($field->getTitle() . 'MODE_EDIT');
                $domIns->setValue($registery->getRecordByName($field->getFieldName()));
                break;

            case $registery::MODE_BATCH_MODIFILY :
                $domIns->setTitle($field->getTitle() . 'MODE_BATCH_MODIFILY');

                break;

            case $registery::MODE_SEARCH :
                $domIns->setTitle($field->getTitle() . 'MODE_SEARCH');

                break;

            default :
                break;
        }

        $formItem->setInnerContents($domIns);
        return $formItem;
    });

    $registery[] = Field::ins('爱好', 'hobby[]', CheckboxGroup::ins())->setDataMap([
        "tips"    => "_tips",
        "options" => [
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
        ],
    ])->setMakeCallback(function(CheckboxGroup $domIns, FieldRegistry $registery, Field $field) {
        $formItem = FormItem::ins();

        $domIns->setTitle($field->getTitle());
        $domIns->setName($field->getFieldName());
        $domIns->setTips($field->getFieldName() . $field->getDataField('tips'));
        $domIns->setOptions($field->getDataField('options'));
        $domIns->checkBox();
        $domIns->block();
        $domIns->setColType('md6');

        switch ($registery->getModel())
        {
            case $registery::MODE_ADD :
                $domIns->setTitle($field->getTitle() . 'MODE_ADD');

                break;
            case $registery::MODE_EDIT :
                $domIns->setTitle($field->getTitle() . 'MODE_EDIT');

                $domIns->setValue($registery->getRecordByName($field->getFieldName()));
                break;

            case $registery::MODE_BATCH_MODIFILY :
                $domIns->setTitle($field->getTitle() . 'MODE_BATCH_MODIFILY');

                break;

            case $registery::MODE_SEARCH :
                $domIns->setTitle($field->getTitle() . 'MODE_SEARCH');

                break;

            default :
                break;
        }

        $formItem->setInnerContents($domIns);
        return $formItem;
    });

    $registery->beforeFormRender(function(Form $form, FieldRegistry $registery) {
        if ($registery->getModel() == FieldRegistry::MODE_EDIT)
        {
            $form->process(function(Form $this_, array &$_i) use ($registery) {
                $_i[] = Hidden::ins('id', $registery->getRecordByName('id'));
            });
        }
    });

    /****
     ******************************************************************************
     ******************************************************************************
     ******************************************************************************
     */

    //    $basePath = '/admin/';
    $basePath = '/new/coco-layui/resources/';

    DomBlock::$var['title']     = 'layui document';
    DomBlock::$var['disabled']  = false;
    DomBlock::$isDebug          = !false;
    DomBlock::$var['registery'] = $registery;

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

                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = '<hr class="layui-border-green">';

                        $_i[] = DomBlock::$var['registery']->setModel(FieldRegistry::MODE_ADD)
                            ->renderAllWithForm(function(Form $this_, array &$_i, string $fieldsContents) {
                                $this_->withBorder();
                                $this_->setActionUrl('test.php');

                                $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')
                                    ->resetText('重新填写')->resetBtnColor('primary')
                                    ->setSubmitFilter($this_->getFilterName());
                                $_i[] = $fieldsContents;

                                $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')
                                    ->resetText('重新填写')->resetBtnColor('primary')
                                    ->setSubmitFilter($this_->getFilterName());
                            });

                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = DomBlock::$var['registery']->setModel(FieldRegistry::MODE_EDIT)
                            ->renderAllWithForm(function(Form $this_, array &$_i, string $fieldsContents) {
                                $this_->withBorder();
                                $this_->setActionUrl('test.php');

                                $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')
                                    ->resetText('重新填写')->resetBtnColor('primary')
                                    ->setSubmitFilter($this_->getFilterName());
                                $_i[] = $fieldsContents;

                                $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')
                                    ->resetText('重新填写')->resetBtnColor('primary')
                                    ->setSubmitFilter($this_->getFilterName());
                            });
                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = '<hr class="layui-border-green">';

                        $_i[] = DomBlock::$var['registery']->setModel(FieldRegistry::MODE_BATCH_MODIFILY)
                            ->renderAllWithForm(function(Form $this_, array &$_i, string $fieldsContents) {
                                $this_->withBorder();
                                $this_->setActionUrl('test.php');

                                $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')
                                    ->resetText('重新填写')->resetBtnColor('primary')
                                    ->setSubmitFilter($this_->getFilterName());
                                $_i[] = $fieldsContents;

                                $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')
                                    ->resetText('重新填写')->resetBtnColor('primary')
                                    ->setSubmitFilter($this_->getFilterName());
                            });

                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = '<hr class="layui-border-green">';

                        $_i[] = DomBlock::$var['registery']->setModel(FieldRegistry::MODE_SEARCH)->renderWithForm([
                            "username",
                            "hobby[]",
                        ], function(Form $this_, array &$_i, string $fieldsContents) {
                            $this_->withBorder();
                            $this_->setActionUrl('test.php');

                            $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')
                                ->resetText('重新填写')->resetBtnColor('primary')
                                ->setSubmitFilter($this_->getFilterName());

                            $_i[] = $fieldsContents;

                            $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')
                                ->resetText('重新填写')->resetBtnColor('primary')
                                ->setSubmitFilter($this_->getFilterName());
                        });

                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = '<hr class="layui-border-green">';
                        $_i[] = '<hr class="layui-border-green">';

                    });

                });
            });

        });
    });

    print_r($html->render());