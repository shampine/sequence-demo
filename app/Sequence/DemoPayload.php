<?php
declare(strict_types=1);

namespace App\Sequence;

use App\Models\User;
use Shampine\Sequence\Payload\AbstractPayload;

class DemoPayload extends AbstractPayload
{
    private const WHITELIST = [
        'name',
        'age',
    ];

    private const OVERRIDES = [
        'first_name' => 'name',
    ];

    /**
     * @var string|null
     */
    protected ?string $name = null;

    /**
     * @var int|null
     */
    protected ?int $age = null;

    /**
     * @var string|null
     */
    protected ?string $hobby = null;

    /**
     * @var User|null
     */
    protected ?User $user = null;

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(self::WHITELIST, self::OVERRIDES);
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
    public function setAge($age): void
    {
        // POST passes a string, so we want to cast to int
        if ($age !== null) {
            $this->age = (int)$age;
        }
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
}
