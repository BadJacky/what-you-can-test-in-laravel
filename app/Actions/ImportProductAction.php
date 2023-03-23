<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class ImportProductAction
{
    public function handle(User $user): void
    {
        $response = Http::post('https://christoph-rumpel.com/import');

        Product::create([
            'user_id' => $user->id,
            'title' => $response['title'],
            'description' => $response['description'],
        ]);
    }
}
