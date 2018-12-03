<?php

namespace Temirkhan\Excel\Template\Page;

use SplQueue;

class Page implements PageInterface
{
    const MAX_ROWS = 1048576;

    private $title;

    private $rows;

    public function __construct($title)
    {
        $this->title = $title;
        $this->rows  = new SplQueue();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function addRow(RowInterface $row)
    {
        if ($this->rows->count() > self::MAX_ROWS) {
            throw new Exception\OutOfLimitException(sprintf('Maximum number of rows allowed is %d', self::MAX_ROWS));
        }
        $this->rows->enqueue($row);
    }

    public function getRows()
    {
        return $this->rows;
    }
}
