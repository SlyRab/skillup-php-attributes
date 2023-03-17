<?php

namespace Test\Routes;

use Test\Routing\Attributes\Route;
use Test\Routing\Contracts\Controller;

class CopyController extends Controller
{
    #[Route(path: '/copy')]
    public function getCopy(): void
    {
        echo 'Какой-то метод' . PHP_EOL;
    }
}