<?php

namespace App\Transformers;

class CampaignTransformer extends Transformer
{
    public function transform($campaign)
    {
        return [
            'name' => $campaign->name,
        ];
    }
}
