<form action="shop">
    <div class="filter-widget">
        <h4 class="fw-title">Loại sản phẩm khác</h4>
        @foreach($categories as $category)
            <ul class="filter-catagories">
                <li><a href="shop/{{$category->name}}">{{$category->name}}</a></li>
            </ul>
        @endforeach
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Thương hiệu</h4>
        <div class="fw-brand-check">
            @foreach($brands as $brand)
            <div class="bc-item">
                <label for="bc-{{$brand->id}}">
                    {{$brand->name}}
                    <input type="checkbox" {{ (request("brand")[$brand->id] ?? '') == 'on' ? 'checked' : ''}} 
                    name="brand[{{$brand->id}}]" id="bc-{{$brand->id}}" onchange="this.form.submit();">
                    <span class="checkmark"></span>
                </label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Giá (VND)</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" name="price_min" id="minamount" >
                    <input type="text" name="price_max" id="maxamount" >
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" 
                                data-min="10000" data-max="500000" 
                                data-min-value="{{str_replace('VND','', request('price_min'))}}" 
                                data-max-value="{{str_replace('VND','', request('price_max'))}}">

                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                    <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div></div>
        </div>
        <button type="submit" class="filter-btn">Xác nhận</button>
    </div>
</form>