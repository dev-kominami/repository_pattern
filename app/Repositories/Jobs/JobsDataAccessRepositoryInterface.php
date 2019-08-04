<?php

namespace App\Repositories\Jobs;

interface JobsDataAccessRepositoryInterface
{
    public function regist(String $name, String $category, String $detail, int $company_id);
}