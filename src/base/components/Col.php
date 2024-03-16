<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    class Col extends Div
    {
        public function __construct($type = '')
        {
            parent::__construct();
            $type and $this->addType($type);
        }

        public function addType($type): static
        {
            $this->attrsRegistry->appendColType($type);

            return $this;
        }
    }