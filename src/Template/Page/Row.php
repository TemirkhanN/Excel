<?php

namespace Temirkhan\Excel\Template\Page;

use SplQueue;

class Row implements RowInterface
{
    const MAX_COLUMNS = 16384;

    private $columns;

    public function __construct()
    {
        $this->columns = new SplQueue();
    }

    public function addColumn(ColumnInterface $column)
    {
        if ($this->columns->count() > self::MAX_COLUMNS) {
            throw new Exception\OutOfLimitException(
                sprintf('Maximum number of columns allowed is %d', self::MAX_COLUMNS)
            );
        }

        $this->columns->enqueue($column);
    }

    public function getColumns()
    {
        return $this->columns;
    }
}
