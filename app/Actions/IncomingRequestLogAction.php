<?php

namespace App\Actions;

use App\Contracts\LogInterface;
use Illuminate\Support\Facades\Log;

final readonly class IncomingRequestLogAction implements LogInterface
{
    public function __construct()
    {
        $this->log();
    }

    public function log(): void
    {
        $request = request();

        Log::channel('custom')->info('Incoming Request',
            [
                'RequestURL' => $request->fullUrl(),
                'HTTPMethod' => $request->method(),
                'RequestTime' => now()->toDateTimeString(),
            ]
        );
    }
}
