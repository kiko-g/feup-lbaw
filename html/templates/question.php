<?php function buildQuestion($comments)
{ ?>
  <div class="card mb-4 p-2-0 border-0 rounded">
    <div class="card-header bg-petrol text-white font-open-sans">
      How do I compare strings in Java?
    </div>
    <div class="card-body">
      <p class="mb-3">
        I've been using the <code>==</code> operator in my program to compare all my strings so far.
        However, I ran into a bug, changed one of them into <code>.equals()</code> instead, and it fixed the bug.

        Is <code>==</code> bad? When should it and should it not be used? What's the difference?
      </p>
      <div class="row row-cols-3 mb-3">
        <div class="col-sm flex-wrap">
          <div id="votes" class="votes btn-group-special btn-group-vertical-when-responsive mt-1 flex-wrap">
            <a id="upvote-button" class="upvote-button my-btn-pad btn btn-outline-success teal" onclick="vote('up', this.parentNode)">
              <i class="fas fa-chevron-up"></i>
            </a>
            <a id="vote-ratio" class="vote-ratio btn btn-secondary my-btn-pad fake disabled"> 45 </a>
            <a id="downvote-button" class="downvote-button my-btn-pad btn btn-outline-danger pink" onclick="vote('down', this.parentNode)">
              <i class="fas fa-chevron-down"></i>
            </a>
          </div>
        </div>

        <div id="tags" class="col-sm-auto">
          <div class="btn-group mt-1">
            <a href="#" class="btn btn-secondary border-0 my-btn-pad2">java</a>
          </div>
          <div class="btn-group mt-1">
            <a href="#" class="btn btn-secondary border-0 my-btn-pad2">node</a>
          </div>
          <div class="btn-group mt-1">
            <a href="#" class="btn btn-secondary border-0 my-btn-pad2">msi</a>
          </div>
          <div class="btn-group mt-1">
            <a href="#" class="btn btn-secondary border-0 my-btn-pad2">nvidia</a>
          </div>
        </div>
      </div>
      <?php
      if ($comments != null) buildCommentSection($comments, 1);
      ?>
      <div class="row row-cols-3 justify-content-start">
        <div id="interact" class="col-sm-auto">
          <div class="btn-group mt-1 rounded">
            <a class="upvote-button my-btn-pad2 btn btn-outline-success star" id="upvote-button-<ID>" onclick="toggleStar(this)" href="#">
              <i class="far fa-star"></i>&nbsp;Save
            </a>
          </div>
          <div class="btn-group mt-1 rounded">
            <a class="upvote-button btn wine my-btn-pad2" id="upvote-button-<ID>" onclick="/**/" href="#">
              <i class="far fa-comment-dots"></i>&nbsp;25
            </a>
          </div>
          <?php if ($comments == null) { ?>
            <div class="btn-group mt-1 rounded">
              <a class="upvote-button btn teal my-btn-pad2" id="upvote-button-<ID>" onclick="/**/" href="#">
                <i class="fas fa-reply"></i>&nbsp;Reply
              </a>
            </div>
          <?php } ?>
          <div class="btn-group mt-1 rounded">
            <a class="upvote-button btn blue my-btn-pad2" id="upvote-button-<ID>" onclick="/**/" href="#">
              <i class="fas fa-share-alt"></i>&nbsp;Share
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer text-muted text-end p-0">
      <blockquote class="blockquote mb-0">
        <p class="card-text px-1">
          <small class="text-muted">34 seconds ago</small>
          <small>
            <a class="signature" href="#">user</a>
          </small>
        </p>
      </blockquote>
    </div>
  </div>
<?php } ?>

<!-- Vertical Buttons -->
<!-- <div class="btn-group-vertical">
  <a href="#" class="btn btn-outline-success border-0 my-btn-pad">
    <i class="fas fa-chevron-up"></i>
  </a>
  <span href="#" class="btn disabled btn-outline-dark border-0 my-btn-pad">29</span>
  <a href="#" class="btn btn-outline-danger border-0 my-btn-pad">
    <i class="fas fa-chevron-down"></i>
  </a>
</div> -->