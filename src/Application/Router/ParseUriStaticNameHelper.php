<?php

declare(strict_types=1);

namespace Application\Router;

use Application\Controller\IndexController;
use Application\Controller\LecturerController;

use Community\Controller\CommunityController;
use Community\Controller\ShowCommunityController;

use Meetup\Controller\MeetingController;
use Meetup\Controller\ShowMeetingController;

use User\Controller\UserController;
use User\Controller\ShowUserController;

use Exception;

use function explode;
use function preg_match;
use function substr;
use function urldecode;

final class ParseUriStaticNameHelper implements ParseUriHelper
{
    /**
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function parseUri(string $requestUri): string
    {
        if ($requestUri === '/') {
            $requestUri = substr($requestUri, 1);
        }
        if ($requestUri === '/meeting') {
            return MeetingController::class;
        }
        if (preg_match('#/meeting/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['name'] = urldecode($requestUriParams[2]);
            return ShowMeetingController::class;
        }
        if (preg_match('#/lecturer/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['lecturer'] = urldecode($requestUriParams[2]);
            return LecturerController::class;
        }
        if ($requestUri === '/user') {
            return UserController::class;
        }
        if (preg_match('#/user/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['name'] = urldecode($requestUriParams[2]);
            return ShowUserController::class;
        }
        if ($requestUri === '/communities') {
            return CommunityController::class;
        }
        if (preg_match('#/community/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['name'] = urldecode($requestUriParams[2]);
            return ShowCommunityController::class;
        }
        return IndexController::class;
    }
}
