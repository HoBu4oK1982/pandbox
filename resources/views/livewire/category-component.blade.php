@section ('title', "$category->title купить в Алматы и Казахстане")
<div class="container">
    <div class="shopCategoryWrapper">
        <h1 class="davrTitle">{{$category->title}}</h1>
        <div class="commonBreadcrumbs">
            <ul>
                <li><a wire:navigate href="/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width:18px;height:18px;fill:currentColor;vertical-align:middle;"><path d="M12.71 2.29a1 1 0 0 0-1.42 0l-9 9a1 1 0 0 0 1.42 1.42L4 12.41V20a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.59l.29.3a1 1 0 0 0 1.42-1.42zM10 20v-5h4v5zm8 0h-2v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6H6v-9.59l6-6 6 6z"/></svg></a></li>
                →
                <li><a wire:navigate href="{{ route('shop')}}">Магазин</a></li>
                →
                <li>{{$category->title}}</li>
            </ul>
        </div>
        @if ($products->total() > 0)
        <div class="category__content_wrap">
            <div class="category__filter_categories shop__category_item_top" wire:ignore.self>
                <h4>Подкатегории</h4>
                <ul class="menu">
                    @foreach ($category->children as $child)
                        <li class="menu__item">
                            <a wire:navigate href="{{ route('subcategory', ['slug' => $child->parent->slug, 'subcategory_slug'=>$child->slug])}}">
                                {{ $child->title }}
                            </a>
                            @if (count($child->children) > 0)
                                <button type="button" class="menu__toggle" aria-expanded="false" aria-label="Показать подкатегории {{ $child->title }}"></button>
                                <ul class="menu__item_sub submenu">
                                    @foreach ($child->children as $subchild)
                                        <li>
                                            <a wire:navigate href="{{ route('subsubcategory', ['slug' => $subchild->parent->parent->slug, 'subcategory_slug'=>$subchild->parent->slug , 'subsubcategory_slug'=>$subchild->slug])}}">
                                                {{ $subchild->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="category__products_output_wrap">
                <div class="shopSort">
                    <div class="sort-item orderby ">
                        <select name="orderby" class="use-chosen" wire:model.live="sorting">
                            <option value="deafult" selected="selected">Сортировка по умолчанию</option>
                            <option value="date">Сортировать по новизне</option>
                            <option value="price">Цена: сначала дешевые</option>
                            <option value="price-desc">Цена: сначала дорогие</option>
                        </select>
                    </div>

                    <div class="sort-item product-per-page">
                        <select name="post-per-page" class="use-chosen" wire:model.live="pagesize" >
                            <option value="12">12 на странице</option>
                            <option value="24">24 на странице</option>
                            <option value="32" selected="selected">32 на странице</option>
                            <option value="40">40 на странице</option>
                            <option value="48">48 на странице</option>
                        </select>
                    </div>
                </div>
                <div class="category__products_output">
                    @foreach ($products as $product)
                        @php $new_images = explode(',' , $product->images); @endphp               
                        <a wire:navigate href="{{ route('product.details', ['slug' => $product->slug])}}" class="product__item">
                            <p class="product__item-img-wrap">
                                @if (!empty($new_images) && !empty($new_images[0]))
                                    <img src="{{ asset('assets/images/products/' . $new_images[0]) }}" class="product__item-img" alt="Product Image">
                                @else
                                    <img src="{{ asset('assets/images/design/no-image.jpg') }}" class="product__item-img" alt="No Image">
                                @endif
                            </p>
                            <h4 class="product-title">{!! $product->title !!}</h4>
                            @if ($product->sale_price)
                                <div class="product__item_price_wrap">
                                    <div class="product__item-price red">{{ number_format($product->price, 0, '.', ' '); }}<span>₸</span></div>
                                    <div class="product__item_sale_price">{{ number_format($product->sale_price, 0, '.', ' '); }}<span>₸</span></div>
                                </div>
                            @else
                                <p class="product__item-price">{{ number_format($product->price, 0, '.', ' '); }}<span>₸</span></p>
                            @endif
                            @if ($product->remark === 'sale')
                                <div class="product__item-trend product__item-trend-sale">
                                    Акция
                                </div>
                            @elseif ($product->is_new)
                                <div class="product__item-trend product__item-trend-new">
                                    Новинка
                                </div>
                            @elseif ($product->remark === 'hit')
                                <div class="product__item-trend product__item-trend-hit">
                                    Хит продаж
                                </div>
                            @endif
                        </a>
                    @endforeach
                </div>
                {{ $products->links('pagination-links') }}
                <div class="category__products_categories">
                    <ul>
                        @foreach ($category->children as $child)
                            @if (count($child->children) > 0)                            
                                @foreach ($child->children as $subchild)
                                    <li>
                                        <a wire:navigate href="{{ route('subsubcategory', ['slug' => $subchild->parent->parent->slug, 'subcategory_slug'=>$subchild->parent->slug, 'subsubcategory_slug'=>$subchild->slug])}}">
                                            {{ $subchild->title }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @else
            @include('partials.category-empty-state')
        @endif
        <style>
            .category__filter_categories .menu__item{position:relative}
            .category__filter_categories .menu__item>a{padding-right:42px!important}
            .category__filter_categories .menu__toggle{position:absolute;z-index:20;right:0;top:0;width:38px;height:31px;padding:0;border:0;border-left:1px solid #e1e6e3;color:#17211c;background:transparent;font:400 19px/31px Arial;cursor:pointer;transition:color .2s,background .2s}
            .category__filter_categories .menu__toggle:before{content:'+'}
            .category__filter_categories .menu__toggle.active:before{content:'−'}
            .category__filter_categories .menu__toggle:hover,.category__filter_categories .menu__toggle:focus-visible{color:#fff;background:#159766;outline:0}
        </style>
    </div>
</div>
