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

    public function search(String $string) {
        $find_companies = $this->companies
                ->where('name', 'like', '%'.$string.'%')
                ->orWhere('address', 'like', '%'.$string.'%')
                ->get();
        $result = [];
        foreach($find_companies as $company) {
            $job = [];
            $jobs = $company->jobs;
            foreach($jobs as $job) {
                $job->company = $company;
                unset($job->company->jobs);
                array_push($result, $job->toArray());
            }
        }
        return $result;
    }
}