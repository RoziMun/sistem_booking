<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UsersControllers;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UsersControllers::class);