<?php

declare(strict_types=1);

namespace User\Controller;

use Application\Controller\ErrorController;
use User\Repository\UserRepository;
use User\Exception\UserNotFoundException;

/**
 * Class ShowUserController
 * @package User\Controller
 */
final class ShowUserController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * ShowUserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Les utilisateurs et les meetups qu'ils organisent
     * @return string
     */
    public function indexAction() : string
    {
        try {
            $data = $this->userRepository->getAllOrganiserWithTheirMeeting();
            ob_start();
            include __DIR__.'/../../../views/user-details.phtml';
            return ob_get_clean();
        } catch (UserNotFoundException $exception) {
            return (new ErrorController($exception))->error404Action();
        }
    }
}
