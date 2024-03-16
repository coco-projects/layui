<?php

    namespace Coco\layui\base\traits;

    /**
     * dom 元素使用，设置基础的颜色等样式
     */
    trait ClassTrait
    {
        public function domDisabled(): static
        {
            $this->attrsRegistry->appendClass('layui-disabled');

            return $this;
        }

        //red,green,cyan,blue,purple,orange,black,gray
        public function fontColor($color): static
        {
            $this->attrsRegistry->appendClass('layui-font-' . $color);

            return $this;
        }

        //12,13,14,16,18,20,22,24,26,28,30,32
        public function fontSize($size): static
        {
            $this->attrsRegistry->appendClass('layui-font-' . $size);

            return $this;
        }


        //1,2,3,4,5
        public function padding($size): static
        {
            $this->attrsRegistry->appendClass('layui-padding-' . $size);

            return $this;
        }

        //1,2,3,4,5
        public function margin($size): static
        {
            $this->attrsRegistry->appendClass('layui-margin-' . $size);

            return $this;
        }

        //red,green,cyan,blue,purple,orange,black,gray
        public function borderColor($color): static
        {
            $this->attrsRegistry->appendClass('layui-border-' . $color);

            return $this;
        }

        //red,green,cyan,blue,purple,orange,black,gray
        public function bgColor($color): static
        {
            $this->attrsRegistry->appendClass('layui-bg-' . $color);

            return $this;
        }

        //xs,sm,md,lg,xl - 1-12
        public function appendColType($type): static
        {
            $this->attrsRegistry->appendClass('layui-col-' . $type);

            return $this;
        }

        //1,2,4,5,6,8,10,12,14,15,16,
        //18,20,22,24,25,26,28,30,32
        public function appendColSpace($space): static
        {
            $this->attrsRegistry->appendClass('layui-col-space' . $space);

            return $this;
        }

        //xs,sm,md,lg,xl
        //1-12
        public function appendColOffset($type, $space): static
        {
            $this->attrsRegistry->appendClass('layui-col-' . $type . '-offset' . $space);

            return $this;
        }

        public function event($event): static
        {
            $this->attrsRegistry->appendAttrKvArr([
                "lay-event" => $event,
            ]);

            return $this;
        }

        public function bgRed(): static
        {
            $this->attrsRegistry->bgColor('red');

            return $this;
        }

        public function bgGreen(): static
        {
            $this->attrsRegistry->bgColor('green');

            return $this;
        }

        public function bgCyan(): static
        {
            $this->attrsRegistry->bgColor('cyan');

            return $this;
        }

        public function bgBlue(): static
        {
            $this->attrsRegistry->bgColor('blue');

            return $this;
        }

        public function bgPurple(): static
        {
            $this->attrsRegistry->bgColor('purple');

            return $this;
        }

        public function bgOrange(): static
        {
            $this->attrsRegistry->bgColor('orange');

            return $this;
        }

        public function bgBlack(): static
        {
            $this->attrsRegistry->bgColor('black');

            return $this;
        }

        public function bgGray(): static
        {
            $this->attrsRegistry->bgColor('gray');

            return $this;
        }


        public function borderRed(): static
        {
            $this->attrsRegistry->borderColor('red');

            return $this;
        }


        public function borderGreen(): static
        {
            $this->attrsRegistry->borderColor('green');

            return $this;
        }


        public function borderCyan(): static
        {
            $this->attrsRegistry->borderColor('cyan');

            return $this;
        }


        public function borderBlue(): static
        {
            $this->attrsRegistry->borderColor('blue');

            return $this;
        }


        public function borderPurple(): static
        {
            $this->attrsRegistry->borderColor('purple');

            return $this;
        }


        public function borderOrange(): static
        {
            $this->attrsRegistry->borderColor('orange');

            return $this;
        }


        public function borderBlack(): static
        {
            $this->attrsRegistry->borderColor('black');

            return $this;
        }


        public function borderGray(): static
        {
            $this->attrsRegistry->borderColor('gray');

            return $this;
        }

        public function fontRed(): static
        {
            $this->attrsRegistry->fontColor('red');

            return $this;
        }


        public function fontGreen(): static
        {
            $this->attrsRegistry->fontColor('green');

            return $this;
        }


        public function fontCyan(): static
        {
            $this->attrsRegistry->fontColor('cyan');

            return $this;
        }


        public function fontBlue(): static
        {
            $this->attrsRegistry->fontColor('blue');

            return $this;
        }

        public function fontPurple(): static
        {
            $this->attrsRegistry->fontColor('purple');

            return $this;
        }


        public function fontOrange(): static
        {
            $this->attrsRegistry->fontColor('orange');

            return $this;
        }


        public function fontBlack(): static
        {
            $this->attrsRegistry->fontColor('black');

            return $this;
        }


        public function fontGray(): static
        {
            $this->attrsRegistry->fontColor('gray');

            return $this;
        }

    }