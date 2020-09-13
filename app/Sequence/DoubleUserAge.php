<?php
declare(strict_types=1);

namespace App\Sequence;

use Shampine\Sequence\Exceptions\SequenceException;
use Shampine\Sequence\Process\AbstractProcess;
use Shampine\Sequence\Support\StatusCode;

class DoubleUserAge extends AbstractProcess
{
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

        $payload->setAge($age * 2);

        return $payload;
    }
}
