<?php

namespace Temirkhan\Excel\Writer;

use PHPUnit\Framework\TestCase;
use Temirkhan\Excel\Template\DocumentInterface;
use Temirkhan\Excel\Template\Page\ColumnInterface;
use Temirkhan\Excel\Template\Page\PageInterface;
use Temirkhan\Excel\Template\Page\RowInterface;

class WriterTest extends TestCase
{
    private $writer;

    protected function setUp()
    {
        $this->writer = new Writer();
    }

    protected function tearDown()
    {
        $this->writer = null;
    }

    public function testWrite()
    {
        $destination = tempnam(sys_get_temp_dir(), 'xlsx');

        $document = $this->createDocument();

        $this->writer->write($document, $destination);
        //Missing asserts and etc
    }

    public function testMemoryIsNotLeaking()
    {
        $destination = tempnam(sys_get_temp_dir(), 'xlsx');

        // 1MB allowed to be used
        $allowedConsumption = 1024 * 1024;
        $beforeExecution = memory_get_usage();
        $memoryLimit = $beforeExecution + $allowedConsumption;

        $document = $this->createDocument();
        $this->writer->write($document, $destination);

        $consumed = memory_get_usage();
        $this->assertLessThan(
            $memoryLimit,
            $consumed,
            sprintf(
                'Processing consumes too much memory. Upper limit was %d bytes but used %d',
                $beforeExecution,
                $consumed
            )
        );
    }

    private function createDocument()
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

        return $document;
    }
}
