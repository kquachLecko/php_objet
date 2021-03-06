<?php

use Application\Controller\IndexController;
use Application\Controller\LecturerController;
use Application\Factory\DateTimeImmutableFactory;
use Application\Factory\DbConfigProviderFactory;
use Application\Factory\IndexControllerFactory;
use Application\Factory\LecturerControllerFactory;
use Application\Factory\LecturerRepositoryFactory;
use Application\Factory\ParseUriHelperFactory;
use Application\Factory\PdoConnectionFactory;
use Application\Factory\RouterFactory;
use Application\Provider\DbConfigProvider;
use Application\Repository\LecturerRepository;
use Application\Router\ParseUriHelper;
use Application\Router\Router;

use Meetup\Controller\MeetingController;
use Meetup\Controller\ShowMeetingController;
use Meetup\Factory\MeetingControllerFactory;
use Meetup\Factory\MeetingRepositoryFactory;
use Meetup\Factory\ShowMeetingControllerFactory;
use Meetup\Repository\MeetingRepository;
use Meetup\Controller\ShowMeetingsByCommunityController;
use Meetup\Factory\ShowMeetingsByCommunityControllerFactory;
use Meetup\Controller\ShowMeetingDetailsController;
use Meetup\Factory\ShowMeetingDetailsControllerFactory;

use User\Controller\UserController;
use User\Controller\ShowUserController;
use User\Factory\UserControllerFactory;
use User\Factory\UserRepositoryFactory;
use User\Factory\ShowUserControllerFactory;
use User\Repository\UserRepository;

use Community\Controller\CommunityController;
use Community\Factory\CommunityControllerFactory;
use Community\Factory\CommunityRepositoryFactory;
use Community\Repository\CommunityRepository;
use Community\Controller\ShowCommunityController;
use Community\Factory\ShowCommunityControllerFactory;



return [
    'factories' => [
        // Configuration du "framework applicatif"
        ParseUriHelper::class => ParseUriHelperFactory::class,
        Router::class => RouterFactory::class,
        PDO::class => PdoConnectionFactory::class,
        DbConfigProvider::class => DbConfigProviderFactory::class,

        // Configurations liées aux lecturers
        DateTimeInterface::class => DateTimeImmutableFactory::class,
        LecturerController::class => LecturerControllerFactory::class,
        IndexController::class => IndexControllerFactory::class,
        LecturerRepository::class => LecturerRepositoryFactory::class,

        // Configurations liées auz Meetings
        MeetingController::class => MeetingControllerFactory::class,
        MeetingRepository::class => MeetingRepositoryFactory::class,
        ShowMeetingController::class => ShowMeetingControllerFactory::class,
        ShowMeetingsByCommunityController::class=>ShowMeetingsByCommunityControllerFactory::class,
        ShowMeetingDetailsController::class => ShowMeetingDetailsControllerFactory::class,

        // Configurations liées aux User
        UserController::class => UserControllerFactory::class,
        UserRepository::class => UserRepositoryFactory::class,
        ShowUserController::class => ShowUserControllerFactory::class,

        CommunityController::class => CommunityControllerFactory::class,
        CommunityRepository::class => CommunityRepositoryFactory::class,
        ShowCommunityController::class => ShowCommunityControllerFactory::class,
    ],
];
