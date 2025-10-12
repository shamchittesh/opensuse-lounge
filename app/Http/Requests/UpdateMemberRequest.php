<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use App\Enums\Enums\MemberStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::check('update', request()->route('member'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $member = request()->route('member');

        return [
            'username' => ['required', 'string', 'max:255', Rule::unique('members')->ignore($member->id)],
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
