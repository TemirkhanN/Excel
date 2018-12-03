<?php

namespace Temirkhan\Excel\Renderer;

use Temirkhan\Excel\Template\DocumentInterface;
use XLSXWriter;

class Renderer implements RendererInterface
{
    public function render(DocumentInterface $document)
    {
        $usage = memory_get_usage();

        $excel = new XLSXWriter();

        foreach ($document->getPages() as $pageOrder => $page) {
            $title = $page->getTitle();
            foreach ($page->getRows() as $rowNumber => $row) {
                $rowData = [];
                foreach ($row->getColumns() as $columnNumber => $column) {
                    $rowData[$rowNumber . $columnNumber] = $column->getValue() . mt_rand(1, 9999999);
                }

                $excel->writeSheetRow($title, $rowData);
            }
        }

        $excel->writeToFile(__DIR__ . '/tablica.xlsx');

        echo PHP_EOL . '#'.((memory_get_usage() - $usage)/1024/1024)."MB" . PHP_EOL;
    }
}
