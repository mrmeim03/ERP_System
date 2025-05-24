<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('projects', function () {
    return Inertia::render('Projects/ProjectIndex');
})->middleware(['auth', 'verified'])->name('projects');

Route::get('workers', function () {
    return Inertia::render('Workers/Index');
})->middleware(['auth', 'verified'])->name('workers');

Route::get('tasks', function () {
    return Inertia::render('Tasks/TaskIndex');
})->middleware(['auth', 'verified'])->name('tasks');





require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
