<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;

use Illuminate\Support\Facades\View;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/invitation', [InvitationController::class, 'create'])->name('invitation.create');
Route::post('/invitation', [InvitationController::class, 'generate'])->name('invitation.generate');

Route::get('/preview-mk', function () {
    return view('invitation.pdf-mk', [
        'festival_name' => 'Охридски фолклорни денови',
        'date' => '25–28 Јули',
        'price' => '120',
        'days' => '4'
    ]);
});