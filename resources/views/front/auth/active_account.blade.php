<div style="width:600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{$customer->name}}</h2>
        <p>Bạn đã đăng kí tài khoản thành công</p>
        <p>Vui lòng nhấn vào nút kích hoạt để sử dụng các dịch vụ của trang web</p>
        <p>
            <a href="{{route('customer.actived',['customer'=> $customer->id, 'token' => $customer->token])}}"
            style="display:inline-block; background: green; color: #fff; padding: 7px 25px; font-weight:bold">Kích hoạt tài khoản</a>
        </p>
    </div>
</div>