<?php
//
//use App\Http\Controllers\PostController;
//use App\Http\Controllers\ProfileController;
//use Illuminate\Support\Facades\Route;
//
Route::get('/', function () {
    return view('welcome');
});
//
//Route::view('/dashboard', 'dashboard'
//)->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//Route::prefix("posts")->controller(PostController::class)->group(function () {
//    Route::get("/", "index")->name("posts.index");
//    Route::get("/create", "create");
//    Route::post("/", "create")->name("posts.create");
//    Route::delete("/{post}", "delete")->name("posts.destroy");
//    Route::patch("{id}/edit", "edit")->name("posts.edit");})->middleware(["auth", "verified"]);
//require __DIR__.'/auth.php';
