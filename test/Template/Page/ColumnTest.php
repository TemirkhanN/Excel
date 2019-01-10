<?php

declare(strict_types=1);

namespace Temirkhan\Excel\Template\Page;

use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Column tests
 */
class ColumnTest extends TestCase
{
    /**
     * Tests invalid value handle
     */
    public function testInvalidValue()
    {
        $this->expectException(Exception\InvalidArgumentException::class);

        new Column(new stdClass());
    }

    /**
     * Tests column value set
     *
     * @param int|float|string|bool $value
     *
     * @dataProvider validValuesProvider
     */
    public function testValue($value)
    {
        $column = new Column($value);

        $this->assertSame($value, $column->getValue());
    }

    /**
     * Valid column values provider
     *
     * @return array[]
     */
    public function validValuesProvider(): array
    {
        return [
            ['some string'],
            [123],
            [123.456],
            [true],
            [false],
        ];
    }
}
