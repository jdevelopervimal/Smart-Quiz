    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    var CUR_QUID = $('#quiz-id').val();

    $(document).ready(function () {

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    //Getting Quiz Data
        var form_data = {'quiz-id': CUR_QUID};
        if (CUR_QUID > 0) {
            $.ajax({
                type: 'post',
                url: JS_BASE_URL + "getquiz",
                data: form_data,
                success: function (data) {
                    if (confirm('Are you ready to start?')) {
                        var bigdata = jQuery.parseJSON(data);
                        var ans = bigdata[0].ansdata;
                        plotSideBar(bigdata, ans.attempts_qids);
                        plotAnswersheet(bigdata, ans.attempts_oids);
                        accessQuiz(bigdata, parseInt(ans.current[0], 10), parseInt(ans.current[1], 10));
                    } else {
                        $('.cancel-msg').removeClass('hide');
                    }
                },
                error: function (statusCode, errorThrown) {
                    if (statusCode.status == 0) {
                        alert("No Internet Connection");
                    } else if (statusCode.status == 408) {
                        alert('Your internet is too slow , please try again');
                    }
                }
            });
        } else {
            $('.cancel-msg h1').text('Invalid Request for quiz');
            $('.cancel-msg').removeClass('hide');
        }

        $('#visible-calc').click(function () {
            $('.calc-main').toggleClass('calc-visible');
            $('.calc-main').removeClass('calc-small');
        });
        $('#exit-quiz').click(function () {
            if (confirm('Are you sure to exit Exam')) {
                quizExit();
            }
        });
        /*
         * Prompt user to reload and exit from page
         */
        window.addEventListener("beforeunload", function (e) {
            var message = "Are you sure you want to leave?";

            (e || window.event).returnValue = message;
            //alert(message);
            //return message;
        });

    });
    function accessQuiz(data, category, cur_ques) {
        var data = data;
        var count = data.length;
        $('#next-btn').data('category', category);
        if ((category) > 0) {
            var tgl = $('#catl_' + (category - 1)).addClass('disabled');
            var tgl1 = $('#catl_' + (category)).data('toggle', 'tab');
            $('.nav-tabs a[href="cat_' + (category) + '"]').tab('show');
            $('#cat_' + (category)).removeClass('disabled').addClass('active');
            $('#catab_' + (category)).removeClass('disabled').addClass('active');
            $('#cat_' + (category - 1)).removeClass('active').addClass('disabled');
            $('#catab_' + (category - 1)).removeClass('active').addClass('disabled');
            $(".nav-tabs a[data-toggle=tab]").on("click", function (e) {
                if ($(this).hasClass("disabled")) {
                    e.preventDefault();
                    return false;
                }
            });
        }
        if (category < count) {
            $('#quiz-section').html(data[category].category_name);
            var section_time = data[category].cat_duration;
            var hours = Math.trunc(section_time / 60);
            var minutes = section_time % 60;
            var time = data[category].cat_duration * 60;
            if (category == 0) {
                $('#future_date').countdown({until: +time, onExpiry: timeisUp, onTick: highlightLast5});
            } else {
                $('#future_date').countdown({until: +time, onExpiry: timeisUp, onTick: highlightLast5});
                $('#future_date').removeClass('highlight').countdown('option', {until: +time});
            }
            function highlightLast5(periods) {
                if ($.countdown.periodsToSeconds(periods) === 60) {
                    $(this).addClass('highlight');
                }
            }

            function timeisUp() {
                var category = $('#next-btn').data('category');
                var category_count = category + 1;
                $('#prev-btn').unbind('click');
                $('#skip-btn').unbind('click');
                $('#save-btn').unbind('click');
                $('#next-btn').unbind('click');
                accessQuiz(data, category_count, 1);
            }

            /************Plot my questions*****************/
            $('.removable').remove();
            var total_question = data[category].questions.length;
            var questions = data[category].questions;
            var ploting = (cur_ques - 1) + 1;
            $('#next-btn').data('current', ploting);
            question(questions[ploting - 1], (ploting));

            /***************QUESTION SAVE REQUEST*****************/

            $('#next-btn').click(function () {
                var current = $(this).data('current');
                var child = $('#next-btn').data('child');

                var cur_qid = (child > 0) ? child : questions[current - 1].qid;
                if (checkTextarea(cur_qid) || checkCheckboxes(cur_qid) || checkRadios(cur_qid)) {
                    $('#list-ques_' + category + '_' + current + ' > a').addClass('visited');
                    if (questions.length > current || child > 0) {
                        if (child > 0) {
                            var href = $("#child-switch_" + child).next().children("a").attr("href");
                            if (href !== undefined) {
                                saveQuestion(child);
                                var nqid = $("#child-switch_" + child).next().children("a").data("qid");
                                $('#next-btn').data('child', nqid);
                                $('.nav-tabs a[href="' + href + '"]').tab('show');
                            } else {
                                saveQuestion(child);
                                if (questions.length === current) {
                                    if (confirm('Sure to move next section')) {
                                        var category_count = category + 1;
                                        $('#prev-btn').unbind('click');
                                        $('#skip-btn').unbind('click');
                                        $('#save-btn').unbind('click');
                                        $('#next-btn').unbind('click');
                                        accessQuiz(data, category_count, 1);
                                    }
                                } else {
                                    $('.removable').remove();
                                    $('#next-btn').data('child', 0);
                                    $('#next-btn').data('current', (current + 1));
                                    question(questions[current], (current + 1));
                                }
                            }
                        } else {
                            saveQuestion(questions[current - 1].qid);
                            $('.removable').remove();
                            $('#next-btn').data('current', (current + 1));
                            question(questions[current], (current + 1));
                        }
                    } else {
                        saveQuestion(questions[current - 1].qid);
                        if (confirm('Sure to move next section')) {
                            var category_count = category + 1;
                            $('#prev-btn').unbind('click');
                            $('#skip-btn').unbind('click');
                            $('#save-btn').unbind('click');
                            $('#next-btn').unbind('click');
                            accessQuiz(data, category_count, 1);
                        }
                    }
                } else {
                    toastr["error"]('You can not leave empty Question', "Error");
                }

            });

            /******** Save Question **********/

            $('#save-btn').click(function () {
                var current = $('#next-btn').data('current');

                var child = $('#next-btn').data('child');
                var cur_qid = (child > 0) ? child : questions[current - 1].qid;
                if (checkTextarea(cur_qid) || checkCheckboxes(cur_qid) || checkRadios(cur_qid)) {
                    $('#list-ques_' + category + '_' + current + ' > a').addClass('visited');
                    if (child > 0) {
                        saveQuestion(child);
                    } else {
                        saveQuestion(questions[current - 1].qid);
                    }
                } else {
                    toastr["error"]('Plesae mark you answer', "Validation Error");
                }
            });


            /******** Skip Question **********/

            $('#skip-btn').click(function () {
                var current = $('#next-btn').data('current');
                if (($('#list-ques_' + category + '_' + current + ' > a').hasClass('visited')) === false) {
                    $('#list-ques_' + category + '_' + current + ' > a').addClass('skipped');
                }

                var child = $('#next-btn').data('child');
                if (child > 0 && (questions.length >= current)) {
                    var href = $("#child-switch_" + child).next().children("a").attr("href");
                    if (href !== undefined) {
                        var nqid = $("#child-switch_" + child).next().children("a").data("qid");
                        $('#next-btn').data('child', nqid);
                        $('.nav-tabs a[href="' + href + '"]').tab('show');
                    } else {
                        if (questions.length === current) {
                            if (confirm('Sure to move next section')) {
                                var category_count = category + 1;
                                $('#prev-btn').unbind('click');
                                $('#skip-btn').unbind('click');
                                $('#save-btn').unbind('click');
                                $('#next-btn').unbind('click');
                                accessQuiz(data, category_count, 1);
                            }
                        } else {
                            $('.removable').remove();
                            $('#next-btn').data('child', 0);
                            $('#next-btn').data('current', (current + 1));
                            question(questions[current], (current + 1));
                        }
                    }
                } else {
                    $('#next-btn').data('child', 0);
                    if (questions.length > current) {
                        $('.removable').remove();
                        $('#next-btn').data('current', (current + 1));
                        question(questions[current], (current + 1));

                    } else {
                        if (confirm('Sure to move next section')) {
                            var category_count = category + 1;
                            $('#prev-btn').unbind('click');
                            $('#skip-btn').unbind('click');
                            $('#save-btn').unbind('click');
                            $('#next-btn').unbind('click');
                            accessQuiz(data, category_count, 1);
                        }
                    }
                }

            });

            $('#prev-btn').click(function () {
                var current = $('#next-btn').data('current');
                //alert(current);
                if (current > 1) {
                    $('#next-btn').data('child', 0);
                    $('.removable').remove();
                    current = current - 1;
                    question(questions[current - 1], (current));
                    $('#next-btn').data('current', (current));
                } else {
                    alert('You can not go in previous section');
                }
            });


            /*****************************************************/

            $('li.switch-question-single').click(function () {
                var qid = $(this).data('queid');
                var qno = $(this).data('queno');
                if ((qno != '') && (qno != 'undefined')) {
                    $('.removable').remove();
                    //alert(questions[(qno-1)].qid);
                    question(questions[qno - 1], (qno));
                    $('#next-btn').data('current', (qno));
                }
            });

            /**********************************************/
        } else {
            alert('Exam Complete');
            quizExit();
        }
    }
    function checkRadios(qid) {
        if ($('#question-options-form_' + qid + ' input:radio[name=optid]').is(':checked')) {
            return true;
        } else {
            return false;
        }
    }
    function checkCheckboxes(qid) {
        var values = $('#question-options-form_' + qid + ' input:checkbox:checked.my-input').map(function () {
            return this.value;
        }).get();
        if (values.length) {
            return true;
            //alert(values);
        } else {
            //alert('values '+values+' false id'+qid+'		question-options-form_'+qid);
            return false;
        }
    }
    function checkTextarea(qid) {
        if ($('#question-options-form_' + qid + ' #essay-text').length) {
            if ($('#question-options-form_' + qid + ' #essay-text').val().trim().length > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function question(question, quesno) {
        var qid = question.qid;
        var ques = question.question;
        var q_type = question.q_type;
        var parent = question.parent_question;
        var option = question.options;
        if (q_type == 3) {
            plotQuestionType3(qid, quesno, ques);
            plotSubQues(question.sub_ques, qid, quesno);

            /*********Set child question environment ***********/
            $('.child-ques').click(function () {
                var child_qid = $(this).data('qid');
                $('#next-btn').data('child', child_qid);
            });

        } else {
            plotQuestion(q_type, ques, qid, quesno);
            plotOptions(q_type, option);
        }
        $('.my-input').click(function () {
            var opt_id = $(this).val();
            var checked = $(this).is(":checked");
            if (checked == 0) {
                $("#option-id-" + opt_id).prop("checked", false);
            } else {
                $("#option-id-" + opt_id).prop("checked", true);
            }
            //alert(opt_id);
        });
    }
    function plotSubQues(sub_ques, parent_id, quesno) {
        var html = '<div class="sub-ques col-md-6 removable">';
        html += '<ul class="nav nav-tabs" role="tablist">';
        sub_ques.forEach(function (value, index) {
            html += '<li role="presentation" id="child-switch_' + value.qid + '" class="' + ((index == 0) ? 'active' : '') + '"><a href="#home_' + index + '" aria-controls="home_' + index + '" role="tab" data-qid="' + value.qid + '" class="child-ques" data-toggle="tab">Question: ' + quesno + '.' + (index + 1) + '</a></li>';
        });
        html += '</ul>';
        html += '<div class="tab-content">';
        sub_ques.forEach(function (value, index) {
            if (index === 0) {
                $('#next-btn').data('child', value.qid);
            }
            var cur_cat, cur_ques = 0;
            cur_cat = $('#next-btn').data('category');
            cur_ques = $('#next-btn').data('current');

            html += '<div role="tabpanel" class="tab-pane parent_' + parent_id + ' ' + ((index == 0) ? 'active' : '') + '" id="home_' + index + '">';
            html += value.question;
            html += '<div class="option-section"><form id="question-options-form_' + value.qid + '">';
            html += '<input type="hidden" name="qid" value="' + value.qid + '"/>';
            html += '<input type="hidden" name="quid" value="' + CUR_QUID + '"/>';
            html += '<input type="hidden" name="cur_cat" value="' + cur_cat + '"/>';
            html += '<input type="hidden" name="cur_ques" value="' + cur_ques + '"/>';
            //CUR_QUID
            switch (true) {
                case (value.q_type == 1):
                    html += '<input type="hidden" name="q_type" value="1"/>';
                    value.options.forEach(function (option, i) {
                        var checked = $("#option-id-" + option.oid).is(":checked");
                        var check = (checked != 0) ? 'checked' : '';
                        html += '<div class="radio">';
                        html += '<span>' + (i + 1) + ' . </span>';
                        html += '<label style="font-size:16px">';
                        html += '<input type="radio" class="my-option my-input" name="optid" value="' + option.oid + '" ' + check + '/>';
                        html += '<span class="cr"><i class="cr-icon fa fa-circle"></i></span>';
                        html += option.option_value;
                        html += '</label>';
                        html += '</div>';
                    });
                    break;
                case (value.q_type == 2):
                    html += '<input type="hidden" name="q_type" value="2"/>';
                    value.options.forEach(function (option, i) {
                        var checked = $("#option-id-" + option.oid).is(":checked");
                        var check = (checked != 0) ? 'checked' : '';
                        html += '<div class="checkbox">';
                        html += '<span>' + (i + 1) + ' . </span>';
                        html += '<label style="font-size: 16px">';
                        html += '<input type="checkbox" class="my-input" name="optid[]" value="' + option.oid + '" ' + check + '/>';
                        html += '<span class="cr"><i class="cr-icon fa fa-check"></i></span>';
                        html += option.option_value;
                        html += '</label>';
                        html += '</div>';
                    });
                    break;
                default:
                    html += '<input type="hidden" name="q_type" value="3"/>';
                    html += '<textarea name="assay-ans" id="essay-text" class="form-control my-input"></textarea>';
                    break;
            }
            html += '</form></div>';
            html += '</div>';
        });
        html += '</div>';
        html += '</div>';
        $('#place-question-template').append(html);
        if (sub_ques.length <= 0) {
            $('.sub-ques col-md-6 removable').html('<p>No sub question available</p>');
        }
    }
    function saveQuestion(qid) {
        //alert(	$('#next-btn').data('current'));
        var form_data = $('#question-options-form_' + qid).serialize();
        var data = [];
        for (var i = 0; i < 100000; i++) {
            var tmp = [];
            for (var i = 0; i < 100000; i++) {
                tmp[i] = 'hue';
            }
            data[i] = tmp;
        }
        ;
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        console.log(percentComplete);
                        $('.progress-custom').removeClass('hide-custom');
                        $('.progress-custom').css({
                            width: percentComplete * 100 + '%'
                        });
                        if (percentComplete === 1) {
                            $('.progress-custom').addClass('hide-custom');
                        }
                    }
                }, false);
                xhr.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        console.log(percentComplete);
                        $('.progress-custom').removeClass('hide-custom');
                        $('.progress-custom').css({
                            width: percentComplete * 100 + '%'
                        });
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: JS_BASE_URL + "saveques",
            data: form_data,
            success: function (data) {

                if (data == '"saved"') {
                    toastr["success"]("Your answer successfully saved!", "Saved");
                } else {
                    toastr["error"](data, "Error");
                }
                $('.progress-custom').addClass('hide-custom');
            },
            error: function (statusCode, errorThrown) {
                if (statusCode.status == 0) {
                    alert("No Internet Connection");
                } else if (statusCode.status == 408) {
                    alert('Your internet is too slow , please try again');
                }
            }
        });
    }
    function plotQuestionType3(ques_id, quesCount, ques) {
        $('#question-tmpl #que').html(quesCount);
        $('#question-tmpl #question-name').html(ques);
        var $template = $('#question-tmpl'),
            $clone = $template
                .clone()
                .removeClass('hide')
                .removeClass('col-md-12')
                .addClass('col-md-6')
                .addClass('removable')
                .removeAttr('id')
                .attr('id', 'question_' + ques_id);
        $clone.appendTo('#place-question-template');
        $('#question_' + ques_id + ' .option-section').remove();
    }
    function plotQuestion(q_type, ques, ques_id, quesCount) {
        $('#question-tmpl #que').html(quesCount);
        $('#question-tmpl #question-name').html(ques);
        var $template = $('#question-tmpl'),
            $clone = $template
                .clone()
                .removeClass('hide')
                .addClass('removable')
                .addClass('main-ques')
                .removeAttr('id')
                .attr('id', 'question_' + ques_id);
        $clone.appendTo('#place-question-template');
        $('.main-ques .question-options-form').attr('id', 'question-options-form_' + ques_id);
        $('.main-ques .question-options-form .qid-form').val(ques_id);
    }
    function plotOptions(q_type, options) {
        var cur_cat, cur_ques = 0;
        cur_cat = $('#next-btn').data('category');
        cur_ques = $('#next-btn').data('current');
        var html = '';
        html += '<input type="hidden" name="quid" value="' + CUR_QUID + '"/>';
        html += '<input type="hidden" name="cur_cat" value="' + cur_cat + '"/>';
        html += '<input type="hidden" name="cur_ques" value="' + cur_ques + '"/>';
        switch (true) {
            case (q_type == 1):
                html += '<input type="hidden" name="q_type" value="1"/>';
                options.forEach(function (value, index) {
                    var checked = $("#option-id-" + value.oid).is(":checked");
                    var check = (checked != 0) ? 'checked' : '';
                    html += '<div class="radio">';
                    html += '<span>' + (index + 1) + ' . </span>';
                    html += '<label style="font-size:16px">';
                    html += '<input type="radio" class="my-option my-input" name="optid" value="' + value.oid + '" ' + check + '/>';
                    html += '<span class="cr"><i class="cr-icon fa fa-circle"></i></span>';
                    html += value.option_value;
                    html += '</label>';
                    html += '</div>';
                });
                break;
            case (q_type == 2):
                html += '<input type="hidden" name="q_type" value="2"/>';
                options.forEach(function (value, index) {
                    var checked = $("#option-id-" + value.oid).is(":checked");
                    var check = (checked != 0) ? 'checked' : '';
                    html += '<div class="checkbox">';
                    html += '<span>' + (index + 1) + ' . </span>';
                    html += '<label style="font-size: 16px">';
                    html += '<input type="checkbox" class="my-option my-input" name="optid[]" value="' + value.oid + ' ' + check + '/">';
                    html += '<span class="cr"><i class="cr-icon fa fa-check"></i></span>';
                    html += value.option_value;
                    html += '</label>';
                    html += '</div>';
                });
                break;
            default:
                html += '<input type="hidden" name="q_type" value="3"/>';
                html += '<textarea name="assay-ans" id="essay-text" class="form-control my-input"></textarea>';

                break;
        }
        $('.main-ques .question-options-form').append(html);
    }
    function plotSideBar(category, qids) {
        var arrayQids = qids.split(',')
        var cat_switch = '';
        var question_switch = '';
        for (var i = 0; i < category.length; i++) {
            cat_switch += '<li role="presentation" id="catab_' + i + '" class="' + ((i == 0) ? 'active' : 'disabled') + '"><a href="#cat_' + i + '" id="catl_' + i + '" aria-controls="cat_' + i + '" role="tab" data-toggle="' + ((i == 0) ? 'tab' : '') + '">' + category[i].category_name + '</a></li>';
            question_switch += '<div role="tabpanel" class="tab-pane ' + ((i == 0) ? 'active' : 'disabled') + '" id="cat_' + i + '">';
            question_switch += '<h4>' + category[i].category_name + '</h4>';
            question_switch += '<ul class="switch-question">';
            var quest = category[i].questions;
            if (quest.length > 0) {
                for (var j = 0; j < quest.length; j++) {
                    var ch = jQuery.inArray(quest[j].qid, arrayQids);
                    var checked = (ch >= 0) ? 'visited' : '';
                    question_switch += '<li class="switch-question-single" id="list-ques_' + i + '_' + (j + 1) + '" data-queno="' + (j + 1) + '" data-queid="' + quest[j].qid + '"> <a class="' + checked + '">' + (j + 1) + '</a></li>';
                }
            } else {
                question_switch += 'No question available for this category';
            }
            question_switch += '</ul>';
            question_switch += '</div>';

        }
        $('#side-tab').html(cat_switch);
        $('#side-ques').html(question_switch);
    }
    function quizExit() {
        //window.location=JS_BASE_URL+"results";
        $('#finish-quiz').submit();
    }

    function plotAnswersheet(category, attempt_oids) {
        //alert(jQuery.inArray('178', attempt_oids));
        for (var i = 0; i < category.length; i++) {
            var cat_name = '<tr><td colspan="7"><strong>' + (i + 1) + ' : ' + category[i].category_name + '</strong></td></tr>';
            $('#ans-table > tbody:last-child').append(cat_name);
            var quest = category[i].questions;
            for (var j = 0; j < quest.length; j++) {
                if (quest[j].q_type != 3) {
                    var qno = j + 1;
                    var html = getOptionForAns(qno, quest[j].q_type, quest[j].qid, quest[j].options, attempt_oids);
                    $('#ans-table > tbody:last-child').append(html);
                } else {
                    var sub_que = quest[j].sub_ques;
                    sub_que.forEach(function (value, index) {
                        var qno = (j + 1) + '.' + (index + 1);
                        var html = getOptionForAns(qno, value.q_type, value.qid, value.options, attempt_oids);
                        $('#ans-table > tbody:last-child').append(html);
                    });
                }
            }
        }
    }
    function getOptionForAns(qno, q_type, qid, options, attempt_oids) {
        var html;
        html = '<tr>';
        html += '<td>' + qno + '</td>';
        switch (true) {
            case (q_type == 1):
                options.forEach(function (value, index) {
                    var ch = jQuery.inArray(value.oid, attempt_oids);
                    var checked = (ch >= 0) ? 'checked' : '';
                    html += '<td>';
                    html += '<input type="radio" class="my-option my-input" id="option-id-' + value.oid + '" name="optid' + qid + '" value="' + value.oid + '" ' + checked + ' disabled/>';
                    html += '</td>';
                });
                break;
            case (q_type == 2):
                options.forEach(function (value, index) {
                    var ch = jQuery.inArray(value.oid, attempt_oids);
                    var checked = (ch >= 0) ? 'checked' : '';
                    html += '<td>';
                    html += '<input type="checkbox" class="my-input" id="option-id-' + value.oid + '" name="optid' + qid + '[]" value="' + value.oid + '" ' + checked + ' disabled/>';
                    html += '</td>';
                });
                break;
            default:
                html += '<td colspan="7">Essay Question</td>';
                break;
        }
        html += '</tr>';
        return html;
    }
