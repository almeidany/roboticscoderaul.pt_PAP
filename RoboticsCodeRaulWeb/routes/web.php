<?php

use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Redireciona a raiz para /home
Route::redirect('/', '/home');

//Frontoffice
Route::get('/home', [App\Http\Controllers\FrontController::class, 'index'])->name('home');
Route::get('/sobre-nos', [App\Http\Controllers\FrontController::class, 'about_us'])->name('about_us');
Route::get('/galeria/front', [App\Http\Controllers\GalleryFrontController::class, 'index'])->name('gallery.front');
Route::get('/concursos/front', [App\Http\Controllers\FrontController::class, 'contest'])->name('contest');
// Listar notícias frontoffice
Route::get('/noticias/front', [App\Http\Controllers\NewsFrontController::class, 'index'])->name('news.front');
Route::get('/noticias/front/{news}', [App\Http\Controllers\NewsFrontController::class, 'show'])->name('news.front.show');
Route::get('/patrocinadores/front', [App\Http\Controllers\SponserFrontController::class, 'index'])->name('sponsers.front');
Route::get('/patrocinadores/front/{sponsers}', [App\Http\Controllers\SponserFrontController::class, 'show'])->name('sponsers.front.show');

//Index Back
Route::get('/dashboard', [App\Http\Controllers\BackController::class, 'index'])->name('dashboard')->middleware('auth');

// Apenas PROFESSSOR
Route::middleware(['role:professor'])->group(function () {
    Route::get('/galeria/adicionar-foto', [App\Http\Controllers\GalleryController::class, 'create'])->name('gallery.create')->middleware('auth');
    Route::post('/galeria', [App\Http\Controllers\GalleryController::class, 'store'])->name('gallery.store')->middleware('auth');
    //Route::get('/galeria/editar/{photo}', [App\Http\Controllers\GalleryController::class, 'edit'])->name('gallery')->middleware('auth');
    Route::put('/galeria/{photo}', [App\Http\Controllers\GalleryController::class, 'update'])->name('gallery.update')->middleware('auth');
    Route::delete('/galeria/{photo}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('gallery.destroy')->middleware('auth');

    Route::put('/utilizadores/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update')->middleware('auth');
    Route::delete('/utilizadores/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

    Route::get('noticias/criar', [App\Http\Controllers\NewsController::class, 'create'])->name('news.create')->middleware('auth');
    Route::post('noticias', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store')->middleware('auth');

    Route::get('noticias/{news}/editar', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit')->middleware('auth');
    Route::put('noticias/{news}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update')->middleware('auth');
    Route::delete('noticias/{news}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.destroy')->middleware('auth');

    Route::get('/palmares/adicionar', [App\Http\Controllers\PalmaresController::class, 'create'])->name('palmares.create')->middleware('auth');
    Route::post('/palmares', [App\Http\Controllers\PalmaresController::class, 'store'])->name('palmares.store')->middleware('auth');
    Route::delete('/palmares/{palmares}', [App\Http\Controllers\PalmaresController::class, 'destroy'])->name('palmares.destroy')->middleware('auth');

    Route::get('/turmas/adicionar-turma', [App\Http\Controllers\ClassesController::class, 'create'])->name('classes.create')->middleware('auth');
    Route::post('/turmas', [App\Http\Controllers\ClassesController::class, 'store'])->name('classes.store')->middleware('auth');
    Route::delete('/turmas/{classes}', [App\Http\Controllers\ClassesController::class, 'destroy'])->name('classes.destroy')->middleware('auth');

    Route::get('/concursos/adicionar-concurso', [App\Http\Controllers\ContestController::class, 'create'])->name('contests.create')->middleware('auth');
    Route::post('/concursos', [App\Http\Controllers\ContestController::class, 'store'])->name('contests.store')->middleware('auth');
    Route::delete('/concursos/{contest}', [App\Http\Controllers\ContestController::class, 'destroy'])->name('contests.destroy')->middleware('auth');

    Route::get('/patrocinadores/adicionar', [App\Http\Controllers\SponserController::class, 'create'])->name('sponsers.create')->middleware('auth');
    Route::post('/patrocinadores', [App\Http\Controllers\SponserController::class, 'store'])->name('sponsers.store')->middleware('auth');
    Route::get('/patrocinadores/{sponsers}/editar', [App\Http\Controllers\SponserController::class, 'edit'])->name('sponsers.edit')->middleware('auth');
    Route::put('/patrocinadores/{sponsers}', [App\Http\Controllers\SponserController::class, 'update'])->name('sponsers.update')->middleware('auth');
    Route::delete('/patrocinadores/{sponsers}', [App\Http\Controllers\SponserController::class, 'destroy'])->name('sponsers.destroy')->middleware('auth');

    Route::delete('/presencas/{attendance}', [App\Http\Controllers\AttendanceController::class, 'destroy'])->name('attendance.destroy')->middleware('auth');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/registo', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/registo', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

    Route::get('/aceder', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/aceder', [App\Http\Controllers\Auth\LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

//gallery backoffice
Route::get('/galeria', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery')->middleware('auth');


//user
Route::get('/utilizadores', [App\Http\Controllers\UserController::class, 'index'])->name('users')->middleware('auth');
Route::get('/utilizadores/{user}/visualizacao', [App\Http\Controllers\UserController::class, 'show'])->name('users.show')->middleware('auth');
Route::get('/utilizadores/{user}/editar', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{id}/raffles', [App\Http\Controllers\UserController::class, 'updateRaffles'])->name('users.updateRaffles')->middleware('auth');



// Listar notícias backoffice
Route::get('noticias', [App\Http\Controllers\NewsController::class, 'index'])->name('news')->middleware('auth');
Route::get('noticias/back/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show')->middleware('auth');


//projects
Route::get('/projetos', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects')->middleware('auth');
Route::get('/projetos/{project}/visualizacao', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show')->middleware('auth');
Route::get('/projetos/criar', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create')->middleware('auth');
Route::post('/projetos', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store')->middleware('auth');
Route::middleware(['auth', 'can:update,project'])->group(function () {
    Route::get('/projetos/{project}/editar', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projetos/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projetos/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');
});


//raffles
Route::get('/rifas/consulta', [App\Http\Controllers\RafflesController::class, 'index'])->name('raffles')->middleware('auth');
Route::post('/rifas', [App\Http\Controllers\RafflesController::class, 'store'])->name('raffles.store')->middleware('auth');
Route::put('/rifas/{raffles}', [App\Http\Controllers\RafflesController::class, 'update'])->name('raffles.update')->middleware('auth');
Route::put('/users/{id}/raffles', [App\Http\Controllers\UserController::class, 'updateRaffles'])->name('users.updateRaffles')->middleware('auth');

//palmares
Route::get('/palmares', [App\Http\Controllers\PalmaresController::class, 'index'])->name('palmares')->middleware('auth');

Route::get('/turmas', [App\Http\Controllers\ClassesController::class, 'index'])->name('classes')->middleware('auth');

//contests
Route::get('/concursos', [App\Http\Controllers\ContestController::class, 'index'])->name('contests')->middleware('auth');

//sponser
Route::get('/patrocinadores', [App\Http\Controllers\SponserController::class, 'index'])->name('sponsers')->middleware('auth');
Route::get('/patrocinadores/{sponsers}/visualizacao', [App\Http\Controllers\SponserController::class, 'show'])->name('sponsers.show')->middleware('auth');


//attendance
Route::get('/presencas', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance')->middleware('auth');
Route::get('/presencas/marcar', [App\Http\Controllers\AttendanceController::class, 'create'])->name('attendance.create')->middleware('auth');
Route::post('/presencas', [App\Http\Controllers\AttendanceController::class, 'store'])->name('attendance.store')->middleware('auth');

Auth::routes();
