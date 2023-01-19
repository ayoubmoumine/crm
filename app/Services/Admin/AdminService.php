<?php

namespace App\Services\Admin;

use App\Models\Admin;
use App\Repositories\Admin\AdminRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }


    /**
     * Prepare data to store a new resource.
     *
     * @param  Array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(array $data): RedirectResponse
    {
        $data['password'] = Hash::make($data['password']);
        $response = $this->adminRepository->store($data);
        return $response ? redirect()->route('admin.manage.index')->with('success', 'New admin is added !') : redirect()->back()->with('error', 'Registration failed');
    }

    /**
     * Prepare data to update the specified resource in storage.
     *
     * @param  Array $data
     * @param  \App\Models\Admin $admin
     * @return void
     */
    public function update(array $data, Admin $admin): void
    {
        $this->adminRepository->update($data, $admin);
    }

    /**
     * Handle the object to be removed.
     *
     * @param  \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destory(Admin $admin)
    {
        $this->adminRepository->destory($admin);
    }
}