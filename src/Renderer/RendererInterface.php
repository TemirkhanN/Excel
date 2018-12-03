<?php


namespace Temirkhan\Excel\Renderer;

use Temirkhan\Excel\Template\DocumentInterface;

interface RendererInterface
{
    /**
     * @param DocumentInterface $document
     *
     * @return mixed
     */
    public function render(DocumentInterface $document);
}
