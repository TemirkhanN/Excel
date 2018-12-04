<?php

namespace Temirkhan\Excel\Template;

use Iterator;
use SplQueue;

/**
 * Document
 */
class Document implements DocumentInterface
{
    /**
     * Document name
     *
     * @var string
     */
    private $name;

    /**
     * Containing pages
     *
     * @var SplQueue
     */
    private $pages;

    /**
     * Constructor
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->pages = new SplQueue();
    }

    /**
     * Returns name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Adds new page into document
     *
     * @param Page\PageInterface $page
     *
     * @return void
     */
    public function addPage(Page\PageInterface $page)
    {
        $this->pages->enqueue($page);
    }

    /**
     * Retrieves containing pages
     *
     * @return Iterator|Page\PageInterface[]
     */
    public function getPages()
    {
        return $this->pages;
    }
}
