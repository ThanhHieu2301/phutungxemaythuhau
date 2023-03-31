<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
</head>
<body>

<h1>Bảng thông tin chi tiết đơn hàng</h1>

<table id="customers">
    <thead>
    <tr>
        <th>#</th>
        <th>Khách hàng</th>
        <th>Sản phẩm</th>
        <th>Tình trạng đơn hàng</th>
        <th>Ngày mua</th>
    </thead>
    <tbody>
    @foreach($show_orders as $show_order)
        <tr>
            <td>{{$show_order->id}}</td>
            <td>{{$show_order->full_name}}</td>
            <td>
                @foreach($show_order->product_order as $product)
                    {{$product->pivot->qty}} x {{$product->name}} - {{number_format($product->pivot->total)}} VND<br>
                @endforeach
            </td>
            <td>@if ($show_order->check_shipping == 1)
            @if ($show_order->transport == 1)
            <a>Đã giao hàng</a>
            @else 
                <a>Đang vận chuyển</a>
            @endif
        @else 
            <a>Chưa duyệt</a>
        @endif</td>
        <td>{{$show_order->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>


