<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use App\Http\Requests\StoreUserLogRequest;
use App\Http\Requests\UpdateUserLogRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UserLogController extends Controller
{
    public function get_user_log()
    {
        if(Cache::has('get_user_log')){
            return response()->json(['success'=>1,'from'=>'Cache','data'=>Cache::get('get_user_log')], 200,[],JSON_NUMERIC_CHECK);
        }else {
            $data = Cache::rememberForever('get_user_log', function () {
                return UserLog::get();
            });
        }
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }
    public function delete_user_log()
    {
        DB::select("delete from user_logs");
        Cache::forget('get_user_log');
        $data = UserLog::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserLog $userLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserLog $userLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserLogRequest $request, UserLog $userLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserLog $userLog)
    {
        //
    }
}
