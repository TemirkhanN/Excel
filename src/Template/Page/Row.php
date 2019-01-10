<?php

declare(strict_types=1);

namespace Temirkhan\Excel\Template\Page;

use Iterator;
use SplQueue;

/**
 * Row
 */
class Row implements RowInterface
{
    /**
     * Maximum columns allowed in row
     *
     * @const int
     */
    const MAX_COLUMNS = 16384;

    /**
     * Containing columns
     *
     * @var SplQueue
     */
    private $columns;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->columns = new SplQueue();
    }

    /**
     * Adds new column
     *
     * @param ColumnInterface $column
     *
     * @return void
     */
    public function addColumn(ColumnInterface $column)
    {
        if ($this->columns->count() > self::MAX_COLUMNS) {
            throw new Exception\OutOfLimitException(
                sprintf('Maximum number of columns allowed is %d', self::MAX_COLUMNS)
            );
        }

        $this->columns->enqueue($column);
    }

    /**
     * Retrieves containing columns
     *
     * @return Iterator|ColumnInterface[]
     */
    public function getColumns()
    {
        return $this->columns;
    }
}
