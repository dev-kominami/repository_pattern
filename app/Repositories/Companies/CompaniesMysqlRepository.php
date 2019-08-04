<?php

namespace App\Repositories\Companies;

use App\Companies;

class CompaniesMysqlRepository implements CompaniesDataAccessRepositoryInterface
{

    public function __construct(Companies $companies) {
        $this->companies = new $companies();
    }

    public function regist(String $name, String $address) {
        $this->companies->name = $name;
        $this->companies->address = $address;
        $this->companies->save();
        return $this->companies;
    }
}