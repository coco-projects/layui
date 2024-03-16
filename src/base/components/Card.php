<?php

    declare(strict_types = 1);

    namespace Coco\layui\base\components;

    use Coco\layui\base\common\LayuiCustomAttrs;
    use Coco\layui\base\common\LayuiDomSectionBase;

    class Card extends LayuiDomSectionBase
    {
        public function __construct($title = '')
        {
            $template = <<<'CONTENTS'
<div class="layui-card {:card_class:}" {:card_attrs:}>
    <div class="layui-card-header {:header_class:}" {:header_attrs:}>{:title:}</div>
    <div class="layui-card-body {:__CLASS__:}" {:__ATTRS__:}>
        {:INNER_CONTENTS:}
    </div>
</div>

CONTENTS;
            parent::__construct($template);

            $this->cardRegistry       = LayuiCustomAttrs::ins();
            $this->cardHeaderRegistry = LayuiCustomAttrs::ins();
            $this->title($title);
        }

        protected function beforeRender(): void
        {
            $this->cardRegistry->fillDomId();
            $this->cardRegistry->fillFilterName();
            $this->cardHeaderRegistry->fillDomId();
            $this->cardHeaderRegistry->fillFilterName();

            $this->setSubsections([
                "card_class"   => $this->cardRegistry->evalClass(),
                "card_attrs"   => $this->cardRegistry->evalAttrs(),
                "header_class" => $this->cardHeaderRegistry->evalClass(),
                "header_attrs" => $this->cardHeaderRegistry->evalAttrs(),
            ]);

            parent::beforeRender();
        }

        public function title($title): static
        {
            $this->setSubsections([
                "title" => $title,
            ]);

            return $this;
        }

        public function cardRed(): static
        {
            $this->cardRegistry->borderRed();
            $this->cardHeaderRegistry->bgRed();

            return $this;
        }

        public function cardGreen(): static
        {
            $this->cardRegistry->borderGreen();
            $this->cardHeaderRegistry->bgGreen();

            return $this;
        }

        public function cardCyan(): static
        {
            $this->cardRegistry->borderCyan();
            $this->cardHeaderRegistry->bgCyan();

            return $this;
        }

        public function cardBlue(): static
        {
            $this->cardRegistry->borderBlue();
            $this->cardHeaderRegistry->bgBlue();

            return $this;
        }


        public function cardPurple(): static
        {
            $this->cardRegistry->borderPurple();
            $this->cardHeaderRegistry->bgPurple();

            return $this;
        }

        public function cardOrange(): static
        {
            $this->cardRegistry->borderOrange();
            $this->cardHeaderRegistry->bgOrange();

            return $this;
        }

        public function cardBlack(): static
        {
            $this->cardRegistry->borderBlack();
            $this->cardHeaderRegistry->bgBlack();

            return $this;
        }

        public function cardGray(): static
        {
            $this->cardRegistry->borderGray();
            $this->cardHeaderRegistry->bgGray();

            return $this;
        }


    }