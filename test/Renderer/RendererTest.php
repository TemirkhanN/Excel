<?php

namespace Temirkhan\Excel\Renderer;

use PHPUnit\Framework\TestCase;
use Temirkhan\Excel\Template\DocumentInterface;
use Temirkhan\Excel\Template\Page\ColumnInterface;
use Temirkhan\Excel\Template\Page\PageInterface;
use Temirkhan\Excel\Template\Page\RowInterface;

class RendererTest extends TestCase
{
    private $renderer;

    protected function setUp()
    {
        $this->renderer = new Renderer();
    }

    protected function tearDown()
    {
        $this->renderer = null;
    }

    public function testRender()
    {
        $document = $this->createMock(DocumentInterface::class);
        $pages = [
            $this->createMock(PageInterface::class),
            $this->createMock(PageInterface::class),
            $this->createMock(PageInterface::class),
        ];

        $document
            ->expects($this->once())
            ->method('getPages')
            ->willReturn($pages);

        foreach ($pages as $key => $page) {
            $rows = [
                $this->createMock(RowInterface::class),
                $this->createMock(RowInterface::class),
                $this->createMock(RowInterface::class),
                $this->createMock(RowInterface::class),
                $this->createMock(RowInterface::class),
            ];

            $page
                ->expects($this->once())
                ->method('getTitle')
                ->willReturn('Some page title' . $key);
            $page
                ->expects($this->once())
                ->method('getRows')
                ->willReturn($rows);

            foreach ($rows as $row) {
                $columns = [
                    'first value' => $this->createMock(ColumnInterface::class),
                    'second value' => $this->createMock(ColumnInterface::class),
                    'third value' => $this->createMock(ColumnInterface::class),
                    'fourth value' => $this->createMock(ColumnInterface::class),
                    'last value' => $this->createMock(ColumnInterface::class),
                ];

                $row
                    ->expects($this->once())
                    ->method('getColumns')
                    ->willReturn(array_values($columns));

                foreach ($columns as $value => $column) {
                    $column
                        ->expects($this->once())
                        ->method('getValue')
                        ->willReturn($value);
                }
            }
        }

        $this->renderer->render($document);
    }
}
