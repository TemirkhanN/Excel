<?php

namespace Temirkhan\Excel\Template\Page;

use Iterator;
use SplQueue;

/**
 * Page
 */
class Page implements PageInterface
{
    /**
     * Maximum rows allowed on page
     *
     * @const int
     */
    const MAX_ROWS = 1048576;

    /**
     * Title
     *
     * @var string
     */
    private $title;

    /**
     * Rows
     *
     * @var SplQueue
     */
    private $rows;

    /**
     * Constructor
     *
     * @param string $title
     */
    public function __construct($title)
    {
        $this->title = $title;
        $this->rows  = new SplQueue();
    }

    /**
     * Returns title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Adds new row on page
     *
     * @param RowInterface $row
     *
     * @return void
     */
    public function addRow(RowInterface $row)
    {
        if ($this->rows->count() > self::MAX_ROWS) {
            throw new Exception\OutOfLimitException(sprintf('Maximum number of rows allowed is %d', self::MAX_ROWS));
        }

        $this->rows->enqueue($row);
    }

    /**
     * Retrieves containing rows
     *
     * @return Iterator|RowInterface[]
     */
    public function getRows()
    {
        return $this->rows;
    }
}
