<?php declare(strict_types=1);

namespace App\GraphQL\Types\Post;

final readonly class CharCount
{
    /** @param  array{}  $args */
    public function __invoke(\App\Models\Post $_, array $args)
    {
        return strlen($_ -> content);
    }
}
