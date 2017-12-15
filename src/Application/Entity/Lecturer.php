<?php

declare(strict_types=1);

namespace Application\Entity;

use Application\Helper\SlugifyHelper;

final class Lecturer
{
    use SlugifyHelper;

    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;

    private $lectures;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->lectures = [];
    }

    public function getName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function slugifiedName() : string
    {
        return $this->slugify($this->getName());
    }

    public function getLectures(): array
    {
        return $this->lectures;
    }

    public function is(string $name) : bool
    {
        return $name === $this->getName();
    }
}
