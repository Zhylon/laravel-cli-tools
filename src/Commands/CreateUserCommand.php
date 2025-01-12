<?php

namespace Zhylon\LaravelCliTools\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    public $signature = 'cli-tools:create-user
                                {name? : The name of the user}
                                {--email= : The email of the user}
                                {--password= : The password of the user}
                                {--force : Force the operation to run without asking questions}';

    public $description = 'Create a new user';

    public function handle(): int
    {
        $user = $this->userModel();

        $user->name = $this->getParameter('name', 'argument');
        $user->email = $this->getParameter('email', 'option');
        $user->email = Hash::make($this->getParameter('password', 'option'));

        if ($this->option('force') === true || $this->confirm('Save this user?', true)) {
            $exists = $this->userModel()->where([
                'name' => $user->name,
                'email' => $user->email,
            ])->first();
            if (! $exists) {
                $user->save();
                $this->info('Created a new user with id: '.$user->id);

                return self::SUCCESS;
            }

            if ($this->option('force')) {
                if ($exists->update($user->getAttributes())) {
                    $this->info('Updated user with id: '.$exists->id);

                    return self::SUCCESS;
                }
                $this->warn('Failed to update user with id: '.$exists->id);

                return self::FAILURE;
            }
            $this->error('User already exists');

            return self::FAILURE;
        }

        $this->info('Operation canceled');

        return self::FAILURE;
    }

    private function getParameter(string $parameterName, string $type, bool $secret = false): string
    {
        $prompt = $secret ? 'secret' : 'ask';

        return ($this->$type($parameterName) === null) ? $this->$prompt("User $parameterName: ") : $this->$type($parameterName);
    }

    private function getUserClass(): string
    {
        return config(
            'auth.providers.'
            .config(
                'auth.guards.'
                .config('auth.defaults.guard', 'web')
                .'.provider'
            )
            .'.model'
        );
    }

    private function userModel(): Model
    {
        return new ($this->getUserClass())();
    }
}
