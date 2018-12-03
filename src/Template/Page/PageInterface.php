<?php

namespace Temirkhan\Excel\Template\Page;

interface PageInterface
{
    /**
     * Returns title
     *
     * @return string
     */
    public function getTitle();

    /**
     * @return RowInterface[]
     */
    public function getRows();
}
