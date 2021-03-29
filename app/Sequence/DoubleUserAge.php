<?php
declare(strict_types=1);

namespace App\Sequence;

use Shampine\Sequence\Exceptions\SequenceException;
use Shampine\Sequence\Process\AbstractProcess;
use Shampine\Sequence\Support\StatusCode;

class DoubleUserAge extends AbstractProcess
{
    /**
     * @var UserService
     */
    protected UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param TestRequestPayload $payload
     * @return TestRequestPayload
     * @throws SequenceException
     */
    public function process($payload)
    {
        $age = $payload->getAge();

        if ($age === null) {
            throw new SequenceException(
                1000,
                'Age is null',
                StatusCode::BAD_REQUEST
            );
        }

        $payload->setAge(
            $this->userService->doubleUserAge($age)
        );

        return $payload;
    }
}
