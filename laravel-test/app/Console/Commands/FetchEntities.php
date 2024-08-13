<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;

class FetchEntities extends Command
{
    protected $signature = 'fetch:entities';
    protected $description = 'Fetch and store entities from the API';

    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        parent::__construct();
        $this->apiService = $apiService;
    }

    public function handle()
    {
        $this->apiService->fetchAndStoreEntities();
        $this->info('Entities fetched and stored successfully.');
    }
}
