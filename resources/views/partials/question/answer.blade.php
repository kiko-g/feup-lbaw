@php
$cardHighlight = "";
$bestAnswer = false;
$bestAnswer = $answer->is_best_answer;
$expertAnswer = $answer->content->author->expert;
$moderatorAnswer = $answer->content->author->moderator;

if ($expertAnswer) {
  $cardHighlight = "bg-expert";
}

if ($moderatorAnswer) {
  $cardHighlight = "bg-mod";
}

if ($bestAnswer) {
  $cardHighlight = "bg-great";
}
  
@endphp
<div class="card mb-5 p-2-0 border-0 rounded" id="{{ 'answer-' . $answer->content_id }}">
  <div class="card-header bg-petrol text-white font-source-sans-pro rounded-top py-1">
    <div class="row">
      <div class="col-auto me-auto ps-1">
        @auth
          @if (Auth::user()->id == $answer->content->author_id)
            <span class="badge my-post-signature mt-1">My answer</span>
          @endif
        @endauth
      </div>
      @auth
        @if (Auth::user()->id == $answer->content->author_id)
          <div class="col-auto btn-group float-end" id="answer-control-{{ $answer->content_id }}">
            <button class="btn p-0 answer-edit" id="answer-edit-{{ $answer->content_id }}" type="button" data-bs-toggle="collapse" data-bs-target=".answer-collapse-{{ $answer->content_id }}" aria-expanded="true" aria-controls="answer-content-{{ $answer->content_id }} answer-control-{{ $answer->content_id }}">
              <i class="fas fa-pencil-alt text-yellow-400 hover ms-2"></i>
            </button>
        
            {{-- Button trigger modal --}}
            <button type="button" class="btn p-0 delete-answer-modal-trigger" data-bs-toggle="modal" data-bs-target="#delete-answer-modal-{{ $answer->content_id }}">
              <i class="far fa-trash-alt text-red-400 hover ms-2"></i>
            </button>
          </div>

          @include('partials.question.delete-modal', [
            "type" => "answer",
            "content_id" => $answer->content_id,
            "title" => $answer->question->title,
            "redirect" => false
          ])
        @endif
      @endauth
    </div>
  </div>
  <div class="card-body {{ $cardHighlight }}">
    <article class="row row-cols-3 mb-1 pe-1" data-content-id="{{ $answer->content_id }}">
      <div class="col-auto flex-wrap">
        <div id="votes-{{ $answer->content_id }}" class="votes btn-group-vertical mt-1 flex-wrap">
         @php
            $upClass = 'teal';
            if($voteValue === 1) $upClass = 'active-teal';
            
            $downClass = 'pink';
            if($voteValue === -1) $downClass = 'active-pink';
          @endphp
          <a id="upvote-button-{{ $answer->content_id }}" class="upvote-button-answer my-btn-pad btn btn-outline-success {{ $upClass }}" data-content-id="{{ $answer->content_id }}">
            <i class="fas fa-chevron-up"></i>
          </a>
          <a id="vote-ratio-{{ $answer->content_id }}" class="vote-ratio-answer btn my-btn-pad fake disabled"> {{ $answer->votes_difference }} </a>
          <a id="downvote-button-{{ $answer->content_id }}" class="downvote-button-answer my-btn-pad btn btn-outline-danger {{ $downClass }}" data-content-id="{{ $answer->content_id }}">
            <i class="fas fa-chevron-down"></i>
          </a>
        </div>
      </div>

      <div class="col-9 col-sm-10 col-md-11 col-lg-11 flex-wrap pe-0">
        @if ($expertAnswer || $bestAnswer || $moderatorAnswer)
          <div class="float-end">
            <div class="btn-group-vertical mb-2" role="group">
              @if($bestAnswer) <span class="badge float-end text-start great"  style="width: 75px">Best&nbsp;@include('partials.icons.check', ['classes' => 'float-end', 'width' => 17, 'height' => 17, 'title' => 'Best Answer']) </span> @endif
              @if($moderatorAnswer)<span class="badge float-end text-start mod"    style="width: 75px">Mod&nbsp;@include('partials.icons.moderator', ['classes' => 'float-end', 'width' => 17, 'height' => 17, 'title' => 'Moderator Medal']) </span>@endif
              @if($expertAnswer)   <span class="badge float-end text-start expert" style="width: 75px">Expert&nbsp;@include('partials.icons.medal', ['classes' => 'float-end', 'width' => 17, 'height' => 17, 'title' => 'Expert Medal']) </span>@endif
            </div>
          </div>        
        @endif
        <div id="{{ 'answer-content-' . $answer->content_id }}" class="mb-1">
            {!! $answer->content->main !!}
        </div>
        @include('partials.question.edit-answer-form', ['answer' => $answer])
        @include('partials.question.comment-section', ['comments' => $answer->comments, 'id' => $answer->content_id])
      </div>
    </article>
  </div>
  <footer class="card-footer text-muted text-end p-0">
    <blockquote class="blockquote mb-0">
    <p class="card-text px-1 h6">
      <small class="text-muted">answered {{ $answer->content->creation_date }}</small>
      <small>
        <a class="signature" href="{{ url('user/' . $answer->content->author->id) }}">{{ $answer->content->author->name }}
          @if ($moderatorAnswer)
            @include('partials.icons.moderator', ['width' => 20, 'height' => 20, 'title' => 'Moderator'])
          @elseif($expertAnswer)
            @include('partials.icons.medal', ['width' => 20, 'height' => 20, 'title' => 'Expert User'])
          @endif
        </a>
      </small>
    </p>
    </blockquote>
  </footer>
</div>