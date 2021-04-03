<?php

use App\Http\Controllers\Admin\Blog\PostCategoryController;
use App\Http\Controllers\Admin\Blog\PostController;
use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderStockController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ReturnRequest;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontProductController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.index');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user/change/password', [ChangePasswordController::class, 'index'])->name('password.change');
Route::post('/change-password', [ChangePasswordController::class, 'ChangePassword'])->name('password.update');
Route::get('/user/logout', [HomeController::class, 'Logout'])->name('user.logout');


// Admin Authentication Routes

Route::get('/admin/home', [AdminController::class, 'index']);
Route::get('/admin', [LoginController::class, 'ShowLoginForm'])->name('admin.login');
Route::post('/admin', [LoginController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::get('/admin/change/password', [AdminController::class, 'ChangePassword'])->name('admin.change.password');
Route::post('/admin/password/update', [AdminController::class, 'UpdatePass'])->name('admin.password.update');

// All Admin Sections

// Categories All
Route::get('/admin/categories', [CategoryController::class, 'Category'])->name('categories');
Route::post('/admin/store/category', [CategoryController::class, 'StoreCategory'])->name('store.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory']);
Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory']);
Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory']);

// Brands All
Route::get('/admin/brands', [BrandController::class, 'Brand'])->name('brands');
Route::post('/admin/store/brand', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/delete/brand/{id}', [BrandController::class, 'DeleteBrand']);
Route::get('/edit/brand/{id}', [BrandController::class, 'EditBrand']);
Route::post('/update/brand/{id}', [BrandController::class, 'Updatebrand']);

// SubCategory All
Route::get('/admin/sub/categories', [SubCategoryController::class, 'SubCategory'])->name('sub.categories');
Route::post('/admin/store/subcat', [SubCategoryController::class, 'StoreSubCat'])->name('store.subcategory');
Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubCategory']);
Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'EditSubCategory']);
Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'UpdateSubCategory']);


// Coupons All
Route::get('/admin/coupons', [CouponController::class, 'Coupon'])->name('admin.coupons');
Route::post('/admin/store/coupons', [CouponController::class, 'StoreCoupon'])->name('store.coupon');
Route::get('/delete/coupon/{id}', [CouponController::class, 'DeleteCoupon']);
Route::get('/edit/coupon/{id}', [CouponController::class, 'EditCoupon']);
Route::post('/update/coupon/{id}', [CouponController::class, 'UpdateCoupon']);

// Newslaters All
Route::get('/admin/newslater', [CouponController::class, 'Newalater'])->name('admin.newslater');
Route::post('/store/newslater', [FrontController::class, 'StoreNewslater'])->name('store.newslater');
Route::get('/delete/sub/{id}', [CouponController::class, 'DeleteNewsleter']);

// Show SubCategory when Category Selected
Route::get('/get/subcategory/{category_id}', [ProductController::class, 'GetSubCat']);

// Products All
Route::get('/admin/product/all', [ProductController::class, 'Index'])->name('all.product');
Route::get('/admin/product/add', [ProductController::class, 'Create'])->name('add.product');
Route::post('/admin/store/product', [ProductController::class, 'Store'])->name('store.product');

Route::get('/inactive/product/{id}', [ProductController::class, 'Inactive']);
Route::get('/active/product/{id}', [ProductController::class, 'Active']);
Route::get('/delete/product/{id}', [ProductController::class, 'DeleteProduct']);
Route::get('/view/product/{id}', [ProductController::class, 'ViewProduct']);
Route::get('/edit/product/{id}', [ProductController::class, 'EditProduct']);

Route::post('/update/product/withoutphoto/{id}', [ProductController::class, 'UpdateProduct']);
Route::post('/update/product/photo/{id}', [ProductController::class, 'UpdateProductPhoto']);

// Show SubCategory when Category Selected
Route::get('/get/subcategory/{category_id}', [ProductController::class, 'GetSubCat']);


// All Post Category
Route::get('/post/category', [PostCategoryController::class, 'Index'])->name('post.category');
Route::post('/store/post/category', [PostCategoryController::class, 'Store'])->name('store.post.category');
Route::get('/delete/post/category/{id}', [PostCategoryController::class, 'Delete']);
Route::get('/edit/post/category/{id}', [PostCategoryController::class, 'Edit']);
Route::post('/update/post/category/{id}', [PostCategoryController::class, 'Update']);

// All Post
Route::get('/all/post', [PostController::class, 'Index'])->name('all.post');
Route::get('/add/post', [PostController::class, 'Create'])->name('add.post');
Route::post('/store/post', [PostController::class, 'Store'])->name('store.post');
Route::get('/delete/post/{id}', [PostController::class, 'Delete']);
Route::get('/view/post/{id}', [PostController::class, 'Show']);
Route::get('/edit/post/{id}', [PostController::class, 'Edit']);
Route::post('/update/post/{id}', [PostController::class, 'Update']);


// All WishLists
Route::get('/add/wishlist/{id}', [WishlistController::class, 'AddWishlist']);


// All Add Cart
Route::get('/add/to/cart/{id}', [CartController::class, 'AddCart']);
Route::get('/check', [CartController::class, 'Check']);
Route::get('/product/cart', [CartController::class, 'ShowCart'])->name('show.cart');
Route::get('/remove/cart/{rowId}', [CartController::class, 'RemoveCart']);
Route::post('/update/cart/item', [CartController::class, 'UpdateCartItem'])->name('update.cartitem');
Route::get('/cart/product/view/{id}', [CartController::class, 'ViewProduct']);
Route::post('/insert/into/cart/', [CartController::class, 'InsertCart'])->name('insert.into.cart');
Route::get('/user/checkout/', [CartController::class, 'Checkout'])->name('user.checkout');
Route::get('/user/wishlist/', [CartController::class, 'Wishlist'])->name('user.wishlist');
Route::post('/user/apply/coupon/', [CartController::class, 'Coupon'])->name('apply.coupon');
Route::get('/coupon/remove/', [CartController::class, 'CouponRemove'])->name('coupon.remove');


// All Products View
Route::get('/product/details/{id}/{product_name}', [FrontProductController::class, 'ProductView']);
Route::post('/cart/product/add/{id}', [FrontProductController::class, 'AddCart']);


// All Blog Post
Route::get('/blog/post/', [BlogController::class, 'Blog'])->name('blog.post');
Route::get('/language/english/', [BlogController::class, 'English'])->name('language.english');
Route::get('/language/bangla/', [BlogController::class, 'Bangla'])->name('language.bangla');
Route::get('/blog/single/{id}', [BlogController::class, 'BlogSingle']);

// All Payment Step
Route::get('/payment/page/', [CartController::class, 'PaymentStep'])->name('payment.step');
Route::post('/user/payment/process/', [PaymentController::class, 'Payment'])->name('payment.process');
Route::post('/user/stripe/charge/', [PaymentController::class, 'StripeCharge'])->name('stripe.charge');

// All Products Details
Route::get('/products/{id}', [FrontProductController::class, 'SubCategoryView']);
Route::get('/allcategories/{id}', [FrontProductController::class, 'CategoryView']);

// Admin order route
Route::get('/admin/pending/order/', [OrderController::class, 'NewOreder'])->name('admin.neworder');
Route::get('/admin/view/order/{id}', [OrderController::class, 'ViewOrder']);
Route::get('/admin/payment/accept/{id}', [OrderController::class, 'PaymentAccept']);
Route::get('/admin/payment/cancel/{id}', [OrderController::class, 'PaymentCancel']);
Route::get('/admin/accept/payment', [OrderController::class, 'AcceptPayment'])->name('admin.accept.payment');
Route::get('/admin/process/payment', [OrderController::class, 'ProcessPayment'])->name('admin.process.payment');
Route::get('/admin/success/payment', [OrderController::class, 'SuccessPayment'])->name('admin.success.payment');
Route::get('/admin/cancel/order', [OrderController::class, 'CancelOrder'])->name('admin.cancel.order');
Route::get('/admin/delevery/process/{id}', [OrderController::class, 'DeleveryProcess']);
Route::get('/admin/delevery/done/{id}', [OrderController::class, 'DeleveryDone']);


// SEO Setting
Route::get('/admin/seo/', [SeoController::class, 'Seo'])->name('admin.seo');
Route::post('/admin/update/seo/', [SeoController::class, 'UpdateSeo'])->name('update.seo');

//Order Tracking Route
Route::post('/order/tracking/', [FrontController::class, 'OrderTracking'])->name('order.tracking');

// Reports All Route
Route::get('/admin/today/order', [ReportController::class, 'TodayOrder'])->name('today.order');
Route::get('/admin/today/delivery', [ReportController::class, 'TodayDelivery'])->name('today.delivery');
Route::get('/admin/this/month', [ReportController::class, 'ThisMonth'])->name('this.month');
Route::get('/admin/search/report', [ReportController::class, 'Search'])->name('search.report');

Route::post('/admin/search/by/year', [ReportController::class, 'SearchByYear'])->name('search.by.year');
Route::post('/admin/search/by/month', [ReportController::class, 'SearchByMonth'])->name('search.by.month');
Route::post('/admin/search/by/date', [ReportController::class, 'SearchByDate'])->name('search.by.date');

// Admin User Role Route:
Route::get('/admin/all/user', [UserRoleController::class, 'UserRole'])->name('admin.all.user');
Route::get('/admin/create/admin', [UserRoleController::class, 'UserCreate'])->name('create.admin');
Route::post('/admin/create/user', [UserRoleController::class, 'UserStore'])->name('store.admin');

Route::get('delete/admin/{id}', [UserRoleController::class, 'UserDelete']);
Route::get('edit/admin/{id}', [UserRoleController::class, 'UserEdit']);
Route::post('admin/update/admin', [UserRoleController::class, 'UserUpdate'])->name('update.admin');

// Admin Site Setting
Route::get('/admin/site/setting', [SettingController::class, 'SiteSetting'])->name('admin.site.setting');
Route::post('admin/sitesetting', [SettingController::class, 'UpdateSiteSetting'])->name('update.sitesetting');

// Return Order Route
Route::get('/success/list', [PaymentController::class, 'SuccessList'])->name('success.orderlist');
Route::get('/request/return/{id}', [PaymentController::class, 'RequestReturn']);

// Admin Return Request
Route::get('admin/return/request', [ReturnRequest::class, 'ReturnRequest'])->name('admin.return.request');
Route::get('admin/approve/return/{id}', [ReturnRequest::class, 'ApproveReturn']);
Route::get('admin/all/return', [ReturnRequest::class, 'AllReturn'])->name('admin.return.all');


// Admin Product Stock Route
Route::get('/admin/product/stock', [OrderStockController::class, 'ProductStock'])->name('admin.product.stock');

// All Contact Route
Route::get('/contact/page', [ContactController::class, 'contact'])->name('contact.page');
Route::post('contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');
Route::get('admin/all/message', [ContactController::class, 'AllMessage'])->name('all.message');

// Search Route
Route::post('product/search', [SearchController::class, 'Search'])->name('product.search');

// Socialite Route
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);
