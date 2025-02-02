<div class="card mb-3">
  <div class="card-header text-white bg-petrol font-source-sans-pro bg-animated rounded-top"> Information </div>
  <div class="card-body d-flex align-items-start p-3">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <button class="nav-link blue active h6 text-start" id="v-pills-home-tab" data-bs-toggle="pill"
        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
        About
      </button>
      {{-- <button class="nav-link blue h6 text-start" id="v-pills-profile-tab" data-bs-toggle="pill"
        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
        aria-selected="false">
        Terms
      </button>
      <button class="nav-link blue h6 text-start" id="v-pills-messages-tab" data-bs-toggle="pill"
        data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
        aria-selected="false">
        Policy
      </button> --}}
      <button class="nav-link blue h6 text-start" id="v-pills-settings-tab" data-bs-toggle="pill"
        data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
        aria-selected="false">
        Devs
      </button>
    </div>
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel">
        TechCouncil is a platform where users can post questions and share answers for any tech-related topics, whether
        it is about building a custom PC, programming languages, what new smartphones are the best, how to install a VPN... you name it!
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel">
        Terms of service text
      </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel">
        Privacy Policy text
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel">
        <ul class="aside">
          <li><a class="different" target="_blank" href="https://github.com/ffriande">Francisco Friande </a></li>
          <li><a class="different" target="_blank" href="https://github.com/kiko-g">Francisco Gonçalves </a></li>
          <li><a class="different" target="_blank" href="https://github.com/TsarkFC">João Romão </a></li>
          <li><a class="different" target="_blank" href="https://github.com/migueldelpinto">Miguel Pinto </a></li>
        </ul>
      </div>
    </div>
  </div>

  {{-- <div class="border-top border-bottom card-body">
    <h5 class="card-title">Need help?</h5>
    <p class="card-text">Don't hesitate hitting us up.</p>
    <a href="{{ route('faq') }}" class="btn blue">FAQ</a>
    <a href="{{ route('about') }}" class="btn blue">Contact us</a>    
  </div> --}}
  
  <div class="p-2 text-end text-muted">
    © 2021 Tech Council, Inc.
  </div>
</div>
