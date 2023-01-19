<?php

namespace App\Services\Company;

use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\Company;
use App\Repositories\Company\CompanyRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function store(CompanyStoreRequest $request)
    {
        $data = [
            'company_name' => $request->company_name,
            'ice' => $request->ice,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
        ];
        
        $response = $this->companyRepository->store($data);
        return $response ? 
                    redirect()->route('admin.company.index')->with('success', 'Company was added successfully !') : 
                    redirect()->back()->with('error', 'Operation failed, company was not able to be created');
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $data = [
            'company_name' => $request->company_name,
            'ice' => $request->ice,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
        ];

        return $this->companyRepository->update($company, $data);
    }
    
    /**
     * Handle the object to be removed.
     *
     * @param  \App\Models\Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        $countEmployees = $this->companyRepository->getCountEmployees($company);
        if( $countEmployees !== 0 )
        {
            return redirect()->back()->with('error', 'This company can not be deleted, it still has employees');
        }

        $this->companyRepository->destroy($company);
        return redirect()->route('admin.company.index')->with('success', 'The company was deleted successfully !');
    }

    /**
     * Return a list of resource depending on search filter.
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function filter(Request $request)
    {
        return $this->companyRepository->filter($request)->paginate(10);
    }
}