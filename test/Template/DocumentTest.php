<?php

namespace Temirkhan\Excel\Template;

use PHPUnit\Framework\TestCase;

/**
 * Document tests
 */
class DocumentTest extends TestCase
{
    private $name = 'some document name';

    private $document;

    /**
     * Preset environment
     *
     * @return void
     */
    protected function setUp()
    {
        $this->document = new Document($this->name);
    }

    /**
     * Reset environment
     *
     * @return void
     */
    protected function tearDown()
    {
        $this->document = null;
    }

    public function testName()
    {
        $this->assertEquals($this->name, $this->document->getName());
    }

    public function testGetDefaultPages()
    {
        $this->assertEmpty($this->document->getPages());
    }

    public function testGetPages()
    {
        $page = $this->createMock(Page\PageInterface::class);

        $this->document->addPage($page);

        $pages = $this->document->getPages();
        $this->assertCount(1, $pages);
        $this->assertContains($page, $pages);
    }
}
