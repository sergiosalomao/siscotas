<?php


use App\Services\Route;
use App\Controller\IndexController;
use App\Controller\LoginController;

return [
    '/' => Route::create(IndexController::class, 'indexAction'),

    '/login' => Route::create(LoginController::class, 'indexAction'),

    '/login/register' => Route::create(LoginController::class, 'registerAction'),

    '/login/create' => Route::create(LoginController::class, 'createNewUserAction'),

    '/login/forgot' => Route::create(LoginController::class, 'forgotPasswordAction'),

    '/login/list' => Route::create(LoginController::class, 'listAction'),

    '/login/reset' => Route::create(LoginController::class, 'resetPasswordAction'),

    '/login/validator' => Route::create(LoginController::class, 'verifyPasswordAction'),



];