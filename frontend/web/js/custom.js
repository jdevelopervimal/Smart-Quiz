/* 
	* To change this license header, choose License Headers in Project Properties.
	* To change this template file, choose Tools | Templates
	* and open the template in the editor.
	*/
!function(a,b){function g(b,c){this.$element=a(b),this.settings=a.extend({},f,c),this.init()}var e="floatlabel",f={slideInput:!0,labelStartTop:"20px",labelEndTop:"10px",paddingOffset:"10px",transitionDuration:.3,transitionEasing:"ease-in-out",labelClass:"",typeMatches:/text|password|email|number|search|url/};g.prototype={init:function(){var a=this,c=this.settings,d=c.transitionDuration,e=c.transitionEasing,f=this.$element,g={"-webkit-transition":"all "+d+"s "+e,"-moz-transition":"all "+d+"s "+e,"-o-transition":"all "+d+"s "+e,"-ms-transition":"all "+d+"s "+e,transition:"all "+d+"s "+e};if("INPUT"===f.prop("tagName").toUpperCase()&&c.typeMatches.test(f.attr("type"))){var h=f.attr("id");h||(h=Math.floor(100*Math.random())+1,f.attr("id",h));var i=f.attr("placeholder"),j=f.data("label"),k=f.data("class");k||(k=""),i&&""!==i||(i="You forgot to add placeholder attribute!"),j&&""!==j||(j=i),this.inputPaddingTop=parseFloat(f.css("padding-top"))+parseFloat(c.paddingOffset),f.wrap('<div class="floatlabel-wrapper" style="position:relative"></div>'),f.before('<label for="'+h+'" class="label-floatlabel '+c.labelClass+" "+k+'">'+j+"</label>"),this.$label=f.prev("label"),this.$label.css({position:"absolute",top:c.labelStartTop,left:f.css("padding-left"),display:"none","-moz-opacity":"0","-khtml-opacity":"0","-webkit-opacity":"0",opacity:"0"}),c.slideInput||f.css({"padding-top":this.inputPaddingTop}),f.on("keyup blur change",function(b){a.checkValue(b)}),b.setTimeout(function(){a.$label.css(g),a.$element.css(g)},100),this.checkValue()}},checkValue:function(a){if(a){var b=a.keyCode||a.which;if(9===b)return}var c=this.$element,d=c.data("flout");""!==c.val()&&c.data("flout","1"),""===c.val()&&c.data("flout","0"),"1"===c.data("flout")&&"1"!==d&&this.showLabel(),"0"===c.data("flout")&&"0"!==d&&this.hideLabel()},showLabel:function(){var a=this;a.$label.css({display:"block"}),b.setTimeout(function(){a.$label.css({top:a.settings.labelEndTop,"-moz-opacity":"1","-khtml-opacity":"1","-webkit-opacity":"1",opacity:"1"}),a.settings.slideInput&&a.$element.css({"padding-top":a.inputPaddingTop}),a.$element.addClass("active-floatlabel")},50)},hideLabel:function(){var a=this;a.$label.css({top:a.settings.labelStartTop,"-moz-opacity":"0","-khtml-opacity":"0","-webkit-opacity":"0",opacity:"0"}),a.settings.slideInput&&a.$element.css({"padding-top":parseFloat(a.inputPaddingTop)-parseFloat(this.settings.paddingOffset)}),a.$element.removeClass("active-floatlabel"),b.setTimeout(function(){a.$label.css({display:"none"})},1e3*a.settings.transitionDuration)}},a.fn[e]=function(b){return this.each(function(){a.data(this,"plugin_"+e)||a.data(this,"plugin_"+e,new g(this,b))})}}(jQuery,window,document);


$(document).ready(function () {
    //Initialize tooltips
				$('#example').DataTable();
   $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
				
    $('.wizard a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {
        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
$('input[type=text][name=password]').tooltip({
    placement: "right",
    trigger: "focus"
});
 $('.inbox .form-control').floatlabel({
        labelClass: 'float-label',
        labelEndTop: 5
});
/*
	* Prompt user to reload and exit from page
	* 
window.addEventListener("beforeunload", function (e) {
  var message = "Are you sure you want to leave?";

  (e || window.event).returnValue = message;     
  alert(message);
		//return message;                                
});
*/
$('.open-video').click(function(){		
		var vid= $(this).data("video");
		$('#new-video').text(vid);
		$('#myModal').modal();
});

$('#my-info input:text').each(function(){
       $(this).focus(function(){
          $('#pers-info').removeClass('hide');
									});
});
$('#my-info-password input:password').each(function(){
       $(this).focus(function(){
           $('#pass-info').removeClass('hide');
									});
});
$('.image-uploader').click(function(){
		$('#pers-info').removeClass('hide');
});
$('#my-info-social input:text').each(function(){
       $(this).focus(function(){
           $('#info-social').removeClass('hide');
									});
});

/*********
$(function () {
   
  var msie6 = $.browser == 'msie' && $.browser.version < 7;
   
  if (!msie6 && $('.leftsidebar').offset()!=null) {
    var top = $('.leftsidebar').offset().top - parseFloat($('.leftsidebar').css('margin-top').replace(/auto/, 0));
    var height = $('.leftsidebar').height();
    var winHeight = $(window).height(); 
    var footerTop = $('#footer').offset().top - parseFloat($('#footer').css('margin-top').replace(/auto/, 0));
    var gap = 7;
    $(window).scroll(function (event) {
      // what the y position of the scroll is
      var y = $(this).scrollTop();
       
      // whether that's below the form
      if (y+winHeight >= top+ height+gap && y+winHeight<=footerTop) {
        // if so, ad the fixed class
        $('.leftsidebar').addClass('leftsidebarfixed').css('top',winHeight-height-gap +'px');
      } 
      else if (y+winHeight>footerTop) {
        // if so, ad the fixed class
       $('.leftsidebar').addClass('leftsidebarfixed').css('top',footerTop-height-y-gap+'px');
      } 
      else    
      {
        // otherwise remove it
        $('.leftsidebar').removeClass('leftsidebarfixed').css('top','0px');
      }
    });
  }  
});
/*************/

$('#profile-form').formValidation({
				framework: 'bootstrap',
				icon: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
						username: {
																verbose: false,
                message: 'The username is not valid',
                validators: {
																		notEmpty: {
                    message: 'The username is required'
																				},
																				stringLength: {
																								min: 6,
																								max: 30,
																								message: 'The username must be more than 6 and less than 30 characters long'
																				},
																				regexp: {
																								regexp: /^[a-zA-Z0-9_\.]+$/,
																								message: 'The username can only consist of alphabetical, number, dot and underscore'
																				},
                    remote: {
																						url: JS_BASE_URL+'checkusername',
//																								delay: 300,
//																								data: function(validator, $field, value) {
//                            return {
//                                email: validator.getFieldElements('email').val()
//                            };
//                        },
//                        message: 'The username already taken',
//                        type: 'POST'
																								 message: {
																										en_US:  "This usenrame is already taken, please choose another one",
																										 },
																										data: {
																														type: 'username'
																										},
																										type: 'POST',
																										delay: 1000
																						}
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
                        message: 'Password must contain uppercase,lowercase,numeric and one special character'
                    }
										}
       },
							cpassword: {
																verbose: false,
                validators: {
																		notEmpty: {
																		message: 'Password is required'
																		},
                    identical: {
                        field: 'password',
                        message: "The password does't match",
                    }
                }
            }
				}
		}).on('success.form.fv', function (e) {
				// Prevent form submission
				e.preventDefault();
				$.ajax({
						type: "post",
						data: $('#profile-form').serialize(),
						url: JS_BASE_URL + 'complete-profile',
						success: function (response) {
								if(response == 1){
										var $active = $('.wizard .nav-tabs li.active');
										$active.next().removeClass('disabled');
										nextTab($active);
								}
						}
				});
		});
		
		$('#my-info-password').formValidation({
				framework: 'bootstrap',
				icon: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
				old_password: {
										verbose: false,
										validators: {
														notEmpty: {
																		message: 'Password is required'
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
                        message: 'Password must contain uppercase,lowercase,numeric and one special character'
                    }
										}
       },
							cpassword: {
																verbose: false,
                validators: {
																		notEmpty: {
																		message: 'Password is required'
																		},
                    identical: {
                        field: 'password',
                        message: "The password does't match",
                    }
                }
            }
				}
		}).on('success.form.fv', function (e) {
				// Prevent form submission
				e.preventDefault();
				$.ajax({
						type: "post",
						data: $('#my-info-password').serialize(),
						url: JS_BASE_URL + 'settings',
						success: function (response) {
								if(response == 1){
										$('#pass-info').addClass('hide');
								}else{
										alert('Old Password does not match');
								}
						}
				});
		});
$('#profile-form-personal').formValidation({
				framework: 'bootstrap',
				icon: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
						first_name: {
								verbose: false,
								validators: {
										notEmpty: {
												message: 'First name is required'
										},
								}
						},
						last_name: {
								verbose: false,
								validators: {
										notEmpty: {
												message: 'Last name is required'
										},
								}
						},
				}
		}).on('success.form.fv', function (e) {
				e.preventDefault();
				var fd = new FormData();
    var file_data = $('input[type="file"]')[0].files; // for multiple files
    for(var i = 0;i<file_data.length;i++){
        fd.append("file_"+i, file_data[i]);
    }
    var other_data = $('#profile-form-personal').serializeArray();
    $.each(other_data,function(key,input){
        fd.append(input.name,input.value);
    });
				$.ajax({
						url: JS_BASE_URL + 'complete-profile',
						type: 'POST',
        data:fd,
								cache: false,
        contentType: false,
        processData: false,
        success: function (res) {
										if(res == 1){
										var $active = $('.wizard .nav-tabs li.active');
										$active.next().removeClass('disabled');
										nextTab($active);
								}
        }
				});
		});
		
		$('#my-info').formValidation({
				framework: 'bootstrap',
				icon: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
						first_name: {
								verbose: false,
								validators: {
										notEmpty: {
												message: 'First name is required'
										},
								}
						},
						last_name: {
								verbose: false,
								validators: {
										notEmpty: {
												message: 'Last name is required'
										},
								}
						},
				}
		}).on('success.form.fv', function (e) {
				e.preventDefault();
				var fd = new FormData();
    var file_data = $('input[type="file"]')[0].files; // for multiple files
    for(var i = 0;i<file_data.length;i++){
        fd.append("file_"+i, file_data[i]);
    }
    var other_data = $('#my-info').serializeArray();
    $.each(other_data,function(key,input){
        fd.append(input.name,input.value);
    });
				$.ajax({
						url: JS_BASE_URL + 'settings',
						type: 'POST',
        data:fd,
								cache: false,
        contentType: false,
        processData: false,
        success: function (res) {
										if(res == 1){
									$('#pers-info').addClass('hide');
								}
        }
				});
		});

$('#profile-form-academic').formValidation({
				framework: 'bootstrap',
				icon: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
						highest_qualification: {
								verbose: false,
								validators: {
										notEmpty: {
												message: 'First name is required'
										},
								}
						},
						specialization: {
								// The hidden input will not be ignored
								verbose: false,
								validators: {
										notEmpty: {
												message: 'Last name is required'
										},
								}
						},
						year_of_passedout: {
								// The hidden input will not be ignored
								verbose: false,
								validators: {
										notEmpty: {
												message: 'Last name is required'
										},
								}
						},
				}
		}).on('success.form.fv', function (e) {
				e.preventDefault();
				$.ajax({
						url: JS_BASE_URL + 'complete-profile',
						type: 'POST',
        data:$('#profile-form-academic').serialize(),
        success: function (res) {
          if(res == 1){
										var $active = $('.wizard .nav-tabs li.active');
										$active.next().removeClass('disabled');
										nextTab($active);
								}
        }
				});
		});


		$('#accepts_terms').click(function(){
				if($("#terms-check").is(':checked')){
				$.ajax({
						url: JS_BASE_URL + 'complete-profile',
						type: 'POST',
       data:$('#profile-form-terms').serialize(),
        success: function (res) {
										if(res == 1){
										window.location.href = JS_BASE_URL + 'profile';
								}
        }
				});
		}	else{
    alert('Please accept terms & Condition');		}
				
		});
});
function nextTab(elem) {
    $toM = $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

// Required for drag and drop file access
jQuery.event.props.push('dataTransfer');

// IIFE to prevent globals
(function () {

    var s;
    var UserImage = {

        settings: [],
        uploaded: [],

        init: function (settings) {
            UserImage.settings = settings;
            s = settings;
            UserImage.bindUIActions();
        },

        bindUIActions: function () {

            var timer;

            for (i = 0; i < s.length; i++) {
                s[i].each(function (index) {
                    $(this)
                        .data('width', $(this).data('base-width'))
                        .data('height', $(this).data('base-height'))
                        .data('zoom-factor', 0);
                    $(this).css({
                        'width': $(this).data('base-width'),
                            'height': $(this).data('base-height')
                    });
                    $('.image', $(this)).css({
                        'width': $(this).data('base-width'),
                            'height': $(this).data('base-height')
                    });
                });

                s[i].on("dragover", function (event) {
                    clearTimeout(timer);
                    UserImage.showDroppableArea($(event.currentTarget));

                    // Required for drop to work
                    return false;
                });

                s[i].on('dragleave', function (event) {
                    // Flicker protection
                    timer = setTimeout(function () {
                        UserImage.hideDroppableArea($(event.currentTarget));
                    }, 200);
                });

                s[i].on('drop', function (event) {
                    // Or else the browser will open the file
                    event.preventDefault();
                    $('.zoom', $(event.currentTarget)).show('fade');
                    UserImage.handleDrop($(event.currentTarget), event.dataTransfer.files);
                });
            }
            $('.zoom .plus').click(function (event) {
                UserImage.zoom($(event.currentTarget).parent().parent(), 1);
            });
            $('.zoom .minus').click(function (event) {
                UserImage.zoom($(event.currentTarget).parent().parent(), -1);
            });
            $('.zoom .close').click(function (event) {
                UserImage.reset($(event.currentTarget).parent().parent());
            });

            $('.image-uploader .image').on('click', function (event) {
                $('#uploader', $(event.currentTarget).parent()).trigger('click');
            });

            $("#uploader").on('change', function (event) {
                $('.zoom', $(event.currentTarget).parent()).show('fade');
                UserImage.handleDrop($(event.currentTarget).parent(),
                event.target.files);
            });
        },

        showDroppableArea: function (elt) {
            elt.addClass("droppable");
        },

        hideDroppableArea: function (elt) {
            elt.removeClass("droppable");
        },

        handleDrop: function (elt, files) {

            UserImage.hideDroppableArea(elt);

            // Multiple files can be dropped. Lets only deal with the "first" one.
            var file = files[0];

            if (file.type.match('image.*')) {
                UserImage.handleImage(elt, file);
            } else {
                alert("This file is not an image.");
            }

        },

        handleImage: function (elt, file) {
            UserImage.resizeImage(elt, file, elt.data('width'), elt.data('height'), function (data, width, height) {
                UserImage.placeImage(elt, data);
                var pos = $(elt).position();
                $('img', elt)
                    .css({
                    'left': elt.data('pos-x'),
                        'top': elt.data('pos-y')
                })
                    .draggable({
                    containment: [pos.left - width + elt.data('base-width'),
                    pos.top - height + elt.data('base-height'),
                    pos.left,
                    pos.top]
                });

                UserImage.uploaded[elt] = file;
            });
        },

        resizeImage: function (elt, file, width, height, callback) {
            var fileTracker = new FileReader;
            fileTracker.onload = function () {
                Resample(
                elt,
                this.result,
                width,
                height,
                callback);
            }
            fileTracker.readAsDataURL(file);

            fileTracker.onabort = function () {
                alert("The upload was aborted.");
            }
            fileTracker.onerror = function () {
                alert("An error occured while reading the file.");
            }

        },

        placeImage: function (elt, data) {
            elt.addClass('filled');
            $('img', elt).attr("src", data);
        },

        reset: function (elt) {
            $('img', elt)
                .attr('src', 'http://s.cdpn.io/24822/empty.png')
                .css({
                position: '',
                top: '',
                left: ''
            })
                .draggable('destroy');
            $(elt)
                .data('width', $(elt).data('base-width'))
                .data('height', $(elt).data('base-height'))
                .data('zoom-factor', 0)
                .removeClass('filled');
            UserImage.uploaded[elt] = null;
            $('.zoom', elt).hide();
        },

        zoom: function (elt, factor) {
            var currentWidth, currentHeight, originalWidth, originalHeight, baseWidth, baseHeight, currentZoom, posx, posy;
            currentWidth = elt.data('width');
            currentHeight = elt.data('height');
            originalWidth = elt.data('original-width');
            originalHeight = elt.data('original-height');
            baseWidth = elt.data('base-width');
            baseHeight = elt.data('base-height');
            currentZoom = elt.data('zoom-factor');

            /* don't zoom if natural resolution */
            if ((currentWidth >= originalWidth && currentHeight >= originalHeight && factor > 0) || currentZoom + factor < 0) return;

            /* save relative pos */
            posx = (-$('img', elt).position().left + (baseWidth / 2)) / currentWidth;
            posy = (-$('img', elt).position().top + (baseHeight / 2)) / currentHeight;

            /* update zoom and dimensions */
            currentZoom += factor;
            $(elt).data('zoom-factor', currentZoom);

            var imgRatio = originalWidth / originalHeight;
            var currentWidth = imgRatio <= 1 ? baseWidth : Math.round(originalWidth * baseHeight / originalHeight);
            var currentHeight = imgRatio > 1 ? baseHeight : Math.round(originalHeight * baseWidth / originalWidth);

            currentWidth = currentWidth * (1 + currentZoom * 0.1);
            currentHeight = currentHeight * (1 + currentZoom * 0.1);

            /* save new relative pos */
            posx = -(Math.round(posx * currentWidth) - (baseWidth / 2));
            posy = -(Math.round(posy * currentHeight) - (baseHeight / 2));
            $(elt).data('pos-x', posx);
            $(elt).data('pos-y', posy);
            $(elt).data('width', currentWidth);
            $(elt).data('height', currentHeight);

            var file = UserImage.uploaded[elt];
            UserImage.handleImage(elt, file);
        }
    }

    UserImage.init([$(".image-uploader")]);

})();


/*
 * Image resizing
 */
var Resample = (function (canvas) {

    // (C) WebReflection Mit Style License

    function Resample(elt, img, width, height, onresample) {
        var

        load = typeof img == "string",
            i = load || img;

        // if string, a new Image is needed
        if (load) {
            i = new Image;
            i.onload = onload;
            i.onerror = onerror;
        }

        i._onresample = onresample;
        i._width = width;
        i._height = height;
        i._elt = elt;
        load ? (i.src = img) : onload.call(img);
    }

    function onerror() {
        throw ("not found: " + this.src);
    }

    function onload() {
        var
        img = this,
            width = img._width,
            height = img._height,
            onresample = img._onresample;

        img._elt.data('original-width', img.width);
        img._elt.data('original-height', img.height);
        // if width and height are both specified
        // the resample uses these pixels
        // if width is specified but not the height
        // the resample respects proportions
        // accordingly with orginal size
        // same is if there is a height, but no width
        var minValue = Math.min(img.height, img.width);
        var imgRatio = img.width / img.height;
        var targetRatio = height / width;
        var targetWidth = imgRatio <= 1 ? width : round(img.width * height / img.height);
        var targetHeight = imgRatio > 1 ? height : round(img.height * width / img.width);
        //width == null && (width = round(img.width * height / img.height));
        //height == null && (height = round(img.height * width / img.width));

        img._elt.data('width', targetWidth);
        img._elt.data('height', targetHeight);

        delete img._onresample;
        delete img._width;
        delete img._height;

        // when we reassign a canvas size
        // this clears automatically
        // the size should be exactly the same
        // of the final image
        // so that toDataURL ctx method
        // will return the whole canvas as png
        // without empty spaces or lines
        canvas.width = targetWidth;
        canvas.height = targetHeight;
        // drawImage has different overloads
        // in this case we need the following one ...
        context.drawImage(
        // original image
        img,
        // starting x point
        0,
        // starting y point
        0,
        // image width
        img.width,
        // image height
        img.height,
        // destination x point
        0,
        // destination y point
        0,
        // destination width
        targetWidth,
        // destination height
        targetHeight);
        // retrieve the canvas content as
        // base4 encoded PNG image
        // and pass the result to the callback
        onresample(canvas.toDataURL("image/png"), targetWidth, targetHeight);
    }

    var context = canvas.getContext("2d"),
        // local scope shortcut
        round = Math.round;

    return Resample;

}(
this.document.createElement("canvas")));
