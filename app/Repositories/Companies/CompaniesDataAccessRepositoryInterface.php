<?php

namespace App\Repositories\Companies;

interface CompaniesDataAccessRepositoryInterface
{
    public function regist(String $name, String $address);
}