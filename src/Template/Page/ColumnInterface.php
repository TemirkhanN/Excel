<?php

namespace Temirkhan\Excel\Template\Page;

/**
 * Column interface
 */
interface ColumnInterface
{
    /**
     * Returns contained value
     *
     * @return int|float|string|bool
     */
    public function getValue();
}
