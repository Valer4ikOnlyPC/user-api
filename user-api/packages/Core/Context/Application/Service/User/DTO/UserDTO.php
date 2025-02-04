<?php

declare(strict_types=1);

namespace UserApi\Core\Context\Application\Service\User\DTO;

use JMS\Serializer\Annotation as Serializer;
use UserApi\Core\Context\Domain\Model\Access\Access;
use UserApi\Core\Context\Domain\Model\User\User;
use UserApi\Core\Context\Domain\Model\User\UserID;
use UserApi\Core\Context\Domain\Model\User\UserName\UserName;

class UserDTO
{
    /**
     * @var string
     * @Serializer\SerializedName("id")
     */
    private $ID;

    /**
     * @var string
     */
    private $login;

    /**
     * @var UserNameDTO
     */
    private $name;

    /**
     * @var string[]
     */
    private $accessesNick;

    /**
     * @var \DateTimeImmutable
     */
    private $updateDate;

    public function __construct(User $user)
    {
        $this->setID($user->ID());
        $this->setLogin($user->login());
        $this->setName($user->name());
        $this->setUpdateDate($user->updateDate());
        $this->setAccessesNick(...$user->accesses());
    }

    public function ID(): string
    {
        return $this->ID;
    }

    private function setID(UserID $ID): void
    {
        $this->ID = (string) $ID;
    }

    public function login(): string
    {
        return $this->login;
    }

    private function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function name(): UserNameDTO
    {
        return $this->name;
    }

    private function setName(UserName $name): void
    {
        $this->name = new UserNameDTO($name);
    }

    public function updateDate(): \DateTimeImmutable
    {
        return $this->updateDate;
    }

    private function setUpdateDate(\DateTimeImmutable $updateDate): void
    {
        $this->updateDate = $updateDate;
    }

    /**
     * @return string[]
     */
    public function accessesNick(): array
    {
        return $this->accessesNick;
    }

    private function setAccessesNick(Access ...$accesses): void
    {
        $this->accessesNick = array_map(function (Access $access) {
            return $access->nick();
        }, $accesses);
    }
}
