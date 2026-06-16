# Componenta Error Renderer Collision

Collision renderer integration for `componenta/error-handler`. It adapts Nuno Maduro Collision console rendering to `ErrorRendererInterface`.

## Installation

```bash
composer require componenta/error-renderer-collision
```

## Main API

```php
use Componenta\Error\Renderer\CollisionRenderer;

$renderer = new CollisionRenderer();
$output = $renderer->render($exception, $context);
```

`CollisionRenderer` is primarily useful for CLI contexts.

## Boundary

This package only renders an exception. It does not register console listeners and does not decide reporting policy.
