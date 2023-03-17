<?php

namespace Test\Routes;

use Test\Routing\Attributes\Route;
use Test\Routing\Contracts\Controller;

class MainController extends Controller
{
    #[Route(path: '/')]
    public function getIndex()
    {
        echo '<h1>Главная страница</h1>';
    }
}