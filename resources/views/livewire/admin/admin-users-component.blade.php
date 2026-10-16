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
        <h1 class="h3 mb-0 text-gray-800">Пользователи</h1>
    </div>

    <div class="row">
        <div class="card mx-auto w-100">

            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success mt-2">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        {{-- поиск: только здесь wire:model.live, как ты и просил --}}
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input
                                    type="search"
                                    class="form-control mb-2"
                                    id="userSearchInput"
                                    placeholder="Поиск по имени, email или телефону"
                                    wire:model.live.debounce.500ms="searchTerm"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        {{-- сюда можно потом добавить "Создать пользователя" --}}
                    </div>
                </div>
            </div>

            <div class="card-body">

                <table class="table table-striped table-hover text-center align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Email</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Город</th>
                            <th scope="col">Роли</th>
                            <th scope="col">Статус</th>
                            <th scope="col" style="width: 260px;">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ?? '—' }}</td>
                                <td>{{ $user->city ?? '—' }}</td>
                                <td>
                                    @php
                                        $roles = $user->getRoleNames();
                                    @endphp
                                    @if($roles->isNotEmpty())
                                        {{ $roles->implode(', ') }}
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->is_active)
                                        <span class="badge badge-success">Включен</span>
                                    @else
                                        <span class="badge badge-danger">Отключен</span>
                                    @endif
                                </td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-primary mb-1"
                                        wire:click="editUser({{ $user->id }})"
                                    >
                                        Редактировать
                                    </button>

                                    @if($user->is_active)
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-danger mb-1"
                                            wire:click="toggleUserStatus({{ $user->id }})"
                                        >
                                            Отключить
                                        </button>
                                    @else
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-success mb-1"
                                            wire:click="toggleUserStatus({{ $user->id }})"
                                        >
                                            Включить
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <span class="text-muted">Пользователи не найдены.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $users->links('pagination-links') }}

                @if($editUserId)
                    <hr>
                    <h5 class="mb-3">Редактирование пользователя #{{ $editUserId }}</h5>

                    <form wire:submit.prevent="updateUser">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="editName">Имя</label>
                                <input
                                    type="text"
                                    id="editName"
                                    class="form-control"
                                    wire:model="name"
                                >
                                @error('name')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="editEmail">Email</label>
                                <input
                                    type="email"
                                    id="editEmail"
                                    class="form-control"
                                    wire:model="email"
                                >
                                @error('email')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="editPhone">Телефон</label>
                                <input
                                    type="text"
                                    id="editPhone"
                                    class="form-control"
                                    wire:model="phone"
                                >
                                @error('phone')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="editCity">Город</label>
                                <input
                                    type="text"
                                    id="editCity"
                                    class="form-control"
                                    wire:model="city"
                                >
                                @error('city')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="editIsActive">Статус</label>
                                <select
                                    id="editIsActive"
                                    class="form-control"
                                    wire:model="is_active"
                                >
                                    <option value="1">Включен</option>
                                    <option value="0">Отключен</option>
                                </select>
                                @error('is_active')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">
                                Сохранить
                            </button>
                            <button type="button" class="btn btn-secondary" wire:click="cancelEdit">
                                Отмена
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="loadingSpinner" wire:loading>
        <div class="d-flex justify-content-center align-items-center" style="min-height: 80px;">
            <div class="spinner-border" role="status">
                <span class="sr-only">Загрузка...</span>
            </div>
        </div>
    </div>
</div>
