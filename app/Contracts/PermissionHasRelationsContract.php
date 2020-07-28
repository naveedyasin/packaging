<?php


namespace App\Contracts;


interface PermissionHasRelationsContract
{
    /**
     * Permission belongs to many roles.
     *
     * @return BelongsToMany
     */
    public function roles();

    /**
     * Permission belongs to many users.
     *
     * @return BelongsToMany
     */
    public function admins();
}
