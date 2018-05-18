/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function () {
    $('#example').DataTable();
    //$('#example1').DataTable();
    $("#paid-quiz").change(function() {
    if(this.checked) {
        $('#quiz-price-block').removeClass('hide');
    }   
    });
    $("#free-quiz").change(function() {
    if(this.checked) {
        $('#quiz-price-block').addClass('hide');
    }   
    });
    getEditor('.hasEditor');
    $("#from").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        dateFormat: 'yy-mm-dd',
        onClose: function (selectedDate) {
            $("#to").datepicker("option", "minDate", selectedDate);
        },
        onSelect: function (dateText, inst) {
            $('#quiz-form').formValidation('revalidateField', 'start_time');
        }
    });
    $("#to").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        dateFormat: 'yy-mm-dd',
        onClose: function (selectedDate) {
            $("#from").datepicker("option", "maxDate", selectedDate);
        },
        onSelect: function (dateText, inst) {
            $('#quiz-form').formValidation('revalidateField', 'end_time');
        }
    });
    $('#radioBtn a').on('click', function () {
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#' + tog).prop('value', sel);

        $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
    });
    $('#membership a').on('click', function () {
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#' + tog).prop('value', sel);

        $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
    });
    $('#ddlCars').multiselect();
    $('.save-essay-eval').click(function () {
        var id = $(this).data('id');
        var form_data = $('#savid_' + id).serialize();
        $.ajax({
            type: 'post',
            url: JS_BASE_URL + "quiz/saveevaluation",
            data: form_data,
            success: function (data) {
                if (data == 1) {
                    $('#' + id).text('added').addClass('btn-info').removeClass('btn-warning');
                } else {
                    alert(data);
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
        return false;
    });
    $('#question-form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            question_type: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Questio type'
                    },
                }
            },
            did: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Diffiulty level'
                    },
                }
            },
            question_category: {
                validators: {
                    notEmpty: {
                        message: 'Please select question category'
                    },
                }
            }
        }
    });
    //user-form
    $('#user-form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Email / Mobile No is required'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    },
                    stringLength: {
                        message: 'Email not be greater than 100',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    },
                    remote: {
                        url: JS_BASE_URL + 'users/checkusername',
                        message: 'This usenrame is already taken, please choose another one',
                        data: {
                            type: 'email'
                        },
                        type: 'POST',
                        delay: 1000
                    }
                }
            },
            first_name: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'First name is required'
                    },
                }
            },
            group_id: {
                validators: {
                    notEmpty: {
                        message: 'First name is required'
                    },
                }
            },
            last_name: {
                // The hidden input will not be ignored
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Last name is required'
                    },
                }
            },
            password: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    },
                    regexp: {
                        regexp: "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$",
                        message: 'Incorrect Password'
                    }
                }
            },
            cpassword: {
                verbose: false,
                validators: {
                    identical: {
                        field: 'password',
                        message: "The password does't match",
                    }
                }
            }
        }
    });
    $('#quiz-form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            quiz_name: {
                validators: {
                    notEmpty: {
                        message: 'Quiz Name is required'
                    },
                }
            },
            start_time: {
                validators: {
                    notEmpty: {
                        message: 'Start time is required'
                    },
                }
            },
            quiz_price: {
                validators: {
                    notEmpty: {
                        message: 'Start time is required'
                    },
                    integer: {
                        message: 'The value is not an integer'
                    }
                }
            },
            end_time: {
                validators: {
                    notEmpty: {
                        message: 'End time is required'
                    },
                }
            },
            pass_percentage: {
                validators: {
                    notEmpty: {
                        message: 'Percentage is required'
                    },
                    between: {
                        min: 0,
                        max: 100,
                        message: 'The Percentage must be between 0.0 and 100.0'
                    }
                }
            },
            max_attempts: {
                validators: {
                    notEmpty: {
                        message: 'Please select Maximum attempts'
                    },
                }
            },
            correct_score: {
                validators: {
                    notEmpty: {
                        message: 'Question marks is required'
                    },
                }
            },
            incorrect_score: {
                validators: {
                    notEmpty: {
                        message: 'Negetive marks is required'
                    },
                }
            }
        }
    });
    $('#category-form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            category_name: {
                validators: {
                    notEmpty: {
                        message: 'Category name is required'
                    },
                }
            },
            cat_duration: {
                validators: {
                    notEmpty: {
                        message: 'Category duration is required'
                    },
                    between: {
                        min: 0,
                        max: 200,
                        message: 'Duration must be between 0 and 200'
                    }
                }
            }
        }
    });

    $('#manual-quiz').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cat_duration: {
                validators: {
                    notEmpty: {
                        message: 'Quiz duration is required'
                    },
                    between: {
                        min: 1,
                        max: 300,
                        message: 'Duration must be between 1 and 300'
                    }
                }
            }
        }
    }).on('success.form.fv', function (e) {
// Prevent form submission
        e.preventDefault();
        var form = $("#manual-quiz").serialize();
        $.ajax({
            url: JS_BASE_URL + 'quiz/updateduration',
            type: 'POST',
            data: form,
            beforeSend: function () {
                $('body').prepend("<div class='mainLoader'><div class='loader2'></div></div>");
            },
            success: function (response) {
                if (response == 1) {
                    alert('Duration updated');
                } else {
                    alert('Internal Error please try again');
                }
            }
        });
        return false;
    });
    $('#auto-quiz').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cat_duration: {
                validators: {
                    notEmpty: {
                        message: 'Quiz duration is required'
                    },
                    between: {
                        min: 0,
                        max: 300,
                        message: 'Duration must be between 1 and 300'
                    }
                }
            }
        }
    }).on('success.form.fv', function (e) {
// Prevent form submission
        e.preventDefault();
        var form = $("#auto-quiz").serialize();
        $.ajax({
            url: JS_BASE_URL + 'quiz/updateduration',
            type: 'POST',
            data: form,
            beforeSend: function () {
                $('body').prepend("<div class='mainLoader'><div class='loader2'></div></div>");
            },
            success: function (response) {
                if (response == 1) {
                    alert('Duration updated');
                } else {
                    alert('Internal Error please try again');
                }
            }
        });
        return false;
    });
    $('#upload-form-1').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            category_name: {
                validators: {
                    notEmpty: {
                        message: 'Quiz duration is required'
                    },
                }
            }
        }
    }).on('success.form.fv', function (e) {
// Prevent form submission
        e.preventDefault();
        var form = $("#upload-form-1").serialize();
        $.ajax({
            url: JS_BASE_URL + 'upload/create',
            type: 'POST',
            data: form,
            success: function (response) {
                if (response == 1) {
                    alert('category Saved');
                    location.reload(true);
                } else {
                    alert('Internal Error please try again');
                }
            }
        });
        return false;
    });
    $('.add-remove').click(function () {
        var cat_id = $(this).data('cid');
        var op = $(this).data('operation');
        var quid = $(this).data('quid');
        var url;
        //alert(quid);
        if (op == 'add') {
            url = JS_BASE_URL + "quiz/addques";
            $(this).removeClass('btn-warning')
                    .data('operation', 'remove')
                    .addClass('btn-success')
                    .text('Remove');
        } else {
            url = JS_BASE_URL + "quiz/removeques";
            $(this).removeClass('btn-success')
                    .data('operation', 'add')
                    .addClass('btn-warning')
                    .text('Add');
        }
        var form_data = {'cat_id': cat_id, 'quid': quid};
        $.ajax({
            type: 'POST',
            url: url,
            data: form_data,
            success: function (data) {
            },
            error: function (statusCode, errorThrown) {
                if (statusCode.status == 0) {
                    alert("No Internet Connection");
                } else if (statusCode.status == 408) {
                    alert('Your internet is too slow , please try again');
                }
            }
        });
    });
    $('#upload-form-2').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            file_name: {
                validators: {
                    notEmpty: {
                        message: 'File is required'
                    },
                    file: {
                        extension: 'jpeg,jpg,png,pdf,doc,docx, xls,xlsx', //avi,wmv,mp4,flv',
                        type: 'image/jpeg,image/png,application/vnd.ms-excel,application/pdf,application/msword', //video/x-msvideo,video/x-ms-wmv,video/mp4',
                        maxSize: 2097152 * 1024, // 2048 * 1024
                        message: 'The selected file is not valid'
                    }
                }
            },
            file_type: {
                validators: {
                    notEmpty: {
                        message: 'File type is required'
                    },
                }
            },
            subject_id: {
                validators: {
                    notEmpty: {
                        message: 'Subject is required'
                    },
                }
            },
            topic_name: {
                validators: {
                    notEmpty: {
                        message: 'Topic name is required'
                    },
                }
            },
            'group[]': {
                validators: {
                    notEmpty: {
                        message: 'Topic name is required'
                    },
                }
            },
        }
    }).on('success.form.fv', function (e) {
        e.preventDefault();
        $("#progress-bar").width('0%');
        $("#progress-bar").show();
        $(this).ajaxSubmit({
            url: JS_BASE_URL + 'upload/create',
            target: '#targetLayer',
            beforeSubmit: function () {
                $("#progress-bar").width('0%');
            },
            uploadProgress: function (event, position, total, percentComplete) {
                $("#progress-bar").width(percentComplete + '%');
                $("#progress-bar").html('<div id="progress-status">' + percentComplete + ' %</div>');
                if (percentComplete == 100) {
                    $("#progress-bar").fadeOut(3000);
                }
            },
            complete: function (res) {
                if (res.responseText == 1) {
                    location.reload(true);
                } else {
                    alert(res.responseText);
                }
            }
            //resetForm: true 
        });
    });
    $('.delete-file-cat').click(function () {
        if (confirm('Are you sure.')) {
            var id = $(this).data('id');
            var form_data = {'cat_id': id, 'request': 'step-3'};
            $.ajax({
                type: 'POST',
                url: JS_BASE_URL + 'upload/create',
                data: form_data,
                success: function (data) {
                    if (data == 1) {
                        location.reload(true);
                    } else {
                        alert('Internal error please try again!');
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
        }
    });
    $('.delete-file').click(function () {
        if (confirm('Are you sure.')) {
            var id = $(this).data('id');
            var fname = $(this).data('filename');
            var form_data = {'fid': id, 'request': 'step-4', 'file_name': fname};
            $.ajax({
                type: 'POST',
                url: JS_BASE_URL + 'upload/create',
                data: form_data,
                success: function (data) {
                    if (data == 1) {
                        location.reload(true);
                    } else {
                        alert('Internal error please try again!');
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
        }
    });
    $('.update-file-cat').click(function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('#category_id').val(id);
        $('#category_name').val(name);
        $('#upd-btn').text('Update');
    });
});
function getEditor(selector) {
    tinyMCE.init({
        selector: selector,
        //mode: selector,
        theme: "advanced",
        relative_urls: false,
        plugins: "jbimages",
        width: 200,
        // ===========================================
        // PUT PLUGIN'S BUTTON on the toolbar
        // ===========================================
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4: "jbimages,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
    });
}
function selectQuestion(type) {
    var template = 'ques' + type;
    if (type != 3) {
        var id = template + '_last';
        $('.removable').remove();
        var $template = $('#' + template),
                $clone = $template
                .clone()
                .removeClass('hide')
                .addClass('removable')
                .removeAttr('id')
                .attr('id', id);
        $clone.insertAfter('#description-block');
        getEditor('#' + id + ' textarea');
        $('#' + id + ' .my-option').val(1);
        $('#question-submit button').text('Submit');
        $('.add-btn').click(function () {
            addOptions(template, id);
        });
    } else {
        $('.removable').remove();
        $('#question-submit button').text('Next');
    }
}

function addOptions(template, id) {
    var count = $('.removable').length;
    count = count + 1;
    if (count <= 10) {
        var newid = id + '_' + count;
        var $template = $('#' + template),
                $clone = $template
                .clone()
                .removeClass('hide')
                .addClass('removable')
                .removeAttr('id')
                .attr('id', newid);
        //$clone.insertAfter('#description-block');
        $clone.insertBefore('#question-submit');
        getEditor('#' + newid + ' textarea');
        $('#' + newid + ' .my-option').val(count);
        $('#' + newid + ' .add-btn').html('<i class="fa fa-minus-circle" aria-hidden="true"></i>');
        $('#' + newid + ' .add-btn').click(function () {
            removeOptions(newid);
        });
    } else {
        alert('You cannot add more than 10 option');
    }
}
function removeOptions(newid) {
    if (confirm("Are you sure want to delete this row!")) {
        $('#' + newid).remove();
    }
}
function delOption() {
    if (confirm("Are you sure want to delete this option!")) {
        //$('#' + newid).remove();
    }
}
function addQuesSingle(qid, id, quid) {
    var form_data = {'qid': qid, 'quid': quid};
    $.ajax({
        type: 'post',
        url: JS_BASE_URL + "quiz/addques",
        data: form_data,
        success: function (data) {
            if (data == 1) {
                $('#' + id).text('added').addClass('btn-info').removeClass('btn-warning');
            } else {
                alert(data);
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
}

function removeQuesSingle(qid, id, quid) {
    if (confirm('Are you sure wants to remove')) {
        var form_data = {'qid': qid, 'quid': quid};
        $.ajax({
            type: 'post',
            url: JS_BASE_URL + "quiz/removeques",
            data: form_data,
            success: function (data) {
                if (data == 1) {
                    $('#' + id).text('add').addClass('btn-warning').removeClass('btn-success');
                } else {
                    alert(data);
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
    }
}