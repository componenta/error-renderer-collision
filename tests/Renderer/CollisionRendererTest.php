<?php

declare(strict_types=1);

namespace Componenta\Error\Renderer\Collision\Tests\Renderer;

use Componenta\Error\Context\CliContext;
use Componenta\Error\Renderer\CollisionRenderer;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use RuntimeException;

#[TestDox('CollisionRenderer')]
final class CollisionRendererTest extends TestCase
{
    public function testRenderReturnsExceptionOutput(): void
    {
        $renderer = new CollisionRenderer();
        $exception = new RuntimeException('Collision renderer test');

        $output = $renderer->render($exception, CliContext::fromArgv());

        self::assertStringContainsString('Collision renderer test', $output);
    }
}
