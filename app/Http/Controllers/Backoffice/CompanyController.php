<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\Company;
use App\Services\Company\CompanyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backoffice.company.index')->with('companies', $this->companyService->filter($request))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Company\CompanyStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyStoreRequest $request): RedirectResponse
    {
        return $this->companyService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('backoffice.company.show')->with('company', $company)->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('backoffice.company.edit')->with('company', $company)->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Company\CompanyUpdateRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyUpdateRequest $request, Company $company): RedirectResponse
    {
        $this->companyService->update($request, $company);
        return redirect()->route('admin.company.show', $company->getKey())->with('success', 'Company was updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        return $this->companyService->destroy($company);
    }
}
