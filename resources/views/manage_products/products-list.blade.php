<table id="product_list" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>
    <tr>
        <th data-priority="1">{{trans('product/product.sn')}}</th>
        <th data-priority="2">@lang('product/product.title')</th>
        <th data-priority="2">@lang('product/product.description')</th>
        <th data-priority="2">@lang('product/product.cost')</th>
        <th data-priority="2">@lang('product/product.image')</th>
        <th data-priority="3">@lang('product/product.action')</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sn = 1;
    ?>
    @foreach($products as $item)
        <tr>
            <td>
                {!! $sn++ !!}
            </td>
            <td>
                {{$item->product}}
            </td>
            <td>
                {{$item->description}}
            </td>
            <td>
                {{$item->cost}}
            </td>
            <td>
              <?php
              $pic = "images/".$item->image;
              // $pic_url = $pic;
               ?>
                <img height="100px" width="100px" src="{!!asset($pic)!!}"/>
            </td>
            <td>
                <div class="flex items-center justify-end mt-4">
                <!-- Button trigger modal -->
                <form method="POST" action="{{ url('/manage_products/edit_product') }}">
                    @csrf
                  <input type="hidden" name="product_id" id="product_id" value="{{$item->id}}">
                  <x-jet-button class="ml-2 btn-primary" type="submit">
                      @lang('product/product.edit')
                  </x-jet-button>
                </form>
                <form method="POST" action="{{ url('manage_products/delete') }}">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="{{$item->id}}">
                    <x-jet-button class="ml-2" type="submit" style="background-color: red">
                        @lang('product/product.delete')
                    </x-jet-button>
                </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
