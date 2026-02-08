<?php

use App\Models\User;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = User::where('role', 'admin')->first();
if ($user) {
    $user->update([
        'email' => 'kumejing2026@gmail.com',
    ]);
    echo "Admin email synchronized to kumejing2026@gmail.com successfully.\n";
} else {
    echo "Admin user not found.\n";
}
