<?php

namespace Temirkhan\Excel\Template\Page;

use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    private $title = 'Some page title';

    private $page;


    protected function setUp()
    {
        $this->page = new Page($this->title);
    }

    protected function tearDown()
    {
        $this->page = null;
    }

    public function testGetTitle()
    {
        $this->assertEquals($this->title, $this->page->getTitle());
    }

    public function testGetDefaultRows()
    {
        $this->assertEmpty($this->page->getRows());
    }

    public function testGetRows()
    {
        $row = $this->createMock(RowInterface::class);

        $this->page->addRow($row);

        $rows = $this->page->getRows();
        $this->assertCount(1, $rows);
        $this->assertContains($row, $rows);
    }
}
