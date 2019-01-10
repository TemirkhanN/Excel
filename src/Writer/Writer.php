<?php

declare(strict_types=1);

namespace Temirkhan\Excel\Writer;

use RuntimeException;
use Temirkhan\Excel\Template\DocumentInterface;
use XLSXWriter;

class Writer implements WriterInterface
{
    public function write(DocumentInterface $document, $destinationPath)
    {
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

        $excel->writeToFile($destinationPath);

        if (!file_exists($destinationPath)) {
            throw new RuntimeException(sprintf('Could not write document into "%s"', $destinationPath));
        }
    }
}
