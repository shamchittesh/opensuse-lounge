<?php

namespace App\Http\Requests;

use App\Enums\Enums\MemberStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('member'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $member = $this->route('member');

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
