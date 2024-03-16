<?php

    namespace Coco\layui\form\traits;

    /**
     * 需要设置 options 的元素使用
     */
    trait OptionsTrait
    {
        protected array $options = [];

        protected string|int|null $selected = '';

        public function setOptions(array $options): static
        {
            $this->options = $options;

            return $this;
        }

        public function setSelected(int|string|null $selected): static
        {
            $this->selected = $selected;

            return $this;
        }

        protected function eachOptions(callable $callback, &$selectedIds = []): static
        {
            $selectedIds_ = [];

            if (!is_null($this->selected))
            {
                $selectedIds_ = explode(',', (string)$this->selected);
            }

            foreach ($this->options as $id => $data)
            {
                $isSelected = false;
                if (is_null($this->selected))
                {
                    if (isset($data['selected']))
                    {
                        $isSelected     = !!$data['selected'];
                        $selectedIds_[] = $id;
                    }
                }
                else
                {
                    $isSelected = in_array((string)$id, $selectedIds_);
                }

                $isDisabled = false;
                if (isset($data['disabled']))
                {
                    $isDisabled = !!$data['disabled'];
                }

                call_user_func_array($callback, [
                    $id,
                    $data,
                    $isSelected,
                    $isDisabled,
                ]);
            }

            $selectedIds = $selectedIds_;

            return $this;
        }
    }