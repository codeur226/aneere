@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('auditeurs.index',['statut' => 'cabinet']) }}">Cabinets</a></li>
<li class="breadcrumb-item active" aria-current="page">Nouvel cabinet</li>

@endsection
{{-- <x-master-layout> --}}

    <link href="{{asset('assetadmin/css/progressbar.css')}}" rel="stylesheet"/>
   {{-- <div class="row">
      <div class=" col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-5 text-center">Nouveau cabinet</h3>
            </div> --}}
            {{-- <div class="card-body"> --}}

                <div id="wrapper">

                    <div id="container body-content">


                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    <span class="sr-only">0% Complete</span>
                                </div>
                            </div>

                      <form class="form-horizontal msf">
                        <div class="msf-header">
                          <div class="row text-center">
                            <div class="msf-step col-md-4"><i class="fa fa-clipboard"></i> <span>Enter Request Details</span></div>
                            <div class="msf-step col-md-4"><i class="fa fa-credit-card"></i><span>Further Details</span></div>
                            <div class="msf-step col-md-4"><i class="fa fa-check"></i> <span>Review and Submit</span></div>
                          </div>
                        </div>

                        <div class="msf-content">
                          <div class="msf-view">

                            <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                  <input id="name" name="name" type="text" class="form-control" placeholder="Name" data-bind="value: Name" data-val="true" data-val-required="name is required">
                                  <!--data-val="true" data-val-required="name is required"-->
                                </div>
                                <div class="form-group">
                                  <input id="email" name="email" type="text" class="form-control" placeholder="Email" data-bind="value: Email" data-val="true" data-val-required="email is required">
                                  <!-- data-val="true" data-val-required="email is required -->
                                </div>
                                <div class="form-group">
                                  <textarea id="details" name="details" rows="10" class="form-control" placeholder="Enter Details" data-bind="value: Details"></textarea>
                                </div>

                              </div>
                            </div>


                          </div>
                          <div class="msf-view">
                            <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                  <select id="countries" name="countries" class="form-control" data-bind="options: availableCountries, selectedOptions: chosenCountries" data-val="true" data-val-required="select a country" size="5" multiple="true"></select>
                                </div>

                                <div class="form-group">

                                  <select id="type" name="type" class="form-control" data-bind="options: availableTypes, selectedOptions: chosenType, optionsCaption: 'Choose Request Type'" data-val="true" data-val-required="Request type is required.">
                                  </select>

                                  <!-- data-val="true" data-val-required="email is required -->
                                </div>
                                <!--   <div class="form-group">
                                  <textarea id="additionaldetails" name="additionaldetails" rows="10" class="form-control" placeholder="Enter Additional Details" data-bind="value: AdditionalDetails"></textarea>
                                </div>
                                -->

                              </div>
                            </div>
                          </div>
                          <div class="msf-view">
                            <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <label>Name</label> : <span data-bind="text: Name"></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <label>Email</label> : <span data-bind="text: Email"></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <label>Type</label> : <span data-bind="text: chosenType"></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <label>Countries</label> : <span data-bind="text: chosenCountries"></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <label>Details</label> : <span data-bind="text: Details"></span>
                              </div>
                            </div>

                             <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="form-group">
                                                     <input id="additional" name="additional" type="text" class="form-control" placeholder="Additional Details"  data-val="true" data-val-required="name is required">
                                                </div>
                                            </div>
                                        </div>
                          </div>
                        </div>

                        <div class="msf-navigation">
                          <div class="row">
                            <div class="col-md-3">
                              <button type="button" data-type="back" class="btn msf-nav-button"><i class="fa fa-chevron-left"></i> Back </button>
                            </div>

                            <div class="col-md-3 col-md-offset-6">
                              <button type="button" data-type="next" class="btn msf-nav-button">Next <i class="fa fa-chevron-right"></i></button>

                              <button type="submit" data-type="submit" class="btn msf-nav-button">Submit</button>
                            </div>

                          </div>
                        </div>
                      </form>

                    </div>
                  </div>



                {{-- <script src="{{asset('assetadmin/js/jquery-3.4.1.min.js')}}"></script> --}}
                <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
                <script>

(function (factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        // AMD is used - Register as an anonymous module.
        define(['jquery', 'jquery-validation'], factory);
    } else if (typeof exports === 'object') {
        factory(require('jquery'), require('jquery-validation'));
    } else {
        // Neither AMD nor CommonJS used. Use global variables.
        if (typeof jQuery === 'undefined') {
            throw 'multi-step-form-js requires jQuery to be loaded first';
        }
        if (typeof jQuery.validator === 'undefined') {
            throw 'multi-step-form-js requires requires jquery.validation.js to be loaded first';
        }
        factory(jQuery);
    }
}(function ($) {
    'use strict';

    const msfCssClasses = {
        header: "msf-header",
        step: "msf-step",
        stepComplete: "msf-step-complete",
        stepActive: "msf-step-active",
        content: "msf-content",
        view: "msf-view",
        navigation: "msf-navigation",
        navButton: "msf-nav-button"
    };

    const msfNavTypes = {
        back: "back",
        next: "next",
        submit: "submit"

    };

    const msfEventTypes = {
        viewChanged : "msf:viewChanged"
    };

    $.fn.multiStepForm = function (options) {
        var form = this;

        var defaults = {
            activeIndex: 0,
            validate: {}
        };

        var settings = $.extend({}, defaults, options);

        //find the msf-content object
        form.content = this.find("." + msfCssClasses.content).first();

        if (form.content.length === 0) {
            throw new Error('Multi-Step Form requires a child element of class \'' + msfCssClasses.content + '\'');
        }

        //find the msf-views within the content object
        form.views = $(this.content).find("." + msfCssClasses.view);

        if (form.views.length === 0) {
            throw new Error('Multi-Step Form\'s element of class \'' + msfCssClasses.content + '\' requires n elements of class \'' + msfCssClasses.view + '\'');
        }

        form.header = this.find("." + msfCssClasses.header).first();
        form.navigation = this.find("." + msfCssClasses.navigation).first();
        form.steps = [];

        form.getActiveView = function() {
            return form.views.filter(function () { return this.style && this.style.display !== '' && this.style.display !== 'none' });
        };

        form.setActiveView = function(index) {
            var view = form.getActiveView();
            var previousIndex = form.views.index(view);

            view = form.views.eq(index);
            view.show();
            view.find(':input').first().focus();

            //trigger the 'view has changed' event
            form.trigger(msfEventTypes.viewChanged, {
                currentIndex : index,
                previousIndex : previousIndex,
                totalSteps : form.steps.length
            });
        }

        form.init = function () {

            this.initHeader = function () {
                if (form.header.length === 0) {
                    form.header = $("<div/>", {
                        "class": msfCssClasses.header,
                        "display": "none"
                    });

                    $(form).prepend(form.header);
                }

                form.steps = $(form.header).find("." + msfCssClasses.step);

                this.initStep = function (index, view) {

                    if (form.steps.length < index + 1) {
                        $(form.header).append($("<div/>", {
                            "class": msfCssClasses.step,
                            "display": "none"
                        }));
                    }
                }

                $.each(form.views, this.initStep);

                form.steps = $(form.header).find("." + msfCssClasses.step);
            };


            this.initNavigation = function () {

                if (form.navigation.length === 0) {
                    form.navigation = $("<div/>", {
                        "class": msfCssClasses.navigation
                    });

                    $(form.content).after(form.navigation);
                }

                this.initNavButton = function (type) {
                    var element = this.navigation.find("button[data-type='" + type + "'], input[type='button']"), type;
                    if (element.length === 0) {
                        element = $("<button/>", {
                            "class": msfCssClasses.navButton,
                            "data-type": type,
                            "html": type
                        });
                        element.appendTo(form.navigation);
                    }

                    return element;
                };

                form.backNavButton = this.initNavButton(msfNavTypes.back);
                form.nextNavButton = this.initNavButton(msfNavTypes.next);
                form.submitNavButton = this.initNavButton(msfNavTypes.submit);
            };


            this.initHeader();
            this.initNavigation();

            this.views.each(function (index, element) {

                var view = element,
                    $view = $(element);

                $view.on('show', function (e) {
                    if (this !== e.target)
                        return;

                    //hide whichever view is currently showing
                    form.getActiveView().hide();

                    //choose which navigation buttons should be displayed based on index of view
                    if (index > 0) {
                        form.backNavButton.show();
                    }

                    if (index == form.views.length - 1) {
                        form.nextNavButton.hide();
                        form.submitNavButton.show();
                    }
                    else {
                        form.submitNavButton.hide();
                        form.nextNavButton.show();

                        //if this is not the last view do not allow the enter key to submit the form as it is not completed yet
                        $(this).find(':input').keypress(function (e) {
                            if (e.which == 13) // Enter key = keycode 13
                            {
                                form.nextNavButton.click();
                                return false;
                            }
                        });
                    }

                    //determine if each step is completed or active based in index
                    $.each(form.steps, function (i, element) {
                        if (i < index) {
                            $(element).removeClass(msfCssClasses.stepActive);
                            $(element).addClass(msfCssClasses.stepComplete);
                        }

                        else if (i === index) {
                            $(element).removeClass(msfCssClasses.stepComplete);
                            $(element).addClass(msfCssClasses.stepActive);
                        }
                        else {
                            $(element).removeClass(msfCssClasses.stepComplete);
                            $(element).removeClass(msfCssClasses.stepActive);
                        }
                    });
                });

                $view.on('hide', function (e) {
                    if (this !== e.target)
                        return;

                    //hide all navigation buttons, display choices will be set on show event
                    form.backNavButton.hide();
                    form.nextNavButton.hide();
                    form.submitNavButton.hide();
                });
            });

            form.setActiveView(settings.activeIndex);
        };

        form.init();

        form.nextNavButton.click(function () {
            var view = form.getActiveView();

            //validate the input in the current view
            if (form.validate(settings.validate).subset(view)) {
                var i = form.views.index(view);

                form.setActiveView(i+1);
            }
        });

        form.backNavButton.click(function () {
            var view = form.getActiveView();
            var i = form.views.index(view);

            form.setActiveView(i-1);
        });

    };

    $.validator.prototype.subset = function (container) {
        var ok = true;
        var self = this;
        $(container).find(':input').each(function () {
            if (!self.element($(this))) ok = false;
        });
        return ok;
    };

    $.each(['show', 'hide'], function (i, ev) {
        var el = $.fn[ev];
        $.fn[ev] = function () {
            this.trigger(ev);
            return el.apply(this, arguments);
        };
    });
}));





function ViewModel() {
  var self = this;

  self.Name = ko.observable('');
  self.Email = ko.observable('');
  self.Details = ko.observable('');

  self.AdditionalDetails = ko.observable('');
  self.availableTypes = ko.observableArray(['New', 'Open', 'Closed']);
  self.chosenType = ko.observable('');

  self.availableCountries = ko.observableArray(['France', 'Germany', 'Spain', 'United States', 'Mexico']),
    self.chosenCountries = ko.observableArray([]) // Initially, only Germany is selected


}

var viewModel = new ViewModel();

ko.applyBindings(viewModel);


  $(document).on("msf:viewChanged", function(event, data){

           var progress = Math.round((data.currentIndex / data.totalSteps)*100);

            $(".progress-bar").css("width", progress + "%").attr('aria-valuenow', progress);   ;
        });


$(".msf:first").multiStepForm();
</script>

{{-- </x-master-layout> --}}

