<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
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
     * @param  \App\Http\Requests\Admin\StoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $response = $this->adminRepository->store($data);
        return $response ? redirect()->route('admin.manage.index')->with('success', 'New admin is added !') : redirect()->back()->with('error', 'Registration failed');
    }

    /**
     * Prepare data to update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin $admin
     * @return void
     */
    public function update(UpdateRequest $request, Admin $admin): void
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];
        
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