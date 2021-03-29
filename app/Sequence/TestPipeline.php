<?php
declare(strict_types=1);

namespace App\Sequence;

use App\Models\User;
use League\Pipeline\Pipeline;
use Shampine\Sequence\Pipeline\AbstractPipeline;
use Shampine\Sequence\Process\HydrateResponseProcess;

class TestPipeline extends AbstractPipeline
{
    /**
     * @constant string
     */
    public const TEST_PIPELINE = 'TestPipeline';

    /**
     * @param UserService $userService
     * @param User $user
     */
    public function __construct(UserService $userService, User $user)
    {
        $this->pipelines = [
            self::TEST_PIPELINE => static function() use ($userService, $user) {
                return (new Pipeline)
                    ->pipe(new DoubleUserAge($userService))
                    ->pipe(new CreateUser($user))
                    ->pipe(new HydrateResponseProcess(TestResponsePayload::class));
            },
        ];
    }
}
