<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientCompanyController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ShopController as AdminShopController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ShopController;
use App\Http\Controllers\Member\MemberCourseController;
use App\Http\Controllers\Member\MemberDashboradController;
use App\Http\Controllers\ProfileController;
use Faker\Provider\ar_EG\Company;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/about',[HomeController::class,'about'])->name('home.about');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/product/detail/{slug}',[ShopController::class,'productDetailSlug'])->name('product.detail');
Route::get('/product/modal-detail/{slug}',[ShopController::class,'quickViewModal'])->name('product.detail.modal');

Route::get('/cart/session',[CartController::class,'getSessionCart'])->name('cart.session');

Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout.index');
// Rajaongkir
Route::get('/city/{id}',[HomeController::class, 'getCity'])->name('city');
Route::get('/subdistrict/{id}',[HomeController::class, 'getSubdistrict'])->name('subdistrict');

Route::get('register/user',[HomeController::class, 'register'])->name('register.user');
Route::get('login/user',[HomeController::class, 'loginUser'])->name('login.user');

Route::get('blog/detail/{slug}', [HomeController::class, 'detailBlog'])->name('blog.detail');


Route::post('/cek/domain', [HomeController::class, 'cekDomain'])->name('cek.domain');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['roleCheck:user', 'auth','verified'])->group(function () {
    Route::get('member/dashboard', [MemberDashboradController::class,'index'])->name('member.dashboard');
    Route::post('/checkout-process',[CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/member/transaction/detail/{code}',[MemberDashboradController::class, 'detailTransaction'])->name('member.detail.transaction');
    Route::get('/member/transaction/list/{id}',[MemberDashboradController::class, 'myTransaaction'])->name('member.mytransaction');
    Route::post('/member/transaction/callback',[CheckoutController::class,'postCallback'])->name('post.callback');

    Route::get('member/transaction/kategori/{user}/{category}',[MemberDashboradController::class,'myTransaactionProduct'])->name('product.mytransaction');
    Route::post('/add-domain',[HomeController::class,'addDomainCookie'])->name('add.domain');
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/add-cart',[CartController::class,'addToCart'])->name('add.to.cart');
    Route::post('/cart/update-cart',[CartController::class,'updateCart'])->name('update.cart');
    Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('delete-cart');
    Route::post('/cart/apply-coupon',[CartController::class,'applyCoupon'])->name('apply.coupon');

    Route::prefix('/member/course')->name('member.')->group(function(){
        Route::get('list',[MemberCourseController::class, 'index'])->name('course.list');
        Route::get('detail/{slug}',[MemberCourseController::class, 'detailCourse'])->name('course.detail');
        Route::get('detail/lesson/{id}',[MemberCourseController::class, 'detailLesson'])->name('course.lesson');
    });
});

Route::middleware(['roleCheck:admin', 'auth','verified'])->group(function () {
    Route::get('admin/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubCategoryController::class);
    Route::get('/subcategory/list/{type}/{id}', [SubCategoryController::class, 'getSubCategory'])->name('subcategory.list');
    // Route::post('/category/subcategory',[CategoryController::class, 'saveSubcategory'])->name('subcategory.store');
    Route::resource('product', ProductController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('user', UserController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('article',ArticleController::class);
    Route::get('/update-role/{id}', [UserRoleController::class, 'updatePermissionId'])->name('user.edit.role');
    Route::patch('/update-role/user/{id}', [UserRoleController::class, 'updatePermission'])->name('user.update-role');
    Route::get('/setting-company',[CompanyProfileController::class,'index'])->name('setting-company');
    Route::post('/setting-company/add',[CompanyProfileController::class,'store'])->name('setting-company.store');
    Route::resource('client-company',ClientCompanyController::class);
    Route::get('permission', [PermissionController::class,'index'])->name('permission.index');
    Route::post('/permission/add',[PermissionController::class,'add'])->name('permission.store');
    Route::get('role',[RoleController::class,'index'])->name('role.index');
    Route::post('/role/add',[RoleController::class,'add'])->name('role.store');
    Route::get('transaction',[AdminDashboardController::class,'listTransactions'])->name('transaction.list');
    Route::get('/transaction/detail/{code}',[AdminDashboardController::class, 'detailTransactions'])->name('transaction.detail');
    Route::patch('/transaction/update/progress/{id}',[AdminDashboardController::class,'updateProgressTrx'])->name('transaction.update-progress');

    Route::prefix('/course')->name('course.')->group(function(){
        Route::resource('education', CourseController::class);
        Route::get('input/chapter',[CourseController::class,'createChapter'])->name('chapter');
        Route::post('input/chapter',[CourseController::class,'storeChapter'])->name('input.chapter');
        Route::get('input/lesson',[CourseController::class,'createLesson'])->name('lesson');
        Route::post('input/lesson',[CourseController::class,'storeLesson'])->name('input.lesson');
    });
});




Route::get('/stockis/shop',[AdminShopController::class,'index'])->name('stockis.shop');

Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
