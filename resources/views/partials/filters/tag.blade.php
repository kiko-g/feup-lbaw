<nav class="navbar-dark bg-petrol mb-3 rounded p-2">
  <div class="btn-toolbar justify-content-between px-1">
    <div class="btn-group btn-group-vertical-when-responsive" role="group" aria-label="Basic radio toggle button group">
      <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" checked>
      <label class="btn blue-alt rounded-when-responsive mb-responsive text-start-responsive" for="btnradio5">
        <i class="fas fa-volume-up fa-xs text-orange-300"></i>&nbsp;Popular
      </label>

      <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off">
      <label class="btn blue-alt rounded-when-responsive mb-responsive text-start-responsive" for="btnradio6">
        <i class="far fa-newspaper fa-xs text-gray"></i>&nbsp;Recent
      </label>
    </div>

    <div class="btn-group btn-group-vertical-when-responsive" role="group" aria-label="Basic radio toggle button group">
      <form action="
        @auth 
          {{ route('create/question') }}
        @endauth
        @guest
          {{ route('login') }}
        @endguest
        ">
        <input type="submit" class="btn-check" id="ask-question">
        <label class="btn blue" for="ask-question">
          Ask Question&nbsp;<i class="fas fa-plus-square fa-xs"></i>
        </label>
      </form>
    </div>
  </div>
</nav>
