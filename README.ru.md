# Componenta Error Renderer Collision

Интеграция рендерера Collision для `componenta/error-handler`. Пакет адаптирует консольный рендеринг Nuno Maduro Collision к `ErrorRendererInterface`.

## Установка

```bash
composer require componenta/error-renderer-collision
```

## Основной API

```php
use Componenta\Error\Renderer\CollisionRenderer;

$renderer = new CollisionRenderer();
$output = $renderer->render($exception, $context);
```

`CollisionRenderer` в первую очередь полезен для CLI-контекстов.

## Граница пакета

Пакет только рендерит исключение. Он не регистрирует консольные слушатели и не определяет политику логирования.
