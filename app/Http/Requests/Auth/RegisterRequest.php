<?php
namespace App\Http\Requests\Auth;

use Illuminate\Support\Str;
use Domain\User\Models\User;
use Domain\User\Models\Branch;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'patronymic' => ['sometimes','nullable', 'string', 'max:255'],
            'phone' => ['required', 'digits:11'],
            'social_link' => ['sometimes','nullable', 'url', 'max:255'],
            'birthday' => ['required','date', 'date_format:Y-m-d', 'before:' . date('Y-m-d')],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'branch_id' => ['required', 'numeric', 'max:' . Branch::max('id')],
            'password' => ['required', 'confirmed', Password::defaults()],
            'agree' => ['required','accepted']
        ];
    }

        /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        
        $this->merge([
            'phone' => Str::phoneNumber($this->phone),
        ]);
    }
}
