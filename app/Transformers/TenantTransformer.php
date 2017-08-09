<?php

namespace App\Transformers;

class TenantTransformer extends Transformer
{
    public function transform($tenant)
    {
        return [
            'name' => $tenant->name,
            'description' => $tenant->description,
            'active' => (bool) $tenant->active,
        ];
    }
}
