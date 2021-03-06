<?php
declare(strict_types=1);

namespace JournalMedia\Sample\Http\ServiceProvider;

use Illuminate\Container\Container;
use JournalMedia\Sample\Http\Controller\PublicationRiverController;
use JournalMedia\Sample\Http\Controller\TagRiverController;
use League\Route\RouteCollection;

/**
 * Class ServiceProvider
 * @package JournalMedia\Sample\Http
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ServiceProvider
{
    public function register(Container $container): void
    {
        $container->singleton(RouteCollection::class, function ($container) {
            $route = new RouteCollection;

            $route->get("/", $container[PublicationRiverController::class]);
            $route->get("/{tag}", $container[TagRiverController::class]);

            return $route;
        });
    }
}
