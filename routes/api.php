<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\FrontendController;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Публичный эндпоинт — только картинки товаров (не содержит PII)
Route::get('getImages/{guid}', [FrontendController::class, 'getImages']);

// Админские эндпоинты — закрыты авторизацией
// getOrder отдаёт имя, телефон, email клиента — ОБЯЗАТЕЛЬНО под auth
// getAdminProduct редиректит в админку — тоже нет смысла держать открытым
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('getAdminProduct/{guid}', [FrontendController::class, 'getAdminProduct']);
    Route::get('getOrder/{id}', [FrontendController::class, 'getOrder']);
});
