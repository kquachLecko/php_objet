<?php

declare(strict_types=1);

namespace Meetup\Repository;

use Meetup\Collection\MeetingCollection;
use Meetup\Entity\Meeting;
use Meetup\Exception\MeetingNotFoundException;
use PDO;

final class MeetingRepository
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAll() : MeetingCollection
    {
        $result = $this->pdo->query('SELECT id, titre, description, endDate, startDate FROM meetings');


        $meetings = [];
        while ($meeting = $result->fetch()) {
            $meetings[] = new Meeting($meeting['titre'], $meeting['description'],new \DateTime( $meeting['endDate']),new \DateTime($meeting['startDate']));
        }

        return new MeetingCollection(...$meetings);
    }

    public function get(string $name) : Meeting
    {
        $statement = $this->pdo->prepare('SELECT id, title, description, endDate, startDate  FROM meetings WHERE title = :name');
        $statement->execute([':name' => $name]);
        $meeting = $statement->fetch();
        if (!$meeting) {
            throw new MeetingNotFoundException();
        }
        return new Meeting($meeting['titre'], $meeting['description'], $meeting['endDate'],$meeting['startDate']);
    }
}
