<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\QuestionController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Question\Create;
use App\Http\Livewire\Question\Edit;
use App\Http\Livewire\Question\Index;
use App\Http\Livewire\Question\Show;
use App\Models\Question;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function(){
    // count total tailwindcss questions and answers
    $tailwindTag=Tag::where('name','tailwindcss')->first();
    $tailwindQuestions=$tailwindTag->questions()->get();
    $totalTailwindQuestions=$tailwindQuestions->count();
    $totalTailwindAnswers=0;
    foreach ($tailwindQuestions as $tailwindQuestion) {
      $totalTailwindAnswers+=$tailwindQuestion->answers()->count();
    }
    // count total alpine questions and answers
    $alpineJsTag=Tag::where('name','alpineJs')->first();
    $alpineJsQuestions=$alpineJsTag->questions()->get();
    $totalAlpineJsQuestions=$alpineJsQuestions->count();
    $totalAlpineJsAnswers=0;
    foreach ($alpineJsQuestions as $alpineJsQuestion) {
      $totalAlpineJsAnswers+=$alpineJsQuestion->answers()->count();
    }
    // count total laravel questions and answers
    $laravelTag=Tag::where('name','laravel')->first();
    $laravelQuestions=$laravelTag->questions()->get();
    $totalLaravelQuestions=$laravelQuestions->count();
    $totalLaravelAnswers=0;
    foreach ($laravelQuestions as $laravelQuestion) {
      $totalLaravelAnswers+=$laravelQuestion->answers()->count();
    }
    // count total livewire questions and answers
    $livewireTag=Tag::where('name','livewire')->first();
    $livewireQuestions=$livewireTag->questions()->get();
    $totalLivewireQuestions=$livewireQuestions->count();
    $totalLivewireAnswers=0;
    foreach ($livewireQuestions as $livewireQuestion) {
      $totalLivewireAnswers+=$livewireQuestion->answers()->count();
    }

    return view('welcome',[
        'totalTailwindQuestions'=>$totalTailwindQuestions,
        'totalTailwindAnswers'=>$totalTailwindAnswers,
        'totalAlpineJsQuestions'=>$totalAlpineJsQuestions,
        'totalAlpineJsAnswers'=>$totalAlpineJsAnswers,
        'totalLaravelQuestions'=>$totalLaravelQuestions,
        'totalLaravelAnswers'=>$totalLaravelAnswers,
        'totalLivewireQuestions'=>$totalLivewireQuestions,
        'totalLivewireAnswers'=>$totalLivewireAnswers
    ]);
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

Route::prefix('questions')->group(function(){
    Route::get('/',Index::class)->name('questions.index');
    Route::get('create',Create::class)->name('questions.create')->middleware('auth');
    Route::get('{question}',Show::class);
    Route::get('{question}/edit',Edit::class);
});
