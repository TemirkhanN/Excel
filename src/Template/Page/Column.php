<?php

declare(strict_types=1);

namespace Temirkhan\Excel\Template\Page;

/**
 * Column
 */
class Column implements ColumnInterface
{
    /**
     * Value
     *
     * @return int|float|string|bool
     */
    private $value;

    /**
     * Constructor
     *
     * @param int|float|string|bool $value
     */
    public function __construct($value)
    {
        if (!is_scalar($value)) {
            throw new Exception\InvalidArgumentException(
                sprintf('Datatype "%s" is not allowed in column', gettype($value))
            );
        }

        $this->value = $value;
    }

    /**
     * Returns contained value
     *
     * @return int|float|string|bool
     */
    public function getValue()
    {
        return $this->value;
    }
}
