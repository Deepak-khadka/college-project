<?php

namespace Kathford\Lib;

final class Role
{
    /**
     *  Role Super Admin
     */
    const ROLE_SUPER_ADMIN = 0;

    /**
     * Role Admin
     */
    const ROLE_ADMIN = 1;

    /**
     * Role Customer
     */
    const ROLE_CUSTOMER = 2;


    /**
     * @var $current
     */
    public static $current = [
        self::ROLE_SUPER_ADMIN  => 'super-admin',
        self::ROLE_ADMIN        => 'admin',
        self::ROLE_CUSTOMER     => 'customer',
    ];

    public static function getSuperAdmin()
    {
        return self::$current[self::ROLE_SUPER_ADMIN];
    }

    public static function getAdmin()
    {
        return self::$current[self::ROLE_ADMIN];
    }

    public static function getCustomer($returnIndex = false)
    {
        return self::get(self::ROLE_CUSTOMER, $returnIndex);
    }


    public static function getHighLevelRoles()
    {
        return [
            self::ROLE_SUPER_ADMIN  => 'super-admin',
            self::ROLE_ADMIN        => 'admin',
        ];
    }

    /**
     * Get Middleware String
     *
     * @return string
     */
    public static function getMiddlewareString()
    {
        $middleware= 'access:';
        foreach (self::getHighLevelRoles() as $role)
            $middleware .=  $role . ',';
        return substr($middleware, 0, -1);
    }
}