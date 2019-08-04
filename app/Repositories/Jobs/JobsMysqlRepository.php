<?php

namespace App\Repositories\Jobs;

use App\Jobs;

class JobsMysqlRepository implements JobsDataAccessRepositoryInterface
{

    public function __construct(Jobs $jobs) {
        $this->jobs = new $jobs();
    }

    public function regist(String $name, String $category, String $detail, int $company_id) {
        $this->jobs->name = $name;
        $this->jobs->category = $category;
        $this->jobs->detail = $detail;
        $this->jobs->company_id = $company_id;
        $this->jobs->save();
        return $this->jobs;
    }
}