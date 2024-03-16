<?php

    declare(strict_types = 1);

    namespace Coco\layui\frame;

    use Coco\layui\components\LayuiBase;

    class StaticTable extends LayuiBase
    {
        use MainJsTrait;

        protected array $defaultValue = [
            "id"         => 0,
            "title"      => '',
            "skin"       => '',
            "size"       => '',
            "even"       => '',
            "thead"      => '',
            "tbody"      => '',
            "lay_filter" => '',

        ];

        const SORT_ORDER_DESC = 'desc';
        const SORT_ORDER_ASC  = 'asc';
        protected array $tableData = [];

        protected array $fields = [];

        protected array $filterCallback = [];

        protected $sortCallback = null;
        protected $sortField    = null;
        protected $sortOrder    = 'desc';

        public function __construct()
        {
            $template = <<<'CONTENTS'
<table class="layui-table {:class:}" {:attrs:} lay-filter="{:lay_filter:}">
	<thead>
        {:thead:}
    </thead>
    <tbody>
        {:tbody:}
    </tbody>
</table>
CONTENTS;
            parent::__construct($template);
        }


        /**
         * @param array $tableData
         *
         * @return $this
         */
        public function setTableData(array $tableData): static
        {
            $this->tableData = $tableData;

            return $this;
        }

        public function filterByField(string $fieldName, callable $callback): static
        {
            $this->filterCallback[$fieldName] = $callback;

            return $this;
        }

        public function addTableField(string $fieldName, string $fieldTitle, callable $callback = null, $style = ''): static
        {
            $this->fields[$fieldName] = [
                "title"    => $fieldTitle,
                "style"    => $style,
                "callback" => $callback,
            ];

            return $this;
        }

        public function sortByField(string $field, string $order = 'desc'): static
        {
            $this->sortField = $field;
            $this->sortOrder = $order;

            return $this;
        }

        private function makeTable()
        {
            $head = [];
            $body = [];

            $head[] = '<tr class="layui-font-24">';
            foreach ($this->fields as $fieldName => $v)
            {
                $head[] = '<th  lay-data="{field:\'' . $fieldName . '\'}" style="' . $v['style'] . '">' . $v['title'] . '</th>';
            }
            $head[] = '</tr>';

            //排序
            if (is_string($this->sortField))
            {
                switch ($this->sortOrder)
                {
                    case self::SORT_ORDER_ASC:
                        usort($this->tableData, function($a, $b) {
                            if ($a[$this->sortField] == $b[$this->sortField]){
                                return 0;
                            }
                            return ($a[$this->sortField] < $b[$this->sortField]) ? -1 : 1;
                        });
                        break;
                    case self::SORT_ORDER_DESC:
                        usort($this->tableData, function($a, $b) {
                            if ($a[$this->sortField] == $b[$this->sortField]){
                                return 0;
                            }
                            return ($a[$this->sortField] > $b[$this->sortField]) ? -1 : 1;
                        });
                        break;
                    default:
                        break;
                }
            }

            foreach ($this->tableData as $item)
            {
                // 过滤数据
                $flag = true;
                foreach ($this->filterCallback as $fieldName => $callback)
                {
                    if (isset($item[$fieldName]))
                    {
                        $flag && $flag = call_user_func_array($this->filterCallback[$fieldName], [
                            $item[$fieldName],
                            $item,
                        ]);
                    }
                }

                if (!$flag)
                {
                    continue;
                }

                //生成表格
                $body[] = '<tr>';
                foreach ($this->fields as $fieldName => $v)
                {
                    $fieldValue = $item[$fieldName] ?? '';

                    if (is_callable($v['callback']))
                    {
                        $fieldValue = call_user_func_array($v['callback'], [
                            $fieldValue,
                            $item,
                        ]);
                    }

                    $body[] = '<td>' . $fieldValue . '</td>';
                }
                $body[] = '</tr>';
            }

            $this->setSubsection('thead', implode('', $head));
            $this->setSubsection('tbody', implode('', $body));
        }


        protected function init(): void
        {
        }


        /**
         * @return void
         */
        public function beforeRender(): void
        {
            $this->setDomId();
            $this->setFilter();
            $this->setSubsection('attrs', implode(' ', $this->attrs));
            $this->setSubsection('class', implode(' ', $this->class));

            $this->scriptSection->setSubsections([
                "tpl_data"  => json_encode($this->tableData),
                "target_id" => ($this->targetId),
            ]);

            $this->scriptSection->prependSubsectionWithoutEval("INNER_CONTENTS", <<<AAA


(function () {

    // 转化静态表格
    layui.table.init('{:lay_filter:}-', {
    //    height: '500'
    });
})();

    
AAA
            );

            $this->makeTable();
            $this->initStatic();

        }


        protected function afterRender(string &$sectionContents): void
        {

        }


        public function row(): static
        {
            $this->appendAttrs('lay-skin="row"');

            return $this;
        }


        public function line(): static
        {
            $this->appendAttrs('lay-skin="line"');

            return $this;
        }


        public function nob(): static
        {
            $this->appendAttrs('lay-skin="nob"');

            return $this;
        }

        public function even(): static
        {
            $this->appendAttrs('lay-even');

            return $this;
        }

        //xs,sm,lg
        public function tableSize($size): static
        {
            $this->appendAttrs('lay-size="' . $size . '"');

            return $this;
        }

    }