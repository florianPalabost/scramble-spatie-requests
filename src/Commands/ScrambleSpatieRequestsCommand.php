<?php

namespace Fp\ScrambleSpatieRequests\Commands;

use Illuminate\Console\Command;

class ScrambleSpatieRequestsCommand extends Command
{
    public $signature = 'scramble-spatie-requests';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
