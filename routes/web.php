<?php

use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\ComissionController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\ExpenseController;
use App\Http\Controllers\Frontend\IncomeController;
use App\Http\Controllers\Frontend\MonkController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\InviteController;
use App\Http\Controllers\Frontend\StayerController;
use App\Http\Controllers\Frontend\StudentController;
use App\Http\Controllers\Frontend\VillageController;
use App\Models\Stayer;

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

Route::get('/', [IndexController::class, 'UserLogout']);
// Route::get('/', function () {
//     return view('auth.login');
// });
// middleware Group
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware([
    'auth:sanctum', 'admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// middleware
// Route::middleware(['auth:web'])->group(function(){
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        // profile user show in userdashboard and edit
        // $id = Auth::user()->id;
        // $user = User::find($id);
        return view('dashboard');
    })->name('dashboard');
});

// });

// frontend
Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::get('/dashboard', [DashboardController::class, 'viewTotalIncome']);
// Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/register', [IndexController::class, 'UserRegister'])->name('user.register');
//edit user profileimage
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
//btn update //if we use post when insert update 
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
// Route::post('/user/profile/user/new', [IndexController::class, 'NewUserStore'])->name('user.new.store');
//call view update
Route::post('/user/change/update', [IndexController::class, 'UserUpdatePassword'])->name('user.password.update');

// User info
Route::prefix('user')->group(function () {
    Route::get('/view/user', [UserController::class, 'ViewUser'])->name('all.user');
    Route::get('/create/new/user', [UserController::class, 'CreateUser'])->name('user.create');
    Route::post('/store/user', [UserController::class, 'StoreUser'])->name('store.user');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
    Route::get('/search/user', [UserController::class, 'UserSearch']);
});
// For Admin all monks controll frondend.
Route::prefix('monks')->group(function () {
    Route::get('/view/allmonk', [MonkController::class, 'ViewMonk'])->name('all.monk');
    Route::get('/create/monk', [MonkController::class, 'CreateMonk'])->name('monk.create');
    Route::post('/store', [MonkController::class, 'MonkStore'])->name('monk.store');
    Route::get('/edit/{id}', [MonkController::class, 'MonkEdit'])->name('monk.edit');
    Route::post('/update/{id}', [MonkController::class, 'MonkUpdate'])->name('monk.update');
    Route::get('/delete/{id}', [MonkController::class, 'MonkDelete'])->name('monk.delete');

    Route::get('/inactive/{id}', [MonkController::class, 'Inactive'])->name('monk.inactive');
    Route::get('/active/{id}', [MonkController::class, 'Active'])->name('monk.active');
});
Route::prefix('students')->group(function () {
    Route::get('/view/student', [StudentController::class, 'ViewStudent'])->name('all.student');
    Route::get('/create/student', [StudentController::class, 'CreateStudent'])->name('student.create');
    Route::post('/store/student', [StudentController::class, 'StoreStudent'])->name('student.store');
    Route::get('/edit/{id}', [StudentController::class, 'StudentEdit'])->name('student.edit');
    Route::post('/update/{id}', [StudentController::class, 'StudentUpdate'])->name('student.update');
    Route::get('/delete/{id}', [StudentController::class, 'StudentDelete'])->name('student.delete');

    Route::get('/inactive/{id}', [StudentController::class, 'Inactive'])->name('student.inactive');
    Route::get('/active/{id}', [StudentController::class, 'Active'])->name('student.active');
});
Route::prefix('stayers')->group(function () {
    Route::get('/view/stayer', [StayerController::class, 'ViewStayer'])->name('all.stayer');
    Route::get('/create/stayer', [StayerController::class, 'CreateStayer'])->name('stayer.create');
    Route::post('/store/stayer', [StayerController::class, 'StoreStayer'])->name('stayer.store');
    Route::get('/edit/{id}', [StayerController::class, 'StayerEdit'])->name('stayer.edit');
    Route::post('/update/{id}', [StayerController::class, 'StayerUpdate'])->name('stayer.update');
    Route::get('/delete/{id}', [StayerController::class, 'StayerDelete'])->name('stayer.delete');
    Route::get('/inactive/{id}', [StayerController::class, 'Inactive'])->name('stayer.inactive');
    Route::get('/active/{id}', [StayerController::class, 'Active'])->name('stayer.active');
});
Route::prefix('comissions')->group(function () {
    Route::get('/view/comission', [ComissionController::class, 'ViewComission'])->name('all.comission');
    Route::get('/create/comission', [ComissionController::class, 'CreateComission'])->name('comission.create');
    Route::post('/store/comission', [ComissionController::class, 'StoreComission'])->name('comission.store');
    Route::get('/edit/{id}', [ComissionController::class, 'ComissionEdit'])->name('comission.edit');
    Route::post('/update/{id}', [ComissionController::class, 'ComissionUpdate'])->name('comission.update');
    Route::get('/delete/{id}', [ComissionController::class, 'ComissionDelete'])->name('comission.delete');
    Route::get('/inactive/{id}', [ComissionController::class, 'Inactive'])->name('comission.inactive');
    Route::get('/active/{id}', [ComissionController::class, 'Active'])->name('comission.active');
});
//Settings
Route::prefix('villages')->group(function () {
    Route::get('/view/village', [VillageController::class, 'ViewVillage'])->name('all.village');
    Route::get('/create/village', [VillageController::class, 'CreateVillage'])->name('village.create');
    Route::post('/store/village', [VillageController::class, 'StoreVillage'])->name('village.store');
    Route::get('/edit/{id}', [VillageController::class, 'VillageEdit'])->name('village.edit');
    Route::post('/update/{id}', [VillageController::class, 'VillageUpdate'])->name('village.update');
    Route::get('/delete/{id}', [VillageController::class, 'VillageDelete'])->name('village.delete');
});

// Note Money
Route::prefix('incomes')->group(function () {
    Route::get('/view/income', [IncomeController::class, 'ViewIncome'])->name('all.income');
    Route::get('/create/income', [IncomeController::class, 'CreateIncome'])->name('income.create');
    Route::post('/store/income', [IncomeController::class, 'StoreIncome'])->name('income.store');
    Route::get('/edit/{id}', [IncomeController::class, 'IncomeEdit'])->name('income.edit');
    Route::post('/update/{id}', [IncomeController::class, 'IncomeUpdate'])->name('income.update');
    Route::get('/delete/{id}', [IncomeController::class, 'IncomeDelete'])->name('income.delete');
});
Route::prefix('expense')->group(function () {
    Route::get('/view/expense', [ExpenseController::class, 'ViewExpense'])->name('all.expense');
    Route::get('/create/expense', [ExpenseController::class, 'CreateExpense'])->name('expense.create');
    Route::post('/store/expense', [ExpenseController::class, 'StoreExpense'])->name('expense.store');
    Route::get('/edit/{id}', [ExpenseController::class, 'ExpenseEdit'])->name('expense.edit');
    Route::post('/update/{id}', [ExpenseController::class, 'ExpenseUpdate'])->name('expense.update');
    Route::get('/delete/{id}', [ExpenseController::class, 'ExpenseDelete'])->name('expense.delete');
});
Route::prefix('Invite')->group(function () {
    Route::get('/view/invite', [InviteController::class, 'viewInvite'])->name('all.invite');
    Route::get('/create/invite', [InviteController::class, 'CreateInvite'])->name('invite.create');
    Route::post('/store/invite', [InviteController::class, 'StoreInvite'])->name('invite.store');
    Route::get('/edit/{id}', [InviteController::class, 'InviteEdit'])->name('invite.edit');
    Route::post('/update/{id}', [InviteController::class, 'InviteUpdate'])->name('invite.update');
    Route::get('/delete/{id}', [InviteController::class, 'InviteDelete'])->name('invite.delete');
});
// ----------------Route for Search -----------------------
