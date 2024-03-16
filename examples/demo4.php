<?php

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

    require '../vendor/autoload.php';

    $info = [
        "id"       => 1,
        "age"      => 23,
        "username" => 'hello',
        "hobby[]"  => '1,2',
    ];

    $registery = FieldRegistry::ins();

//    $registery->setModel(FieldRegistry::MODE_ADD);

    $registery->setRecord($info);

    $registery[] = Field::ins('用户名', 'username', RawInput::class)->setDataMap([
        "tips"        => "_tips",
        "placeholder" => "_placeholder",
    ])->setMakeCallback(function(RawInput $domIns, FieldRegistry $registery, Field $field) {

        $colItem   = ColItem::ins();
        $inputItem = InputItem::ins();

        $colItem->fullLine();
        $colItem->addType('md6');

        $inputItem->setTipsStr($field->getDataField("tips"));

        $domIns->setPlaceholder($field->getDataField("placeholder"));
        $domIns->setName($field->getFieldName());

        switch ($registery->getModel())
        {
            case $registery::MODE_ADD :
                $inputItem->setLabelStr($field->getTitle() . 'ADD');

                break;
            case $registery::MODE_EDIT :
                $inputItem->setLabelStr($field->getTitle() . 'EDIT');

                $domIns->setIsDisabled(true);
//                $colItem->setIsHidden(true);

                $domIns->setValue($registery->getRecordByName($field->getFieldName()));

                break;
            case $registery::MODE_BATCH_MODIFILY :
                $inputItem->setLabelStr($field->getTitle() . 'BATCH_MODIFILY');

                break;
            case $registery::MODE_SEARCH :
                $inputItem->setLabelStr($field->getTitle() . 'SEARCH');

                break;
            default :
                break;
        }

        $colItem->setInnerContents($inputItem);
        $inputItem->setInnerContents($domIns);

        return $colItem;
    });

    $registery[] = Field::ins('年龄', 'age', RawInput::class)->setDataMap([
        "tips"        => "_tips",
        "placeholder" => "_placeholder",
    ])->setMakeCallback(function(RawInput $domIns, FieldRegistry $registery, Field $field) {

        $colItem   = ColItem::ins();
        $inputItem = InputItem::ins();

        $colItem->fullLine();
        $colItem->addType('md6');

        $inputItem->setTipsStr($field->getDataField("tips"));

        $domIns->setPlaceholder($field->getDataField("placeholder"));
        $domIns->setName($field->getFieldName());


        switch ($registery->getModel())
        {
            case $registery::MODE_ADD :
                $inputItem->setLabelStr($field->getTitle() . 'ADD');

                break;
            case $registery::MODE_EDIT :
                $inputItem->setLabelStr($field->getTitle() . 'EDIT');

                $domIns->setValue($registery->getRecordByName($field->getFieldName()));

                break;
            case $registery::MODE_BATCH_MODIFILY :
                $inputItem->setLabelStr($field->getTitle() . 'BATCH_MODIFILY');

                break;
            case $registery::MODE_SEARCH :
                $inputItem->setLabelStr($field->getTitle() . 'SEARCH');

                break;
            default :
                break;
        }

        $colItem->setInnerContents($inputItem);
        $inputItem->setInnerContents($domIns);

        return $colItem;
    });

    $registery[] = Field::ins('爱好', 'hobby[]', CheckboxGroup::class)->setDataMap([
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

        $colItem   = ColItem::ins();
        $inputItem = InputItem::ins();

        $colItem->fullLine();
        $colItem->addType('md6');

        $inputItem->setTipsStr($field->getDataField("tips"));

        $domIns->setName($field->getFieldName());

        $domIns->setOptions($field->getDataField('options'));
        $domIns->checkBox();

        switch ($registery->getModel())
        {
            case $registery::MODE_ADD :
                $inputItem->setLabelStr($field->getTitle() . 'ADD');

                break;
            case $registery::MODE_EDIT :
                $inputItem->setLabelStr($field->getTitle() . 'EDIT');

//                $colItem->setIsHidden(true);

                $domIns->setValue($registery->getRecordByName($field->getFieldName()));

                break;
            case $registery::MODE_BATCH_MODIFILY :
                $inputItem->setLabelStr($field->getTitle() . 'BATCH_MODIFILY');

                break;
            case $registery::MODE_SEARCH :
                $inputItem->setLabelStr($field->getTitle() . 'SEARCH');

                break;
            default :
                break;
        }

        $colItem->setInnerContents($inputItem);
        $inputItem->setInnerContents($domIns);

        return $colItem;
    });

    $registery->beforeFormRender(function(Form $form, FieldRegistry $registery) {
        if ($registery->getModel() == FieldRegistry::MODE_EDIT)
        {
            $form->inner(function(Form $this_, array &$_i) use ($registery) {
                $_i[] = Hidden::ins('id', $registery->getRecordByName('id'));
            });
        }
    });

    $result = $registery
//        ->setModel(FieldRegistry::MODE_ADD)
        ->setModel(FieldRegistry::MODE_EDIT)
        ->renderAllFields(function(Form $this_,  &$_i,  $fieldsContents) {
            $this_->btnXs();
            $this_->withBorder();
            $this_->actionUrl('test.php');
            $this_->attrsRegistry->appendColSpace(16);

            $_i[] = $fieldsContents;

        });

    echo $result->render();
    echo Hr::ins()->render();

    $result = $registery->setModel(FieldRegistry::MODE_ADD)
//        ->setModel(FieldRegistry::MODE_EDIT)
        ->renderAllFields(function(Form $this_,  &$_i,  $fieldsContents) {
            $this_->withBorder();

            $_i[] = $fieldsContents;

        });

    echo $result->render();

    echo Hr::ins()->render();
    $result = $registery->setModel(FieldRegistry::MODE_ADD)
//        ->setModel(FieldRegistry::MODE_EDIT)
        ->renderFields([
            "username",
            "hobby[]",
        ], function(Form $this_,  &$_i,  $fieldsContents) {
            $this_->withBorder();

            $_i[] = $fieldsContents;

        });

    echo $result->render();

    echo Hr::ins()->render();
    $result = $registery
//        ->setModel(FieldRegistry::MODE_ADD)
        ->setModel(FieldRegistry::MODE_EDIT)->renderFields([
            "username",
            "hobby[]",
        ], function(Form $this_,  &$_i,  $fieldsContents) {
            $this_->withBorder();

            $_i[] = $fieldsContents;

        });

    echo $result->render();












