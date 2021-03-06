<?php

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
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
/*Route::get('/', function () {
    return view('auth.login');
});*/
Route::get('registro', 'Auth\RegisterController@redirigir')->name('registro');
Route::post('register', 'Auth\RegisterController@register')->name('register');
/*Route::get('registro',function(){
    return view('auth.register');
})->name('registra');*/
//Route::post('registro','nuevoadmi@nuevo');

//Auth::routes();
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
/*
if (config('register'))
{
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'RegisterController@register');
}*/
// Password Reset Routes...

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...

    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//Route::get('/home', 'HomeController@index')->name('home');

//auth()->user()->tipo


//Vistas de los tipos de administradores
Route::get('vista', 'Auth\RegisterController@redirectPath')->name('vista');
//Route::get('vista2', 'Auth\RegisterController@redirectPath')->name('vista2');
//Route::get('vista3', 'Auth\RegisterController@redirectPath')->name('vista3');
/*
Route::get('vista1',function(){
    return view('admi.admi1');
})->name('vista1');
Route::get('vista2',function(){
    return view('admi.admi2');
})->name('vista2');
Route::get('vista3',function(){
    return view('admi.admi3');
})->name('vista3');*/
//Vista de ayuda 
//Vista de registro de alumno
//Route::get('alumno', 'Auth\RegisterController@crear')->name('alumno');

Route::resource('alumno','AlumnoController');
Route::post('alumnoDatos','AlumnoController@temporal')->name('alumnoDatos');
//vista para la universidad
Route::get('universidad','UniversidadController@index')->name('universidad');
Route::post('nuevaUni','UniversidadController@store');
Route::get('datosUni','UniversidadController@datosUni')->name('datosUni');
Route::get('editarUni','UniversidadController@editarUni')->name('editarUni');
Route::post('editar','UniversidadController@editar')->name('editar');
Route::get('borrarUni','UniversidadController@borrar')->name('borrarUni');
//vista para  la ayuda
Route::get('ayuda',function(){
    return view('ayuda');
})->name('ayuda');
/*
    public function datosUniversidad()
    {
        $uni=Universidad::all();
        return Datatables::of($uni)
        ->addColumn('acción',function($uni){
            '< a onclick="showData('.$uni.id.')" class= "btn btn-sm btn-sucess>VER</a>'.' '.
            '< a onclick="editForm('.$uni.id.')" class= "btn btn-sm btn-info>Editar</a>'.' '.
            '< a onclick="deleteData('.$uni.id.')" class= "btn btn-sm btn-danger>Borrar</a>';


         })->make(true);
    }
    */

