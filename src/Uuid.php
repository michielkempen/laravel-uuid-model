<?php

namespace MichielKempen\LaravelUuidModel;

class Uuid
{
    public static function new(): self
    {
        return app(self::class);
    }

    public function generate(): string
    {
        return (string) \Webpatser\Uuid\Uuid::generate(4);
    }
}
