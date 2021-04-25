<?php function buildQuestion($comments)
{ ?>
  <div class="card mb-5 p-2-0 border-0 rounded">
    <div class="card-header bg-petrol text-white font-source-sans-pro">
      <a class="a header" href="../pages/question.php">
        How do I compare strings in Java?
        <i class="fas fa-link fa-xs text-blue-200 mt-1dot5 ms-2"></i>
      </a>
    </div>
    <div class="card-body">
      <article class="row row-cols-2 mb-1">
        <div class="col-auto flex-wrap">
          <div id="votes" class="votes btn-group-vertical mt-1 flex-wrap">
            <a id="upvote-button" class="upvote-button my-btn-pad up btn btn-outline-success teal" onclick="vote('up', this.parentNode)">
              <i class="fas fa-chevron-up"></i>
            </a>
            <a id="vote-ratio" class="vote-ratio btn my-btn-pad fake disabled"> 42 </a>
            <a id="downvote-button" class="downvote-button my-btn-pad down btn btn-outline-danger pink" onclick="vote('down', this.parentNode)">
              <i class="fas fa-chevron-down"></i>
            </a>
          </div>
        </div>

        <div class="col-9 col-sm-10 col-md-11 col-lg-11 flex-wrap pe-0">
          <div id="question" class="mb-1">
            I've been using the <code>==</code> operator in my program to compare all my strings so far. However, I ran into a bug, changed one of them into <code>.equals()</code> instead, and it fixed the bug.


            <button class="btn btn-outline-info dark border-0 py-0 px-1" type="button" onclick="toogleText(this)" data-bs-toggle="collapse" data-bs-target="#collapseQuestionText2" aria-expanded="false" aria-controls="collapseQuestionText2">
              <i class="fas fa-ellipsis-h"></i>
            </button>

            <div class="collapse mt-2" id="collapseQuestionText2">
              However, I ran into a bug, changed one of them into <code>.equals()</code> instead, and it fixed the bug.
              Is <code>==</code> bad? When should it and should it not be used? What's the difference?
              Is <code>==</code> bad? When should it and should it not be used? What's the difference?
              Is <code>==</code> bad? When should it and should it not be used? What's the difference?
              Is <code>==</code> bad? When should it and should it not be used? What's the difference?
            </div>
          </div>

          <div class="row row-cols-2 mb-1">
            <div id="interact" class="col-md flex-wrap">
              <div class="btn-group mt-1 rounded">
                <a class="upvote-button my-btn-pad2 btn btn-outline-success bookmark" id="upvote-button-<ID>" onclick="toggleStar(this)" href="#">
                  <i class="far fa-bookmark"></i>&nbsp;Save
                </a>
              </div>
              <?php if ($comments == null) { ?>
                <div class="btn-group mt-1 rounded">
                  <a class="upvote-button btn teal my-btn-pad2" id="upvote-button-<ID>" href="#">
                    <i class="far fa-comment-dots"></i>&nbsp;25
                  </a>
                </div>
              <?php } ?>
              <div class="btn-group mt-1 rounded">
                <a class="upvote-button btn blue my-btn-pad2" id="upvote-button-<ID>" href="#">
                  <i class="fas fa-share-alt"></i>&nbsp;Share
                </a>
              </div>
            </div>

            <div id="tags" class="col-md-auto flex-wrap">
              <div class="btn-group mt-1">
                <a class="btn blue-alt border-0 my-btn-pad2" href="/pages/tag.php">java</a>
              </div>
              <div class="btn-group mt-1">
                <a class="btn blue-alt border-0 my-btn-pad2" href="/pages/tag.php">object-oriented</a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <?php
      if ($comments != null) buildCommentSection($comments, 1);
      ?>
    </div>

    <div class="card-footer text-muted text-end p-0">
      <blockquote class="blockquote mb-0">
        <p class="card-text px-1">
          <small class="text-muted">asked Aug 14 2020 at 15:31</small>
          <small>
            <a class="signature" href="#">user</a>
          </small>
        </p>
      </blockquote>
    </div>
  </div>
<?php } ?>





<?php function buildQuestion2($comments)
{ ?>
  <div class="card mb-5 p-2-0 border-0 rounded">
    <div class="card-header bg-petrol text-white font-source-sans-pro">
      <a class="a header" href="../pages/question.php">
        How to decide when to use Node.js?
        <i class="fas fa-link fa-xs text-blue-200 mt-1dot5 ms-2"></i>
      </a>
    </div>
    <div class="card-body">
      <article class="row row-cols-2 mb-2">
        <div class="col-auto flex-wrap">
          <div id="votes" class="votes btn-group-vertical mt-1 flex-wrap">
            <a id="upvote-button" class="upvote-button my-btn-pad up btn btn-outline-success teal" onclick="vote('up', this.parentNode)">
              <i class="fas fa-chevron-up"></i>
            </a>
            <a id="vote-ratio" class="vote-ratio btn my-btn-pad fake disabled"> 42 </a>
            <a id="downvote-button" class="downvote-button my-btn-pad down btn btn-outline-danger pink" onclick="vote('down', this.parentNode)">
              <i class="fas fa-chevron-down"></i>
            </a>
          </div>
        </div>

        <div class="col-9 col-sm-10 col-md-11 col-lg-11 flex-wrap pe-0">
          <div id="question" class="mb-1">
            I am new to this kind of stuff, but lately I've been hearing a lot about how good Node.js is.
            <button class="btn btn-outline-info dark border-0 py-0 px-1" type="button" onclick="toogleText(this)" data-bs-toggle="collapse" data-bs-target="#collapseQuestionText" aria-expanded="false" aria-controls="collapseQuestionText">
              <i class="fas fa-ellipsis-h"></i>
            </button>

            <div class="collapse mt-2" id="collapseQuestionText">
              Considering how much I love working with jQuery and JavaScript in general, I can't help but wonder how to decide when to use Node.js.
              The web application I have in mind is something like Bitly - takes some content, archives it.

              From all the homework I have been doing in the last few days, I obtained the following information. <code>Node.js</code>
              <ul>
                <li>is a command-line tool that can be run as a regular web server and lets one run JavaScript programs</li>
                <li>utilizes the great <a href="#">V8 JavaScript engine</a></li>
                <li>is very good when you need to do several things at the same time</li>
                <li>is event-based so all the wonderful <code>Ajax</code>-like stuff can be done on the server side</li>
                <li>lets us share code between the browser and the backend</li>
                <li>lets us talk with MySQL</li>
              </ul>

              Some of the sources that I have come across are:
              <ul>
                <li><a href="#">Diving into Node.js – Introduction and Installation</a></li>
                <li><a href="#">Understanding NodeJS</a></li>
                <li><a href="#">Node by Example</a> (<a href="#">Archive.is</a>)</li>
                <li><a href="#">Let’s Make a Web App: NodePad</a></li>
              </ul>
            </div>
          </div>

          <div class="row row-cols-2 mb-1">
            <div id="interact" class="col-md flex-wrap">
              <div class="btn-group mt-1 rounded">
                <a class="upvote-button my-btn-pad2 btn btn-outline-success bookmark" id="upvote-button-<ID>" onclick="toggleStar(this)" href="#">
                  <i class="far fa-bookmark"></i>&nbsp;Save
                </a>
              </div>
              <?php if ($comments == null) { ?>
                <div class="btn-group mt-1 rounded">
                  <a class="upvote-button btn teal my-btn-pad2" id="upvote-button-<ID>" href="#">
                    <i class="far fa-comment-dots"></i>&nbsp;25
                  </a>
                </div>
              <?php } ?>
              <div class="btn-group mt-1 rounded">
                <a class="upvote-button btn blue my-btn-pad2" id="upvote-button-<ID>" href="#">
                  <i class="fas fa-share-alt"></i>&nbsp;Share
                </a>
              </div>
            </div>

            <div id="tags2" class="col-sm-auto">
              <div class="btn-group mt-1">
                <a class="btn blue-alt border-0 my-btn-pad2" href="/pages/tag.php">javascript</a>
              </div>
              <div class="btn-group mt-1">
                <a class="btn blue-alt border-0 my-btn-pad2" href="/pages/tag.php">node.js</a>
              </div>
              <div class="btn-group mt-1">
                <a class="btn blue-alt border-0 my-btn-pad2" href="/pages/tag.php">web applications</a>
              </div>
              <div class="btn-group mt-1">
                <a class="btn blue-alt border-0 my-btn-pad2" href="/pages/tag.php">web applications</a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <?php
      if ($comments != null) buildCommentSection($comments, 1);
      ?>
    </div>

    <div class="card-footer text-muted text-end p-0">
      <blockquote class="blockquote mb-0">
        <p class="card-text px-1">
          <small class="text-muted">asked Aug 14 2020 at 15:31</small>
          <small>
            <a class="signature" href="#">user</a>
          </small>
        </p>
      </blockquote>
    </div>
  </div>
<?php } ?>