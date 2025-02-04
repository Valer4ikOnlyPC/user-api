<?php

declare(strict_types=1);

namespace UserApi\Core\Context\Domain\Model\Security\Authentication\AuthenticationRequest;

interface LoginAuthenticationRequestInterface extends AuthenticationRequestInterface
{
    public function login(): string;

    public function password(): string;
}
