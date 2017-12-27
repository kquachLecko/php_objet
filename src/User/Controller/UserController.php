<?php

declare(strict_types=1);

namespace User\Controller;

use User\Repository\UserRepository;

final class UserController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function indexAction() : string
    {
        //$users = $this->userRepository->fetchAll();
        $data = $this->userRepository->get_Meetings_by_User($_GET['name'] ?? '');
        ob_start();
        include __DIR__.'/../../../views/user-meetings.phtml';
        return ob_get_clean();
    }
}
