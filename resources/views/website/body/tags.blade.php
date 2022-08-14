@php
    $tags_en = \App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
    $tags_ban = \App\Models\Product::groupBy('product_tags_ban')->select('product_tags_ban')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title"> @if(session()->get('language') == 'bangla') প্রোডাক্ট ট্যাগস  @else Product Tags @endif </h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language') == 'bangla')
                @foreach($tags_ban as $tag)
                    <a class="item active" title="Phone" href="{{ route('product.tag', ['tag' => $tag->product_tags_ban]) }}"> {{ str_replace(',', ' ', $tag->product_tags_ban) }}</a>
                @endforeach

            @else
                @foreach($tags_en as $tag)
                    <a class="item active" title="Phone" href="{{ route('product.tag', ['tag' => $tag->product_tags_en]) }}"> {{ str_replace(',', ' ', $tag->product_tags_en)  }}</a>
                @endforeach
            @endif

        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
