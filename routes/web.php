<?php
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Playlist;
use App\Models\Song;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('playlist', PlaylistController::class);
Route::resource('song', SongController::class);

// Route::get('playlist/{playlist_id}/song/{song_id}', function () {
//     echo "test"; });

Route::post('/playlist/{playlist_id}/addSong', [PlaylistController::class, 'addSong'])->name('playlist.addSong');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
