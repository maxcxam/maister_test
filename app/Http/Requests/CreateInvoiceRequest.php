<?php

namespace App\Http\Requests;

use App\Enums\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateInvoiceRequest extends FormRequest
{
    public function customRules(User $user): array
    {
        return [
            'orders' => [
                'required',
                'array',
                Rule::exists('orders', 'id')->where(function (Builder $query) use ($user){
                    $query->where('status', Status::NEW)->where('user_id', $user->id);
                })
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
