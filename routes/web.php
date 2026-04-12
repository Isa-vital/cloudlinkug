<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// ── SEO Routes ──
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// ── Public Routes ──
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

// ── Blog Routes ──
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{category}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// ── Breeze Dashboard redirect to Admin ──
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', function () {
    return redirect('/admin');
})->middleware(['auth', 'verified'])->name('dashboard');

// ── Admin Routes ──
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::resource('/hero-slides', HeroSlideController::class)->names('hero-slides');
    Route::resource('/services', AdminServiceController::class)->names('services');
    Route::resource('/portfolio', ProjectController::class)->names('portfolio');
    Route::resource('/testimonials', TestimonialController::class)->names('testimonials');
    Route::resource('/team', TeamMemberController::class)->names('team');

    Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
    // Route::patch('/messages/{message}/toggle-read', [ContactMessageController::class, 'toggleRead'])->name('messages.toggleRead');

    Route::resource('/pages', AdminPageController::class)->names('pages');
    Route::resource('/blog', BlogPostController::class)->names('blog');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
