<?php

namespace Temirkhan\Excel\Template\Page;

use PHPUnit\Framework\TestCase;

class RowTest extends TestCase
{
    private $row;

    protected function setUp()
    {
        $this->row = new Row();
    }

    protected function tearDown()
    {
        $this->row = null;
    }

    public function testGetDefaultColumns()
    {
        $this->assertEmpty($this->row->getColumns());
    }

    public function testGetColumns()
    {
        $column = $this->createMock(ColumnInterface::class);

        $this->row->addColumn($column);

        $columns = $this->row->getColumns();
        $this->assertCount(1, $columns);
        $this->assertContains($column, $columns);
    }
}
