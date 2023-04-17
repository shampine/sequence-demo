<?php
declare(strict_types=1);

namespace App\Sequence;

use App\Models\User;
use Shampine\Sequence\Process\AbstractProcess;

class CreateUser extends AbstractProcess
{
    /**
     * @var User
     */
    protected User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param DemoPayload $payload
     * @return DemoPayload
     */
    public function process($payload)
    {
        $user = (new $this->user)->setAttribute('name', $payload->getName());

        $payload->setUser($user);

        return $payload;
    }
}
