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
use Illuminate\Support\Facades\Input;
use App\OKR;
use Carbon\Carbon;

    Route::get('/',['middleware'=>'guest', function () {
        return view('auth/login');
    }]);


Auth::routes();

Route::group(['middleware' => ['auth']],function(){
    Route::get('dashboard', function(Request $req){
        $okr = OKR::whereDate('created_at', Carbon::today())
        ->orWhereDate('updated_at', Carbon::today())->paginate(5);
        $okr_user = OKR::whereDate('created_at', Carbon::today())
        ->orWhereDate('updated_at', Carbon::today())
        ->where('user_id', auth()->user()->id)
        ->paginate(5);
        $due = OKR::whereDate('date_due', '>', Carbon::now()->startOfWeek())
                    ->where('date_due', '<' ,Carbon::now()->endOfWeek())
                    ->get();
        $due_user = OKR::whereDate('date_due', '>', Carbon::now()->startOfWeek())
                    ->where('date_due', '<' ,Carbon::now()->endOfWeek())
                    ->where('user_id', auth()->user()->id)
                    ->get();
        return view('admindb' , compact('okr', 'due', 'due_user', 'okr_user'));
    });
});

Route::group(['middleware' => 'permission:user-management'], function(){

});
Route::resource('admin/permission', 'Admin\\PermissionController');
Route::resource('admin/role', 'Admin\\RoleController');
Route::resource('admin/user', 'Admin\\UserController');
Route::resource('admin/permission', 'Admin\\PermissionController');


Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'permission:manage-okr'],function(){
    Route::resource('okr', 'OKRController');
    Route::get('/okr', function(){
        $okr = OKR::paginate(5);
        return view('okr.index', compact('okr', 'access'));
    });
    Route::any('/search', function(){
        $q = Input::get('q');
        if($q !== ''){
            $okr = OKR::where('objective', 'LIKE', '%'. $q.'%')
                        ->orWhere('description', 'LIKE', '%'.$q.'%')
                        ->orWhere('weeknum', 'LIKE', '%'.$q.'%')
                        ->paginate(5)
                        ->setpath('');
            $okr->appends(array(
                'q' => Input::get('q'),
            ));
        if(count($okr) > 0){
            return view('okr.index')->with('okr', $okr);
        }
            return view('okr.index')->withMessage('No results found!');
        }
    });
    Route::resource('week', 'WeekController');
    Route::get('/excel_export', 'ExportExcelController@index');
    Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');
    Route::get('send', 'mailController@send');
    Route::get('admindb', 'EmailController@index');
    Route::post('addItem', 'CommentController@addItem');
    Route::post('view-comment', 'CommentController@viewComment');
    Route::post('editItem', 'OKRController@editItem');
    Route::post('deleteItem', 'OKRController@deleteItem');
    Route::post('deleteItemW', 'WeekController@deleteItem');
    Route::post('deleteItemC', 'CommentController@deleteItem');
    Route::post('emailsend', 'EmailController@uploadDocument');

    Route::get('/changePassword', 'HomeController@showChangePasswordForm');
    Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
});
Route::get('export', 'ExportExcelController@export')->name('contact.export');
Route::get('today', 'ExportExcelController@index');



