<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    use Coco\layui\base\common\LayuiSingleTag;

    class Hr extends LayuiSingleTag
    {
        public function __construct()
        {
            parent::__construct('hr');
        }
    }