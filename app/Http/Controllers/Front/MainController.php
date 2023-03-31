<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\BrandSevice;
use App\Http\Services\Menu\MenuSevice;
use App\Http\Services\Menu\ProductSevice;
use App\Http\Services\Menu\AdminSevice;
use App\Http\Services\Menu\BlogCategorySevice;
use App\Http\Services\Menu\BlogSevice;
use App\Http\Services\Menu\RoleSevice;
use App\Http\Services\Menu\SliderSevice;
use App\Http\Services\Menu\InsuranceSevice;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Insurance;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use App\Models\Slider;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as IlluminateValidationValidator;
use PDF;
class MainController extends Controller
{
    private $__uploads='uploads';

    protected $menuService;
    protected $brandService;
    protected $productService;
    protected $adminService;
    protected $blogcategoryService;
    protected $blogService;
    protected $roleService;

    public function __construct(MenuSevice $menuService, BrandSevice $brandService, ProductSevice $productService, AdminSevice $adminService, BlogCategorySevice $blogcategoryService, BlogSevice $blogService, RoleSevice $roleService )
    {
        $this->menuService = $menuService;
        $this->brandService = $brandService;
        $this->productService = $productService;
        $this->adminService = $adminService;
        $this->blogcategoryService = $blogcategoryService;
        $this->blogService = $blogService;
        $this->roleService = $roleService;
    }
    //
    public function dashboard(){
        return view('dashboard.index');
    }


    public function products(Request $request){
        $order_detail = OrderDetail::where('check_qty', 0)->get();

        for($i=0; $i < $order_detail->count(); $i++){
            $product_id = Product::where('id',$order_detail[$i]->product_id)->first();
            $pro_qty = $product_id->qty;
            $order_qty = $order_detail[$i]->qty;
            $qty = $pro_qty - $order_qty;
            $product_id->qty = $qty;
            $product_id->save();

            $order_detail[$i]->check_qty = 1;
            $order_detail[$i]->save();
        }

        $cats = ProductCategory::orderBy('name','ASC')->select('id','name')->get();
        $bras = Brand::orderBy('name','ASC')->select('id','name')->get();
        $pro_categories = ProductCategory::all();

        $show_products = Product::all();
        $show_brands = Brand::all();

        if($request->has('search'))
        {
            $show_products= Product::where('name', 'like', '%' .$request->search . '%')->paginate(8);
        }else
        {
            $show_products = Product::paginate(8);
        }

        // $search = $request->search ?? '';
        // $products = Product::where('name', 'like', '%' .$search . '%'); //search

        return view('dashboard.product.products', compact('pro_categories','show_products','show_brands','cats','bras'));
    }


    public function show_user(Request $request){

        $show_users = User::all();
        $roles = Role::orderBy('name','ASC')->select('id','name')->get();

        if($request->has('search_acc'))
        {
            $show_users = User::where('name', 'like', '%' .$request->search_acc . '%')->paginate(8);
        }else
        {
            $show_users =  User::paginate(8);
        }

        return view('dashboard.show-account', compact('show_users','roles'));   //hien thi user
    }

    public function show_order(){
        $show_orders = OrderDetail::all();
        return view('dashboard.index', compact('show_orders'));     // hien thi don hang
    }
    public function show_info(){

        return view('dashboard.info');     // hien thi don hang
    }
    public function show_brand(){
        $show_brands = Brand::all();
        return view('dashboard.show-brand',compact('show_brands'));      // hien thi thuong hieu
    }
    public function show_type(Request $request){
        $show_products = Product::all();
        $show_brands = Brand::all();
        $pro_categories = ProductCategory::all();
        if($request->has('search_brand'))
        {
            $show_brands = Brand::where('name', 'like', '%' .$request->search_brand . '%')->paginate(4);
        }else
        {
            $show_brands =  Brand::paginate(4);
        }

        if($request->has('search_cate'))
        {
            $pro_categories = ProductCategory::where('name', 'like', '%' .$request->search_cate. '%')->paginate(4);
        }else
        {
            $pro_categories =  ProductCategory::paginate(4);
        }
        return view('dashboard.type', compact('pro_categories','show_products','show_brands'));     // hien thi don hang
    }

    public function show_orderdetail(){
        $show_orderdetails = Order::all();
        return view('dashboard.index', compact('show_orderdetails'));     // hien thi nguoi mua
    }

    public function show_comment(Request $request){

        $show_comments = ProductComment::all();

        if($request->has('search_ad_comment'))
        {
            $show_comments = ProductComment::where('messages', 'like', '%' .$request->search_ad_comment . '%')->paginate(8);
        }else
        {
            $show_comments =  ProductComment::paginate(8);
        }
        return view('dashboard.show-comment', compact('show_comments'));   //hien thi binh luan khach hang
    }

    public function show_blog(Request $request){

        $show_blogs = Blog::all();
        $show_blog_categories = BlogCategory::all();
        return view('dashboard.show-blog', compact('show_blogs','show_blog_categories'));   //hien thi bai viet blog
    }

    public function show_slider(){

        $show_sliders = Slider::all();
        return view('dashboard.show-slider', compact('show_sliders'));   //hien thi binh luan khach hang
    }

    public function show_customer(){

        $show_customers = Customer::all();
        return view('dashboard.show-customer', compact('show_customers'));   //hien thi binh luan khach hang
    }

    public function show_checkorder(Request $request){

        $show_orders = OrderDetail::orderBy('product_id','ASC')->select('id','product_id')->get();
        // $orders = OrderDetail::all();
        $show_orderdetails = Order::all();
        return view('dashboard.show-checkorder', compact('show_orders','show_orderdetails'));   // xac nhan don hang
    }

    public function show_shipping(Request $request){

        $show_orders = OrderDetail::orderByDesc('id')->get();
        $show_orderdetails = Order::where('check_shipping',true)->get();
        return view('dashboard.show-shipping', compact('show_orders','show_orderdetails'));   // xac nhan don hang
    }

    public function show_insurance(Request $request){

        $show_insurances = Insurance::all();
        if($request->has('search_ad_insurance'))
        {
            $show_insurances = Insurance::where('barcode', 'like', '%' .$request->search_ad_insurance . '%')->paginate(8);
        }else
        {
            $show_insurances =  Insurance::paginate(8);
        }
        return view('dashboard.show-insurance', compact('show_insurances'));   //hien thi bao hanh san pham
    }

    public function add_product(Request $request){

        $cats = ProductCategory::orderBy('name','ASC')->select('id','name')->get();     //them san pham
        $bras = Brand::orderBy('name','ASC')->select('id','name')->get();
        return view('dashboard.add-product',compact('cats','bras'));
    }
    public function add_brand(){
        return view('dashboard.add-brand'); //sang trang them hang san xuat
    }
    public function add_category(){
        return view('dashboard.add-category');  //sang trang them loai san pham
    }
    public function add_admin(){
        $roles = Role::orderBy('name','ASC')->select('id','name')->get();
        return view('dashboard.accounts',compact('roles'));  // sang trang them nhan vien
    }
    public function add_blog_category(){
        return view('dashboard.add-blog-category');  // sang trang them nhan vien
    }
    public function add_blog(){
        $blogcates = BlogCategory::orderBy('name','ASC')->select('id','name')->get();  // sang trang them bai viet blog
        return view('dashboard.add-blog',compact('blogcates'));
    }
    public function add_slider(){
        return view('dashboard.add-slider');  // sang trang them slide
    }
    public function add_insurance(){
        $cates = ProductCategory::orderBy('name','ASC')->select('id','name')->get();
        return view('dashboard.add-insurance',compact('cates'));  // sang trang bao hanh san pham
    }

                                                            // cap nhat loai san pham
    public function edit_category($id){
        $products = ProductCategory::find($id);
        return view('dashboard.edit-category',['products'=>$products]);
    }
    public function update_category(Request $request){
        $products= ProductCategory::find($request->id);
        $products->name=$request->name;
        $products->save();
        return redirect()->back();
    }

    public function edit_checkorder($id){
        $checkorders = Order::find($id);
        $orders = OrderDetail::all();
        return view('dashboard.checkorder',['checkorders'=>$checkorders],compact('orders'));
    }
    public function update_checkorder(Request $request){
        $checkorders = Order::find($request->id);
        $checkorders ->check_shipping=$request->check_shipping;
        $checkorders->save();
        return Redirect::to('/show_checkorder');
    }

    public function edit_transport($id){
        $checkorders = Order::find($id);
        $orders = OrderDetail::all();
        return view('dashboard.transport',['checkorders'=>$checkorders],compact('orders'));
    }
    public function update_transport(Request $request){
        $checkorders = Order::find($request->id);
        $checkorders ->transport=$request->transport;
        $checkorders->save();
        return Redirect::to('/show-shipping');
    }
                                                            //cap nhat bao hanh
    public function edit_insurance($id){
        $cates = ProductCategory::orderBy('name','ASC')->select('id','name')->get();
        $insurances = Insurance::find($id);
        return view('dashboard.edit-insurance',['insurances'=>$insurances],compact('cates'));
    }
    public function update_insurance(Request $request){
        $insurances = Insurance::find($request->id);
        $insurances->barcode=$request->barcode;
        $insurances->category_id=$request->category_id;
        $insurances->time_start=$request->time_start;
        $insurances->time_end=$request->time_end;
        $insurances->save();
        return Redirect::to('/show-insurance');
    }
                                                            // cap nhat quyen
    public function edit_role($id){

        $permissions = Permission::all();
        $roles = Role::find($id);
        return view('dashboard.edit-role',['roles'=>$roles],compact('permissions'));
    }
    public function update_role(Request $request){
        $roles = Role::find($request->id);
        $roles ->name=$request->name;
        $roles->permissions()->attach($request->permission_id);
        $roles ->save();
        return redirect()->back();
    }
                                                            // cap nhat hang sx
    public function edit_brand($id){
        $brands = Brand::find($id);
        return view('dashboard.edit-brand',['brands'=>$brands]);
    }
    public function update_brand(Request $request){
        $brands = Brand::find($request->id);
        $brands ->name=$request->name;
        $brands ->save();
        return redirect()->back();
    }
                                                        // cap nhat the loai blog
    public function edit_blog_category($id){
        $blog_categories = BlogCategory::find($id);
        return view('dashboard.edit-blogcategory',['blog_categories'=>$blog_categories]);
    }
    public function update_blog_category(Request $request){
        $blog_categories = BlogCategory::find($request->id);
        $blog_categories ->name=$request->name;
        $blog_categories ->save();
        return redirect()->back();
    }
                                                                        // cap nhat blog
    public function edit_blog($id){
        $blogcates = BlogCategory::orderBy('name','ASC')->select('id','name')->get();
        $blogs = Blog::find($id);
        return view('dashboard.edit-blog',['blogs'=>$blogs],compact('blogcates'));
    }
    public function update_blog(Request $request){
        $blogs = Blog::find($request->id);
        $blogs ->name=$request->name;
        if(isset($image))
        {
            $blogs->image = $image;
        }
        $blogs ->blog_category_id=$request->blog_category_id;
        $blogs ->description=$request->description;
        $blogs ->title=$request->title;
        $blogs ->save();
        return redirect()->back();
    }
                                                                            //cap nhat slide
    public function edit_slider($id){
        $sliders = Slider::find($id);
        return view('dashboard.edit-slider',['sliders'=>$sliders]);
    }
    public function update_slider(Request $request){
        $sliders =Slider::find($request->id);
        $sliders ->title=$request->title;
        $sliders ->description=$request->description;
        if(isset($image))
        {
            $sliders->image = $image;
        }
        $sliders ->save();
        return redirect()->back();
    }

    public function edit_product($id){
        $cats = ProductCategory::orderBy('name','ASC')->select('id','name')->get();
        $bras = Brand::orderBy('name','ASC')->select('id','name')->get();
        $datas = Product::find($id);
        return view('dashboard.edit-product',['datas'=>$datas],compact('cats','bras'));

    }
    public function update_product(Request $request){
        $products= Product::find($request->id);
        $products->name=$request->name;
        $products->brand_id = $request->brand_id;
        $products->product_category_id = $request->product_category_id;
        $products->description=$request->description;
        $products->qty=$request->qty;
        if(isset($image))
        {
            $products->image = $image;
        }
        $products->investment=$request->investment;
        $products->price=$request->price;
        $products->save();
        return redirect()->back();
    }

    public function edit_account($id){
        $accounts= User::find($id);
        return view('dashboard.edit-account',['accounts'=>$accounts]);
    }


    // public function accounts(){
    //     return view('dashboard.accounts');
    // }
    public function show_account(){
        return view('dashboard.show-account');
    }

    public function category(CreateFormRequest $request)
    {
         $this->menuService->create($request);     // thêm loại sản phẩm
        return redirect()->back();
    }
    public function brand(Request $request)
    {
            $name=$request->input('name');
            $image='';

            if($request->file('image')){
                $rules = array('image' => 'mimes:jpg,jpeg,png|required|max:1500');
                $file = $request->file('image');
                $files = array('image' => $file);
                $getClientOriginalName=$file->getClientOriginalName();
                $validator = Validator::make($files,$rules);

                if($validator->fails()) {
                    Session::flash('error-message','Không thể upload ảnh');
                }
                else{
                    $fileName =time().$file->getClientOriginalName();
                    $destinationPath = $this->__uploads;
                    $fileLocation =  $destinationPath.'/'.$fileName;
                    $file->move($destinationPath, $fileName);
                    $image=$fileLocation;
                }
            }
            $brands = new Brand;
            $brands->name = $name;
            $brands->image = $image;
            $brands->save();

            return Redirect::to('/type');
        }
    public function admin(CreateFormRequest $request)
    {
         $this->adminService->create($request);     // thêm nhân viên
        return redirect()->back();
    }
    public function insurance(Request $request)
    {
        $barcode=$request->input('barcode');
        $time_start=$request->input('time_start');
        $time_end=$request->input('time_end');
        $category_id=$request->input('category_id');

        $slider = new Insurance();
        $slider->barcode = $barcode;
        $slider->time_start = $time_start;
        $slider->time_end = $time_end;
        $slider->category_id = $category_id;
        $slider->save();

        return Redirect::to('/show-insurance');
    }
    public function blog_category(CreateFormRequest $request)
    {
         $this->blogcategoryService->create($request);     // thêm thể loại blog
        return redirect()->back();
    }

    public function blog(Request $request)
    {
        $title=$request->input('title');
        $description=$request->input('description');
        $content=$request->input('content');
        $blog_category_id=$request->input('blog_category_id');
        $image='';

        if($request->file('image')){
            $rules = array('image' => 'mimes:jpg,jpeg,png|required|max:1500');
            $file = $request->file('image');
            $files = array('image' => $file);
            $getClientOriginalName=$file->getClientOriginalName();
            $validator = Validator::make($files,$rules);

            if($validator->fails()) {
                Session::flash('error-message','Không thể upload ảnh');
            }
            else{
                $fileName =time().$file->getClientOriginalName();
                $destinationPath = $this->__uploads;
                $fileLocation =  $destinationPath.'/'.$fileName;
                $file->move($destinationPath, $fileName);
                $image=$fileLocation;
            }
        }
        $blog = new Blog;
        $blog->title = $title;
        $blog->description = $description;
        $blog->content = $content;
        $blog->image = $image;
        $blog->blog_category_id = $blog_category_id;
        $blog->save();

        return Redirect::to('/show-blog');
    }

    public function product(CreateFormRequest $request)
    {

        if($request->has('file_upload')){
            $file = $request->file_upload;

            $ext = $request->file_upload->extension();
            // $file_name = $file->getClientoriginalName();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('front/img/products'), $file_name);

        }
        $request->merge(['image' => $file_name]);       // them ảnh sản phẩm
        // dd($request->all());
         $this->productService->create($request);     // thêm sản phẩm
        return redirect()->back();
    }

    public function slider(Request $request)
    {
        $title=$request->input('title');
        $description=$request->input('description');
        $image='';

        if($request->file('image')){
            $rules = array('image' => 'mimes:jpg,jpeg,png|required|max:1500');
            $file = $request->file('image');
            $files = array('image' => $file);
            $getClientOriginalName=$file->getClientOriginalName();
            $validator = Validator::make($files,$rules);

            if($validator->fails()) {
                Session::flash('error-message','Không thể upload ảnh');
            }
            else{
                $fileName =time().$file->getClientOriginalName();
                $destinationPath = $this->__uploads;
                $fileLocation =  $destinationPath.'/'.$fileName;
                $file->move($destinationPath, $fileName);
                $image=$fileLocation;
            }
        }
        $slider = new Slider;
        $slider->title = $title;
        $slider->description = $description;
        $slider->image = $image;
        $slider->save();

        return Redirect::to('/show-slider');
    }

    public function delete_product(Request $request){
        DB::table('products')->where('id', $request->id)->delete();
        return back();
    }
    public function delete_user(Request $request){
        DB::table('users')->where('id', $request->id)->delete();
        return back();
    }
    public function delete_brand(Request $request){
        DB::table('brands')->where('id', $request->id)->delete();
        return back();
    }
    public function delete_category(Request $request){
        DB::table('product_categories')->where('id', $request->id)->delete();
        return back();
    }
    public function delete_comment(Request $request){
        DB::table('product_comments')->where('id', $request->id)->delete();
        return back();
    }
    public function delete_blog_category(Request $request){
        DB::table('blog_categories')->where('id', $request->id)->delete();
        return back();
    }
    public function delete_blog(Request $request){
        DB::table('blogs')->where('id', $request->id)->delete();
        return back();
    }
    public function delete_slider(Request $request){
        DB::table('sliders')->where('id', $request->id)->delete();
        return back();
    }
    public function delete_insurance(Request $request){
        DB::table('insurances')->where('id', $request->id)->delete();
        return back();
    }
    public function delete_role(Request $request){
        DB::table('roles')->where('id', $request->id)->delete();
        return back();
    }
    public function delete_customer(Request $request){
        DB::table('customers')->where('id', $request->id)->delete();
        return back();
    }

    public function delete_checkorder(Request $request){
        DB::table('orders')->where('id', $request->id)->delete();
        return back();
    }

    public function exportpdf (){
        $show_products = Product::all();
        $pdf = PDF::loadView("dashboard.pdf-products", compact('show_products'));
        return $pdf->download("product.pdf");
        }

    public function orderpdf (){
        $show_orders = Order::all();
        $pdf = PDF::loadView("dashboard.pdf-orders", compact('show_orders'));
        return $pdf->download("order.pdf");
        }

}
