<?php

declare(strict_types=1);

namespace User\Controller;

use Application\Controller\ErrorController;
use User\Repository\UserRepository;
use User\Exception\UserNotFoundException;

final class ShowUserController
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
        try {
            $user = $this->userRepository->get($_GET['name'] ?? '');
            ob_start();
            include __DIR__.'/../../../views/user-details.phtml';
            return ob_get_clean();
        } catch (UserNotFoundException $exception) {
            return (new ErrorController($exception))->error404Action();
        }
    }
}
