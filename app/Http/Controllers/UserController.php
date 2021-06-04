<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDOException;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * $id
     * @return \Illuminate\Http\Response
     */
    public function showProfile($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (PDOException $e) {
            abort('404', $e->getMessage());
        }

        $questions_result = Question::search('', 6, 1, null, null, $user->id);

        return view('pages.profile', [
            'user' => $user,
            'user_questions' => Question::hydrate($questions_result['data']),
            'question_count' => $questions_result['count']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * $id
     * @return \Illuminate\Http\Response
     */
    public function showProfileSettings($id)
    {
		try {
            $user = User::findOrFail($id);
        } catch (PDOException $e) {
            abort('404', $e->getMessage());
        }
        $this->authorize('logged_in', $user);
        
        return view('pages.profile-settings', [
            'user' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * $id
     * @return \Illuminate\Http\Response
     */
    public function saveProfileSettings(Request $request)
    {
        $user = User::find($request->user_id);
        $this->authorize('logged_in', $user);

        if($request->image == "null") error_log("save me");
        if($request->username != $user->name) {
            $user->name = $request->username;
            error_log("Changed username");
        }

        if ($request->bio != $user->bio) {
            $user->bio = $request->bio;
            error_log("Changed bio");
        }

        if ($request->email != $user->email) {
            $user->email = $request->email;
            error_log("Changed email");
        }

        try {
            $user->save();
        } catch (PDOException $e) {
            abort('403', $e->getMessage());
        }

        return response()->json($request);
    }
}
