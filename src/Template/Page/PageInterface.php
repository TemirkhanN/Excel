<?php

namespace Temirkhan\Excel\Template\Page;

/**
 * Page interface
 */
interface PageInterface
{
    /**
     * Returns title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Returns containing rows
     *
     * @return RowInterface[]
     */
    public function getRows();
}
