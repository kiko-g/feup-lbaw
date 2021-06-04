<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionTag;
use App\Models\Content;
use App\Models\VoteQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class QuestionController extends Controller
{
    const MAX_QUERY_STRING_LENGTH = 100;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Question::class);

        $request->validate([
            'title' => ['required', 'max:' . Question::MAX_TITLE_LENGTH],
            'main' => ['required', 'max:' . Question::MAX_MAIN_LENGTH],
            'tags' => ['required', function ($attribute, $value, $fail) {
                $tags = explode(' ', $value);
                if(count($tags) !== count(array_flip($tags))) {
                    $fail('The '.$attribute.' must have unique tags.');
                }
                if(count($tags) < 1 || count($tags) > 5) {
                    $fail('The '.$attribute.' must have between 1 and 5 tags.');
                }
            }] // Parse and check if there are between 1 and 5 tags -> no repeated
        ]);

        $content = new Content();
        $question = new Question($content->id);

        $content->main = $request->input('main');
        $content->author_id = Auth::user()->id;
        $question->title = $request->input('title');

        DB::transaction(function () use ($content, $question) {
            $content->save();
            $question->save();
        });

        return $question;
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $question = Question::find($id);

		$this->authorize('delete', $question);
		$question->delete();

        return redirect()->route('home');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAPI($id)
    {
        $question = Question::find($id);

		$this->authorize('delete', $question);

        try {
            $question->delete();
        } catch (PDOException $e) {
            abort('403', $e->getMessage());
        }

        $content = [
            'id' => $id
        ];
        return response()->json($content);
    }

    /**
     * Display the specified resource.
     *
     * $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $this->authorize('show', $question);
        return view('partials.question.card', [
            'question' => $question,
            'tags' => $question->tags,
            'content' => $question->content,
            'answers' => $question->answers,
            'comments' => $question->comments,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * $id
     * @return \Illuminate\Http\Response
     */
    public function showPage($id)
    {
        $question = Question::find($id);
        //echo $question->votes_difference;
        return view('pages.question', [
            'question' => $question,
            'user' => Auth::user()
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
        $question = Question::findOrFail($id);
        return view('pages.edit-question', ['question' => $question, 'user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        error_log($request);

        error_log("step1");
        $question = Question::findOrFail($request->id);
        $question->title = $request->title;
        $question->content->main = $request->main;
        $tags = $request->tags;
        $question_tags = explode(',', $tags);

        $request->validate([
            'title' => ['required', 'max:' . Question::MAX_TITLE_LENGTH],
            'main' => ['required', 'max:' . Question::MAX_MAIN_LENGTH],
            'tags' => ['required', function ($attribute, $value, $fail) {
                $tags = explode(' ', $value);
                if(count($tags) !== count(array_flip($tags))) {
                    $fail('The '.$attribute.' must have unique tags.');
                }
                if(count($tags) < 1 || count($tags) > 5) {
                    $fail('The '.$attribute.' must have between 1 and 5 tags.');
                }
            }] // Parse and check if there are between 1 and 5 tags -> no repeated
        ]);

        QuestionTag::where('question_id', $request->id)->delete();
        
        foreach($question_tags as $tag) {
            $tag_id = DB::table('tag')->where('name', $tag)->value('id');
            $new_question_tag = new QuestionTag();
            $new_question_tag->tag_id = $tag_id;
            $new_question_tag->question_id = $request->id;
            $new_question_tag->save();
        }

        return view('pages.question', [
            'question' => $question,
            'user' => Auth::user()
        ]);
    }

    public function addVote(Request $request, $content_id)
    {
        Question::findOrFail($content_id);

        $this->authorize('create', VoteQuestion::class);
        $request->validate(['value' => 'required|integer']);

        $existingVote = VoteQuestion::where('user_id', Auth::user()->id)
            ->where('question_id',  $content_id)
            ->first();
        
        if($existingVote != null) {
            $existingVote->vote = $request->value;
            try {
                $existingVote->save();
            } catch (PDOException $e) {
                abort('403', $e->getMessage());
            } 
        } else {
            $vote = new VoteQuestion();
            $vote->user_id = Auth::user()->id;
            $vote->question_id = $content_id;
            $vote->vote = $request->value;
            try {
                $vote->save();
            } catch (PDOException $e) {
                abort('403', $e->getMessage());
            }
        }
    }

    public function deleteVote($content_id) {
        Question::findOrFail($content_id);

        $this->authorize('delete', VoteQuestion::class);

        VoteQuestion::where('user_id', Auth::user()->id)
            ->where('question_id', $content_id)
            ->delete();
    }
}
