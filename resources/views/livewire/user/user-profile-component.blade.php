@section('title', 'Pandbox — мой профиль')
<x-user-account-shell
    section-title="Мой профиль"
    section-code="PBX / CLIENT PROFILE"
    description="Контактные данные, которые используются для связи и оформления заказов."
>
    <div class="pb-account-section-head">
        <div><span>PBX / PERSONAL DATA</span><h2>Данные профиля</h2></div>
        <div class="pb-profile-head-actions">
            <p>Проверьте, что информация актуальна — она помогает быстрее оформить доставку.</p>
            @if(!$editing)<button type="button" wire:click="startEditing">Редактировать</button>@endif
        </div>
    </div>

    @if($saved)
        <div class="pb-profile-success pb-account-enter" role="status"><svg viewBox="0 0 24 24"><path d="M12 2 20 5v6c0 5-3.4 9-8 11-4.6-2-8-6-8-11V5z"/><path d="m8 12 2.5 2.5L16 9"/></svg><span><b>Данные сохранены</b><small>Новые данные уже будут подставляться при оформлении заказа.</small></span></div>
    @endif

    <div class="pb-profile-layout">
        <div class="pb-profile-card pb-account-enter">
            <span class="pb-profile-card__code">PBX / IDENTIFICATION</span>
            <div class="pb-profile-avatar">{{ mb_strtoupper(mb_substr($name, 0, 1)) }}</div>
            <h3>{{ $name }}</h3>
            <p>Клиент Pandbox.kz</p>
            <i>ID {{ str_pad((string) auth()->id(), 5, '0', STR_PAD_LEFT) }}</i>
        </div>
        @if($editing)
            <form wire:submit="saveProfile" class="pb-profile-editor pb-account-enter">
                <div class="pb-profile-editor__title"><span>PBX / EDIT MODE</span><h3>Редактирование данных</h3><p>E-mail привязан к аккаунту и здесь не изменяется.</p></div>

                <label @class(['pb-profile-field', 'has-error' => $errors->has('name')])>
                    <span>Имя</span>
                    <div><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c.8-5 3.5-7.5 8-7.5s7.2 2.5 8 7.5"/></svg><input type="text" wire:model="name" autocomplete="name"></div>
                    @error('name')<small>{{ $message }}</small>@enderror
                </label>

                <label @class(['pb-profile-field', 'has-error' => $errors->has('phone')])>
                    <span>Телефон</span>
                    <div><svg viewBox="0 0 24 24"><path d="M6.5 3H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-2.5a1 1 0 0 0-.8-1l-4-1a1 1 0 0 0-1 .3l-.9 1.1a14 14 0 0 1-7.2-7.2l1.1-.9a1 1 0 0 0 .3-1l-1-4A1 1 0 0 0 6.5 3Z"/></svg><input type="tel" class="art-stranger" wire:model="phone" autocomplete="tel" placeholder="+7 (___) ___-__-__"></div>
                    @error('phone')<small>{{ $message }}</small>@enderror
                </label>

                <label class="pb-profile-field pb-profile-field--locked">
                    <span>E-mail</span>
                    <div><svg viewBox="0 0 24 24"><path d="M3 5h18v14H3zM4 7l8 6 8-6"/></svg><input type="email" value="{{ auth()->user()->email }}" readonly tabindex="-1"></div>
                    <small>Изменение e-mail отключено</small>
                </label>

                <label @class(['pb-profile-field', 'has-error' => $errors->has('city')])>
                    <span>Город</span>
                    <div><svg viewBox="0 0 24 24"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg><input type="text" wire:model="city" autocomplete="address-level2" placeholder="Алматы"></div>
                    @error('city')<small>{{ $message }}</small>@enderror
                </label>

                <div class="pb-profile-editor__actions">
                    <button type="button" wire:click="cancelEditing" class="pb-profile-cancel">Отмена</button>
                    <button type="submit" class="pb-profile-save" wire:loading.attr="disabled" wire:target="saveProfile"><span wire:loading.remove wire:target="saveProfile">Сохранить изменения</span><span wire:loading wire:target="saveProfile">Сохраняем…</span><svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></svg></button>
                </div>
            </form>
        @else
            <div class="pb-profile-data pb-account-enter">
                <div><span><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c.8-5 3.5-7.5 8-7.5s7.2 2.5 8 7.5"/></svg></span><small>Имя</small><strong>{{ $name }}</strong></div>
                <div><span><svg viewBox="0 0 24 24"><path d="M6.5 3H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-2.5a1 1 0 0 0-.8-1l-4-1a1 1 0 0 0-1 .3l-.9 1.1a14 14 0 0 1-7.2-7.2l1.1-.9a1 1 0 0 0 .3-1l-1-4A1 1 0 0 0 6.5 3Z"/></svg></span><small>Телефон</small><strong>{{ $phone ?: 'Не указан' }}</strong></div>
                <div><span><svg viewBox="0 0 24 24"><path d="M3 5h18v14H3zM4 7l8 6 8-6"/></svg></span><small>E-mail</small><strong>{{ auth()->user()->email }}</strong></div>
                <div><span><svg viewBox="0 0 24 24"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg></span><small>Город</small><strong>{{ $city ?: 'Не указан' }}</strong></div>
            </div>
        @endif
    </div>
    <div class="pb-profile-note pb-account-enter"><svg viewBox="0 0 24 24"><path d="M12 2 20 5v6c0 5-3.4 9-8 11-4.6-2-8-6-8-11V5z"/><path d="m8 12 2.5 2.5L16 9"/></svg><div><strong>Ваши данные защищены</strong><p>Мы используем контактную информацию только для обработки заказов и связи с вами.</p></div></div>

    <style>
        .pb-profile-layout{display:grid;grid-template-columns:270px minmax(0,1fr);gap:18px}.pb-profile-card{position:relative;min-height:340px;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:25px;color:#fff;text-align:center;background:radial-gradient(circle at 50% 35%,rgba(55,223,157,.2),transparent 30%),linear-gradient(145deg,#111d16,#07100b);border:1px solid rgba(24,189,125,.45)}.pb-profile-card:before,.pb-profile-card:after{content:'';position:absolute;width:40px;height:40px}.pb-profile-card:before{left:14px;top:14px;border-left:1px solid #37df9d;border-top:1px solid #37df9d}.pb-profile-card:after{right:14px;bottom:14px;border-right:1px solid #37df9d;border-bottom:1px solid #37df9d}.pb-profile-card__code{position:absolute;left:20px;top:20px;color:#37df9d;font:700 8px Arial;letter-spacing:.15em}.pb-profile-avatar{width:92px;height:92px;display:grid;place-items:center;margin-bottom:18px;color:#07110c;background:#37df9d;font:500 42px/1 'MagistralMedium',Tahoma,sans-serif;clip-path:polygon(20px 0,100% 0,100% calc(100% - 20px),calc(100% - 20px) 100%,0 100%,0 20px)}.pb-profile-card h3{margin:0 0 5px!important;color:#fff!important;font-size:23px!important}.pb-profile-card p{margin:0;color:#80948a;font-size:11px}.pb-profile-card i{margin-top:20px;padding:7px 11px;border:1px solid rgba(55,223,157,.28);color:#37df9d;font:700 8px Arial;letter-spacing:.14em;font-style:normal}.pb-profile-data{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}.pb-profile-data>div{min-height:164px;display:grid;grid-template-columns:48px 1fr;grid-template-rows:auto auto;align-content:center;column-gap:15px;padding:22px;border:1px solid #dce7e1;background:linear-gradient(145deg,#fff,#f4f8f6)}.pb-profile-data>div>span{grid-row:1/3;width:46px;height:46px;display:grid;place-items:center;color:#159966;background:#e6f7ef}.pb-profile-data svg,.pb-profile-note svg{width:23px;height:23px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-profile-data small{align-self:end;color:#7e8e85;font:700 8px Arial;letter-spacing:.14em;text-transform:uppercase}.pb-profile-data strong{align-self:start;margin-top:7px;color:#17211c;font-size:14px;overflow-wrap:anywhere}.pb-profile-note{display:flex;align-items:center;gap:16px;margin-top:18px;padding:18px 20px;border-left:3px solid #18bd7d;background:#edf8f2}.pb-profile-note>svg{flex:0 0 28px;width:28px;height:28px;color:#159966}.pb-profile-note strong{color:#17211c;font-size:13px}.pb-profile-note p{margin:4px 0 0;color:#718078;font-size:11px}
        @media(max-width:1050px){.pb-profile-layout{grid-template-columns:1fr}.pb-profile-card{min-height:280px}}
    </style>
    <style>
        .pb-profile-head-actions{max-width:520px;display:flex;align-items:center;justify-content:flex-end;gap:16px}.pb-profile-head-actions p{max-width:360px!important}.pb-profile-head-actions button{min-height:40px;padding:9px 15px;border:1px solid #159966;color:#127c55;background:#fff;font-family:inherit;font-weight:700;cursor:pointer;transition:.2s}.pb-profile-head-actions button:hover{color:#07110c;background:#37df9d}.pb-profile-success{display:flex;align-items:center;gap:13px;margin:-7px 0 18px;padding:14px 17px;border:1px solid #bde8d4;border-left:3px solid #18bd7d;color:#107b53;background:#edfaf4}.pb-profile-success svg{width:26px;height:26px;flex:0 0 26px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-profile-success b,.pb-profile-success small{display:block}.pb-profile-success b{font-size:12px}.pb-profile-success small{margin-top:3px;color:#638075;font-size:10px}.pb-profile-editor{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));align-content:start;gap:17px;padding:25px;border:1px solid #dce7e1;background:linear-gradient(145deg,#fff,#f4f8f6)}.pb-profile-editor__title{grid-column:1/-1;padding-bottom:17px;border-bottom:1px solid #dce7e1}.pb-profile-editor__title>span{color:#159966;font:700 8px Arial;letter-spacing:.17em}.pb-profile-editor__title h3{margin:7px 0 4px!important;color:#17211c!important;font-size:21px!important}.pb-profile-editor__title p{margin:0;color:#7a8981;font-size:10px}.pb-profile-field{display:block}.pb-profile-field>span{display:block;margin-bottom:7px;color:#6c7c73;font:700 8px Arial;letter-spacing:.13em;text-transform:uppercase}.pb-profile-field>div{height:51px;display:flex;align-items:center;border:1px solid #cedbd4;background:#fff;transition:.2s}.pb-profile-field>div:focus-within{border-color:#18bd7d;box-shadow:0 0 0 3px rgba(24,189,125,.08)}.pb-profile-field svg{width:20px;height:20px;flex:0 0 20px;margin:0 12px;fill:none;stroke:#159966;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-profile-field input{width:100%;height:100%;min-width:0;padding:0 12px 0 0;border:0!important;outline:0!important;color:#17211c;background:transparent!important;font-family:inherit;font-size:13px;box-shadow:none!important}.pb-profile-field>small{display:block;min-height:12px;margin-top:5px;color:#d64251;font-size:9px}.pb-profile-field.has-error>div{border-color:#d64251;background:#fff7f8}.pb-profile-field--locked>div{background:#edf2ef}.pb-profile-field--locked input{color:#7a8981}.pb-profile-field--locked>small{color:#7a8981}.pb-profile-editor__actions{grid-column:1/-1;display:flex;justify-content:flex-end;gap:10px;margin-top:3px;padding-top:17px;border-top:1px solid #dce7e1}.pb-profile-editor__actions button{min-height:46px;display:inline-flex;align-items:center;justify-content:center;gap:9px;padding:10px 17px;font-family:inherit;font-weight:700;cursor:pointer;transition:.2s}.pb-profile-cancel{border:1px solid #cdd9d3;color:#687a70;background:#fff}.pb-profile-cancel:hover{border-color:#7c9186;color:#17211c}.pb-profile-save{border:1px solid #18bd7d;color:#07110c;background:linear-gradient(90deg,#18bd7d,#37df9d)}.pb-profile-save:hover{color:#fff;background:#0b9964;transform:translateY(-2px)}.pb-profile-save:disabled{opacity:.65;cursor:wait}.pb-profile-save svg{width:19px;height:19px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
        @media(max-width:900px){.pb-profile-head-actions{max-width:none;align-items:flex-start;flex-direction:column}.pb-profile-editor{grid-template-columns:1fr}}
    </style>
</x-user-account-shell>
