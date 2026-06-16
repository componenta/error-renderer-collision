<?php

declare(strict_types=1);

namespace Componenta\Error\Renderer;

use Componenta\Error\ErrorContextInterface;
use Componenta\Error\Renderer\ErrorRendererInterface;
use NunoMaduro\Collision\Handler;
use NunoMaduro\Collision\Provider;
use Symfony\Component\Console\Output\BufferedOutput;
use Throwable;
use Whoops\Run;
use Whoops\RunInterface;

readonly class CollisionRenderer implements ErrorRendererInterface
{
    private RunInterface $run;

    private BufferedOutput $output;

    public function __construct()
    {
        $this->run = new Run();
        $this->run->allowQuit(false);
        $this->run->writeToOutput(false);

        $this->output = new BufferedOutput();

        $handler = (new Handler())->setOutput($this->output);

        new Provider($this->run, $handler)->register();
    }

    public function render(Throwable $exception, ErrorContextInterface $context): string
    {
        $this->run->handleException($exception);

        return $this->output->fetch();
    }

    public function supports(Throwable $exception, ErrorContextInterface $context): bool
    {
        return true;
    }

    public function __destruct()
    {
        $this->run->unregister();
    }
}
