<?php

namespace App\Http\Resources;

use App\Models\Fruits;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Summary of FruitsResource
 */
class FruitsResource extends ResourceCollection
{
    /**
     * Indicates if the resource's collection keys should be preserved.
     * @var bool
     */
    public $preserveKey = true;

    /**
     * Summary of collects
     * @var mixed
     */
    public $collects = Fruits::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->P,
        ];
    }
}
