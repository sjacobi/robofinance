<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Transaction.to_user' => "required|numeric|exists:users,id",
            'Transaction.datetime' => [
                'required',
                'regex:/^([0][1-9]|[1][0-9]|[2][0-9]|[3][0-1])\.([0][1-9]|[1][0-2])\.([1][9][0-9]{2}|[2][0-9]{3}) (([0-1][0-9]|[2][0-3]):00)$/'
            ],
            'Transaction.amount' => [
                'required',
                'regex:/^[0-9]+(\.[0-9]{1,2})?$/'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'Transaction.to_user' => 'Кому',
            'Transaction.datetime' => 'Когда',
            'Transaction.amount' => 'Сколько',
        ];
    }

}
