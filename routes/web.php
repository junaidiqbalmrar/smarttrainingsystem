<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\UserPanel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;

use function Pest\Laravel\withMiddleware;

Route::get('/', function () {
    return redirect()->route('login'); // Assuming 'login' is the name of your login route
})->name('login.page');

Route::prefix('admin/dashboard')->middleware('roleCheck:admin')->group(function(){

     Route::resource('/levels',LevelController::class);
     Route::resource('/lessons',LessonController::class);
     Route::resource('/questions',QuestionController::class);
     Route::resource('/answers',AnswerController::class);

});
    

 

Route::prefix('admin')->get('/dashboard', function () {
    return view('dashboard');
})->middleware(['roleCheck:admin,user', 'verified'])->name('dashboard');

//Route::middleware('roleCheck:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
//});

Route::get('/welcome',function(){
    return view('auth.login');
})->name('welcomepage');


Route::get('/users',[UserController::class,'users'])->name('user.index');
Route::get('/users/{id}',[UserController::class,'usershow'])->name('user.show');
Route::post('/users/results/{id}',[UserController::class,'userResults'])->name('results');

Route::get('/quiz/{id}',  [QuizController::class , 'showQuestions'])->name('questions');
Route::post('/quiz-submit',[QuizController::class,'submitQuiz'])->name('quiz.submit');

Route::middleware('userpanel:user')->group(function(){

Route::get('/user',[QuizController::class,'showLevel'])->name('user.dashboard');
Route::get('/user-details',[QuizController::class,'userDetails'])->name('user.details');
Route::get('/lessonQuestions/{id}',[QuizController::class,'showLesson'])->name('lessons.questions');
Route::get('/level-progress/{id}',[QuizController::class,'checkLevel'])->name('level.progress');
Route::get('/check/{id}',[QuizController::class,'checkProgress'])->name('lessonprogress');
Route::get('/qShow/{id}',[QuizController::class , 'questionShow'])->name('qShow');
Route::post('/qSubmit',[QuizController::class,'questionSubmit'])->name('qSubmit');
Route::get('/results/{id}',[QuizController::class,'showResults'])->name('user.results');

});

require __DIR__.'/auth.php';
