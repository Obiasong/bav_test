<table id="product_list" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    @foreach($products as $item)
    <?php
    $div = $div + 1;
    $rt = $div/4;
    $pic = "images/".$item->image;
    // $pic_url = $pic;
     ?>
      @if($div == 0)
      <tr>
      @elif($div != 0 && $rt == 0)
      </tr><tr>
      @endif
      <td>
    <div class="p-6">
        <div class="flex items-center">

            <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5c1.606v100 0 3.332.477 4.5 1.253v13C19.832 18.477 18.333 22 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> -->
        <a href="{!! URL::to('manage_products') !!}"><img height="300px" width="300px" src="{!!asset($pic)!!}"/>
        <br/><b style="text-align: center; font-size: 13px">{!! $item->product !!}</b>
        </a>
      </div>
    </div>
  </td>
    @endforeach
  </tr>
</table>
