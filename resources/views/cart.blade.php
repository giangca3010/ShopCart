@if(isset($newCart->products))
    <div class="select-items">
        <table>
            <tbody>
            @foreach($newCart->products as $item)
                <tr>
                    <td class="si-pic"><img src="asset/img/products/{{$item['productInfo']->img}}" alt="">
                    </td>
                    <td class="si-text">
                        <div class="product-selected">
                            <p>{{number_format($item['productInfo']->price)}} VND x {{ $item['quanty'] }}</p>
                            <h6>{{$item['productInfo']->name}}</h6>
                        </div>
                    </td>
                    <td class="si-close">
                        <i class="ti-close" data-id="{{ $item['productInfo']->id }}"></i>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
<div class="select-total">
    <span>total:</span>
    <h5>{{ number_format($newCart->totalPrice) ?? 0 }} VND</h5>
</div>
@endif

