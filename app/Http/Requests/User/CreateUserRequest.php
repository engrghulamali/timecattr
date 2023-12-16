<?php

namespace App\Http\Requests\User;

use App\Models\User;
//use App\Presenters\User\OrdinaryUserPresenter;
use App\Http\Requests\CattrFormRequest;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CreateUserRequest extends CattrFormRequest
{
    public function _authorize(): bool
    {
        return $this->user()->can('create', User::class);
    }

    public function _rules(): array
    {
        return [
            'full_name' => 'required|string',
            'email' => 'required|email',
            'user_language' => 'required',
            'password' => 'sometimes|required|min:6',
            'important' => 'bool',
            'active' => 'required|bool',
            'screenshots_active' => 'required|bool',
            'manual_time' => 'sometimes|required|bool',
            'screenshots_interval' => 'required|int|min:1|max:15',
            'computer_time_popup' => 'required|int|min:1',
            'timezone' => 'required|string',
            'role_id' => 'required|int|exists:role,id',
            'type' => 'required|string',
            'web_and_app_monitoring' => 'sometimes|required|bool',
        ];
    }
}
