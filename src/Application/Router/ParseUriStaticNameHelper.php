<?php

declare(strict_types=1);

namespace Application\Router;

use Application\Controller\IndexController;
use Application\Controller\LecturerController;

use Community\Controller\CommunityController;
use Community\Controller\ShowCommunityController;

use Meetup\Controller\MeetingController;
use Meetup\Controller\ShowMeetingController;
use Meetup\Controller\ShowMeetingsByCommunityController;
use Meetup\Controller\ShowMeetingDetailsController;

use User\Controller\UserController;
use User\Controller\ShowUserController;
use Exception;

use function explode;
use function preg_match;
use function substr;
use function urldecode;

/**
 * Class ParseUriStaticNameHelper
 * @package Application\Router
 */
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
        if ($requestUri === '/meeting-to-come') {
            return ShowMeetingController::class;
        }
        if (preg_match('#/meetingByCommunity/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['communityId'] = urldecode($requestUriParams[2]);
            return ShowMeetingsByCommunityController::class;
        }
        if (preg_match('#/meeting-details/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meetingId'] = urldecode($requestUriParams[2]);
            return ShowMeetingDetailsController::class;
        }
        if (preg_match('#/user_meetings/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['name'] = urldecode($requestUriParams[2]);
            return UserController::class;
        }
        if ($requestUri === '/organiser_meeting') {
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
