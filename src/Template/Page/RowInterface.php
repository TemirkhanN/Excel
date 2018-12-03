<?php

namespace Temirkhan\Excel\Template\Page;

interface RowInterface
{
    /**
     * @return ColumnInterface[]
     */
    public function getColumns();
}
