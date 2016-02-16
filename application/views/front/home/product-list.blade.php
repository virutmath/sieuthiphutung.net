<div class="p-item-list">
    <h2>
        <a href="http://www.hathanhauto.com/thuong-hieu/phu-tung-o-to-mercedes-benz">
            {{$list_title}}
        </a>
    </h2>
    <ul id="p-list" class="p-list-border">
        @foreach($products as $product)
        <li>
            <span class="wrap-item-f">
                <div class="divItem">
                    <a href="http://www.hathanhauto.com/binh-dau-tro-luc-lai-xe-mercedes-c300-nam-2009-chinh-hang">
                        <img src="http://www.hathanhauto.com/upload/images/2d9jn1quak920421402422300_logo.jpg?width=165&amp;amp;height=165"
                             alt="{{$product->name}}">
                    </a>
                </div>
            </span>
            <span class="wrap-item-s">
                <h3>
                    <a href="http://www.hathanhauto.com/binh-dau-tro-luc-lai-xe-mercedes-c300-nam-2009-chinh-hang">
                        {{$product->name}}
                    </a>
                </h3>
            </span>
            <span class='wrap-item-t'>Xuất xứ: <span>{{ $product->originals ? $product->originals->name : ''}}</span></span>
            <span class="wrap-item-t">Giá: <b>{{ $product->price ? $product->price : 'Vui lòng liên hệ' }}</b></span>
        </li>
        @endforeach
    </ul>
</div>