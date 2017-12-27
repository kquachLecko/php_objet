<?php

declare(strict_types=1);

namespace User\Repository;


use Meetup\Entity\Meeting;
use User\Collection\UserCollection;
use User\Entity\User;
use User\Exception\UserNotFoundException;
use PDO;

/**
 * Class UserRepository
 * @package User\Repository
 */
final class UserRepository
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * UserRepository constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return UserCollection
     */
    public function fetchAll() : UserCollection
    {

        $result = $this->pdo->query('SELECT id, name FROM users');


        $users = [];
        while ($user = $result->fetch()) {
            $users[] = new User($user['name']);
        }

        return new UserCollection(...$users);
    }

    /**
     * @param string $name
     * @return User
     */
    public function get(string $name) : User
    {
        $statement = $this->pdo->prepare('SELECT id, name  FROM users WHERE name = :name');
        $statement->execute([':name' => $name]);
        $user = $statement->fetch();
        if (!$user) {
            throw new UserNotFoundException();
        }
        return new User($user['name']);
    }
    public function  get_Meetings_by_User(string $userId) : Array
    {

        $statement = $this->pdo->prepare(
                'SELECT u.name as user_name, m.id as user_id, m.title as meeting_title, description
                            as description, m.date_start as date_start, m.date_end as date_end, c.name as community_id, 1 as is_organiser
                            FROM users u
                            inner join organisers o on u.id = o.user_id
                            inner join meetings m on o.meeting_id = m.id
                            inner join communities c on c.id = m.community_id
                            WHERE u.id = :userId
                            UNION
                            SELECT u.name as user_name, m.id as user_id, m.title as meeting_title, description
                             as description, m.date_start as date_start, m.date_end as date_end, c.name as community_id, 0 as is_organiser
                            FROM users u
                            inner join attendees a on u.id = a.user_id
                            inner join meetings m on a.meeting_id = m.id
                            inner join communities c on c.id = m.community_id
                            WHERE u.id = :userId'
        );

        $statement->execute([':userId' => $userId]);
        while ($data = $statement->fetch()) {
            if (!$data) {
                throw new UserNotFoundException();
            }
            $user = new User($data['user_name']);
            $meetings[] = new Meeting($data['meeting_title'], $data['description'],new \DateTimeImmutable( $data['date_end']),new \DateTimeImmutable($data['date_start']));
        }
        $result=[$user, $meetings];
        return $result;
    }
}
