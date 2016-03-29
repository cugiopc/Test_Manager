<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Requests;
use App\Testplan;
use App\Testcase;
class TestplanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testplans = Testplan::all();
        return view('testplans.index',[
            'testplans' => $testplans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testcases = Testcase::all();
        return view('testplans.new',compact('testcases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'descriptions' => 'required|min:5',
        ]);

        $list_testcases = array();
        $i = 0;
        foreach ($request->tetscase as $id) {
            $list_testcases[$i] = $id;
            $i++;
        } 

        $testplan = Testplan::create([
            'name' => $request->name,
            'descriptions' => $request->descriptions,
            'user_id' => $request->user()->id,
        ]);
        $testplan->testcases()->attach($list_testcases);
        return redirect(url('/testplans'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testplan = Testplan::findOrFail($id);
        $user_info = $testplan->user;
        $success = 0;
        $fail = 0;
        $retest = 0;
        $untest = 0;
        $testcases = $testplan->testcases;
        $all = $testcases->count();

        foreach ($testcases as $tetscase) {
            switch ($tetscase->id_status) {
                case '1':
                    $success++;
                    break;
                case '2':
                    $fail++;
                    break;
                case '3':
                    $retest++;
                    break;
                case '4':
                    $untest++;
                    break;
            }
        }
        if ($all == 0) {
            $progress = array();
        }else{
            $progress = array(($success/$all)*100,($fail/$all)*100,($retest/$all)*100,($untest/$all)*100);
        }
        $result = array($success,$fail,$retest,$untest);

        return view('testplans.info', [
            'testplan' => $testplan,
            'progress' => $progress,
            'user_info' => $user_info,
            'testcases' => $testcases,
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
        $testplan = Testplan::findOrFail($id);
        $user_info = $testplan->user;
        $testcases = $testplan->testcases;
        $id_testcases = array();
        $index = 0;
        foreach ($testcases as $testcase) {
            $id = $testcase->id;
            $id_testcases[$index] = $id;
            $index++;
        }
        $all_testcases = Testcase::whereNotIn('id', $id_testcases)->get();

        return view('testplans.edit',[
            'testplan' => $testplan,
            'user_info' => $user_info,
            'testcases' => $testcases,
            'testcase_notIns' => $all_testcases,
        ]);
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
            'name' => 'required',
            'descriptions' => 'required',
        ]);

        $testplan = Testplan::findOrFail($id);
        $testplan->name = $request->name;
        $testplan->descriptions = $request->descriptions;
        $testplan->save();
        return redirect(url('/testplans/edit/'.$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testplan::findOrFail($id)->testcases()->detach();
        Testplan::destroy($id);
        return redirect('testplans');
    }

    public function delete_case($plan_id, $case_id) {
        $testplan = Testplan::findOrFail($plan_id);
        $testplan->testcases()->detach($case_id);
        
        return redirect('/testplans/edit/'.$plan_id);
    }

    public function add_testcases(Request $request, $id) {
        $testplan = Testplan::findOrFail($id);
        $testplan->testcases()->attach($request->tetscase);
        return redirect('/testplans/edit/'.$id);
    }
}
