<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Announcement
Route::get('/', [FrontController::class, 'welcome']);
    // For Category
Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');
    // For Author
Route::get('/author/{user}', [FrontController::class, 'authorShow'])->name('announcement.byAuthor');
    // Create
Route::get('/nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');
    // Details
Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');
    // All
Route::get('/tutti/annunci', [AnnouncementController::class, 'index'])->name('announcements.index');

// Revisor Home
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
    // Announcement Accept
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');
    // Reject
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');
    // Revisor Request
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
    // Make user revisor
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

// Set Language
Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');

//
Route::get('/richiesta/website/', [FrontController::class, 'showRequestSite'])->name('requestSite');