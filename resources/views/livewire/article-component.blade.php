@section ('title', "Новости страйкбола в Казахстане")
<div class="container">
    <div class="shopCategoryWrapper">
        <h1 class="davrTitle">{{$article->title}}</h1>
        <div class="commonBreadcrumbs">
            <ul>
                <li><a wire:navigate href="/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width:18px;height:18px;fill:currentColor;vertical-align:middle;"><path d="M12.71 2.29a1 1 0 0 0-1.42 0l-9 9a1 1 0 0 0 1.42 1.42L4 12.41V20a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.59l.29.3a1 1 0 0 0 1.42-1.42zM10 20v-5h4v5zm8 0h-2v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6H6v-9.59l6-6 6 6z"/></svg></a></li>
                →
                <li><a wire:navigate href="{{ route('articles')}}">Новости страйкбола в Казахстане</a></li>
                →
                <li>{{$article->title}}</li>
            </ul>
        </div>
        <div class="artice__content_wrap">
            <div class="article__image_wrap">
                <img src="{{asset('assets/images/articles')}}/{{$article->image}}" alt="{{$article->title}}" />
            </div>
            <div class="article__content">
                {!!$article->description!!}
            </div>
        </div>
    </div>
</div>