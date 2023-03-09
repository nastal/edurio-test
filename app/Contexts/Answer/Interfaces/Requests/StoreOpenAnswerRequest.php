<?php

namespace App\Contexts\Answer\Interfaces\Requests;

use App\Contexts\Question\Domain\Models\QuestionType;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOpenAnswerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'answer' => 'required',
            'question_id' => [
                'required',
                Rule::exists('questions', 'id')->where(function (Builder $query) {
                    return $query->where('type', QuestionType::Open->value);
                }),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'question_id.exists' => 'The question id does not exist or is not a open question',
        ];
    }
}
