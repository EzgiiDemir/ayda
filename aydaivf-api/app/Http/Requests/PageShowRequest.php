<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageShowRequest extends FormRequest {
    public function rules(): array {
        return [
            'lang' => ['nullable','in:tr,en'],
        ];
    }
    public function prepareForValidation(): void {
        $this->merge(['lang' => $this->input('lang','tr')]);
    }
}
