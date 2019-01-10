<?php

declare(strict_types=1);

namespace Temirkhan\Excel\Template\Page;

/**
 * Row interface
 */
interface RowInterface
{
    /**
     * Retrieves containing columns
     *
     * @return ColumnInterface[]
     */
    public function getColumns();
}
