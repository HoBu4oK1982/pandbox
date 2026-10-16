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
                <li><a wire:navigate href="{{ route('category', ['slug' => $category->parent->slug])}}">{{$category->parent->title}}</a></li>
                →
                <li>{{$category->title}}</li>
            </ul>
        </div>
        @if ($products->total() > 0)
        <div class="subcategory__content_wrap">
            <div class="subcategory__filter_categories shop__category_item_top" wire:ignore.self>
                @if ($subCategories->count() > 0)
                    <h4>Подкатегории</h4>
                    <ul class="menu">
                        @foreach ($subCategories as $subCategory)
                            <li>
                                <a wire:navigate href="{{ route('subsubcategory', ['slug' => $subCategory->parent->parent->slug, 'subcategory_slug'=>$subCategory->parent->slug , 'subsubcategory_slug'=>$subCategory->slug])}}">
                                    {{ $subCategory->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <h4>Выберите фильтры</h4>
                    <h5><span>от {{$minValue}}₸ - до {{$maxValue}}₸</span></h5>
                    <div class="sliderPriceWrap">
                        <div 
                            id="sliderPrice"
                            wire:ignore 
                            data-start="{{ $minValue }}" 
                            data-end="{{ $maxValue }}" 
                            data-min="{{ $minValue}}" 
                            data-max="{{ $maxValue }}" 
                            data-target="price"
                        >
                        </div>
                    </div>
                    <button type="button" class="pb-price-filter-apply" data-pb-price-filter-apply>Применить</button>
                @endif
            </div>
            <div class="subcategory__products_output_wrap">
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
                <div class="subcategory__products_output">
                    @foreach($products as $product)
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
            </div>                    
        </div>
        @else
            @include('partials.category-empty-state')
        @endif
    </div>
</div>

@push('scripts')
<script data-navigate-once>
    (function () {
    if(window.__pbPriceSliderBooted)return;
    window.__pbPriceSliderBooted=true;

    function initPriceSlider(){
        var slider=document.getElementById('sliderPrice');
        if(!slider||typeof noUiSlider==='undefined')return;

        /* Уничтожаем существующий слайдер, если он остался от предыдущей навигации */
        if(slider.noUiSlider){
            slider.noUiSlider.destroy();
        }

        noUiSlider.create(slider, {
            start: [slider.dataset.start, slider.dataset.end],
            connect: true,
            range: {
                'min': [parseFloat(slider.dataset.min)],
                'max': [parseFloat(slider.dataset.max)]
            },
            format: {
                to: function(value){ return parseInt(value); },
                from: function(value){ return parseInt(value); }
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            }
        });

        slider.noUiSlider.on('change', function(value){
            slider.dataset.pendingMin=Number(value[0]);
            slider.dataset.pendingMax=Number(value[1]);
        });

        var applyButton=slider.closest('.subcategory__filter_categories,.category__filter_categories');
        applyButton=applyButton&&applyButton.querySelector('[data-pb-price-filter-apply]');
        if(applyButton&&!applyButton.dataset.pbBound){
            applyButton.dataset.pbBound='1';
            applyButton.addEventListener('click',function(){
                if(slider.dataset.pendingMin===undefined)return;
                var owner=slider.closest('[wire\\:id]');
                var id=owner&&owner.getAttribute('wire:id');
                var component=id&&window.Livewire&&typeof Livewire.find==='function'?Livewire.find(id):null;
                if(component)component.call('updatePriceRange',Number(slider.dataset.pendingMin),Number(slider.dataset.pendingMax));
                delete slider.dataset.pendingMin;
                delete slider.dataset.pendingMax;
            });
        }
    }

    initPriceSlider();
    document.addEventListener('livewire:navigated',function(){
        requestAnimationFrame(initPriceSlider);
    });
    })();
</script>
@endpush
