<?php

namespace Test\Routing\Contracts;

abstract class Controller
{
    /**
     * Запрещено изменение конструктора, так как может привести к проблемам на этапе вызова методов
     */
    final public function __construct()
    {
    }
}