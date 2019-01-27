<?php

namespace O0h\RectorCakePHP37FixtureImport\Tests\Rector\FixtureName\SnakeToCamel;

use O0h\CakePHP37Rector\Rector\FixtureName\SnakeToCamel;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class SnakeToCamelTest extends AbstractRectorTestCase
{
    public function test(): void
    {
        $this->doTestFiles([__DIR__ . '/Fixture/fixture.php.inc']);
    }

    protected function getRectorClass(): string
    {
        return SnakeToCamel::class;
    }
}
