<?php

    declare(strict_types = 1);

    namespace Coco\layui\form\components;
    class RawMultiSelect extends RawSelect
    {
        public function __construct()
        {
            $this->skin = 'danger';

            parent::__construct();
        }

        protected function beforeRender(): void
        {
            $this->attrsRegistry->appendAttrKv('xm-select-skin', $this->skin);
            $this->attrsRegistry->appendAttrKv('xm-select', $this->name);
            parent::beforeRender();
        }

        public function skinDanger(): static
        {
            $this->skin = 'danger';

            return $this;
        }

        public function skinWarm(): static
        {
            $this->skin = 'warm';

            return $this;
        }

        public function skinDefault(): static
        {
            $this->skin = 'default';

            return $this;
        }

        public function skinNormal(): static
        {
            $this->skin = 'normal';

            return $this;
        }

    }