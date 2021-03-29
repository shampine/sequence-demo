<?php
declare(strict_types=1);

namespace App\Sequence;

class UserService
{
    /**
     * @param int $age
     * @return int
     */
    public function doubleUserAge(int $age):int
    {
        return $age * 2;
    }
}
