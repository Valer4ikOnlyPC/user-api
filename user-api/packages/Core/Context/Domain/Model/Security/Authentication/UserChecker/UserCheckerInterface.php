<?php

declare(strict_types=1);

namespace UserApi\Core\Context\Domain\Model\Security\Authentication\UserChecker;

use UserApi\Core\Common\Exception\AuthenticationException;
use UserApi\Core\Context\Domain\Model\Security\UserInterface;

interface UserCheckerInterface
{
    /**
     * @throws AuthenticationException
     */
    public function checkUser(?UserInterface $user): void;
}
