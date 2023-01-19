<?php

namespace App\Services\Company;

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

    /**
     * Stores a newly created record
     * 
     * @param Array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(array $data): RedirectResponse
    {
        $response = $this->companyRepository->store($data);
        return $response ? 
                    redirect()->route('admin.company.index')->with('success', 'Company was added successfully !') : 
                    redirect()->back()->with('error', 'Operation failed, company was not able to be created');
    }

    /**
     * Updates details for a record
     * 
     * @param Array $data
     * @param \App\Models\Company $company
     * @return void
     */
    public function update(array $data, Company $company): void
    {
        $this->companyRepository->update($company, $data);
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