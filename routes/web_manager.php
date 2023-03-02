<?php

use App\Http\Controllers\Manager\ManagerController;

use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => 'manager', 'as' => 'manager.'],
    function(){

        Route::get(
            '/dashboard',
            function () {
                return view('manager.index');
            }
        )->name('dashboard'); 

    //Route::get('/dashboard', 'ManagerController@index');

});

?>