<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = User::where('role', 'admin')->first();
if ($user) {
    $user->update([
        'email' => 'kumejingdesa25@gmail.com',
        'email_verified_at' => now(),
    ]);
    echo "Admin email updated and verified successfully.\n";
} else {
    echo "Admin user not found.\n";
}
