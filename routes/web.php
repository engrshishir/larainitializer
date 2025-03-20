<?php

use Illuminate\Support\Facades\Route;
use Engrshishir\Larainitializer\Http\Controllers\LarainitializerController;

Route::middleware(['guest','web'])->group(function(){
    Route::get('/setup', [LarainitializerController::class, 'setup']);
    Route::get('/setup/{step}', [LarainitializerController::class, 'create'])->name('squartup.setup.form');
    Route::post('/setup/submit',[LarainitializerController::class,'store'])->name('squartup.setup.submit');
});
