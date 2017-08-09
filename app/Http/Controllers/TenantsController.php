<?php

namespace App\Http\Controllers;

use App\Tenant;
use Illuminate\Http\Request;
use App\Transformers\TenantTransformer;

class TenantsController extends ApiController
{
    /**
     * TenantTransformer instance
     * @var App\Transformers\TenantTransformer
     */
    protected $tenantTransformer;

    function __construct(TenantTransformer $tenantTransformer)
    {
        $this->tenantTransformer = $tenantTransformer;
        $this->middleware('auth.basic')->only(['store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1. All is bad
        // 2. DB structure <-> API Output
        // 3. No way to signal headers/response codes.
        $tenants = Tenant::all();
        return $this->respond([
            'data' => $this->tenantTransformer->transformCollection($tenants),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( ! $request->name or ! $request->description)
        {
            return $this->respondFailedValidation('Parameters failed validation');
        }
        Tenant::create($request->all());

        return $this->respondCreated('Tenant created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show($tenant)
    {
        $tenant = Tenant::find($tenant);
        if( ! $tenant )
        {
            return $this->respondNotFound('Tenant not found');
        }
        return $this->respond([
            'data' => $this->tenantTransformer->transform($tenant),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
