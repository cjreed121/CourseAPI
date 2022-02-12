<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class IssueToken extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:issue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin token';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int {
        $user = User::where('username', 'admin')->first();
        echo "Token: " . $user->createToken('admin-token', ['admin'])->plainTextToken . "\n";
        return 0;
    }
}
