<?php

    use Coco\layui\form\base\Form;
    use Coco\layui\form\base\FormItem;
    use Coco\layui\form\components\CheckboxGroup;
    use Coco\layui\form\components\FromSumit;
    use Coco\layui\form\components\Hidden;
    use Coco\layui\form\components\Text;
    use Coco\layui\others\utils\Field;
    use Coco\layui\others\utils\FieldRegistry;

    require '../vendor/autoload.php';

    $info = [
        "id"       => 1,
        "age"      => 23,
        "username" => 'hello',
        "hobby[]"  => '1,2',
    ];

    $registery = FieldRegistry::ins();

    $registery->setModel(FieldRegistry::MODE_EDIT);
//    $registery->setModel(FieldRegistry::MODE_ADD);

    $registery->setRecord($info);

    $registery[] = Field::ins('用户名', 'username', Text::ins())->setDataMap([
        "tips"        => "_tips",
        "placeholder" => "_placeholder",
    ])->setMakeCallback(function(Text $domIns, FieldRegistry $registery, Field $field) {
        $domIns->setColType('md12');
        $domIns->block();

        $domIns->setTitle($field->getTitle());
        $domIns->setName($field->getFieldName());
        $domIns->setTips($field->getFieldName() . $field->getDataField('tips'));
        $domIns->setPlaceholder($field->getFieldName() . $field->getDataField('placeholder'));

        switch ($registery->getModel())
        {
            case $registery::MODE_ADD :
                break;
            case $registery::MODE_EDIT :
                $domIns->setValue($registery->getRecordByName($field->getFieldName()));
                $domIns->setDisabled(true);
                break;
            case $registery::MODE_BATCH_MODIFILY :

                break;
            case $registery::MODE_SEARCH :

                break;
            default :
                break;
        }


        $item = FormItem::ins();
        $item->setInnerContents($domIns);
        return $item;
    });

    $registery[] = Field::ins('年龄', 'age', Text::ins())->setDataMap([
        "tips"        => "_tips",
        "placeholder" => "_placeholder",
    ])->setMakeCallback(function(Text $domIns, FieldRegistry $registery, Field $field) {

        $domIns->setTitle($field->getTitle());
        $domIns->setName($field->getFieldName());
        $domIns->setTips($field->getFieldName() . $field->getDataField('tips'));
        $domIns->setPlaceholder($field->getFieldName() . $field->getDataField('placeholder'));

        switch ($registery->getModel())
        {
            case $registery::MODE_ADD :
                break;
            case $registery::MODE_EDIT :
                $domIns->setValue($registery->getRecordByName($field->getFieldName()));
                break;
            case $registery::MODE_BATCH_MODIFILY :

                break;
            case $registery::MODE_SEARCH :

                break;
            default :
                break;
        }

        $item = FormItem::ins();
        $item->setInnerContents($domIns);
        return $item;
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
                break;
            case $registery::MODE_EDIT :
                $domIns->setValue($registery->getRecordByName($field->getFieldName()));
                break;
            case $registery::MODE_BATCH_MODIFILY :

                break;
            case $registery::MODE_SEARCH :

                break;
            default :
                break;
        }

        $item = FormItem::ins();
        $item->setInnerContents($domIns);
        return $item;
    });

    $registery->beforeFormRender(function(Form $form, FieldRegistry $registery) {
        if ($registery->getModel() == FieldRegistry::MODE_EDIT)
        {
            $form->setActionUrl('#');
            $form->process(function(Form $this_, array &$_i) use ($registery) {
                $_i[] = Hidden::ins('id', $registery->getRecordByName('id'));
            });
        }
    });

    print_r($registery->setModel(FieldRegistry::MODE_ADD)->renderWithForm([
        "username",
        "hobby[]",
    ], function(Form $this_, array &$_i, string $fieldsContents) {
        $this_->withBorder();
        $this_->setActionUrl('test.php');

        $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')->resetText('重新填写')
            ->resetBtnColor('primary')->setSubmitFilter($this_->getFilterName());

        $_i[] = $fieldsContents;

        $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')->resetText('重新填写')
            ->resetBtnColor('primary')->setSubmitFilter($this_->getFilterName());

    }));
    echo PHP_EOL;
    echo PHP_EOL;

    print_r($registery->setModel(FieldRegistry::MODE_EDIT)
        ->renderAllWithForm(function(Form $this_, array &$_i, string $fieldsContents) {
            $this_->withBorder();
            $this_->setActionUrl('test.php');

            $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')->resetText('重新填写')
                ->resetBtnColor('primary')->setSubmitFilter($this_->getFilterName());
            $_i[] = $fieldsContents;

            $_i[] = FromSumit::ins()->submitText('保存')->submitBtnColor('normal')->resetText('重新填写')
                ->resetBtnColor('primary')->setSubmitFilter($this_->getFilterName());
        }));
