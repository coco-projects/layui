<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    use Coco\layui\base\common\LayuiSingleTag;
    use Coco\layui\form\traits\InputTrait;

    class RawInput extends LayuiSingleTag
    {
        use InputTrait;

        public function __construct()
        {
            parent::__construct('input');

            $this->getAttr('class')->addAttr("layui-input");
            $this->appendToNode(PHP_EOL);
            $this->prependToNode(PHP_EOL);
        }

        protected function beforeRender(): void
        {
            is_null($this->value) and ($this->value = '');

            $this->getAttr('name')->setAttrKv('name', $this->name);
            $this->getAttr('value')->setAttrKv('value', $this->value);
            $this->getAttr('placeholder')->setAttrKv('placeholder', $this->placeholder);

//            $this->isSelected and $this->getAttr('selected')->setAttrsString('selected');
            $this->isDisabled and $this->getAttr('disabled')->setAttrsString('disabled');
            $this->isChecked and $this->getAttr('checked')->setAttrsString('checked');

            parent::beforeRender();
        }

        public function textType(): static
        {
            $this->inputType('text');

            return $this;
        }

        public function passwordType(): static
        {
            $this->inputType('password');

            return $this;
        }

        public function checkboxType(): static
        {
            $this->inputType('checkbox');

            return $this;
        }

        public function radioType(): static
        {
            $this->inputType('radio');

            return $this;
        }

        public function buttonType(): static
        {
            $this->inputType('button');

            return $this;
        }

        public function submitType(): static
        {
            $this->inputType('submit');

            return $this;
        }

        public function resetType(): static
        {
            $this->inputType('reset');

            return $this;
        }

        public function fileType(): static
        {
            $this->inputType('file');

            return $this;
        }

        public function hiddenType(): static
        {
            $this->inputType('hidden');

            return $this;
        }

        public function imageType(): static
        {
            $this->inputType('image');

            return $this;
        }

        public function dateType(): static
        {
            $this->inputType('date');

            return $this;
        }

        public function datetimeLocalType(): static
        {
            $this->inputType('datetime-local');

            return $this;
        }

        public function emailType(): static
        {
            $this->inputType('email');

            return $this;
        }

        public function monthType(): static
        {
            $this->inputType('month');

            return $this;
        }

        public function numberType(): static
        {
            $this->inputType('number');

            return $this;
        }

        public function rangeType(): static
        {
            $this->inputType('range');

            return $this;
        }

        public function searchType(): static
        {
            $this->inputType('search');

            return $this;
        }

        public function telType(): static
        {
            $this->inputType('tel');

            return $this;
        }

        public function timeType(): static
        {
            $this->inputType('time');

            return $this;
        }

        public function urlType(): static
        {
            $this->inputType('url');

            return $this;
        }


        protected function inputType($value): static
        {
            $this->attrsRegistry->appendAttrKv('type', $value);

            return $this;
        }


        public function laySkin($value): static
        {
            $this->attrsRegistry->appendAttrKv('lay-skin', $value);

            return $this;
        }


        public function layText($value): static
        {
            $this->attrsRegistry->appendAttrKv('lay-text', $value);

            return $this;
        }

        public function verifyRule($value): static
        {
            $this->attrsRegistry->appendAttrKv('lay-verify', $value);

            return $this;
        }


        public function verifyMsg($value): static
        {
            $this->attrsRegistry->appendAttrKv('lay-reqtext', $value);

            return $this;
        }


        public function verifyTypeTips(): static
        {
            $this->attrsRegistry->appendAttrKv('lay-vertype', "tips");

            return $this;
        }

        public function verifyTypeAlert(): static
        {
            $this->attrsRegistry->appendAttrKv('lay-vertype', "alert");

            return $this;
        }

        public function verifyTypeMsg(): static
        {
            $this->attrsRegistry->appendAttrKv('lay-vertype', "msg");

            return $this;
        }


        public function inputTitle($value): static
        {
            $this->attrsRegistry->appendAttrKv('title', $value);

            return $this;
        }

        public function setAffixNumber(): static
        {
            $this->attrsRegistry->appendAttrKv('lay-affix', "number");

            return $this;
        }


        public function setAffixEye(): static
        {
            $this->attrsRegistry->appendAttrKv('lay-affix', "eye");

            return $this;
        }


        public function setAffixClear(): static
        {
            $this->attrsRegistry->appendAttrKv('lay-affix', "clear");

            return $this;
        }

        public function setStep($value): static
        {
            $this->attrsRegistry->appendAttrKv('step', $value);

            return $this;
        }

        public function setMin($value): static
        {
            $this->attrsRegistry->appendAttrKv('min', $value);

            return $this;
        }


        public function setMax($value): static
        {
            $this->attrsRegistry->appendAttrKv('max', $value);

            return $this;
        }


    }