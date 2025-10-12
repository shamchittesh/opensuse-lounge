<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use App\Enums\Enums\MemberStatus;
use App\Models\Member;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return request()->user()->can('create', Member::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255', 'unique:members'],
            'email_target' => ['required', 'email', 'max:255'],
            'email_nick' => ['nullable', 'string', 'max:255'],
            'email_full' => ['nullable', 'email', 'max:255'],
            'libera_nick' => ['nullable', 'string', 'max:255'],
            'libera_cloak' => ['nullable', 'string', 'max:255'],
            'libera_cloak_applied' => ['nullable', 'date'],
            'status' => ['required', Rule::enum(MemberStatus::class)],
        ];
    }
}
