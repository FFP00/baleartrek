<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use App\Http\Resources\MeetingResource;
use App\Http\Resources\InterestingPlaceResource;


class TrekResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [  
            'id' => $this->id,
            'regNumber' => $this->regNumber,
            'name' => $this->name,
            "status" => $this->status,
            'rating' => ($this->countScore > 0) 
                ? (string) round(min(5, $this->totalScore / $this->countScore), 1) 
                : "0.0",            'municipality' => [
                'name'      => $this->municipality?->name ?? 'Municipio no asignado',
                "island" => [ "name" => $this->municipality?->island->name ?? 'Sin isla']
            ],
            'interesting_places' => InterestingPlaceResource::collection($this->whenLoaded('interestingPlaces')),
            'meetings' => $this->meetings->map(function ($meeting) {
                return [
                    'id'   => $meeting->id,
                    'day'  => $meeting->day,
                    'time' => $meeting->time,
                    'comments' => $meeting->comments->map(function ($comment) {
                        return [
                            'id'      => $comment->id,
                            'text'    => $comment->comment,
                            'score'   => $comment->score,
                            'user'    => $comment->user?->name, // Si tienes la relación user
                            'status' => $comment->status, //
                            // Extraemos todas las imágenes del comentario
                            'images'  => $comment->images->map(function ($image) {
                                return [
                                    'id'  => $image->id,
                                    'url' => $image->url, // Asegúrate que el campo sea 'url'
                                ];
                            }),
                        ];
                    }),
                ];
            }),
        ];
    }
}
