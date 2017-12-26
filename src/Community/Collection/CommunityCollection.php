<?php

declare(strict_types=1);

namespace Community\Collection;

use Community\Entity\Community;
use ArrayIterator;
use Iterator;
use IteratorIterator;

/**
 * Class CommunityCollection
 * @package Community\Collection
 */
final class CommunityCollection extends IteratorIterator implements Iterator
{
    /**
     * CommunityCollection constructor.
     * @param Community[] ...$communities
     */
    public function __construct(Community ...$communities)
    {
        parent::__construct(new ArrayIterator($communities));

    }

    /**
     * @return Community|null
     */
    public function current() : ?Community
    {
        return parent::current();
    }
}
