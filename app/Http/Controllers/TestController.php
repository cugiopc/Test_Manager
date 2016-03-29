<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Testplan;
use App\Comment;
use App\Testcase;
use App\User;
use App\Status;
use DB;
class TestController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('test.index',[
            'testplans' => Testplan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function view($id) {
        $testplan = Testplan::findOrFail($id);
        $testcases = $testplan->testcases;
        return view('test.view', [
            'testcases' => $testcases,
            'testplan' => $testplan,
        ]);
    }

    public function show_case(){
        if (Request::ajax()) {
            $id = Request::get('id');
            $testcase = Testcase::findOrFail($id);
            $view = view('test.testcase_detail', [
                'testcase' => $testcase,
            ])->render();;

            return $view;
        }else{
            return "NOT ajax";
        }
    }


    public function addComment()
    {
        if (Request::ajax()) {
            $case_id = (int)Request::get('case_id');
            $comment_data = Request::get('comment');
            $user_id = Request::get('user_id');

            $testcase = Testcase::findOrFail($case_id);
            $comment = new Comment([
                'comment' => $comment_data,
                'user_id' => $user_id,
            ]);

            $testcase->comments()->save($comment);

            $user = User::findOrFail($user_id);

            $data = '<tr><td style="background: #f0f5f5;" class="author"><h5><span class="label label-info">Comment</span></h5>'.$user->name.'<br>'.date('Y-m-d h:i:s',time()).'</td><td>'.$comment_data.'</td></tr>';
            return $data;
        }else{
            return "NOT ajax";
        }
    }

    public function addResult()
    {
        if (Request::ajax()) {
            $case_id = (int)Request::get('case_id');
            $status_id = Request::get('status_id');
            $actualy_result = Request::get('actualy_result');
            $user_id = Request::get('user_id');

            $testcase = Testcase::findOrFail($case_id);
            $status = Status::findOrFail($status_id);
            $user = User::findOrFail($user_id);

            // update actualy result and status for testcase
            $testcase->actualy_result = $actualy_result;
            $testcase->id_status = $status_id;
            $testcase->save();

            // create one comment for result
            $comment = new Comment([
                'comment' => 'This test case mark <ins><b> '.$status->status.' </b></ins> by '.$user->name,
                'user_id' => $user_id,
            ]);

            $testcase->comments()->save($comment);

            return "OK";
        }else{
            return "Not ajax";
        }
    }    
}
