<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    sleep(2);
    return inertia::render('Home');
});

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function(){


Route::get('/create', function(){
    return inertia::render('Users/Create');
});
Route::get('/users', function(){
   sleep(1);
    return inertia::render('Users/Index', [
        "users"=>User::query()//initiatequery
        //indicate it happens when the defined input is the request input sent
        ->when( Request::input('search'), function($query, $search){
            $query->where('name', 'like',"%{$search}%");
        }
        )
        //paginate your data
        ->paginate(10)
        ->through(fn($user)=>[
            //pass only what is necessary
            'name'=> $user->name,
            'id'=> $user->id,
        ])
    ]);
});


Route::post('/users', function(){
    //validate
    $attributes = Request::validate([
        'name'=>'required',
        'email'=>['required', 'email'],
        'password'=>['required', 'min:8']
    ]);
    //create
   User::create($attributes);
    //redirect
   return redirect('/users');
});

Route::get('/users/{user}/edit', function(User $user){
    return inertia::render('Users/Edit', [
        'user'=> $user
    ]);
});

Route::get('/settings', function(){
    sleep(2);
    return inertia::render('Settings');
});

//Edit a user
Route::put('/users/{user}/update', [LoginController::class, 'edit']);

});
