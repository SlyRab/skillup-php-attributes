<?php

namespace Test\Routing;

use Test\Routing\Attributes\Route;
use Test\Routing\Contracts\Controller;

class Router
{
    /**
     * @var array Список контроллеров
     */
    private array $controllers = [];

    /**
     * @var array Список путей
     */
    private array $paths = [];

    public function __construct(array $controllers = [])
    {
        foreach ($controllers as $controller)
        {
            $this->addController($controller);
        }
    }

    /**
     * Зарегистрировать контроллер
     *
     * @param string $controller
     *
     * @return void
     *
     * @throws \ReflectionException
     */
    public function addController(string $controller): void
    {
        $reflector = new \ReflectionClass($controller);

        if (!$reflector->isSubclassOf(Controller::class)) {
            throw new \Exception('Controller must extend Interfaces/Controler');
        }

        $this->controllers[] = $controller;
    }

    /**
     * Добавить набор контроллеров
     *
     * @param array $controllers
     * @return void
     *
     * @throws \ReflectionException
     */
    public function addControllers(array $controllers): void
    {
        foreach ($controllers as $controller)
        {
            $this->addController($controller);
        }
    }

    /**
     * @return void запустить контроллер
     * @throws \ReflectionException
     */
    public function start(): void
    {
        $this->register();

        $this->match();
    }

    /**
     * Регистрация маршрутов
     *
     * @return void
     *
     * @throws \ReflectionException
     */
    private function register(): void
    {
        foreach ($this->controllers as $controller) {
            $reflector = new \ReflectionClass($controller);

            $methods = $reflector->getMethods();

            foreach ($methods as $method) {
                $routes = $method->getAttributes(Route::class);

                foreach ($routes as $route) {
                    $path = $route->getArguments()['path'];

                    $this->paths[$path] = $method;
                }
            }
        }
    }

    /**
     * @return void Получить маршрут
     */
    private function match(): void
    {
        $request = $_SERVER['REQUEST_URI'];

        $request = (empty($request) ? '/': $request);

        if (isset($this->paths[$request])) {
            $method = $this->paths[$request];

            $class =  $method->getDeclaringClass();
            $object = $class->newInstance();

            $method->invoke($object);
        }
    }
}