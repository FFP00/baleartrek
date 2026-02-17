<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\UserController;

use App\Models\{
    Comment,
    Image,
    InterestingPlace,
    Island,
    Meeting,
    Municipality,
    PlaceType,
    Role,
    Trek,
    User,
    Zone
};

Route::get('/', function () {
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


// Esta ruta tiene parametros obligatorios y opcionales.
// Ten en cuenta que si es opcional pero lo devuelves tienes que asignarle tu un valor.
// Tambien comprobamos que el obligatorio este formado por letras y no numeros.
// Si quieres utilizarlo con route(), necesitamos name().
Route::get('/test/{obligatorio}/{opcional?}', function($obligatorio,$opcional = "") {
    return '<h1 style="color:red">'. $obligatorio .' Comenardo '. $opcional .'</h1>'; 
})
    ->where('obligatorio','^[\p{L}]+$')
    ->name("test");

// Se puede redirigir una ruta a otra ruta diferente.
// Pero si tiene parametros tendremos que pasarlo nosotros obligatoriamente
Route::get('/comenardo', function() {
    return redirect()->route("test",['obligatorio' => 'Eduardo']);  
});

// Si no quieres poner el mismo prefijo 500 veces y ordenar por prefijo el codigo.
Route::prefix('admin')->group(function () {

    Route::get('/{modelo}/{id?}', function ($modelo,$id = null) {
        $modeloMayus = ucfirst($modelo);
        $modeloCargado = "App\\Models\\$modeloMayus";
        if($id){
            return $modeloCargado::findOrFail($id);  
        }else{
            return $modeloCargado::all();    
        }
        
    });

});

Route::get('/test', function () {
    return view("test");
});

Route::get('/usuario/{nombre}', function($nombre) {
    return view('usuario', ['nombre' => $nombre]);
});

Route::resource('users', UserController::class);

require __DIR__.'/auth.php';
