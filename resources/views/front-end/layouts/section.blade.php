@foreach ($categories as $key => $value)
    <section>
        <div class="row" >
            <div class="col s12 " style="padding: 0">
                <div class="home-header">
                    <h2>
                        <a href="{{ route('viewCategory',$value->id) }}">{{$value->category_name}}</a>
                    </h2>
                    <ul class="">
                        @if (count($categoriesChild)>0)
                            @foreach ($categoriesChild[$value->id] as $keyChild => $elementChild)
                                <li>
                                    <a href="{{ route('viewCategory',$elementChild->id) }}">{{$elementChild->category_name}}</a>
                                </li>
                                @if ($keyChild==4) 
                                    @break
                                @endif
                            @endforeach
                        @endif
                        <li class="last">
                            <a href="{{ route('viewCategory',$value->id) }}">
                                <strong>Tất cả Sách</strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="box-sizing:content-box;border: 1px solid #dfdfdf;">
            <ul id="tabs-swipe-demo" class="tabs tabs-fixed-width" style="box-sizing:content-box;border-bottom: 1px solid #dfdfdf;">
                <li class="tab col s2"><a href="#category-{{$value->id}}-swipe-0">Sách mới</a></li>
                <li class="tab col s2"><a href="#category-{{$value->id}}-swipe-1">Bán chạy</a></li>
                <li class="tab col s2"><a href="#category-{{$value->id}}-swipe-2">Gợi ý</a></li>
            </ul>
            @php
                $array=array();
                $array[]=$booksNew[$value->id];
                $array[]=$booksHot[$value->id];
                $array[]=$booksSuggest[$value->id];
            @endphp
            @foreach ($array as $key => $element)
                <div id="category-{{$value->id}}-swipe-{{$key}}" class="col s12 l12 m12">
                    @foreach ($element as $keyBook => $book)
                        @include('front-end.layouts.one-book')
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
@endforeach
