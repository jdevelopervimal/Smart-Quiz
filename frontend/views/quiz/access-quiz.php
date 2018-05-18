<div class="col-lg-12 col-sm-12 content">
    <div class="row" id="place-question-template">




        <div class='cancel-msg hide'>
            <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
            <h1>You Canceled you Exam</h1>
            <a href='<?= BASE_URL ?>quiz'><button class="btn btn-primary">Go Back</button></a>
        </div>

        <div class='cancel-msg removable'>
            
            <img src="<?= BASE_URL?>frontend/web/images/loading.gif" />
            <h1>Please wait</h1>
            
        </div>

    </div>
</div>
<input type="hidden" value="<?= $quid ?>" id="quiz-id"/>
<!-- SIDE BAR -->
<div class="wrapper">
    <div class="toggle">
        <ul class="nav nav-tabs" id="side-tab" role="tablist">
        </ul>
    </div>
    <div class="cart">
        <div class="tab-content padd" id="side-ques">
            <div role="tabpanel" class="tab-pane active" id="home">
                <h4>section 1</h4>
                <ul class="switch-question">
                    <li><a class="visited">	111</a></li>
                    <li><a class="skipped">	21</a></li>
                </ul>
            </div>
        </div>
        <div class="info">
            <ul class="switch-question">
                <li><a class="visited">Save Question</a></li>
                <li><a class="skipped">Skipped question</a></li>
            </ul>
        </div>
    </div>
</div>

<!--All Question Template -->
<!-- Single type Template -->
<div class="col-md-12 hide" id="question-tmpl">
    <div class="page-header">
        <h1>Question : <span id="que">10</span></h1>
        <div class="clearfix"></div>
    </div>
    <div class="question-section" id="question-name">
    </div>
    <!--Question options template -->
    <div class="option-section">
        <form class="question-options-form">
            <input type="hidden" name="qid" class="qid-form" value=""/>
        </form>
    </div>
</div>
<form action="<?= BASE_URL ?>results" method="post" id="finish-quiz">
    <input type="hidden" value="<?= $quid ?>" name="quiz-id" id="quiz-id"/>
</form>


<!-- Modal -->
<div class="modal fade" id="answer-sheet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Answer Sheet</h4>
            </div>
            <div class="modal-body" id="answer-sheet-main">

                <table class="table table-bordered" id="ans-table">
                    <thead>
                        <tr>
                            <th>Question No.</th>
                            <th>Option 1</th>
                            <th>Option 2</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <th>Option 5</th>
                            <th>Option 6</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="confirm-to-submit">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>