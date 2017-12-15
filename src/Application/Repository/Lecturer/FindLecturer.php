<?php

declare(strict_types=1);

namespace Application\Repository\Lecturer;

use Application\Entity\Lecturer;

interface FindLecturer
{
    public function findByName(string $name = '') : ?Lecturer;
}
