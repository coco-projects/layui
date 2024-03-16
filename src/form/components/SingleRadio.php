<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    class SingleRadio extends RawInput
    {
        public function __construct()
        {
            parent::__construct();
            $this->radioType();
        }

        protected function beforeRender(): void
        {
            parent::beforeRender();
        }
    }