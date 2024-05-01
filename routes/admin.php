<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth::routes();
Route::get("/login", [\App\Http\Controllers\Admin\Auth\LoginController::class, "showLoginFormy"])->name('admin.admin.auth.login');  // ->middleware('auth')
Route::get("/register", [\App\Http\Controllers\Admin\Auth\RegisterController::class, "showRegistrationForm"])->name('admin.auth.register');  // ->middleware('auth')
Route::post("/register", [\App\Http\Controllers\Admin\Auth\RegisterController::class, "register"])->name('register');  // ->middleware('auth')
Route::post("/post/login", [\App\Http\Controllers\Admin\Auth\LoginController::class, "login"])->name('login'); // ->middleware("throttle:5,10") /// Error 429 : Many_Requests,Mintues
Route::any('logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/admin/verify', [\App\Http\Controllers\Admin\Auth\VerifyAccountController::class, 'showVerifyEmail'])->name('verify');
Route::post('/admin/verify', [\App\Http\Controllers\Admin\Auth\VerifyAccountController::class, 'verifyAgainEmail'])->name('again.verify');
Route::get('/admin/verify/{token}', [\App\Http\Controllers\Admin\Auth\VerifyAccountController::class, 'verifyAccountEmail'])->name('user.verify');
Route::post('/admin/captcha', [\App\Http\Controllers\Admin\Auth\CaptchaController::class, 'reloadCaptcha'])->name('captcha');
Route::get('/invoice/{order_no}/{type}/{hash}.pdf', [\App\Http\Controllers\Admin\InvoiceController::class, 'pdf']);
Route::get('/bill/{order_no}-{hash}.pdf', [\App\Http\Controllers\Admin\BillController::class, 'pdf']);

Route::prefix('')->middleware(['auth', 'is_verify_email'])->group(function () {
    Route::get('/admin/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/draft/product', [\App\Http\Controllers\Admin\ProductController::class, 'draft'])->name('admin.draft.product');
    Route::get('/admin/draft/post', [\App\Http\Controllers\Admin\PostController::class, 'draft'])->name('admin.draft.post');
    Route::post('/admin/draft/product/fetch', [\App\Http\Controllers\Admin\FetchController::class, 'fetchProduct_Draft']);
    Route::post('/admin/draft/post/fetch', [\App\Http\Controllers\Admin\FetchController::class, 'fetchPost_Draft']);
    Route::get('/admin/category/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/admin/category/post', [\App\Http\Controllers\Admin\CategoryController::class, 'post'])->name('admin.category.post');
    Route::get('/admin/category/product', [\App\Http\Controllers\Admin\CategoryController::class, 'product'])->name('admin.category.product');
    Route::get('/admin/category/forum', [\App\Http\Controllers\Admin\CategoryController::class, 'forum'])->name('admin.category.forum');
    Route::post('/admin/category/save', [\App\Http\Controllers\Admin\CategoryController::class, 'save'])->name('admin.category.save');
    Route::post('/admin/category/save_menu', [\App\Http\Controllers\Admin\CategoryController::class, 'save_menu'])->name('admin.category.save_menu');
    Route::post('/admin/category/delete', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.category.delete');
    Route::delete('/admin/permissions_mass_destroy', [\App\Http\Controllers\Admin\PermissionsController::class, 'massDestroy'])->name('admin.permissions.mass_destroy');
    Route::delete('/admin/roles_mass_destroy', [\App\Http\Controllers\Admin\RolesController::class, 'massDestroy'])->name('admin.roles.mass_destroy');
    Route::delete('/admin/users_mass_destroy', [\App\Http\Controllers\Admin\UsersController::class, 'massDestroy'])->name('admin.users.mass_destroy');
    Route::get('/admin/users/{id?}/edit/password', [\App\Http\Controllers\Admin\UsersController::class, 'passwordShow'])->name('admin.users.password');
    Route::put('/admin/users/{id}/edit/password/post', [\App\Http\Controllers\Admin\UsersController::class, 'passwordUpdate'])->name('admin.users.password.post');
    Route::get('/admin/pages/{id?}', [\App\Http\Controllers\Admin\DashboardController::class, 'error'])->name('admin.pages');
    Route::get('/admin/change_password', [\App\Http\Controllers\Admin\Auth\ChangePasswordController::class, 'showChangePasswordForm'])->name('admin.auth.change_password.form');
    Route::patch('/admin/change_password', [\App\Http\Controllers\Admin\Auth\ChangePasswordController::class, 'changePassword'])->name('admin.auth.change_password');
    Route::resource('/admin/permissions', \App\Http\Controllers\Admin\PermissionsController::class)->names('admin.permissions');
    Route::resource('/admin/roles', \App\Http\Controllers\Admin\RolesController::class)->names('admin.roles');
    Route::resource('/admin/users', \App\Http\Controllers\Admin\UsersController::class)->names('admin.users');
    Route::resource('/admin/invoice', \App\Http\Controllers\Admin\InvoiceController::class)->names('admin.invoice');
//    Route::resource('/admin/company', \App\Http\Controllers\Admin\CompanyController::class)->names('admin.company');
//    Route::resource('/admin/automation', \App\Http\Controllers\Admin\AutomationController::class)->names('admin.automation');
    Route::resource('/admin/bill', \App\Http\Controllers\Admin\BillController::class)->names('admin.bill');
    Route::resource('/admin/stock', \App\Http\Controllers\Admin\StockController::class)->names('admin.stock');
    Route::resource('/admin/redirect', \App\Http\Controllers\Admin\RedirectController::class)->names('admin.redirect');
    Route::resource('/admin/product', \App\Http\Controllers\Admin\ProductController::class)->names('admin.product');
    Route::resource('/admin/faq', \App\Http\Controllers\Admin\FaqController::class)->names('admin.faq');
    Route::resource('/admin/post', \App\Http\Controllers\Admin\PostController::class)->names('admin.post');
    Route::post('/admin/post/{post}/update', [\App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.post.manual.update');
    Route::resource('/admin/letter', \App\Http\Controllers\Admin\LetterController::class)->names('admin.letter');
    Route::resource('/admin/datasheet', \App\Http\Controllers\Admin\DatasheetController::class)->names('admin.datasheet');
    Route::patch('/admin/change_password', [\App\Http\Controllers\Admin\Auth\ChangePasswordController::class, 'changePassword'])->name('admin.auth.change_password');
//    Route::get('/admin/stat/', [\App\Http\Controllers\Admin\StatController::class, 'index'])->name('admin.stat.index');
//    Route::get('/admin/stat/date/{date}', [\App\Http\Controllers\Admin\StatController::class, 'date'])->name('admin.stat.date');
//    Route::get('/admin/stat/ip/{ip}', [\App\Http\Controllers\Admin\StatController::class, 'ip'])->name('admin.stat.ip');
    Route::get('/admin/upload/', [\App\Http\Controllers\Admin\UploadController::class, 'index'])->name('admin.upload.index');
    Route::get('/admin/upload/post', [\App\Http\Controllers\Admin\UploadController::class, 'post'])->name('admin.upload.post');
    Route::get('/admin/upload/product', [\App\Http\Controllers\Admin\UploadController::class, 'product'])->name('admin.upload.product');
    Route::get('/admin/upload/pdf', [\App\Http\Controllers\Admin\UploadController::class, 'pdf'])->name('admin.upload.pdf');
    Route::get('/admin/upload/zip', [\App\Http\Controllers\Admin\UploadController::class, 'zip'])->name('admin.upload.zip');
    Route::post('/admin/upload/post', [\App\Http\Controllers\Admin\UploadController::class, 'postStore'])->name('admin.upload.store.post');
    Route::post('/admin/upload/product', [\App\Http\Controllers\Admin\UploadController::class, 'productStore'])->name('admin.upload.store.product');
    Route::post('/admin/upload/pdf', [\App\Http\Controllers\Admin\UploadController::class, 'pdfStore'])->name('admin.upload.store.pdf');
    Route::post('/admin/upload/zip', [\App\Http\Controllers\Admin\UploadController::class, 'zipStore'])->name('admin.upload.store.zip');
    Route::post('/admin/upload/fetch', [\App\Http\Controllers\Admin\UploadController::class, 'fetchTiny'])->name('admin.fetchTiny');
    Route::get('/admin/pdf/', [\App\Http\Controllers\Admin\PdfController::class, 'index'])->name('admin.pdf.index');
    Route::post('/admin/pdf/fetch', [\App\Http\Controllers\Admin\PdfController::class, 'fetchIndex'])->name('admin.pdf.index.fetch');
    Route::get('/admin/invoice/types/{type}', [\App\Http\Controllers\Admin\InvoiceController::class, 'types']);
    Route::post('/admin/invoice/fetch', [\App\Http\Controllers\Admin\FetchController::class, 'fetchInvoice']);
    Route::post('/admin/invoice/types/{type}/fetch', [\App\Http\Controllers\Admin\FetchController::class, 'fetchInvoiceTypes']);
    Route::post('/admin/fetch/ajax/{data}', [\App\Http\Controllers\Admin\FetchController::class, 'popupAjaxScroll']);
    Route::post('/admin/bill/fetch', [\App\Http\Controllers\Admin\FetchController::class, 'fetchBill']);
    Route::get('/admin/settings/', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings.index');
    Route::get('/admin/settings/meta', [\App\Http\Controllers\Admin\SettingController::class, 'meta'])->name('admin.settings.meta');
    Route::get('/admin/settings/motto', [\App\Http\Controllers\Admin\SettingController::class, 'motto'])->name('admin.settings.motto');
    Route::get('/admin/settings/about', [\App\Http\Controllers\Admin\SettingController::class, 'about'])->name('admin.settings.about');
    Route::get('/admin/settings/token', [\App\Http\Controllers\Admin\SettingController::class, 'token'])->name('admin.settings.token');
    Route::get('/admin/settings/namad', [\App\Http\Controllers\Admin\SettingController::class, 'namad'])->name('admin.settings.namad');
    Route::get('/admin/settings/contact', [\App\Http\Controllers\Admin\SettingController::class, 'contact'])->name('admin.settings.contact');
    Route::get('/admin/settings/social', [\App\Http\Controllers\Admin\SettingController::class, 'social'])->name('admin.settings.social');
    Route::get('/admin/settings/map', [\App\Http\Controllers\Admin\SettingController::class, 'map'])->name('admin.settings.map');
    Route::post('/admin/settings/', [\App\Http\Controllers\Admin\SettingController::class, 'saveIndex'])->name('admin.settings.post.index');
    Route::post('/admin/settings/motto', [\App\Http\Controllers\Admin\SettingController::class, 'saveMotto'])->name('admin.ettings.post.motto');
    Route::post('/admin/settings/about', [\App\Http\Controllers\Admin\SettingController::class, 'saveAbout'])->name('admin.settings.post.about');
    Route::post('/admin/settings/meta', [\App\Http\Controllers\Admin\SettingController::class, 'saveMeta'])->name('admin.settings.post.meta');
    Route::post('/admin/settings/token', [\App\Http\Controllers\Admin\SettingController::class, 'saveToken'])->name('admin.settings.post.token');
    Route::post('/admin/settings/namad', [\App\Http\Controllers\Admin\SettingController::class, 'saveNamad'])->name('admin.settings.post.namad');
    Route::post('/admin/settings/contact', [\App\Http\Controllers\Admin\SettingController::class, 'saveContact'])->name('admin.settings.post.contact');
    Route::post('/admin/settings/social', [\App\Http\Controllers\Admin\SettingController::class, 'saveSocial'])->name('admin.settings.post.social');
    Route::post('/admin/settings/map', [\App\Http\Controllers\Admin\SettingController::class, 'saveMap'])->name('admin.settings.post.map');
    Route::post('/admin/product/fetch', [\App\Http\Controllers\Admin\FetchController::class, 'fetchProduct']);
    Route::post('/admin/post/fetch', [\App\Http\Controllers\Admin\FetchController::class, 'fetchPost']);
    Route::post('/admin/datasheet/fetch', [\App\Http\Controllers\Admin\FetchController::class, 'fetchDatasheet']);
    Route::post('/admin/users/fetch', [\App\Http\Controllers\Admin\FetchController::class, 'fetchUsers']);
    Route::post('/admin/stock/fetch', [\App\Http\Controllers\Admin\FetchController::class, 'fetchStock']);
    Route::post('/admin/check-url/fetch/{url}', [\App\Http\Controllers\Admin\FetchController::class, 'checkUrl']);


//    Route::group(['prefix' => 'admin/files', 'middleware' => ['web', 'auth']], function () {
//        '\vendor\uniSharp\LaravelFilemanager\Lfm::routes()';
//    });
});


