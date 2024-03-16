<?php

    declare(strict_types = 1);

    namespace Coco\layui\others\utils\fieldUtils;

    use Coco\htmlBuilder\traits\Statization;
    use Coco\magicAccess\MagicMethod;
    use function DeepCopy\deep_copy;

    class Field
    {

        use Statization;
        use MagicMethod;

        protected array          $dataMap      = [];
        protected                $makeCallback = null;

        protected ?FieldRegistry $register     = null;

        protected function __construct(protected string $title, protected string $fieldName, protected string $insClass)
        {

        }


        public function getTitle(): string
        {
            return $this->title;
        }


        public function setRegister(?FieldRegistry $registry): static
        {
            $this->register = $registry;

            return $this;
        }


        public function getFieldName(): string
        {
            return $this->fieldName;
        }


        public function setDataMap(array $dataMap): static
        {
            $this->dataMap = $dataMap;

            return $this;
        }


        public function setMakeCallback($makeCallback): static
        {
            $this->makeCallback = $makeCallback;

            return $this;
        }

        public function make(): mixed
        {
            return call_user_func_array($this->makeCallback, [
                $this->getInsClass(),
                $this->register,
                $this,
            ]);
        }

        public function getDataField($name): mixed
        {
            return $this->dataMap[$name] ?? null;
        }

        public function getInsClass()
        {
            return $this->insClass::ins();
        }

    }