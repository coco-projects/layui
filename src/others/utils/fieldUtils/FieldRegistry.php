<?php

    declare(strict_types = 1);

    namespace Coco\layui\others\utils\fieldUtils;

    use Coco\htmlBuilder\traits\Statization;
    use Coco\layui\form\base\Form;
    use Coco\magicAccess\MagicMethod;

    class FieldRegistry implements \ArrayAccess
    {
        use Statization;
        use MagicMethod;

        const MODE_ADD            = 1;
        const MODE_EDIT           = 2;
        const MODE_BATCH_MODIFILY = 3;
        const MODE_SEARCH         = 4;

        /**
         * @var Field[]
         */
        protected array $fields                   = [];
        protected array $record                   = [];
        protected int   $model                    = 1;
        protected       $beforeFormRenderCallback = null;

        public function getFields(): array
        {
            return $this->fields;
        }

        public function setRecord(array $record): static
        {
            $this->record = $record;

            return $this;
        }


        public function getRecordByName($name): mixed
        {
            return $this->record[$name] ?? '';
        }

        public function getRecord(): array
        {
            return $this->record;
        }


        public function setModel(int $model): static
        {
            $this->model = $model;

            return $this;
        }

        public function getModel(): int
        {
            return $this->model;
        }

        public function addField(Field $fieldIns): static
        {
            $this->fields[$fieldIns->getFieldName()] = $fieldIns;
            $fieldIns->setRegister($this);

            return $this;
        }

        public function removeField(mixed $offset): static
        {
            if (isset($this->fields[$offset]))
            {
                unset($this->fields[$offset]);
            }

            return $this;
        }

        public function renderFields($fields, callable $callback): Form
        {
            $form = Form::ins();

            if (is_callable($this->beforeFormRenderCallback))
            {
                call_user_func_array($this->beforeFormRenderCallback, [
                    $form,
                    $this,
                ]);
            }

            $text = [];

            foreach ($fields as $v)
            {
                if (!isset($this[$v]))
                {
                    continue;
                }

                $field    = $this[$v];
                $text[$v] = $field->make();
            }

            $form->inner(function(Form $this_, array &$_i) use ($callback, $text) {
                call_user_func_array($callback, [
                    $this_,
                    &$_i,
                    $text,
                ]);
            });

            return $form;
        }

        public function beforeFormRender(?callable $callback): static
        {
            $this->beforeFormRenderCallback = $callback;

            return $this;
        }

        public function renderAllFields($callback): Form
        {
            $fieldNames = array_keys($this->getFields());

            return $this->renderFields($fieldNames, $callback);
        }


        public function importField($fields): static
        {
            foreach ($fields as $k => $field)
            {
                $this->addField($field);
            }

            return $this;
        }

        public function offsetExists(mixed $offset): bool
        {
            return isset($this->fields[$offset]);
        }

        public function offsetGet(mixed $offset)
        {
            return $this->fields[$offset] ?? null;
        }

        public function offsetSet(mixed $offset, mixed $value): void
        {
            $this->addField($value);
        }

        public function offsetUnset(mixed $offset): void
        {
            $this->removeField($offset);
        }
    }