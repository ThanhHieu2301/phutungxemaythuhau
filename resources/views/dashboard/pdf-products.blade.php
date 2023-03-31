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

<h1>Bảng thông tin chi tiết sản phẩm</h1>

<table id="customers">
    <thead>
    <tr>
        <th>#</th>
        <th>Tên sản phẩm</th>
        <th>Giá nhập</th>
        <th>Giá bán</th>
        <th>Số lượng</th>
        <!-- <th>Trạng thái</th> -->
        <th>Loại sản phẩm</th>
        <th>Hãng sản xuất</th>
    </thead>
    <tbody>
    @foreach($show_products as $show_product)
        <tr>
            <td>{{$show_product->id}}</td>
            <td>{{$show_product->name}}</td>
            <td>{{$show_product->investment}} VND</td>
            <td>{{number_format($show_product->price)}} VND</td>
            <td>{{number_format($show_product->qty)}}</td>
            <!-- <td> @if ($show_product->featured == 1)
                        <a>Hiện</a>
                @else
                    <a>Ẩn</a>
                @endif</td> -->
            <td>{{$show_product->productCategory->name}}</td>
            <td>{{$show_product->brand->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>


