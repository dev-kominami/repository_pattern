<?php

namespace App\Repositories\Jobs;

interface JobsDataAccessRepositoryInterface
{
    public function regist(String $name, String $category, String $detail, int $company_id);
    public function update($params);
    public function find(Int $id);
    public function search(String $string, Array $omit_ids);
}