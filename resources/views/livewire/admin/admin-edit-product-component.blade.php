<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <h5 class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Обновление товара
                        </div>
                        <div class="col-md-6">
                            <a wire:navigate class="btn btn-info float-right" href="{{ route('admin.products') }}">
                                Все товары
                            </a>
                        </div>
                    </div>
                </h5>

                <div class="card-body">
                    <form wire:submit.prevent="updateProduct">
                        {{-- Табы --}}
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active"
                                   id="pills-home-tab"
                                   data-toggle="pill"
                                   href="#pills-home"
                                   role="tab"
                                   aria-controls="pills-home"
                                   aria-selected="true">
                                    Основное
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link"
                                   id="pills-gallery-tab"
                                   data-toggle="pill"
                                   href="#pills-gallery"
                                   role="tab"
                                   aria-controls="pills-gallery"
                                   aria-selected="false">
                                    Галерея продукта
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link"
                                   id="pills-seo-tab"
                                   data-toggle="pill"
                                   href="#pills-seo"
                                   role="tab"
                                   aria-controls="pills-seo"
                                   aria-selected="false">
                                    SEO
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            {{-- Вкладка "Основное" --}}
                            <div class="tab-pane fade show active"
                                 id="pills-home"
                                 role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="titleInput">Название товара</label>
                                        <input type="text"
                                               class="form-control"
                                               id="titleInput"
                                               wire:model="title"
                                               disabled="disabled" />
                                    </div>

                                    <div class="form-group">
                                        <label for="priceInput">Цена товара</label>
                                        <input type="text"
                                               class="form-control"
                                               id="priceInput"
                                               wire:model="price"
                                               disabled="disabled" />
                                    </div>

                                    <div class="form-group">
                                        <label for="qtyInput">Количество товара</label>
                                        <input type="text"
                                               class="form-control"
                                               id="qtyInput"
                                               wire:model="qty"
                                               disabled="disabled" />
                                    </div>

                                    <div class="form-group">
                                        <label for="salePriceInput">Цена по скидке</label>
                                        <input type="text"
                                               class="form-control"
                                               id="salePriceInput"
                                               wire:model="sale_price" />
                                        @error('sale_price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="remarkInput">Тип товара</label>
                                        <input type="text"
                                               class="form-control"
                                               id="remarkInput"
                                               wire:model="remark" />
                                        <p class="green remark mb-1">Варианты: <strong>sale, hit, new</strong></p>
                                        <small class="text-muted d-block">
                                            <strong>new</strong> — новинка (будет показан шильдик и включится таймер срока новинки).
                                        </small>
                                        @error('remark')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Дата окончания статуса "Новинка" --}}
                                    @if($remark === 'new')
                                        <div class="form-group">
                                            <label for="newUntilInput">Новинка до</label>
                                            <input type="date"
                                                   class="form-control"
                                                   id="newUntilInput"
                                                   wire:model="new_until" />
                                            <small class="form-text text-muted">
                                                Если дату не указать, при сохранении автоматически поставится
                                                <strong>+1 месяц</strong> от текущей даты.
                                            </small>
                                            @error('new_until')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endif

                                    {{-- Дата старта акции --}}
                                    @if($remark === 'sale')
                                        <div class="form-group">
                                            <label for="saleFromInput">Акция с</label>
                                            <input type="date"
                                                   class="form-control"
                                                   id="saleFromInput"
                                                   wire:model="sale_from" />
                                            <small class="form-text text-muted">
                                                Дата, когда товар стал акционным. Используется для сортировки на странице
                                                <strong>/sales</strong> — свежие акции сверху. Если не указать, при сохранении
                                                поставится <strong>сегодняшняя дата</strong>.
                                            </small>
                                            @error('sale_from')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="statusSelect">Статус</label>
                                        <select class="form-control"
                                                id="statusSelect"
                                                wire:model="status">
                                            <option value="0">Активен</option>
                                            <option value="1">Неактивен</option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="descriptionTextarea">Описание товара</label>
                                        <textarea class="form-control"
                                                  id="descriptionTextarea"
                                                  rows="5"
                                                  wire:model="description"></textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Вкладка "Галерея продукта" --}}
                            <div class="tab-pane fade"
                                 id="pills-gallery"
                                 role="tabpanel"
                                 aria-labelledby="pills-gallery-tab">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">
                                            Галерея продукта
                                        </label>

                                        <div class="col-md-8">
                                            <input type="file"
                                                   class="form-control-file"
                                                   wire:model="newimage"
                                                   multiple />
                                            @error('newimage')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <div class="mt-3">
                                                {{-- Новые загруженные изображения (превью) --}}
                                                @if($newimage)
                                                    @foreach($newimage as $img)
                                                        @if($img)
                                                            <img src="{{ $img->temporaryUrl() }}"
                                                                 alt=""
                                                                 width="120"
                                                                 class="mr-2 mb-2" />
                                                        @endif
                                                    @endforeach
                                                {{-- Старые изображения из БД --}}
                                                @elseif (!empty($images) && is_array($images))
                                                    @foreach($images as $image)
                                                        @if($image)
                                                            <img src="{{ asset('assets/images/products') }}/{{ $image }}"
                                                                 alt=""
                                                                 width="120"
                                                                 class="mr-2 mb-2">
                                                        @endif
                                                    @endforeach
                                                @elseif (!empty($images) && is_string($images))
                                                    <img src="{{ asset('assets/images/products') }}/{{ $images }}"
                                                         alt=""
                                                         width="120"
                                                         class="mr-2 mb-2">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Вкладка "SEO" --}}
                            <div class="tab-pane fade"
                                 id="pills-seo"
                                 role="tabpanel"
                                 aria-labelledby="pills-seo-tab">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="metaTitleInput">Meta заголовок</label>
                                        <input type="text"
                                               class="form-control"
                                               id="metaTitleInput"
                                               wire:model="meta_title">
                                        @error('meta_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="metaKeywordsTextarea">Meta ключевые слова</label>
                                        <textarea class="form-control"
                                                  id="metaKeywordsTextarea"
                                                  rows="3"
                                                  wire:model="meta_keywords"></textarea>
                                        @error('meta_keywords')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="metaDescriptionTextarea">Meta описание</label>
                                        <textarea class="form-control"
                                                  id="metaDescriptionTextarea"
                                                  rows="3"
                                                  wire:model="meta_description"></textarea>
                                        @error('meta_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mb-3">
                                Обновить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
