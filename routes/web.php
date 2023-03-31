<?php

use App\Http\Controllers\Front;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Front\HomeController::class, 'index'])->name('user');

// chuc nang trang blog o giao dien chinh
Route::prefix('blog')->group(function()
    {
        Route::get('/', [Front\BlogController::class, 'blog']);
        Route::get('/blog/{id}', [Front\BlogController::class, 'blogdetail']);
        Route::get('/{blogcategoryName}', [Front\BlogController::class, 'blogcategory']);
    }
);
Route::prefix('shop')->group(function()
    {
        Route::get('/product/{id}', [Front\ShopController::class, 'show']); //route chitietsp
        Route::get('/', [Front\ShopController::class, 'index']); //route danhsachsp

        Route::get('/{categoryName}', [Front\ShopController::class, 'category']);
        Route::post('/product/{id}', [Front\ShopController::class, 'postComment']); //route binh luan
    }
);

// chuc nang gio hang
Route::prefix('cart')->group(function()
{
    Route::get('add/{id}', [Front\CartController::class, 'add']);       //add sp
    Route::get('/', [Front\CartController::class, 'index']);            //trang chủ
    Route::get('delete/{rowId}', [Front\CartController::class, 'delete']);//xóa 1 sp
    Route::get('/destroy', [Front\CartController::class, 'destroy']);   //xóa all sp
    Route::get('/update', [Front\CartController::class, 'update']); //cập nhật soluong
});
// ban do
Route::get('/map',[Front\MapController::class,'map']);
// dang nhap khach hang
// 
Route::get('/logout-customer', [Front\LoginController::class, 'logout_customer']);

// kich hoat tai khoan
Route::get('/actived/{customer}/{token}', [Front\LoginController::class, 'actived'])->name('customer.actived');

// cap nhat tai khoan khach hang
Route::get('/profile',[Front\LoginController::class, 'profile'])->name('home.profile')->middleware('account');
Route::post('/profile',[Front\LoginController::class, 'update_profile'])->middleware('account');

// dang ki
Route::get('/register', [Front\LoginController::class, 'register']);
Route::post('/register', [Front\LoginController::class, 'check_register']);
// Route::post('/register', [Front\LoginController::class, 'register_user']);   // dang ki c2

// dang nhap
Route::prefix('login')->group(function()
{
Route::get('/', [Front\LoginController::class, 'login'])->name('auth.login');
Route::post('/', [Front\CustomerController::class, 'check_login']);
}
);
Route::post('/front/auth/login/store', [Front\LoginController::class, 'store']);
// Route::post('/front/auth/login/store-user', [Front\LoginController::class, 'store_user']);

// dang xuat
Route::get('/logout', [Front\LoginController::class, 'logout']);

// thanh toan vn pay
Route::prefix('checkout')->group(function()
{
    Route::get('/', [Front\CheckOutController::class, 'checkout']);     //trang thong tin thanh toán
    Route::post('/',[Front\CheckOutController::class, 'addOrder']);
    Route::get('/vnPayCheck',[Front\CheckOutController::class,'vnPayCheck']);
    Route::get('/result',[Front\CheckOutController::class,'result']);
});

Route::middleware(['auth'])->group(function(){
    Route::prefix('/admin',[Front\MainController::class,'dashboard'])->name('admin')->group(function()
     {
        // Route::post('/', [Front\OrderController::class, 'show_order']);
        Route::get('/', [Front\OrderController::class, 'pdf_products']);
        Route::get('/', [Front\OrderController::class, 'pdf_orders']);
        Route::get('/', [Front\OrderController::class, 'welcome']);
     });
});
Route::get('/order', [Front\OrderController::class, 'show_order'])->name('admin.table')->middleware('can:show-chart');
Route::post('/order', [Front\OrderController::class, 'show_order'])->middleware('can:show-chart');
                                                                                        // các trang của admin 
Route::get('/info', [Front\MainController::class, 'show_info'])->name('admin.info');
Route::prefix('type')->group(function()
{
Route::get('/', [Front\MainController::class, 'show_type'])->name('admin.type')->middleware('can:show-type');    // show ten loai va thuong hieu 
});
Route::prefix('role')->group(function()
{
Route::get('/', [Front\RoleController::class, 'show_role'])->name('admin.role')->middleware('can:show-role'); // show quyen
});
Route::prefix('comment')->group(function()
{
    Route::get('/', [Front\MainController::class, 'show_comment'])->name('admin.comment')->middleware('can:show-comment');;   // show comment
});

Route::prefix('show-blog')->group(function()
{
    Route::get('/', [Front\BlogController::class, 'show_blog',])->name('admin.blog')->middleware('can:show-blog');   // show blog
});

Route::get('/show-slider', [Front\MainController::class, 'show_slider'])->name('admin.slider')->middleware('can:show-slider');  // show blog

Route::prefix('show-insurance')->group(function()
{
    Route::get('/', [Front\MainController::class, 'show_insurance'])->name('admin.insurance')->middleware('can:show-insurance');   // show bảo hành
});

Route::prefix('show_checkorder')->group(function()
{
    Route::get('/', [Front\MainController::class, 'show_checkorder',])->name('admin.checkorder')->middleware('can:show-checkorder');   // show đơn hàng
});

Route::prefix('show-shipping')->group(function()
{
    Route::get('/', [Front\MainController::class, 'show_shipping',])->name('admin.shipping')->middleware('can:show-shipping');   // show giao hàng
});

Route::prefix('show_customer')->group(function()
{
    Route::get('/', [Front\MainController::class, 'show_customer',])->name('admin.customer')->middleware('can:show-customer');   // show khach hang
});
// Route::get('/show-blog', ['as' => 'admin.blog', 
//                         'uses' =>'Front\BlogController@show_blog',
//                         'middleware' => 'can:show-blog', ])->name('admin.blog');  
                                                                                // quản lí trang sản phẩm admin
Route::prefix('product')->group(function()
{
    Route::get('/', [Front\MainController::class, 'products'])->name('admin.products')->middleware('can:show-product');
    Route::get('/edit-product/{id}', [Front\MainController::class, 'edit_product']);

});
                                                                                                // Sửa / cập nhât trong trang quản li
Route::get('edit-category/{id}', [Front\MainController::class, 'edit_category']);
Route::post('edit-category/{id}',[Front\MainController::class,'update_category']);

Route::get('edit-insurance/{id}', [Front\MainController::class, 'edit_insurance']);
Route::post('edit-insurance/{id}',[Front\MainController::class,'update_insurance']);

Route::get('edit-role/{id}', [Front\MainController::class, 'edit_role']);
Route::post('edit-role/{id}',[Front\MainController::class,'update_role']);

Route::get('edit-brand/{id}', [Front\MainController::class, 'edit_brand']);
Route::post('edit-brand/{id}',[Front\MainController::class,'update_brand']);

Route::get('edit-blogcategory/{id}', [Front\MainController::class, 'edit_blog_category']);
Route::post('edit-blogcategory/{id}',[Front\MainController::class,'update_blog_category']);

Route::get('edit-blog/{id}', [Front\MainController::class, 'edit_blog']);
Route::post('edit-blog/{id}',[Front\MainController::class,'update_blog']);

Route::get('edit-slider/{id}', [Front\MainController::class, 'edit_slider']);
Route::post('edit-slider/{id}',[Front\MainController::class,'update_slider']);

Route::get('edit-product/{id}', [Front\MainController::class, 'edit_product']);
Route::post('edit-product/{id}', [Front\MainController::class, 'update_product']);

Route::get('checkorder/{id}', [Front\MainController::class, 'edit_checkorder']);
Route::post('checkorder/{id}',[Front\MainController::class,'update_checkorder']);

Route::get('transport/{id}', [Front\MainController::class, 'edit_transport']);
Route::post('transport/{id}',[Front\MainController::class,'update_transport']);

Route::get('info-order/{id}', [Front\OrderController::class, 'info_order']);

Route::prefix('show_account')->group(function()
{
    Route::get('/', [Front\MainController::class, 'show_user'])->name('admin.user')->middleware('can:show-user');
    Route::get('/account/{id}', [Front\MainController::class, 'edit_account']); //route chitietsp
});

// trang dashboard

Route::get('/add-brand', [Front\MainController::class, 'add_brand']);   // thêm brand
Route::post('/add-brand', [Front\MainController::class, 'brand']);

Route::get('/add-category', [Front\MainController::class, 'add_category']); // thêm loại sản phẩm
Route::post('/add-category', [Front\MainController::class, 'category']);

Route::get('/add-product', [Front\MainController::class, 'add_product']); // thêm sản phẩm
Route::post('/add-product', [Front\MainController::class, 'product']);

Route::get('/add-admin', [Front\MainController::class, 'add_admin']); // thêm nhan vien
Route::post('/add-admin', [Front\MainController::class, 'admin']);

Route::get('/add-blog-category', [Front\MainController::class, 'add_blog_category']);   // thêm tên loại bài viết
Route::post('/add-blog-category', [Front\MainController::class, 'blog_category']);

Route::get('/add-blog', [Front\MainController::class, 'add_blog']); // thêm bài viết
Route::post('/add-blog', [Front\MainController::class, 'blog']);

Route::get('/add-slider', [Front\MainController::class, 'add_slider']); // thêm bài viết
Route::post('/add-slider', [Front\MainController::class, 'slider']);

Route::get('/add-role', [Front\RoleController::class, 'add_role']); // thêm quyền
Route::post('/add-role', [Front\RoleController::class, 'role']);

Route::get('/add-insurance', [Front\MainController::class, 'add_insurance']); // thêm bao hanh
Route::post('/add-insurance', [Front\MainController::class, 'insurance']);


Route::post('/search', [Front\MapController::class, 'search']);
// chinh sua phan admin
Route::get('/edit-product/{id}', [Front\MainController::class, 'edit_product']);    // chinh sua san pham

// Route::get('/edit-blog/{id}', [Front\MainController::class, 'edit_blog']);          // chinh sua bai viet

// Route::get('/accounts', [Front\MainController::class, 'accounts']);
// Route::get('/show_account', [Front\MainController::class, 'show_account']);


Route::get('delete-product/{id}', [Front\MainController::class, 'delete_product']);     //xóa 1 danh mục sản phẩm
Route::get('delete-user/{id}', [Front\MainController::class, 'delete_user']);        //xóa 1 danh mục sản phẩm
Route::get('delete-brand/{id}', [Front\MainController::class, 'delete_brand']);     //xóa 1 danh mục sản phẩm
Route::get('delete-category/{id}', [Front\MainController::class, 'delete_category']);     //xóa 1 danh mục sản phẩm
Route::get('delete-blog-category/{id}', [Front\MainController::class, 'delete_blog_category']);     //xóa 1 ten loại bai viet
Route::get('delete-blog/{id}', [Front\MainController::class, 'delete_blog']);     //xóa 1 bai viet
Route::get('delete-comment/{id}', [Front\MainController::class, 'delete_comment']);     //xóa 1 binh luan
Route::get('delete-slider/{id}', [Front\MainController::class, 'delete_slider']);     //xóa 1 slide
Route::get('delete-role/{id}', [Front\MainController::class, 'delete_role']);     //xóa 1 bao hanh

Route::get('delete-insurance/{id}', [Front\MainController::class, 'delete_insurance']);     //xóa 1 bao hanh

Route::get('delete-customer/{id}', [Front\MainController::class, 'delete_customer']);     //xóa 1 khách hàng
Route::get('delete-checkorder/{id}', [Front\MainController::class, 'delete_checkorder']);     //xóa 1 don hang

Route::get('/exportpdf', [Front\MainController::class, 'exportpdf'])->name('exportpdf');     //xuất pdf product
Route::get('/ordertpdf', [Front\MainController::class, 'orderpdf'])->name('orderpdf');     //xuất pdf order

Route::get('test-email',[Front\CustomerController::class,'test_email']);
                                                                                    // quen mat khau
Route::get('/forget-password',[Front\CustomerController::class,'forgetPass'])->name('customer.forgetPass');
Route::post('/forget-password',[Front\CustomerController::class,'postforgetPass']);
Route::get('/get-password/{customer}/{token}',[Front\CustomerController::class,'getPass'])->name('customer.getPass');
Route::post('/get-password/{customer}/{token}',[Front\CustomerController::class,'postgetPass']);
Route::get('/get-actived',[Front\CustomerController::class,'getActived'])->name('customer.getActived');
Route::post('/get-actived',[Front\CustomerController::class,'postgetActived']);