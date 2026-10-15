<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

#[Signature('admin:create')]
#[Description('Cria uma conta de administrador para o painel')]
class CreateAdminUser extends Command
{
    public function handle(): int
    {
        $name = trim((string) $this->ask('Nome do administrador'));
        $email = Str::lower(trim((string) $this->ask('E-mail')));
        $password = (string) $this->secret('Senha (mínimo 12 caracteres)');
        $passwordConfirmation = (string) $this->secret('Confirme a senha');

        $validator = Validator::make(
            [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $passwordConfirmation,
            ],
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:12', 'confirmed'],
            ],
            [
                'email.unique' => 'Já existe um usuário com esse e-mail.',
                'password.min' => 'A senha precisa ter pelo menos 12 caracteres.',
                'password.confirmed' => 'As senhas informadas não correspondem.',
            ],
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $administrator = new User;
        $administrator->forceFill([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'is_admin' => true,
        ])->save();

        $this->info('Administrador criado com sucesso.');

        return self::SUCCESS;
    }
}
