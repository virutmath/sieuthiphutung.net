@extends('front.template')

@section('main_content')
    <div id="Content">
        <div class="main-slide-list">

            <div class="pn-Slide-home block_slide">
                <ul id="block_slide" style="width: auto; position: relative;">
                    <li>
                        <a href="http://www.hathanhauto.com/Phu-tung-Mercedes-Benz-provider-c92477144.aspx"
                           target="_blank"
                           title="Phụ t&#249;ng &#244; t&#244; Merecdes, BMW, Audi ch&#237;nh h&#227;ng">
                            <img src="http://www.hathanhauto.com/upload/image/banner/phu-tung-o-to-mercedes-bmw-audi-chinh-hang.jpg"
                                 alt="Phụ t&#249;ng &#244; t&#244; Merecdes, BMW, Audi ch&#237;nh h&#227;ng">
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="Hệ thống 300 garage">
                            <img src="http://www.hathanhauto.com/upload/image/banner/300-garage-oto.jpg"
                                 alt="Hệ thống 300 garage">
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="Miễn ph&#237; vận chuyển">
                            <img src="http://www.hathanhauto.com/upload/image/banner/mien-phi-van-chuyen-phu-tung.jpg"
                                 alt="Miễn ph&#237; vận chuyển">
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="Phục hồi điều khiển động cơ">
                            <img src="http://www.hathanhauto.com/upload/image/banner/phuc-hoi-hop-dieu-khien-dong-co.jpg"
                                 alt="Phục hồi điều khiển động cơ">
                        </a>
                    </li>
                </ul>
                <div class="clr"></div>
            </div>
            <script src="{{ asset('js/slider.min.js') }}"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#block_slide').bxSlider({
                        mode: 'vertical',
                        controls: false,
                        pager: false,
                        auto: true,
                        speed: 500,
                        pause: 5000
                    });
                });
            </script>

            @foreach($brand_list as $brand)
                @include('front.home.product-list',['list_title'=>'Phụ tùng ô tô ' . $brand->name, 'products'=>$brand->product_list])
            @endforeach

            @include('front.home.product-list',['list_title'=>'Có thể bạn quan tâm', 'products'=>$suggest_list])
            @include('front.home.product-list',['list_title'=>'Phụ tùng ô tô mới về', 'products'=>$new_product_list])

            <div class="box-provider-home">
                <div class="ncc-header">
                    <h2>THƯƠNG HIỆU HÀNG ĐẦU</h2>
                </div>
                <div class="ncc-img">
                    @foreach($list_brand_tag as $brand)
                    <a href="#">
                        {{'Phụ tùng ô tô ' . $brand->name}}
                    </a>
                    @endforeach
                    <div class="clr">
                    </div>
                </div>
            </div>


        </div>
    </div>
@stop