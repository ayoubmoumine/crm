<?php

namespace App\Repositories\Company;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyRepository
{
    /**
     * Persists a new record to the database
     * 
     * @param Array $data
     * @return App\Models\Company
     */
    public function store(array $data): Company
    {
        return Company::create($data);
    }

    /**
     * Updates a record with data passed in the parameter
     * 
     * @param \App\Models\Company $company
     * @param Array $data
     * @return void
     */
    public function update(Company $company, array $data): void
    {
        $company->update($data);
    }

    /**
     * Deletes a record from the databas
     * 
     * @param \App\Models\Company $company
     * @return void
     */
    public function destroy(Company $company): void
    {
        $company->delete();
    }

    /**
     * Returns count of employees related to the object resource
     * All employees are included in this count ( even the invited once )
     * 
     * @param \App\Models\Company $company
     * @return Integer
     */
    public function getCountEmployees(Company $company): int
    {
        return $company->employees()->get()->count();
    }

    /**
     * Returns list of companies with name containing a search values
     * If nothing is passed it should return all companies
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function filter(Request $request)
    {
        return Company::latest()->filter(["search" => $request->search]);
    }
}