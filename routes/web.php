<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('client.home');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});


Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// =========================== ADMIN ======================== //
// ====category=========
Route::get('/category_index', [App\Http\Controllers\adminCategoryController::class, 'index'])
    ->name('category.index')
    ->middleware('can:category-list');

Route::get('/category_create', [App\Http\Controllers\adminCategoryController::class, 'create'])
    ->name('category.create')
    ->middleware('can:category-create');

Route::post('/category_store', [App\Http\Controllers\adminCategoryController::class, 'store'])
    ->name('category.store');

Route::get('/category_edit/{id}', [App\Http\Controllers\adminCategoryController::class, 'edit'])
    ->name('category.edit')
    ->middleware('can:category-update');

Route::post('/category_update/{id}', [App\Http\Controllers\adminCategoryController::class, 'update'])
    ->name('category.update');
Route::get('/category_delete/{id}', [App\Http\Controllers\adminCategoryController::class, 'delete'])
    ->name('category.delete')
    ->middleware('can:category-delete');

//======settings=======
Route::get('/settings_index', [App\Http\Controllers\adminSettingsController::class, 'index'])
    ->name('settings.index')
    ->middleware('can:settings-list');

Route::get('/settings_create', [App\Http\Controllers\adminSettingsController::class, 'create'])
    ->name('settings.create')
    ->middleware('can:settings-create');

Route::post('/settings_store', [App\Http\Controllers\adminSettingsController::class, 'store'])
    ->name('settings.store');

Route::get('/settings_edit/{id}', [App\Http\Controllers\adminSettingsController::class, 'edit'])
    ->name('settings.edit')
    ->middleware('can:settings-update');

Route::post('/settings_update/{id}', [App\Http\Controllers\adminSettingsController::class, 'update'])
    ->name('settings.update');

Route::get('/settings_delete/{id}', [App\Http\Controllers\adminSettingsController::class, 'delete'])
    ->name('settings.delete')
    ->middleware('can:settings-delete');

//========product============
Route::get('/product_index', [App\Http\Controllers\adminProductController::class, 'index'])
    ->name('product.index')
    ->middleware('can:product-list');

Route::get('/product_create', [App\Http\Controllers\adminProductController::class, 'create'])
    ->name('product.create')
    ->middleware('can:product-create');

Route::post('/product_store', [App\Http\Controllers\adminProductController::class, 'store'])
    ->name('product.store');

Route::get('/product_edit/{id}', [App\Http\Controllers\adminProductController::class, 'edit'])
    ->name('product.edit')
    ->middleware('can:product-update');

Route::post('/product_update/{id}', [App\Http\Controllers\adminProductController::class, 'update'])
    ->name('product.update');

Route::get('/product_delete/{id}', [App\Http\Controllers\adminProductController::class, 'delete'])
    ->name('product.delete')
    ->middleware('can:product-delete');

//=============infoProduct===========
Route::get('/info_index/{id}', [App\Http\Controllers\adminInfoProductController::class, 'index'])
    ->name('info.index')
    ->middleware('can:infoProduct-list');

Route::get('/info_create/{id}', [App\Http\Controllers\adminInfoProductController::class, 'create'])
    ->name('info.create')
    ->middleware('can:infoProduct-create');

Route::post('/info_store', [App\Http\Controllers\adminInfoProductController::class, 'store'])
    ->name('info.store');
Route::get('/info_edit/{id}', [App\Http\Controllers\adminInfoProductController::class, 'edit'])
    ->name('info.edit')
    ->middleware('can:infoProduct-update');

Route::post('/info_update/{id}', [App\Http\Controllers\adminInfoProductController::class, 'update'])
    ->name('info.update');
Route::get('/info_delete/{id}', [App\Http\Controllers\adminInfoProductController::class, 'delete'])
    ->name('info.delete')
    ->middleware('can:infoProduct-delete');

//=============slider==========
Route::get('/slider_index', [App\Http\Controllers\adminSliderController::class, 'index'])
    ->name('slider.index')
    ->middleware('can:slider-list');

Route::get('/slider_create', [App\Http\Controllers\adminSliderController::class, 'create'])
    ->name('slider.create')
    ->middleware('can:slider-create');

Route::post('/slider_store', [App\Http\Controllers\adminSliderController::class, 'store'])
    ->name('slider.store');

Route::get('/slider_edit/{id}', [App\Http\Controllers\adminSliderController::class, 'edit'])
    ->name('slider.edit')
    ->middleware('can:slider-update');

Route::post('/slider_update/{id}', [App\Http\Controllers\adminSliderController::class, 'update'])
    ->name('slider.update');

Route::get('/slider_delete/{id}', [App\Http\Controllers\adminSliderController::class, 'delete'])
    ->name('slider.delete')
    ->middleware('can:slider-delete');

//==========post==========
Route::get('/post_index', [App\Http\Controllers\adminPostController::class, 'index'])
    ->name('post.index')
    ->middleware('can:post-list');

Route::get('/post_create', [App\Http\Controllers\adminPostController::class, 'create'])
    ->name('post.create')
    ->middleware('can:post-create');

Route::post('/post_store', [App\Http\Controllers\adminPostController::class, 'store'])
    ->name('post.store');

Route::get('/post_edit/{id}', [App\Http\Controllers\adminPostController::class, 'edit'])
    ->name('post.edit')
    ->middleware('can:post-update');

Route::post('/post_update/{id}', [App\Http\Controllers\adminPostController::class, 'update'])
    ->name('post.update');

Route::get('/post_delete/{id}', [App\Http\Controllers\adminPostController::class, 'delete'])
    ->name('post.delete')
    ->middleware('can:post-delete');

//==========user=========
Route::get('/user_index', [App\Http\Controllers\adminUserController::class, 'index'])
    ->name('user.index')
    ->middleware('can:user-list');

Route::get('/user_create', [App\Http\Controllers\adminUserController::class, 'create'])
    ->name('user.create')
    ->middleware('can:user-create');

Route::post('/user_store', [App\Http\Controllers\adminUserController::class, 'store'])
    ->name('user.store');

Route::get('/user_edit/{id}', [App\Http\Controllers\adminUserController::class, 'edit'])
    ->name('user.edit')
    ->middleware('can:user-update');

Route::post('/user_update/{id}', [App\Http\Controllers\adminUserController::class, 'update'])
    ->name('user.update');

Route::get('/user_delete/{id}', [App\Http\Controllers\adminUserController::class, 'delete'])
    ->name('user.delete')
    ->middleware('can:user-delete');
//=========role========
Route::get('/role_index', [App\Http\Controllers\adminRoleController::class, 'index'])
    ->name('role.index')
    ->middleware('can:role-list');

Route::get('/role_create', [App\Http\Controllers\adminRoleController::class, 'create'])
    ->name('role.create')
    ->middleware('can:role-create');

Route::post('/role_store', [App\Http\Controllers\adminRoleController::class, 'store'])
    ->name('role.store');

Route::get('/role_edit/{id}', [App\Http\Controllers\adminRoleController::class, 'edit'])
    ->name('role.edit')
    ->middleware('can:role-update');

Route::post('/role_update/{id}', [App\Http\Controllers\adminRoleController::class, 'update'])
    ->name('role.update');

Route::get('/role_delete/{id}', [App\Http\Controllers\adminRoleController::class, 'delete'])
    ->name('role.delete')
    ->middleware('can:role-delete');

//=========permission=======
Route::get('/permission_index', [App\Http\Controllers\adminPermissionController::class, 'index'])
    ->name('permission.index');
Route::get('/permission_create', [App\Http\Controllers\adminPermissionController::class, 'create'])
    ->name('permission.create');
Route::post('/permission_store', [App\Http\Controllers\adminPermissionController::class, 'store'])
    ->name('permission.store');
//========order=========
Route::get('/danh-sach-don-hang', [App\Http\Controllers\adminOrderController::class, 'index'])
    ->name('order.index');
Route::get('/chi-tiet-don-hang/{id}', [App\Http\Controllers\adminOrderController::class, 'detail'])
    ->name('order.detail');
Route::post('/order_update/{id}', [App\Http\Controllers\adminOrderController::class, 'update'])
    ->name('order.update');
Route::get('/order_delete/{id}', [App\Http\Controllers\adminOrderController::class, 'delete'])
    ->name('order.delete');
//========================================client=============
Route::get('/home', [App\Http\Controllers\homeController::class, 'index'])
    ->name('client.home');
Route::get('san-pham/{slug}', [App\Http\Controllers\homeController::class, 'listProduct'])
    ->name('client.listProduct');
Route::get('chi-tiet-san-pham/{id}', [App\Http\Controllers\homeController::class, 'detailProduct'])
    ->name('client.detailProduct');
Route::get('bai-viet/{category}', [App\Http\Controllers\clientPostController::class, 'listPost'])
    ->name('client.listPost');
Route::get('chi-tiet-bai-viet/{slug}', [App\Http\Controllers\clientPostController::class, 'detailPost'])
    ->name('client.detailPost');
//======cart========
Route::get('/gio-hang', [App\Http\Controllers\cartController::class, 'index'])
    ->name('cart.show');
Route::get('/them-gio-hang/{id}', [App\Http\Controllers\cartController::class, 'addToCart'])
    ->name('cart.addToCart');
Route::get('/add/{id}', [App\Http\Controllers\cartController::class, 'add'])
    ->name('cart.add');
Route::post('/cap-nhat-gio-hang', [App\Http\Controllers\cartController::class, 'update'])
    ->name('cart.update');
Route::get('/destroy', [App\Http\Controllers\cartController::class, 'destroy'])
    ->name('cart.destroy');
Route::get('/cart_delete\{rowId}', [App\Http\Controllers\cartController::class, 'remove'])
    ->name('cart.remove');
Route::get('/thanh-toan', [App\Http\Controllers\cartController::class, 'checkout'])
    ->name('cart.checkout');
Route::post('/payment', [App\Http\Controllers\cartController::class, 'payment'])
    ->name('cart.payment');
