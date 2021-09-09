<?php

namespace App\Http\Requests;

use App\Models\Itinerary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateItineraryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('itinerary_edit');
    }

    public function rules()
    {
        return [
            'from' => [
                'string',
                'required',
            ],
            'to' => [
                'string',
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'map_point' => [
                'string',
                'nullable',
            ],
            'price' => [
                'required',
            ],
        ];
    }
}
