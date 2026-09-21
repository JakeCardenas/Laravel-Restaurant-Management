<?php

use App\Http\Controllers\MenuItemController;
use Illuminate\Support\Facades\Route;


Route::get('/menu-items', [MenuItemController::class, 'index'])->name('menu_items.index');
Route::get('/menu-items/create', [MenuItemController::class, 'create'])->name('menu_items.create');
Route::post('/menu-items', [MenuItemController::class, 'store'])->name('menu_items.store');
Route::get('/menu-items/{menu_item}/edit', [MenuItemController::class, 'edit'])->name('menu_items.edit');
Route::put('/menu-items/{menu_item}', [MenuItemController::class, 'update'])->name('menu_items.update');
Route::delete('/menu-items/{menu_item}', [MenuItemController::class, 'destroy'])->name('menu_items.destroy');

