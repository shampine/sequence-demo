<?php
declare(strict_types=1);

namespace App\Sequence;

use App\Models\User;
use Shampine\Sequence\Payload\AbstractResponsePayload;

class TestResponsePayload extends AbstractResponsePayload
{
    /**
     * @var User|null
     */
    protected ?User $user = null;

    /**
     * @var int|null
     */
    protected ?int $age = null;

    /**
     * @var string|null
     */
    protected ?string $hobby = null;

    /**
     * @param TestRequestPayload $payload
     */
    public function __construct(TestRequestPayload $payload)
    {
        $this->setUser($payload->getUser());
        $this->setAge($payload->getAge());
        $this->setHobby($payload->getHobby());
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return int|null
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @param int|null $age
     */
    public function setAge(?int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string|null
     */
    public function getHobby(): ?string
    {
        return $this->hobby;
    }

    /**
     * @param string|null $hobby
     */
    public function setHobby(?string $hobby): void
    {
        $this->hobby = $hobby;
    }
}
