<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\LecturerCollection;
use Application\Entity\Lecturer;
use PDO;

final class PdoLecturerRepository implements LecturerRepository
{
    /**
     * @var PDO
     */
    private $database;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function fetchAll() : LecturerCollection
    {
        $statement = $this->database->query(
            'SELECT firstname as firstName, lastname as lastName FROM lecturers;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Lecturer::class, ['', '']);
        $lecturers = $statement->fetchAll();

        return new LecturerCollection(...$lecturers);
    }

    public function findByName(string $name = '') : ?Lecturer
    {
        $statement = $this->database->prepare(
            'SELECT firstname as firstName, lastname as lastName FROM lecturers WHERE CONCAT_WS(" ", firstname, lastname) = :name;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Lecturer::class, ['', '']);
        $statement->execute([':name' => $name]);

        if (!$lecturer = $statement->fetch()) {
            return null;
        }

        return $lecturer;
    }
}
