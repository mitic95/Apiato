<?php

namespace App\Containers\Vacation\UI\API\Transformers;

use App\Containers\Vacation\Models\Vacation;
use App\Ship\Parents\Transformers\Transformer;

class VacationTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Vacation $entity
     *
     * @return array
     */
    public function transform(Vacation $entity)
    {
        $response = [
            'object' => 'Vacation',
            'id' => $entity->getHashedKey(),
            'user_id' => $entity->user_id,
            'user_balances' => $entity->user->vacationBalance,
            'name' => $entity->user->name,
            'email' => $entity->user->email,
            'vacation_days' => $entity->vacation_days,
            'status' => $entity->status,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
