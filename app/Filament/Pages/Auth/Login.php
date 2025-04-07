<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BasePage;

class Login extends BasePage
{
    protected static string $view = 'pages.auth.login';
    public function mount(): void
    {
        parent::mount();

        if (app()->isLocal()) {
            $this->form->fill([
                'email' => 'admin@gmail.com',
                'password' => '12345678',
                'remember' => true,
            ]);
        }
    }
}
