<?php

namespace App\Transformers;


class CampaignTransformer extends Transformer
{
    function transform($campaign)
    {
        return [
            'name' => $campaign->name,
            'description' => $campaign->description,
            'tenant_id' => $campaign->tenant_id,
            'active' => (bool) $campaign->active
        ];
    }
}