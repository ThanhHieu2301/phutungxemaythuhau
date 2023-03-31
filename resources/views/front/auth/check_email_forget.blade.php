<div style="width:600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{$customer->name}}</h2>
        <p>Đây là email hỗ trợ chức năng quên mật khẩu</p>
        <p>Vui lòng nhấn vào nút kích hoạt để lấy mật khẩu</p>
        <p>
            <a href="{{route('customer.getPass',['customer'=> $customer->id, 'token' => $customer->token])}}"
            style="display:inline-block; background: green; color: #fff; padding: 7px 25px; font-weight:bold">Kích hoạt tài khoản</a>
        </p>
    </div>
</div>