<?php
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;


use App\Models\Admin;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   

    return view('welcome');
});


Auth::routes();

Route::prefix('admin')->name('admin.')->group(function() {

    Route::middleware(['guest:admin'])->group(function() {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::view('/register','dashboard.admin.register')->name('register');
        Route::post('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/check', [AdminController::class, 'check'])->name('check');

    });
    
    
    Route::middleware(['auth:admin'])->group(function() {
        Route::get('/home', [AdminController::class, 'home'])->name('home'); 
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout'); 
        Route::get('/addtask', [TaskController::class, 'addtask'])->name('addtask'); 
        Route::post('/createtask', [TaskController::class, 'createtask'])->name('createtask'); 
        Route::get('/viewtask', [TaskController::class, 'viewtask'])->name('viewtask'); 
        Route::get('/task/edit/{ref_no}', [TaskController::class, 'edit'])->name('edit'); 
        Route::put('/task/updateetask/{ref_no}', [TaskController::class, 'updateetask'])->name('updateetask'); 
        Route::get('/task/destroy/{ref_no}', [TaskController::class, 'destroy'])->name('destroy'); 
        Route::get('/project/viewprojectask/{id}', [ProjectController::class, 'viewprojectask'])->name('viewprojectask'); 
        Route::get('/project/projectdestroy/{ref_no}', [ProjectController::class, 'projectdestroy'])->name('projectdestroy'); 
        Route::put('/project/updateprojects/{ref_no}', [ProjectController::class, 'updateprojects'])->name('updateprojects'); 
        Route::get('/project/projectedit/{ref_no}', [ProjectController::class, 'projectedit'])->name('projectedit'); 
        Route::get('/viewprojects', [ProjectController::class, 'viewprojects'])->name('viewprojects'); 
        Route::get('/addprojects', [ProjectController::class, 'addprojects'])->name('addprojects'); 
        Route::post('/createprojects', [ProjectController::class, 'createprojects'])->name('createprojects'); 
        Route::get('/approveuser/{ref_no}', [UserController::class, 'approveuser'])->name('approveuser'); 
        Route::get('/addroles/{ref_no}', [UserController::class, 'addroles'])->name('addroles'); 
        Route::put('/createrole/{ref_no}', [UserController::class, 'createrole'])->name('createrole'); 
        Route::get('/deleteuser/{ref_no}', [UserController::class, 'deleteuser'])->name('deleteuser'); 
        Route::get('/suspenuser/{ref_no}', [UserController::class, 'suspenuser'])->name('suspenuser'); 
        
        
    });
});




Route::prefix('web')->name('web.')->group(function() {

    Route::middleware(['guest:web'])->group(function() {
        Route::post('/checkuserlogin', [UserController::class, 'checkuserlogin'])->name('checkuserlogin');
        Route::post('/createuser', [UserController::class, 'createuser'])->name('createuser');
        
    });
    
    Route::middleware(['auth:web'])->group(function() {
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::get('/viewprojectsuser', [ProjectController::class, 'viewprojectsuser'])->name('viewprojectsuser');
        Route::get('/project/viewprojectaskuser/{id}', [ProjectController::class, 'viewprojectaskuser'])->name('viewprojectaskuser');
        Route::get('/project/arrange/{id}', [ProjectController::class, 'arrange'])->name('arrange');
        Route::post('/update-task-priority', [TaskController::class, 'updatePriority']);

        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');