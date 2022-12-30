<?php

namespace Src\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Route
{
    
    public function __construct(
        public string $path,
        public ?string $name = null
    ) {
    }
    
}