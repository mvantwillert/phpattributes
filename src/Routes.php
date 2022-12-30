<?php

namespace Src;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionAttribute;
use Src\Attributes\Route;

final class Routes
{

    public static function getRouteList(string $path): iterable
    {
    
        $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($dir as $file) {
            if (! $file->isFile()) {
                continue;
            }
        
            $path = $file->getRealPath() ?: $file->getPathname();
        
            ;
            $namespace = str_replace(['/Users/melvinvantwillert/Projects/phpattributes/','.php', '/'], ['','','\\'], $path);
            $reflection = new \ReflectionClass($namespace);
            $methods = $reflection->getMethods();
    
            foreach ($methods as $method) {
                $attributes = $method->getAttributes();
                if(count($attributes) > 0){
                    foreach ($attributes as $attribute){
                        yield self::parseAttributes($attribute);
                    }
                }
            }
        }
    }
    
    private static function parseAttributes(ReflectionAttribute $attribute): string
    {
        $attributeName = $attribute->getName();

        return match ($attributeName) {
            Route::class => self::parseRouteAttribute($attribute->newInstance()),
            default => '',
        };
    }
    
    private static function parseRouteAttribute(Route $attribute): string
    {
        return $attribute->path;
    }
    
    
}