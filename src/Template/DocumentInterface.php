<?php

namespace Temirkhan\Excel\Template;

/**
 * Document interface
 */
interface DocumentInterface
{
    /**
     * Returns document name
     *
     * @return string
     */
    public function getName();

    /**
     * Retrieves containing pages
     *
     * @return Page\PageInterface[]
     */
    public function getPages();
}
