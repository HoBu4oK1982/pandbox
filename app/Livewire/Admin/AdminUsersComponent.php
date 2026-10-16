<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUsersComponent extends Component
{
    use WithPagination;

    public $searchTerm;

    public $editUserId = null;
    public $name;
    public $email;
    public $phone;
    public $city;
    public $is_active = true;

    // правила валидации под редактирование
    protected function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->editUserId),
            ],
            'phone'     => ['nullable', 'string', 'max:255'],
            'city'      => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ];
    }

    protected $messages = [
        'name.required'  => 'Введите имя пользователя',
        'email.required' => 'Введите email',
        'email.email'    => 'Некорректный формат email',
    ];

    public function editUser(int $userId): void
    {
        $user = User::findOrFail($userId);

        $this->editUserId = $user->id;
        $this->name       = $user->name;
        $this->email      = $user->email;
        $this->phone      = $user->phone;
        $this->city       = $user->city;
        $this->is_active  = (bool) $user->is_active;
    }

    public function cancelEdit(): void
    {
        $this->reset([
            'editUserId',
            'name',
            'email',
            'phone',
            'city',
            'is_active',
        ]);
        $this->resetValidation();
    }

    public function updateUser(): void
    {
        if (!$this->editUserId) {
            return;
        }

        $validated = $this->validate();

        $user = User::findOrFail($this->editUserId);

        $user->name      = $validated['name'];
        $user->email     = $validated['email'];
        $user->phone     = $validated['phone'] ?? null;
        $user->city      = $validated['city'] ?? null;
        $user->is_active = $validated['is_active'] ?? false;

        $user->save();

        session()->flash('message', 'Пользователь успешно обновлён');

        $this->cancelEdit();
    }

    public function toggleUserStatus(int $userId): void
    {
        $user = User::findOrFail($userId);

        // на всякий случай — не даём отключить самого себя
        if (auth()->id() === $user->id) {
            session()->flash('message', 'Нельзя отключить самого себя');
            return;
        }

        $user->is_active = !$user->is_active;
        $user->save();

        session()->flash(
            'message',
            'Пользователь ' . $user->email . ' ' . ($user->is_active ? 'включён' : 'отключён')
        );
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';

        $users = User::query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', $search)
                      ->orWhere('email', 'LIKE', $search)
                      ->orWhere('phone', 'LIKE', $search);
            })
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('livewire.admin.admin-users-component', [
            'users' => $users,
        ])->layout('layouts.admin');
    }
}
