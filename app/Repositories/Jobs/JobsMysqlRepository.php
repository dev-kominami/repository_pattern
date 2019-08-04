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

    public function update($params) {
        $find_jobs = $this->jobs::find($params['id']);
        if(!is_null($find_jobs)) {
            $find_jobs->fill($params)->save();
            return $find_jobs;
        } else {
            return null;
        }
    }

    public function find(Int $id) {
        $find_jobs = $this->jobs::find($id);
        if(!is_null($find_jobs)) {
            $find_jobs->company = $find_jobs->company;
        }
        return $find_jobs;
    }

    public function search(String $string, Array $omit_ids = null) {
        $sql = $this->jobs
            ->where(function ($query) use($string) {
                $query->where('name', 'like', '%'.$string.'%')
                    ->orWhere('category', 'like', '%'.$string.'%')
                    ->orWhere('detail', 'like', '%'.$string.'%');
            });
        if(!is_null($omit_ids)) {
            $sql->whereNotIn('id', $omit_ids);
        }
        $jobs = $sql->get();
        foreach($jobs as $job) {
            $job->company = $job->company;
        }
        return $jobs->toArray();
    }
}