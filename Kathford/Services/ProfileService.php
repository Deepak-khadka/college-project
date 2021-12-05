<?php

namespace Kathford\Services;

use App\Models\Profile;

/**
 * Class ProfileService
 * @package Kathford\Services
 */
class ProfileService
{

    /**
     * The Profile instance
     *
     * @var $model
     */
    protected $model;

    /**
     * ProfileService constructor.
     * @param Profile $Profile
     */
    public function __construct(Profile $Profile)
    {
        $this->model = $Profile;
    }

}
