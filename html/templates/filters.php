<nav class="navbar-dark bg-petrol mb-3 rounded p-2">
  <div class="btn-toolbar justify-content-between px-1">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
      <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
      <label class="btn blue-alt" for="btnradio1">
        <i class="fas fa-fire fa-sm text-orange-300"></i>&nbsp;Best
      </label>

      <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
      <label class="btn blue-alt" for="btnradio2">
        <i class="fas fa-concierge-bell fa-sm text-teal-200"></i>&nbsp;New
      </label>

      <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
      <label class="btn blue-alt" for="btnradio3">
        <i class="fas fa-chart-line fa-sm text-blue-200"></i>&nbsp;Trending
      </label>

      <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
      <label class="btn blue-alt" for="btnradio4">
        <i class="fas fa-bullseye fa-sm text-red-400"></i>&nbsp;Bountied
        <span class="badge align-middle">347</span>
      </label>
    </div>

    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
      <form action="../pages/ask.php">
        <input type="submit" class="btn-check" id="ask-question">
        <label class="btn blue" for="ask-question">
          Ask Question&nbsp;<i class="fas fa-plus-square fa-sm"></i>
        </label>
      </form>
    </div>
  </div>
</nav>