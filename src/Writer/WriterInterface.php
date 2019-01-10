<?php

declare(strict_types=1);

namespace Temirkhan\Excel\Writer;

use Temirkhan\Excel\Template\DocumentInterface;

/**
 * Writer interface
 */
interface WriterInterface
{
    /**
     * Writes document into destination path
     *
     * @param DocumentInterface $document
     * @param string            $destinationPath
     *
     * @return mixed
     */
    public function write(DocumentInterface $document, $destinationPath);
}
