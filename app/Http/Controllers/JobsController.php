<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Jobs\JobsDataAccessRepositoryInterface;
use App\Repositories\Companies\CompaniesDataAccessRepositoryInterface;
use App\Http\Requests\JobsInputPost;
use App\Http\Requests\JobsInputPatch;
use App\Http\Requests\JobsInputGet;
use App\Http\Requests\JobsInputSearch;


class JobsController extends Controller
{
    public function __construct(JobsDataAccessRepositoryInterface $jobs) {
        $this->jobs = $jobs;
    }

    public function regist(JobsInputPost $request)  {
        try {
            $result = $this->jobs->regist(
                $request->name,
                $request->category,
                $request->detail,
                $request->company_id
            );
            return response()->json($result, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(JobsInputPatch $request) {
        try {
            $result = $this->jobs->update($request->all());
            return response()->json($result, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show(JobsInputGet $request) {
        try {
            $result = $this->jobs->find($request->id);
            return response()->json($result, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function search(JobsInputSearch $request, CompaniesDataAccessRepositoryInterface $company) {
        try {
            $from_company = $company->search($request->q);
            $omit_ids = [];
            foreach($from_company as $fc) {
                array_push($omit_ids, $fc['id']);
            }
            $from_jobs = $this->jobs->search($request->q, $omit_ids);
            $result = array_merge($from_company, $from_jobs);
            return response()->json($result, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
