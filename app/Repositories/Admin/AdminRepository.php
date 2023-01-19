<?php

namespace App\Repositories\Admin;

use App\Models\Admin;

class AdminRepository
{
    /**
     * Persist a new record into admins Table
     * 
     * @param Array $data
     * @return \App\Models\Admin
     */
    public function store(array $data): Admin
    {
        return Admin::create($data);
    }

    /**
     * Updates a record with data passed in the parameter
     * 
     * @param Array $data
     * @param \App\Models\Admin
     * @return void
     */
    public function update(array $data, Admin $admin): void
    {
        $admin->update($data);
    }

    /**
     * Deletes a record from Admin table
     * 
     * @param \App\Models\Admin $admin
     * @return void
     */
    public function destory(Admin $admin): void
    {
        $admin->delete();
    }
}