<?php

namespace App\Http\Controllers;

use App\Tenant;
use App\Campaign;
use Illuminate\Http\Request;
use App\Transformers\CampaignTransformer;

class TenantsCampaignsController extends ApiController
{
    protected $campaignTransformer;

    public function __construct(CampaignTransformer $campaignTransformer)
    {
        $this->campaignTransformer = $campaignTransformer;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function index($tenant)
    {
        $campaigns = Tenant::findOrFail($tenant)->campaigns;

        return $this->campaignTransformer->transformCollection($campaigns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant, Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenant  $tenant
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenant  $tenant
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant, Campaign $campaign)
    {
        //
    }
}
