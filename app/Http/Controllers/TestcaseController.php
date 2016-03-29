<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TestCaseRequest;
use App\Testcase;
use App\Status;
class TestcaseController extends Controller
{
    // construct
    public function __construct() 
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $testcases = Testcase::all();
        return view('testcase.index', [
            'testcases' => $testcases,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testcase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title' => 'required',
            'steps' => 'required',
        ]);
        
        Testcase::create([
            'title' => $request->title,
            'descriptions' => $request->description,
            'preconditions' => $request->precondition,
            'steps' => $request->steps,
            'expected_result' => $request->expected_result,
            'id_status' => 4,
            'user_id' => $request->user()->id,
        ]);

        return redirect(url('/testcases'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testcase = Testcase::findOrFail($id);
        $comments = $testcase->comments;
        $status = $testcase->status;
        $user_info = $testcase->user;
        return view('testcase.info',[
            'testcase' => $testcase,
            'status'   => $status,
            'comments' => $comments,
            'user_info' => $user_info,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('testcase.edit', ['testcase' => Testcase::findOrFail($id) ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'steps' => 'required',
        ]);
        
        $testcase = Testcase::findOrFail($id);

        $testcase->title = $request->title;
        $testcase->descriptions = $request->description;
        $testcase->preconditions = $request->precondition;
        $testcase->steps = $request->steps;
        $testcase->expected_result = $request->expected_result;

        $testcase->save();
        return redirect(url('/testcases'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testcase::destroy($id);
        return redirect(url('/testcases'));
    }
}
