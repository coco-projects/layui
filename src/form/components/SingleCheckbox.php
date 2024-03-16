<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    class SingleCheckbox extends RawInput
    {
        public function __construct()
        {
            parent::__construct();
            $this->checkboxType();
        }

        protected function beforeRender(): void
        {
            parent::beforeRender();
        }

        public function checkBox(): static
        {
            $this->laySkin('');

            return $this;
        }

        public function tag(): static
        {
            $this->laySkin('tag');

            return $this;
        }

        public function switch(): static
        {
            $this->laySkin('switch');

            return $this;
        }
    }