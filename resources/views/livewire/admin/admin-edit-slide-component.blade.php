<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Редактирование слайда
                        </div>
                        <div class="col-md-6">
                            <a wire:navigate class="btn btn-info float-right" href="{{ route('admin.slides')}}">Все слайды</a>
                        </div>
                    </div>
                </h5>
                <div class="card-body">
                    <form wire:submit.prevent="updateSlide">

                        <div class="form-group">
                            <label for="exampleFormControlInput">Ссылка</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" wire:model="link" />
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile">Изображение для слайда</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile" wire:model="newimage" />
                            <span class="green__info">1000px на 450px - формат JPEG или JPG</span>
                            @if($newimage) <!--If new image was used-->
                                <img src="{{$newimage->temporaryUrl()}}" alt="" width='150' />
                            @else
                                <img src="{{asset('assets/images/slides')}}/{{$image}}" alt="" width='150' />
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect">Статус</label>
                            <select class="form-control" id="exampleFormControlSelect" wire:model="status" >
                                <option value="0">Включен</option>
                                <option value="1">Выключен</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Обновить</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>


