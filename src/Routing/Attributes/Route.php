<?php

namespace Test\Routing\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Route
{
    public function __construct(
        public string $path
    )
    {
    }
}