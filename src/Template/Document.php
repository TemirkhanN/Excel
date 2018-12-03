<?php

namespace Temirkhan\Excel\Template;

use Iterator;
use SplQueue;
use Page\PageInterface;

class Document implements DocumentInterface
{
    private $name;

    private $pages;

    public function __construct($name)
    {
        $this->name = $name;
        $this->pages = new SplQueue();
    }

    public function getName()
    {
        return $this->name;
    }

    public function addPage(Page\PageInterface $page)
    {
        $this->pages->enqueue($page);
    }

    /**
     * @return Iterator|Page\PageInterface[]
     */
    public function getPages()
    {
        return $this->pages;
    }
}
