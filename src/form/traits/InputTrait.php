<?php

    namespace Coco\layui\form\traits;

    use Coco\layui\form\base\Form;

    /**
     * 每个放在 form 中的 元素都要使用，用于设置 name，value 等基础属性
     * 为元素附加 js 代码到 form 的js 中
     */
    trait InputTrait
    {
        protected string|int|null $isSelected  = '';
        protected string|int|null $isChecked   = '';
        protected string|int|null $isDisabled  = '';
        protected string|int|null $value       = '';
        protected string|int|null $name        = '';
        protected string|int|null $placeholder = '';

        public function setPlaceholder(int|string|null $placeholder): static
        {
            $this->placeholder = $placeholder;

            return $this;
        }

        public function getIsSelected(): int|string|bool|null
        {
            return $this->isSelected;
        }

        public function setIsSelected(int|string|bool|null $isSelected): static
        {
            $this->isSelected = $isSelected;

            return $this;
        }


        public function getIsChecked(): int|string|bool|null
        {
            return $this->isChecked;
        }

        public function setIsChecked(int|string|bool|null $isChecked): static
        {
            $this->isChecked = $isChecked;
            return $this;
        }

        public function getIsDisabled(): int|string|bool|null
        {
            return $this->isDisabled;
        }


        public function setIsDisabled(int|string|bool|null $isDisabled): static
        {
            $this->isDisabled = $isDisabled;
            return $this;
        }


        public function getValue(): int|string|bool|null
        {
            return $this->value;
        }


        public function setValue(int|string|bool|null $value): static
        {
            $this->value = $value;

            return $this;
        }


        public function getName(): int|string|bool|null
        {
            return $this->name;
        }


        public function setName(int|string|bool|null $name): static
        {
            $this->name = $name;
            return $this;
        }

    }