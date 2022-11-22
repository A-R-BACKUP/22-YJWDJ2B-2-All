<?php

declare(strict_types=1);

namespace App\DataProvider;

use stdClass;

interface UserTokenProviderInterface
{
    /**
     * @param string $token
     * @return stdClass|null
     */
    public function retrieveUserByToken(  // Domain 역할
        string $token
    ): ?stdClass;
}
