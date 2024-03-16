<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;

    class Hidden extends RawInput
    {
        public function __construct($name = '', $value = '')
        {
            parent::__construct();
            $this->hiddenType();
            $this->setName($name);
            $this->setValue($value);
        }
    }