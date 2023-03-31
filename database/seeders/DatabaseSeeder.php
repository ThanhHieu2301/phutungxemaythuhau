<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'hieu',
                'email' => 'hieu@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => 1234567890,
                'role_id' => 2,
            ],
            [
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => 1234567890,
                'role_id' => 1,
                // 'level' => 1,
            ],
            [
                'id' => 3,
                'name' => 'shipper',
                'email' => 'shipper@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => 1234567890,
                'role_id' => 4,
                // 'level' => 1,
            ],
        ]);
        DB::table('customers')->insert([
            [
                'id' => 1,
                'name' => 'hieu',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456'),
                'status' => 1,
                'token' => '4DCI1COEZV',
            ],
        ]);


        DB::table('brands')->insert([
            [
                'name' => 'Caltex',
                'image' => 'uploads/logo-11.png',
            ],
            [
                'name' => 'Castrol',
                'image' => 'uploads/logo-44.png',
            ],
            [
                'name' => 'Maxxis',
                'image' => 'uploads/logo-22.png',
            ],
            [
                'name' => 'SRT',
                'image' => 'uploads/logo-55.png',
            ],
            [
                'name' => 'Shell',
                'image' => 'uploads/logo-33.png',
            ],
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'Lốp xe',
            ],
            [
                'name' => 'Dầu nhớt',
            ],
            [
                'name' => 'Nhông sên',
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'CALTEX HAVOLINE 4T 20W50 0,8 LÍT',
                'description' => 'ádasf',
                'investment' => 42000,
                'price' => 62000,
                'qty' => 20,
                'image' => 'CALTEX HAVOLINE 4T 20W50 0,8 LÍT.jpg',
                'featured' => true,
            ],
            [
                'id' => 2,
                'brand_id' => 2,
                'product_category_id' => 2,
                'name' => 'castrol số',
                'description' => null,
                'investment' => 32000,
                'price' =>42000,
                'qty' => 20,
                'image' => 'castrol số.jpg',
                'featured' => true,
            ],
            [
                'id' => 3,
                'brand_id' => 3,
                'product_category_id' => 1,
                'name' => 'chengshin 8090-14',
                'description' => null,
                'investment' => 180000,
                'price' => 213000,
                'qty' => 20,
                'image' => 'chengshin 8090-14.jpg',
                'featured' => true,
            ],
            [
                'id' => 4,
                'brand_id' => 4,
                'product_category_id' => 1,
                'name' => 'maxxis 8090-17 ko ruot',
                'description' => null,
                'investment' => 200000,
                'price' => 264000,
                'qty' => 20,
                'image' => 'maxxis 8090-17 ko ruot.jpg',
                'featured' => true,
            ],

            [
                'id' => 5,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => "irc 8090-14",
                'description' => null,
                'investment' => 120000,
                'price' => 153000,
                'qty' => 20,
                'image' => 'irc 8090-14.jpg',
                'featured' => true,
            ],
            [
                'id' => 6,
                'brand_id' => 1,
                'product_category_id' => 3,
                'name' => 'srt exciter135',
                'description' => null,
                'investment' => 110000,
                'price' => 142000,
                'qty' => 20,
                'image' => 'srt exciter135.jpg',
                'featured' => true,
            ],
            [
                'id' => 7,
                'brand_id' => 1,
                'product_category_id' => 3,
                'name' => 'srt exciter150',
                'description' => null,
                'investment' => 180000,
                'price' => 221000,
                'qty' => 20,
                'image' => 'srt exciter150.jpg',
                'featured' => true,
            ],
            [
                'id' => 8,
                'brand_id' => 1,
                'product_category_id' => 3,
                'name' => 'sirius taka',
                'description' => null,
                'investment' => 100000,
                'price' => 129000,
                'qty' => 20,
                'image' => 'sirius taka.jpg',
                'featured' => true,
            ],
            [
                'id' => 9,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'castrol 4t 1lit',
                'description' => null,
                'investment' => 89000,
                'price' => 114000,
                'qty' => 4,
                'image' => 'castrol 4t 1lit.jpg',
                'featured' => true,
            ],
        ]);

        // DB::table('product_details')->insert([
        //     [
        //         'product_id' => 1,
        //         'qty' => 5,
        //     ],
        //     [
        //         'product_id' => 1,
        //         'qty' => 5,
        //     ],
        //     [
        //         'product_id' => 1,
        //         'qty' => 5,
        //     ],
        //     [
        //         'product_id' => 1,
        //         'qty' => 5,
        //     ],
        //     [
        //         'product_id' => 1,
        //         'qty' => 0,
        //     ],
        //     [
        //         'product_id' => 1,
        //         'qty' => 0,
        //     ],
        // ]);

        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'customer_id' => 1,
                'name' => 'Brandon Kelley',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
            [
                'product_id' => 2,
                'customer_id' => 1,
                'name' => 'Roy Banks',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
        ]);
        DB::table('blog_categories')->insert([
            [
                'id' => 1,
                'name' => 'Kinh Nghiệm',
            ],
            [
                'id' => 2,
                'name' => 'Thông tin',
            ],
        ]);
        DB::table('blogs')->insert([
            [
                'id' => 1,
                'title' => 'Cách đọc thông số vỏ xe máy, các ký hiệu nói lên điều gì?',
                'blog_category_id' => 2,
                'image' => 'uploads/16542155451653729304blog2.jpg',
                'description' => 'Ký hiệu theo độ bẹt
                Ví dụ như thông số: 100/70 – 17 M/C 49P:
                100: là bề rộng của lốp, tính bằng mm.
                70: là % chiều cao của lốp so với bề rộng của lốp. Như vậy ở đây chiều cao của lốp là: 90%*70 = 63 mm
                17: là đường kính danh nghĩa của vành và được tính bằng đơn vị inchs.
                M/C: viết tắt của từ tiếng Anh MotorCycle
                49: là kí hiệu của khả năng chịu tải (Số 49 ở đây không phải là lốp xe chịu tải được 49 kg. 49 là một chỉ số, tương ứng với chỉ số là số kg chịu tải, xem bảng chỉ số ở dưới).               
                P: là kí hiệu của tốc độ tối đa cho phép. Theo quy ước, chữ P chỉ ra rằng lốp này có thể vận hành ở tốc độ tối đa 150 km/h. Tuy nhiên, thông số này không phải trên lốp nào cũng có do không bắt buộc. Phân loại tốc độ dành cho lốp xe thể hiện bằng các chữ cái, ví dụ như ký hiệu B tương ứng với tốc độ tối đa là 50km/h, J (100km/h), L (120km/h)... Bạn có thể tham khảo ở bảng dưới để biết lốp xe máy của mình chạy được tốc độ tối đa cho phép là bao nhiêu.           
                Thông thường, chỉ số về trọng tải và tốc độ được in cùng nhau, ngay sau thông số về kích thước. Chẳng hạn 49P cho biết lốp này chịu được trọng tải 185kg và nó được xếp ở tốc độ "P" (150km/h).',
                'content' => 'Hiểu được các thông số ghi trên vỏ xe máy sẽ giúp bạn dễ dàng hơn trong việc chọn vỏ thay, hoặc biết được tốc độ tối đa cho phép cũng như khả năng chịu tải của vỏ xe.  Nhiều người vẫn thường không mấy để ý đến các thông số được ghi trên vỏ chiếc xe máy mà họ đang đi hằng ngày. Thực tế, hiểu được nó sẽ giúp bạn dễ dàng hơn trong việc chọn vỏ thay hoặc biết được tốc độ tối đa cho phép cũng như khả năng chịu tải của vỏ xe.',
            ],
            [
                'id' => 2,
                'title' => 'Dầu nhớt và những điều căn bản với dân đi xe máy',
                'blog_category_id' => 2,
                'image' => 'uploads/1654742495blog1.jpg',
                'description' => 'Ký hiệu theo độ bẹt
                Ví dụ như thông số: 100/70 – 17 M/C 49P:
                100: là bề rộng của lốp, tính bằng mm.
                70: là % chiều cao của lốp so với bề rộng của lốp. Như vậy ở đây chiều cao của lốp là: 90%*70 = 63 mm
                17: là đường kính danh nghĩa của vành và được tính bằng đơn vị inchs.
                M/C: viết tắt của từ tiếng Anh MotorCycle
                49: là kí hiệu của khả năng chịu tải (Số 49 ở đây không phải là lốp xe chịu tải được 49 kg. 49 là một chỉ số, tương ứng với chỉ số là số kg chịu tải, xem bảng chỉ số ở dưới).               
                P: là kí hiệu của tốc độ tối đa cho phép. Theo quy ước, chữ P chỉ ra rằng lốp này có thể vận hành ở tốc độ tối đa 150 km/h. Tuy nhiên, thông số này không phải trên lốp nào cũng có do không bắt buộc. Phân loại tốc độ dành cho lốp xe thể hiện bằng các chữ cái, ví dụ như ký hiệu B tương ứng với tốc độ tối đa là 50km/h, J (100km/h), L (120km/h)... Bạn có thể tham khảo ở bảng dưới để biết lốp xe máy của mình chạy được tốc độ tối đa cho phép là bao nhiêu.           
                Thông thường, chỉ số về trọng tải và tốc độ được in cùng nhau, ngay sau thông số về kích thước. Chẳng hạn 49P cho biết lốp này chịu được trọng tải 185kg và nó được xếp ở tốc độ "P" (150km/h).',
                'content' => 'Có một số ý kiến cho rằng, dầu nhớt cao cấp đồng nghĩa với việc phải mang xe đi thay dầu ít hơn. Tâm lý này hoàn toàn sai. Tuy dầu nhớt cao cấp chuyên dụng có khả năng bảo vệ động cơ tốt nhưng khi xe đã đi đủ số km và cần phải thay. Chúng ta vẫn cần kiểm tra động cơ và thay dầu như bình thường bạn nhé',
            ],
            [
                'id' => 3,
                'title' => 'Kinh nghiệm mua xe máy cũ an toàn cho những ai không “sành” xe',
                'blog_category_id' => 1,
                'image' => 'uploads/1654752520blog3.jpg',
                'description' => 'Để chọn được một chiếc xe máy cũ an toàn, chất lượng bạn cần trang bị cho chính mình kinh nghiệm mua xe máy. Trước khi đi vào tìm hiểu cách đánh giá chi tiết các bộ phận trên chiếc xe máy cũ, chúng ta cùng nhau tìm hiểu các đánh giá tổng quan một chiếc xe đã qua sử dụng nhé.

                Để dễ quan sát, bạn cần dựng chân chống giữa của xe và quan sát tổng quan các chi tiết và từng bộ phận của xe, chúng phải đồng bộ với nhau. Từ màu sơn, cấu trúc vỏ xe, gầm xe, thân xe….đều phải cùng tình trạng, không được cũ mới lẫn lộn.
                
                
                
                Dựng đứng chân chống giữa và quan sát tổng thể của xe
                
                Nếu một chiếc xe đã qua sử dụng nhưng một số chi tiết quan trọng của xe lại quá mới, phụ kiện này là từ nhà sản xuất Yamaha nhưng chi tiết kia lại của hãng Honda. Điều này chứng minh rằng chiếc xe đó có thể đã từng gặp tai nạn và “luộc đồ”.
                
                Cách đánh giá sơ bộ này từ kinh nghiệm mua xe máy cũ sẽ giúp bạn có cái nhìn tổng quan chính xác về chiếc xe cũ và bạn không phải mất thời gian để kiểm tra thật chi tiết.
                
                Sau khi đánh giá tổng quan chiếc xe và đưa ra quyết định cơ bản, chúng ta cùng nhau tìm hiểu kinh nghiệm mua xe máy cũ qua đánh giá chi tiết chiếc xe cũ bạn có ý định mua nhé..',
                'content' => 'Tóm lại là nên trả giá xe, có thể tìm một số chi tiết lốp mòn, dàn áo bị trầy xước….để người bán bớt một ít tiền sửa chữa, tân trang...như vậy vẫn có lợi hơn mà, đúng không! 

                Trên đây là một số kinh nghiệm mua xe máy cũ bạn có thể bỏ túi cho mình khi cần. Nên mua một chiếc xe mà bạn biết rõ nguồn gốc, lai lịch xe. Hãy dẫn một người am hiểu về xe đi cùng bạn để đảm bảo lựa chọn một chiếc xe cũ chất lượng nhé.',
            ],
        ]);
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'name' => 'admin_user',
                'display_name' => 'Quản lí nhân viên',
            ],
            [
                'id' => 2,
                'name' => 'admin_product',
                'display_name' => 'Quản lí sản phẩm',
            ],
            [
                'id' => 3,
                'name' => 'admin_role',
                'display_name' => 'Quản lí quyền nhân viên',
            ],
            [
                'id' => 4,
                'name' => 'admin_type',
                'display_name' => 'Quản lí hãng và loại sản phẩm',
            ],
            [
                'id' => 5,
                'name' => 'admin_comment',
                'display_name' => 'Quản lí bình luận',
            ],
            [
                'id' => 6,
                'name' => 'admin_blog',
                'display_name' => 'Quản lí bài viết',
            ],
            [
                'id' => 7,
                'name' => 'admin_chart',
                'display_name' => 'Quản lí thống kê',
            ],
            [
                'id' => 8,
                'name' => 'admin_insurance',
                'display_name' => 'Quản lí bảo hành',
            ],
            [
                'id' => 9,
                'name' => 'admin_slider',
                'display_name' => 'Quản lí slide',
            ],
            [
                'id' => 10,
                'name' => 'admin_checkorder',
                'display_name' => 'Quản lí duyệt đơn hàng',
            ],
            [
                'id' => 11,
                'name' => 'admin_customer',
                'display_name' => 'Quản lí tài khoản khách hàng',
            ],
            [
                'id' => 12,
                'name' => 'admin_shipping',
                'display_name' => 'Giao hàng',
            ],
           
        ]);
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Quản lí',
            ],
            [
                'id' => 2,
                'name' => 'Quản lí Sản phẩm',
            ],
            [
                'id' => 3,
                'name' => 'Chăm sóc khách hàng',
            ],
            [
                'id' => 4,
                'name' => 'Giao Hàng',
            ],
        ]);
        DB::table('orders')->insert([
            [
                'id' => 1,
                'full_name' => 'Trần A',
                'email' => 'kh1@gmail.com',
                'phone' => '012345678',
                'district' => 'Ninh Hoa',
                'city' => 'Khanh Hoa',
                'street_address' => 'so nha 01',
                'zip' => '01',
                'payment_type' =>'pay_later',
                'created_at' => '2022-04-03 09:13:17',
                'updated_at' => '2022-04-03 09:13:17',
            ],
            [
                'id' => 2,
                'full_name' => 'Trần B',
                'email' => 'kh2@gmail.com',
                'phone' => '012345678',
                'district' => 'Ninh Hoa',
                'city' => 'Khanh Hoa',
                'street_address' => 'so nha 01',
                'zip' => '01',
                'payment_type' =>'pay_later',
                'created_at' => '2022-06-03 09:13:17',
                'updated_at' => '2022-06-03 09:13:17',
            ],
        ]);
        DB::table('order_details')->insert([
            [
                'id' => 1,
                'order_id' => 1,
                'product_id' => 3,
                'qty' => 1,
                'total' => 213000,
                'created_at' => '2022-04-03 09:13:17',
                'updated_at' => '2022-04-03 09:13:17',
            ],
            [
                'id' => 2,
                'order_id' => 2,
                'product_id' => 1,
                'qty' => 2,
                'total' => 124000,
                'created_at' => '2022-06-03 09:13:17',
                'updated_at' => '2022-06-03 09:13:17',
            ],
        ]);
        DB::table('sliders')->insert([
            [
                'id' => 1,
                'image' => 'uploads/1654499321hero-1.jpg',
            ],
            [
                'id' => 2,
                'image' => 'uploads/1654619636hero-2.jpg',
            ],
        ]);
        DB::table('role_permission')->insert([
            [
                'id' => 1,
                'role_id' => 3,
                'permission_id' => 5,
            ],
            [
                'id' => 2,
                'role_id' => '3',
                'permission_id' => '6',
            ],
            [
                'id' => 3,
                'role_id' => '2',
                'permission_id' => '2',
            ],
            [
                'id' => 4,
                'role_id' => '2',
                'permission_id' => '4',
            ],
            [
                'id' => 5,
                'role_id' => '2',
                'permission_id' => '9',
            ],
            [
                'id' => 6,
                'role_id' => '1',
                'permission_id' => '1',
            ],
            [
                'id' => 7,
                'role_id' => '1',
                'permission_id' => '2',
            ],
            [
                'id' => 8,
                'role_id' => '1',
                'permission_id' => '3',
            ],
            [
                'id' => 9,
                'role_id' => '1',
                'permission_id' => '4',
            ],
            [
                'id' => 10,
                'role_id' => '1',
                'permission_id' => '5',
            ],
            [
                'id' => 11,
                'role_id' => '1',
                'permission_id' => '6',
            ],
            [
                'id' => 12,
                'role_id' => '1',
                'permission_id' => '7',
            ],
            [
                'id' => 13,
                'role_id' => '1',
                'permission_id' => '8',
            ],
            [
                'id' => 14,
                'role_id' => '1',
                'permission_id' => '9',
            ],
            [
                'id' => 15,
                'role_id' => '1',
                'permission_id' => '10',
            ],
            [
                'id' => 16,
                'role_id' => '1',
                'permission_id' => '11',
            ],
            [
                'id' => 17,
                'role_id' => '4',
                'permission_id' => '12',
            ],
        ]);
    }
}

