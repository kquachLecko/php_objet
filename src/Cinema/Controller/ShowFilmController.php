<?php

declare(strict_types=1);

namespace Cinema\Controller;

use Application\Controller\ErrorController;
use Cinema\Exception\FilmNotFoundException;
use Cinema\Repository\FilmRepository;

final class ShowFilmController
{
    /**
     * @var FilmRepository
     */
    private $filmRepository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function indexAction() : string
    {
        try {
            $film = $this->filmRepository->get($_GET['name'] ?? '');

            ob_start();
            include __DIR__.'/../../../views/film-details.phtml';
            return ob_get_clean();
        } catch (FilmNotFoundException $exception) {
            return (new ErrorController($exception))->error404Action();
        }
    }
}
