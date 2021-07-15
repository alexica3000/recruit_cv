<?php

namespace App\Interfaces;

interface HasRoleInterface
{
    const ROLE_ADMIN = 1;
    const ROLE_CLIENT = 2;
    const ROLE_USER = 3;

    const ROLES = [
        self::ROLE_ADMIN  => 'Admin',
        self::ROLE_CLIENT => 'Client',
        self::ROLE_USER   => 'User',
    ];

    public function isAdmin(): bool;
    public function getRoleAttribute(): string;
}
