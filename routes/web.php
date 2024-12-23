<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Image;

Route::get('/', function () {
    $images = Image::all();

    foreach ($images as $image) {
        echo $image->image_path . "<br>";
        echo $image->discription . "<br>";
        echo "El autor es: <b>" . $image->user->name . "</b> <br>";
        foreach ($image->comments as $comment) {
            echo "<b>" . $comment->user->name . "</b> dice: ";
            echo $comment->content . "<br>";
        };
        if ($image->likes->count() > 0) {
            echo  "Me gusta: " . $image->likes->count() . "<hr>";
        }
    }
    die();
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
