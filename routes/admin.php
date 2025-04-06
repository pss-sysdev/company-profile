<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Owner\OwnerAuthController;
use App\Http\Controllers\Owner\OwnerBrandController;
use App\Http\Controllers\Owner\OwnerCategoryController;
use App\Http\Controllers\Owner\OwnerOtherPageController;
use App\Http\Controllers\Owner\OwnerProductController;
use App\Http\Controllers\Owner\OwnerSettingController;
use Illuminate\Support\Facades\Route;


Route::prefix('owner')->group(function () {
    Route::get('/login', [OwnerAuthController::class, 'index']);
    Route::post('/login', [OwnerAuthController::class, 'login'])->name('owner.login');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [OwnerProductController::class, 'index'])->name('owner.dashboard');

        Route::get('/product', [OwnerProductController::class, 'index'])->name('owner.product');
        Route::get('/product/create', [OwnerProductController::class, 'create'])->name('owner.product.create');
        Route::post('/product/store', [OwnerProductController::class, 'store'])->name('owner.product.store');
        Route::get('/product/edit/{id}', [OwnerProductController::class, 'edit'])->name('owner.product.edit');
        Route::post('/product/update/{id}', [OwnerProductController::class, 'update'])->name('owner.product.update');
        Route::get('/product/destroy/{id}', [OwnerProductController::class, 'destroy'])->name('owner.product.destroy');

        // Route::get('/category', [OwnerCategoryController::class, 'index'])->name('owner.category');
        // Route::get('/category/edit/{id}', [OwnerCategoryController::class, 'edit'])->name('owner.category.edit');
        // Route::post('/category/update/{id}', [OwnerCategoryController::class, 'update'])->name('owner.category.update');
        // Route::get('/category/destroy/{id}', [OwnerCategoryController::class, 'destroy'])->name('owner.category.destroy');

        Route::get('/category', [OwnerCategoryController::class, 'index'])->name('owner.category');
        Route::get('/category/create', [OwnerCategoryController::class, 'create'])->name('owner.category.create');
        Route::post('/category/store', [OwnerCategoryController::class, 'store'])->name('owner.category.store');
        Route::get('/category/edit/{id}', [OwnerCategoryController::class, 'edit'])->name('owner.category.edit');
        Route::post('/category/update/{id}', [OwnerCategoryController::class, 'update'])->name('owner.category.update');
        Route::get('/category/destroy/{id}', [OwnerCategoryController::class, 'destroy'])->name('owner.category.destroy');

        Route::get('/brand', [OwnerBrandController::class, 'index'])->name('owner.brand');
        Route::get('/brand/create', [OwnerBrandController::class, 'create'])->name('owner.brand.create');
        Route::post('/brand/store', [OwnerBrandController::class, 'store'])->name('owner.brand.store');
        Route::get('/brand/edit/{id}', [OwnerBrandController::class, 'edit'])->name('owner.brand.edit');
        Route::post('/brand/update/{id}', [OwnerBrandController::class, 'update'])->name('owner.brand.update');
        Route::get('/brand/destroy/{id}', [OwnerBrandController::class, 'destroy'])->name('owner.brand.destroy');

        Route::get('/other-page/index', [OwnerOtherPageController::class, 'index'])->name('owner.other-page');
        Route::post('/other-page/about-us', [OwnerOtherPageController::class, 'updatePageAboutUs'])->name('owner.other-page.aboutus');
        Route::get('/setting/general', [OwnerSettingController::class, 'index'])->name('owner.setting-general');
        Route::post('/setting/general', [OwnerSettingController::class, 'update'])->name('owner.setting-general.update');
    });
});

Route::get('/logout', [OwnerAuthController::class, 'logout'])->name('logout')->middleware('auth');
