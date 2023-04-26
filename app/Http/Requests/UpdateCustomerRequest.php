<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => ['required','string','max:255',Rule::unique(Customer::class)->where(function ($query) {
                return $query->where('user_id', $this->user()->id);
            })->ignore($this->unique_id)],
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'phone_number' => ['required','string','max:255',Rule::unique(Customer::class)->where(function ($query) {
                return $query->where('user_id', $this->user()->id);
            })->ignore($this->unique_id)],
            'address_line1' => ['required','string','max:255'],
            'address_line2' => ['required','string','max:255'],
            'city' => ['required','string','max:255'],
            'postcode' => ['required','string','max:255'],
            'country' => ['required','string','max:255'],
        ];
    }
}
