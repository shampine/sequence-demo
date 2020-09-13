<?php
declare(strict_types=1);

namespace App\Sequence;

use App\Models\User;
use League\Pipeline\Pipeline;
use Shampine\Sequence\Pipeline\AbstractPipeline;
use Shampine\Sequence\Process\HydrateResponsePayloadProcess;

class TestPipeline extends AbstractPipeline
{
    /**
     * @constant string
     */
    public const TEST_PIPELINE = 'TestPipeline';

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

        $this->pipelines = [
            self::TEST_PIPELINE => static function() use ($user) {
                return (new Pipeline)
                    ->pipe(new DoubleUserAge())
                    ->pipe(new CreateUser($user))
                    ->pipe(new HydrateResponsePayloadProcess(TestResponsePayload::class));
            },
        ];
    }
}
