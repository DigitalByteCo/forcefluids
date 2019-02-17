<?php

namespace App\Http\Controllers\Admin;

use App\Model\Job;
use App\Model\JobRevenue;
use App\Http\Requests\Admin\JobRevenue\StoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobRevenueController extends Controller
{

	public function create(Job $job)
	{
		$gel = $job->revenues()->where('additive_id', 1)->first();
		$friction = $job->revenues()->where('additive_id', 2)->first();
		$pop = $job->revenues()->where('additive_id', 3)->first();
		$misc = $job->revenues()->where('additive_id', 4)->first();
		return view('job-revenue.create', compact('job', 'gel', 'friction', 'pop', 'misc'));
	}

	public function store(StoreRequest $request, Job $job)
	{
		JobRevenue::where('job_id', $job->id)->delete();

		if(!empty($request->gel_purchase_cost)) {
			$revenue = new JobRevenue;
			$revenue->additive_id = 1;
			$revenue->purchase_cost = $request->gel_purchase_cost;
			$revenue->selling_cost = $request->gel_selling_cost;
			$job->revenues()->save($revenue);
		}
		if(!empty($request->friction_purchase_cost)) {
			$revenue = new JobRevenue;
			$revenue->additive_id = 2;
			$revenue->purchase_cost = $request->friction_purchase_cost;
			$revenue->selling_cost = $request->friction_selling_cost;
			$job->revenues()->save($revenue);
		}
		if(!empty($request->pop_purchase_cost)) {
			$revenue = new JobRevenue;
			$revenue->additive_id = 3;
			$revenue->purchase_cost = $request->pop_purchase_cost;
			$revenue->selling_cost = $request->pop_selling_cost;
			$job->revenues()->save($revenue);
		}
		if(!empty($request->misc_purchase_cost)) {
			$revenue = new JobRevenue;
			$revenue->additive_id = 4;
			$revenue->purchase_cost = $request->misc_purchase_cost;
			$revenue->selling_cost = $request->misc_selling_cost;
			$job->revenues()->save($revenue);
		}

		return redirect()->route('job-revenue.index');
	}
}
