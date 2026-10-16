<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Обновить категорию
                        </div>
                        <div class="col-md-6">
                            <a wire:navigate class="btn btn-info float-right" href="{{ route('admin.categories')}}">Все категории</a>
                        </div>
                    </div>
                </h5>
                <div class="card-body">
                    <form wire:submit.prevent="updateCategory"> 
                        <div class="form-group">
                            <label for="exampleFormControlInput">Название категории</label>
                            <input type="text" class="form-control" disabled id="exampleFormControlInput" wire:model="title" />
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput">Транслит</label>
                            <input type="text" class="form-control" disabled id="exampleFormControlInput" wire:model="slug" />
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlFile">Изображение для обложки</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile" wire:model="newimage" />
                            @if ($newimage)
                                <img src="{{$newimage->temporaryUrl()}}" width="120" alt="" />
                            @else
                                <img src="{{asset('assets/images/categories')}}/{{$image}}" width="120" alt="" />
                            @endif
                        </div>
                        <p class="green remark">Размер изображения должен быть 265px х 230px</p>


                        <div class="form-group">
                            <label for="exampleFormControlInput">Meta заголовок</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" wire:model="meta_title">
                        </div>   

                        <div class="form-group">
                            <label for="exampleFormControlTextarea">Meta ключевые слова</label>
                            <textarea class="form-control" id="exampleFormControlTextarea" wire:model="meta_keywords" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea">Meta описание</label>
                            <textarea class="form-control" id="exampleFormControlTextarea" wire:model="meta_description" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Обновить</button>
                    </form>
                </div>
              </div>            
        </div>
    </div>
</div>