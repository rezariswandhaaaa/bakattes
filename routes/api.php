<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webhook\XenditWebhookController;

// Jalur ini akan menjadi: https://noncustomary-isaias-stiffneckedly.ngrok-free.dev/api/webhook/callback
Route::post('/webhook/callback', [XenditWebhookController::class, 'handle']);

Route::get('/test-api', function() {
    return response()->json(['status' => 'API is working!']);
});
