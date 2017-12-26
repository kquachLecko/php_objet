<?php

declare(strict_types=1);

namespace User\Entity;

final class User
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name() : string
    {
        return $this->name;
    }

}
