<?php

    namespace Coco\layui\base\common;

    use Coco\htmlBuilder\attrs\CustomAttrs;

    class LayuiCustomAttrs extends CustomAttrs
    {
        protected static int $incId = 0;
        protected int        $id    = 0;

        protected string $filter = '';
        protected string $domId  = '';

        public function __construct()
        {
            $this->id = static::getIncId();
            parent::__construct();
        }

        protected static function getIncId(): int
        {
            return self::$incId++;
        }

        public function fillDomId(): static
        {
            $this->appendAttrKv('id', $this->getDomId());

            return $this;
        }

        public function fillFilterName(): static
        {
            $this->appendAttrKv('lay-filter', $this->getFilterName());

            return $this;
        }

        public function setCustomFilterName(string $filter = ''): static
        {
            $this->filter = $filter;

            return $this;
        }

        public function setCustomDomId(string $domId): static
        {
            $this->domId = $domId;

            return $this;
        }

        public function getDomId(): string
        {
            return $this->domId ? : $this->_makeIdName();
        }

        public function getFilterName(): string
        {
            return $this->filter ? : $this->_makeFilterName();
        }

        private function _makeIdName(): string
        {
            return 'id_' . $this->id;
        }

        private function _makeFilterName(): string
        {
            return 'layfilter_' . $this->getDomId();
        }

        /*------------------------------------------------------------------
        */

        public function domDisabled(): static
        {
            $this->appendClass('layui-disabled');

            return $this;
        }

        //red,green,cyan,blue,purple,orange,black,gray
        public function fontColor($color): static
        {
            $this->appendClass('layui-font-' . $color);

            return $this;
        }

        //12,13,14,16,18,20,22,24,26,28,30,32
        public function fontSize($size): static
        {
            $this->appendClass('layui-font-' . $size);

            return $this;
        }


        //1,2,3,4,5
        public function padding($size): static
        {
            $this->appendClass('layui-padding-' . $size);

            return $this;
        }

        //1,2,3,4,5
        public function margin($size): static
        {
            $this->appendClass('layui-margin-' . $size);

            return $this;
        }

        //red,green,cyan,blue,purple,orange,black,gray
        public function borderColor($color): static
        {
            $this->appendClass('layui-border-' . $color);

            return $this;
        }

        //red,green,cyan,blue,purple,orange,black,gray
        public function bgColor($color): static
        {
            $this->appendClass('layui-bg-' . $color);

            return $this;
        }

        //xs,sm,md,lg,xl - 1-12
        public function appendColType($type): static
        {
            $this->appendClass('layui-col-' . $type);

            return $this;
        }

        //1,2,4,5,6,8,10,12,14,15,16,
        //18,20,22,24,25,26,28,30,32
        public function appendColSpace($space): static
        {
            $this->appendClass('layui-col-space' . $space);

            return $this;
        }

        //xs,sm,md,lg,xl
        //1-12
        public function appendColOffset($type, $space): static
        {
            $this->appendClass('layui-col-' . $type . '-offset' . $space);

            return $this;
        }

        public function event($event): static
        {
            $this->appendAttrKvArr([
                "lay-event" => $event,
            ]);

            return $this;
        }

        public function bgRed(): static
        {
            $this->bgColor('red');

            return $this;
        }

        public function bgGreen(): static
        {
            $this->bgColor('green');

            return $this;
        }

        public function bgCyan(): static
        {
            $this->bgColor('cyan');

            return $this;
        }

        public function bgBlue(): static
        {
            $this->bgColor('blue');

            return $this;
        }

        public function bgPurple(): static
        {
            $this->bgColor('purple');

            return $this;
        }

        public function bgOrange(): static
        {
            $this->bgColor('orange');

            return $this;
        }

        public function bgBlack(): static
        {
            $this->bgColor('black');

            return $this;
        }

        public function bgGray(): static
        {
            $this->bgColor('gray');

            return $this;
        }


        public function borderRed(): static
        {
            $this->borderColor('red');

            return $this;
        }


        public function borderGreen(): static
        {
            $this->borderColor('green');

            return $this;
        }


        public function borderCyan(): static
        {
            $this->borderColor('cyan');

            return $this;
        }


        public function borderBlue(): static
        {
            $this->borderColor('blue');

            return $this;
        }


        public function borderPurple(): static
        {
            $this->borderColor('purple');

            return $this;
        }


        public function borderOrange(): static
        {
            $this->borderColor('orange');

            return $this;
        }


        public function borderBlack(): static
        {
            $this->borderColor('black');

            return $this;
        }


        public function borderGray(): static
        {
            $this->borderColor('gray');

            return $this;
        }

        public function fontRed(): static
        {
            $this->fontColor('red');

            return $this;
        }


        public function fontGreen(): static
        {
            $this->fontColor('green');

            return $this;
        }


        public function fontCyan(): static
        {
            $this->fontColor('cyan');

            return $this;
        }


        public function fontBlue(): static
        {
            $this->fontColor('blue');

            return $this;
        }

        public function fontPurple(): static
        {
            $this->fontColor('purple');

            return $this;
        }


        public function fontOrange(): static
        {
            $this->fontColor('orange');

            return $this;
        }


        public function fontBlack(): static
        {
            $this->fontColor('black');

            return $this;
        }


        public function fontGray(): static
        {
            $this->fontColor('gray');

            return $this;
        }


    }