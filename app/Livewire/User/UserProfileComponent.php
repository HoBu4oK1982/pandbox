<?php

namespace App\Livewire\User;

use Livewire\Component;

class UserProfileComponent extends Component
{
    public string $name = '';
    public string $phone = '';
    public string $city = '';
    public bool $editing = false;
    public bool $saved = false;

    public function mount(): void
    {
        $this->fillFromUser();
    }

    public function startEditing(): void
    {
        $this->resetValidation();
        $this->saved = false;
        $this->fillFromUser();
        $this->editing = true;
    }

    public function cancelEditing(): void
    {
        $this->resetValidation();
        $this->fillFromUser();
        $this->editing = false;
    }

    public function saveProfile(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'phone' => ['required', 'string', 'min:7', 'max:30'],
            'city' => ['required', 'string', 'min:2', 'max:100'],
        ], [
            'name.required' => 'Укажите имя.',
            'name.min' => 'Имя должно содержать минимум 2 символа.',
            'phone.required' => 'Укажите номер телефона.',
            'phone.min' => 'Проверьте номер телефона.',
            'city.required' => 'Укажите город.',
        ]);

        $user = auth()->user();
        $user->name = trim($validated['name']);
        $user->phone = trim($validated['phone']);
        $user->city = trim($validated['city']);
        $user->save();

        $this->fillFromUser();
        $this->editing = false;
        $this->saved = true;
    }

    private function fillFromUser(): void
    {
        $user = auth()->user();
        $this->name = (string) $user->name;
        $this->phone = (string) ($user->phone ?? '');
        $this->city = (string) ($user->city ?? '');
    }

    public function render()
    {
        return view('livewire.user.user-profile-component')->layout('layouts.base');
    }
}
