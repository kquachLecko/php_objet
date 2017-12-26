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

        $result = $this->pdo->query('SELECT id, title, description, date_start, date_end FROM meetings');


        $meetings = [];
        while ($meeting = $result->fetch()) {
            $meetings[] = new Meeting($meeting['title'], $meeting['description'],new \DateTimeImmutable( $meeting['date_end']),new \DateTimeImmutable($meeting['date_start']));
        }

        return new MeetingCollection(...$meetings);
    }

    public function get(string $name) : Meeting
    {
        $statement = $this->pdo->prepare('SELECT id, title, description, date_start, date_end  FROM meetings WHERE title = :name');
        $statement->execute([':name' => $name]);
        $meeting = $statement->fetch();
        if (!$meeting) {
            throw new MeetingNotFoundException();
        }
        return new Meeting($meeting['title'], $meeting['description'],new  \DateTimeImmutable( $meeting['date_end']),new \DateTimeImmutable($meeting['date_start']));
    }

    public function get_Meetings_by_Community(string $communityId) : MeetingCollection
    {
        $statement = $this->pdo->prepare('SELECT title, description, date_start as dateStart, date_end as dateEnd FROM meetings WHERE community_id = :communityId;');
        $statement->execute([':communityId' => $communityId]);
        $meetings = [];
        while ($meeting = $statement->fetch()) {
            $meetings[] = new Meeting($meeting['title'], $meeting['description'],new \DateTimeImmutable( $meeting['dateStart']),new \DateTimeImmutable($meeting['dateEnd']));
        }

        return new MeetingCollection(...$meetings);
    }

}
