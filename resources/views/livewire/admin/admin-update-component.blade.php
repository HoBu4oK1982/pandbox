<div class="container">
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Обновление сайта</h1>
    </div>
    <div class="col-md-12 d-flex">
        <div class="col-md-6">
            <h5><i class="fa fa-upload" aria-hidden="true"></i> Обновление категорий</h5>
            <button type="button" wire:click="updateCategories()" class="btn btn-info">Обновить</button>
            @if(Session::has('message_cat'))
                <div class="alert-success mt-4">{{Session::get('message_cat')}}</div>
            @endif
            @if(Session::has('message_cat_error'))
                <div class="alert-danger mt-4" style="background:#f8d7da;color:#721c24;padding:10px;border:1px solid #f5c6cb;border-radius:4px;">
                    {{Session::get('message_cat_error')}}
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <h5><i class="fa fa-upload" aria-hidden="true" ></i> Обновление продуктов</h5>
            <button type="button" wire:click="updateProducts()" class="btn btn-info">Обновить</button>
            @if(Session::has('message_pro'))
                <div class="alert-success mt-4">{{Session::get('message_pro')}}</div>
            @endif
            @if(Session::has('message_pro_error'))
                <div class="alert-danger mt-4" style="background:#f8d7da;color:#721c24;padding:10px;border:1px solid #f5c6cb;border-radius:4px;">
                    {{Session::get('message_pro_error')}}
                </div>
            @endif
        </div>
    </div>
    <div class="loadingSpinner" wire:loading>
        <svg width="200" height="200" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><style>.spinner_OSmW{transform-origin:center;animation:spinner_T6mA .75s step-end infinite}@keyframes spinner_T6mA{8.3%{transform:rotate(30deg)}16.6%{transform:rotate(60deg)}25%{transform:rotate(90deg)}33.3%{transform:rotate(120deg)}41.6%{transform:rotate(150deg)}50%{transform:rotate(180deg)}58.3%{transform:rotate(210deg)}66.6%{transform:rotate(240deg)}75%{transform:rotate(270deg)}83.3%{transform:rotate(300deg)}91.6%{transform:rotate(330deg)}100%{transform:rotate(360deg)}}</style><g class="spinner_OSmW"><rect x="11" y="1" width="2" height="5" opacity=".14"/><rect x="11" y="1" width="2" height="5" transform="rotate(30 12 12)" opacity=".29"/><rect x="11" y="1" width="2" height="5" transform="rotate(60 12 12)" opacity="1"/><rect x="11" y="1" width="2" height="5" transform="rotate(90 12 12)" opacity=".9"/><rect x="11" y="1" width="2" height="5" transform="rotate(120 12 12)" opacity=".71"/><rect x="11" y="1" width="2" height="5" transform="rotate(150 12 12)" opacity=".86"/><rect x="11" y="1" width="2" height="5" transform="rotate(180 12 12)"/></g></svg>
    </div>
</div>