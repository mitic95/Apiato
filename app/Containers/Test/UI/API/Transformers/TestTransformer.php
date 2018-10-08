<?php

namespace App\Containers\Test\UI\API\Transformers;

use App\Containers\Test\Models\Test;
use App\Ship\Parents\Transformers\Transformer;

class TestTransformer extends Transformer
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
     * @param Test $entity
     *
     * @return array
     */
    public function transform(Test $entity)
    {
        $response = [
            'object' => 'Test',
            'id' => $entity->getHashedKey(),
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
