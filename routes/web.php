<?php

use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EjemploController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\FormuController;
use App\Http\Controllers\IdeasController;
use App\Http\Controllers\FormSimplificadoController;

use App\Exports\FormExport;
use App\Http\Controllers\SubiExcel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

//Route::get('/', [FormularioController::class, 'welcome'])->name('welcome');
Route::get('/', function () { return redirect('/login'); });
Route::get('/dashboard', [UserController::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/setLang/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return back();
})->name('setlang');

Route::middleware('auth')->group(function () { //  , 'verified'
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/ejemplo', [EjemploController::class, 'ejemplo'])->name('ejemplo');

    //# user
    Route::resource('/user', UserController::class)->except('create', 'show', 'edit');
    Route::post('/user/destroy-bulk', [UserController::class, 'destroyBulk'])->name('user.destroy-bulk');
     Route::get('/subirexceles', [SubiExcel::class, 'subirexceles'])->name('subirexceles');
     Route::post('/uploadExcel', [SubiExcel::class, 'uploadExcel'])->name('uploadExcel');


    Route::resource('/role', RoleController::class)->except('create', 'show', 'edit');
    Route::post('/role/destroy-bulk', [RoleController::class, 'destroyBulk'])->name('role.destroy-bulk');

    Route::resource('/permission', PermissionController::class)->except('create', 'show', 'edit');
    Route::post('/permission/destroy-bulk', [PermissionController::class, 'destroyBulk'])->name('permission.destroy-bulk');

    Route::resource('/parametro', ParametrosController::class);

    Route::get('/DB_info', [UserController::class,'todaBD']);
    Route::get('/downloadAnexos', [UserController::class,'downloadAnexos'])->name('downloadAnexos');
    Route::get('/downClaro',function(){
        return Excel::download(new FormExport, 'DB_Con_Nombres.xlsx');
    })->name('downClaro');

    Route::get('/formularioSA', [FormularioController::class, 'formularioSA'])->name('formularioSA');
    Route::get('/PreFormSimplificado', [FormSimplificadoController::class, 'PreFormSimplificado'])->name('PreFormSimplificado');
    Route::get('/IndexFormSimplificado/{idLider}', [FormSimplificadoController::class, 'IndexFormSimplificado'])->name('IndexFormSimplificado');
    Route::get('/CategoriasSimilares', [IdeasController::class, 'index'])->name('CategoriasSimilares');
    Route::resource('/formulario', FormularioController::class)->except('edit');
    Route::get('/formularioEdit/{id}', [FormularioController::class,'edit'])->name('formularioEdit');
    Route::post('/EnviarFormulario', [FormularioController::class,'EnviarFormulario'])->name('EnviarFormulario');
    Route::get('/get-string', [FormularioController::class, 'getString'])->name('seguridad');




    //<editor-fold desc="solo formu">
    Route::resource('/formu', FormuController::class);
    Route::get('/Store2/{fid}', [FormuController::class, 'GetStore2'])->name('Store2');
    Route::post('/Store2/{fid}', [FormuController::class, 'PostStore2'])->name('PStore2');
    Route::put('formularioupdate2/{fid}', [FormSimplificadoController::class, 'formularioupdate2'])->name('formularioupdate2');
    //</editor-fold>


//    Route::match(['get', 'post'],
});

// ultimo comit 25sept
require __DIR__ . '/auth.php';

// <editor-fold desc="Artisan">
Route::get('/exception', function () {
    throw new Exception('Probando excepciones y enrutamiento. La prueba ha concluido exitosamente.');
});

Route::get('/foo', function () {
    if (file_exists(public_path('storage'))) {
        return 'Ya existe';
    }
    App('files')->link(
        storage_path('App/public'),
        public_path('storage')
    );
    return 'Listo';
});

Route::get('/clear-c', function () {
    Artisan::call('optimize');
    Artisan::call('optimize:clear');
    return "Optimizacion finalizada";
    // throw new Exception('Optimizacion finalizada!');
});

Route::get('/tmantenimiento', function () {
    echo Artisan::call('down --secret="token-it"');
    return "Aplicación abajo: token-it";
});
Route::get('/Arriba', function () {
    echo Artisan::call('up');
    return "Aplicación funcionando";
});

//</editor-fold>
