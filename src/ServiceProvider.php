<?php


namespace Hadder\LaravelPresenter;


use Illuminate\Routing\Router;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(Router $router) {
        $this->commands([
            \Hadder\LaravelPresenter\Commands\MakeCommand::class
        ]);
    }
}
