<?php

namespace Temirkhan\Excel\Template;


interface DocumentInterface
{
    /**
     * @return Page\PageInterface[]
     */
    public function getPages();
}
