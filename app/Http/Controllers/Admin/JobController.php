<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Model\Job;
use PDF;
use App\Http\Requests\Admin\Job\StoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        if($user->isSales()) {
            $query = Job::select("jobs.*");
            if(!empty($request->q)) {
                $query = $query->join('users', 'users.id', '=', 'jobs.customer_id')
                ->where('users.name', 'like', '%'.$request->q.'%');
            }
            $jobs = $query->get();
        } else {
            $jobs = $user->jobs;
        }
        return view('job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $this->checkSalesUser($user);

        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = auth()->user();
        $this->checkSalesUser($user);

        $customer = $request->user();
        $job = new Job;
        $job->fill($request->all());
        $job->date = date('Y-m-d', strtotime($request->date));
        $customer->jobs()->save($job);

        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('job.view', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $user = auth()->user();
        $this->checkSalesUser($user);

        return view('job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Job $job)
    {
        $user = auth()->user();
        $this->checkSalesUser($user);

        $job->fill($request->all());
        $job->date = date('Y-m-d', strtotime($request->date));
        $job->save();
        return redirect()->route('job.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }

    public function getJobPdf(Job $job)
    {
        $user = auth()->user();
        $this->checkSalesUser($user);

        if($job->customer_id === $user->id) {
            return PDF::loadView('pdf-template.job_report', compact('job'))->setPaper('a3', 'potrait')->stream();
        }
        abort(403);
    }

    public function getClosedJob()
    {
        $user = auth()->user();
        $this->checkSalesUser($user);
        $jobs = $user->jobs()->where('is_closed', true)->get();
        return view('job.close-jobs', compact('jobs'));
    }

    private function checkSalesUser($user)
    {
        if($user->isSales()) {
            abort(403);
        }
    }

}
