/**
 * jQuery object
 * @external jQuery
 * @see {@link http://api.jquery.com/jQuery/}
 */
;(function ($) {
    $(document).on('click', '[data-table-collapse]', function () {
        let $button = $(this);
        let id = $button.attr('data-table-collapse');
        $button.find('i').toggleClass('cvd-arrow-right cvd-arrow-bottom');

        $(id).toggleClass('row-hide');

        return false;
    });

    $(document).on('click', '.copyToClipboard', function () {
        let $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(this).attr('data-url')).select();
        document.execCommand("copy");
        $temp.remove();
        return false;
    });

    let siteLoader = (function () {

        this.init = (selector) => {
            $(window).on('load', function () {
                let $overlay = $(selector),
                    overlay_length = $overlay.length;

                if (overlay_length) {
                    $overlay.stop(true, true).fadeOut(1000);
                }
            });
        };

        return {
            init: this.init
        };
    }());

    siteLoader.init('#site-loader');

    $.calendarBootstrap = (() => {
        let self = this;

        /**
         * @memberOf calendarBootstrap
         * @type {string}
         */
        const CALENDAR_RANGE_CONTAINER = '.datetimepicker-range';

        /**
         * @memberOf calendarBootstrap
         * @type {string}
         */
        const CALENDAR_CONTAINER = '.datetimepicker-default';

        /**
         * @memberOf calendarBootstrap
         * @type {string}
         */
        const FROM = '.date-from';

        /**
         * @memberOf calendarBootstrap
         * @type {string}
         */
        const TO = '.date-to';

        /**
         * @memberOf calendarBootstrap
         * @param {string} selector
         */
        this.init = (selector) => {
            $(document).ready(function () {
                self.initCalendar(selector);
                self.changeEvents();
            });
        };

        /**
         * @memberOf calendarBootstrap
         */
        this.initCalendar = (selector) => {
            if(selector === CALENDAR_RANGE_CONTAINER) {
                $(selector).each(function () {
                    let $this = $(this);
                    let $dateFrom = $this.find(FROM);
                    let $dateTo = $this.find(TO);
                    let lang = self.getLang($this);
                    let format = self.getFormat($this);

                    $dateFrom.datetimepicker({
                        locale: lang,
                        format: format
                    });

                    $dateTo.datetimepicker({
                        locale: lang,
                        format: format,
                        useCurrent: false
                    });
                });
            }

            if(selector === CALENDAR_CONTAINER) {
                $(selector).each(function () {
                    let $this = $(this);
                    let lang = self.getLang($this);
                    let format = self.getFormat($this);
                    let dataView = self.getDataView($this);

                    $this.datetimepicker({
                        locale: lang,
                        format: format,
                        viewMode: dataView,
                        useCurrent: false,
                    });
                });
            }
        };

        /**
         * @memberOf calendarBootstrap
         * @param {*|JQuery|HTMLElement} $calendar
         * @returns {string} lang
         */
        this.getLang = ($calendar) => {
            let lang = $calendar.attr('data-land');

            if(typeof lang === 'undefined') {
                lang = 'en';
            }

            return lang;
        };

        /**
         * @memberOf calendarBootstrap
         * @param {*|JQuery|HTMLElement} $calendar
         * @return {string} dataView
         */
        this.getDataView = ($calendar) => {
            let dataView = $calendar.attr('data-view');

            if(typeof dataView === 'undefined') {
                dataView = 'days';
            }

            return dataView;
        };

        /**
         * @memberOf calendarBootstrap
         * @param {*|JQuery|HTMLElement} $calendar
         * @param $calendar
         * @returns {string} format
         */
        this.getFormat = ($calendar) => {
            let format = $calendar.attr('data-format');

            if(typeof format === 'undefined') {
                format = 'DD/MM/YYYY';
            }

            return format;
        };

        /**
         * @memberOf calendarBootstrap
         */
        this.changeEvents = () => {
            $(FROM).on("change.datetimepicker", function (e) {
                let $container = $(this).closest(CALENDAR_RANGE_CONTAINER);
                let $dateTo = $container.find(TO);

                $dateTo.datetimepicker('minDate', e.date);
            });

            $(TO).on("change.datetimepicker", function (e) {
                let $container = $(this).closest(CALENDAR_RANGE_CONTAINER);
                let $dateFrom = $container.find(FROM);

                $dateFrom.datetimepicker('maxDate', e.date);
            });

            $(FROM+' input, '+TO+' input'+', '+CALENDAR_CONTAINER+' input').on('focusin focusout', function (e) {
                let $this = $(this);
                let $group = $this.closest('.input-group');

                if(e.type === 'focusin') {
                    $group.addClass('focused');
                    $group.datetimepicker('show');
                }else {
                    $group.removeClass('focused');
                }
            });

            $(FROM+', '+TO).on('show.datetimepicker hide.datetimepicker', function (e) {
                let type = e.handleObj.namespace;
                let $this = $(this);

                if(type === 'show') {
                    $this.addClass('focused');
                }else {
                    $this.removeClass('focused');
                }

            });
        };

        return {
            init: this.init
        };
    })();

    $.calendarBootstrap.init('.datetimepicker-range');
    $.calendarBootstrap.init('.datetimepicker-default');

    let confirmModal = (function () {
        let $form = null;

        /**
         * @memberOf confirmModal
         */
        this.init = () => {
            $(document).on('show.bs.modal', function (e) {
                let $relatedTarget = $(e.relatedTarget);

                $form = $relatedTarget.closest('form');
            }).on('hide.bs.modal', function (e) {
                $form = null;
            }).on('click', '.confirmAction', function () {
                $form.trigger('submit');
            });
        };

        return {
            init: this.init
        };
    }());

    confirmModal.init();

    let multiSubmitProtection = (function () {
        /**
         * @memberOf multiSubmitProtection
         */
        this.init = () => {
            let submitFlag = true;

            $(document).on('submit', 'form', function () {
                if(submitFlag) {
                    let $this = $(this);
                    if(!$this.find('.has-error').length) {
                        submitFlag = false;
                        $this.attr('disabled', 'disabled');
                        $this.find('button[type=submit], input[type=submit]')
                            .attr('disabled', 'disabled')
                            .addClass('disabled');
                    }
                }else {
                    return false;
                }
            });

            $(document).on('submit' , '.disabled-submit', function (e) {
                e.preventDefault();
                e.stopPropagation();
            });
        };

        return {
            init: this.init
        }
    }());

    multiSubmitProtection.init();

    let siteSelect = (function () {
        let self = this;

        /**
         * @memberOf siteSelect
         * @param {string} select
         */
        this.init = (select) => {
            $(document).ready(function () {
                self.select2Init(select);
            });
        };

        /**
         * @memberOf siteSelect
         * @param {string} select
         */
        this.select2Init = (select) => {
            $(select).each(function () {
                let $this = $(this);

                self.select2InitCurrent($this);
            });
        };

        /**
         * @memberOf siteSelect
         * @param {Object} $select
         */
        this.select2InitCurrent = ($select) => {
            $select.select2({
                theme: self.setTemplate($select),
                placeholder: self.setPlaceholder($select),
                tags: self.setTags($select)
            });
        };

        /**
         * @memberOf siteSelect
         * @param $select
         * @return {boolean}
         */
        this.setTags = ($select) => {
            let tags = $select.attr('data-tags');
            let status = false;

            if(typeof tags !== 'undefined' && tags === 'true') {
                status = true;
            }
            return status;
        };

        /**
         * @memberOf siteSelect
         * @param {*|JQuery|HTMLElement} $select
         * @returns {string}
         */
        this.setPlaceholder = ($select) => {
            let placeholder = $select.attr('data-placeholder');

            return (typeof placeholder !== 'undefined' ? placeholder : '');
        };

        /**
         * @memberOf siteSelect
         * @param {*|JQuery|HTMLElement} $select
         * @returns {string}
         */
        this.setTemplate = ($select) => {
            let template = $select.attr('data-template');

            return (typeof template !== 'undefined' ? template : 'brand');
        };

        return {
            init: this.init,
            initCurrent: this.select2InitCurrent
        };
    })();

    siteSelect.init('.select2-init');

    let siteFileinput = (function () {
        this.init = (selector) => {
            let $fileUploader = $(selector);
            let avatar_figure = '<p>Drop an image here or</p>';

            $fileUploader.each(function () {
                let $uploader = $(this),
                    field_url = $uploader.attr('data-url');

                if ($uploader.is('[data-url]') && field_url.length > 4) {
                    avatar_figure = '<img src="' + field_url + '" alt="Avatar" style="max-width: 100%">';
                }

                $uploader.fileinput({
                    overwriteInitial: true,
                    maxFileSize: 1500,
                    showClose: false,
                    showCaption: false,
                    browseLabel: 'Upload file',
                    removeLabel: 'Delete',
                    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                    browseClass: 'btn btn-primary btn-sm',
                    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                    removeClass: 'btn btn-danger btn-sm',
                    removeTitle: 'Cancel or reset changes',
                    elErrorContainer: '#kv-avatar-errors-1',
                    msgErrorClass: 'alert alert-block alert-danger',
                    defaultPreviewContent: avatar_figure,
                    layoutTemplates: {main2: '{preview} {remove} {browse}'},
                    allowedFileExtensions: ["jpg", "jpeg", "png", "gif"]
                });
            });
        };

        return {
            init: this.init
        }
    }());

    siteFileinput.init('.avatar-upload');

    let dynamicFields = (function () {
        const self = this;

        /**
         * @memberOf dynamicFields
         */
        this.init = () => {
            $(document).on('click', '.dynamic-btn', function () {

                let $this = $(this);
                let $group = $this.closest('.dynamic-group');
                let $header = $group.find('.dynamic-header');
                let $body = $group.find('.dynamic-body');
                let $field = $header.find('select, input');

                if($this.is('[data-dynamic-add]')) {
                    self.addItem($field);
                }

                if($this.is('[data-dynamic-remove]')) {
                    self.removeItem($this.closest('.item'), $body);
                }

                return false;
            }).on('change', '.dynamic-header select', function () {
                if(self.validate($(this))) {
                    $(this).closest('.dynamic-header').find('[data-dynamic-add]').trigger('click');
                }
            }).ready(function () {
                let $groups = $('.dynamic-group');

                $groups.each(function () {
                    let $group = $(this);
                    let $items = $group.find('.item input');
                    let $select = $group.find('select');

                    self.reloadSelect($items, $select);
                });
            });
        };

        /**
         * @memberOf dynamicFields
         * @param {Object} $items
         * @param {Object} $field
         * @param {string} type
         */
        this.reloadSelect = ($items, $field, type = 'default') => {
            if($field.is('select')) {
                if(type === 'reset') {
                    $field.find('option').prop('disabled', false);
                }

                $items.each(function () {
                    let $item = $(this);
                    let itemValue = $item.val();
                    let $option = $field.find('option[value="'+itemValue+'"]');

                    if($option.length) {
                        $option.prop('disabled', true);
                    }
                });

                self.resetSelect($field);
            }else {
                $field.val('');
            }
        };

        /**
         * @memberOf dynamicFields
         * @param {Object} $fields
         */
        this.addItem = ($fields) => {
            let status = true;
            $fields.each(function () {
                let $field = $(this);

                if(!self.validate($field)) {
                    status = false;
                    return false;
                }
            });

            if(status) {
                self.generateItem($fields);

                $fields.each(function () {
                    let $field = $(this);
                    self.reloadSelect($field.closest('.dynamic-group').find('.item input'), $field);
                });
            }
        };

        /**
         *
         * @param {Object} $item
         * @param {Object} $body
         */
        this.removeItem = ($item, $body) => {
            $item.remove();
            let $group = $body.closest('.dynamic-group');
            let $items = $body.find('.item input');

            self.reloadSelect($items, $group.find('select'), 'reset');
        };

        /**
         * @memberOf dynamicFields
         * @param {Object} $select
         */
        this.resetSelect = ($select) => {
            $select.val('');
            siteSelect.init(`#${$select.attr('id')}`);
        };

        /**
         * @memberOf dynamicFields
         * @param {Object} $fields
         */
        this.generateItem = ($fields) => {
            let $list = $fields.closest('.dynamic-group').find('.dynamic-body');
            let itemHTML = `<div class="item"><div class="row mx-lg-n2">`;

            $fields.each(function () {
                let $field = $(this);
                let label = $field.is('select') ? $field.find('option:selected').text().trim() : $field.val();
                let value = $field.val();
                let name = $field.attr('data-dynamic-name');

                itemHTML += `<div class="col px-lg-2">
                                <div class="form-control disabled">${label}</div>
                                <input type="hidden" name="${name}" value="${value}">
                            </div>`;
            });

            itemHTML += `</div>
                        <a href="#" class="dynamic-btn danger" data-dynamic-remove>
                            <i class="cvd-close"></i>
                        </a>
                    </div>`;

            $list.append(itemHTML);
        };

        /**
         * @memberOf dynamicFields
         * @param {Object} $field
         * @return {boolean}
         */
        this.validate = ($field) => {
            let val = $field.val();
            let status = false;

            if(val.length) {
                $field.removeClass('is-invalid');
                status = true;
            }else {
                $field.addClass('is-invalid');
                return false;
            }

            if($field.is('input[type=email]')) {
                if(self.validateEmail(val)) {
                    $field.removeClass('is-invalid');
                    status = true;
                }else {
                    $field.addClass('is-invalid');
                    return false;
                }
            }

            if(!$field.is('input[type=text]')) {
                if(self.validateItems($field)) {
                    $field.addClass('is-invalid');
                    status = false;
                }else {
                    $field.removeClass('is-invalid');
                    status = true;
                }
            }

            return status;
        };

        /**
         * @memberOf dynamicFields
         * @param {string} email
         * @return {boolean}
         */
        this.validateEmail = (email) => {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        };

        /**
         * @memberOf dynamicFields
         * @param {Object} $field
         * @return {boolean}
         */
        this.validateItems = ($field) => {
            let selector = $field.is('select') ? 'select' : 'input';
            let $group = $field.closest('.dynamic-group');
            let $items = $group.find('.item input');
            let newValue = $group.find('.dynamic-header ' + selector).val();
            let status = false;

            $items.each(function () {
                let $this = $(this);
                let value = $this.val();

                if(value === newValue) {
                    status = true;
                    return false;
                }
            });

            return status;
        };

        return {
            init: this.init
        };
    }());

    dynamicFields.init();



    /*
        modal
    */
    $('.add_new_work').click(function() {

        $('#editModalLabel').html('Add new row');
        $('#submit_button').html('Add');
        $('#editModal').modal('show');
        $('#modal_employer').val('');
        $('#modal_edit_name').val('');
        $('#start_year').val('');
        $('#start_month').val('');
        $('#end_year').val('');
        $('#end_month').val('');
        $('#modal_edit_description').val('');

        var value_field = this.id;

        $('#form_work').append('<input type="hidden" id="type_field" name="type_field" value="' + value_field + '" />');
    });







    $('#submit_button').click(function(){

        var tbody = '',
            hideRow = '';

        var modal_employer = $('#modal_employer').val(),
            skill = $('#modal_edit_name').val(),
            start_year = $('#start_year').val(),
            type_field = $('#type_field').val(),
            start_month = $('#start_month').val(),
            end_year = $('#end_year').val(),
            end_month = $('#end_month').val(),
            description = $('#modal_edit_description').val();

        if(type_field == 'add_new_work') {
            tbody = '#work_tbody';
            hideRow = 'experianceRow';
        }
        else if(type_field == 'add_new_education') {
            tbody = '#education_tbody';
            hideRow = 'educationRow';
        }
        else if(type_field == 'add_new_course'){
            tbody = '#course_tbody';
            hideRow = 'courseRow';
        }

        var finished = (end_year == '') ? 'No' : 'Yes';

        var n = $(tbody + " tr.row-hide").length;

        $(tbody).append(
            '<tr>' +
                '<td>' + modal_employer + '</td>' +
                '<td>' + skill + '</td>' +
                '<td>' + start_year + '</td>' +
                '<td>' + end_year + '</td>' +
                '<td>' + finished + '</td>' +
                '<td class=\"cell-flex\"><a href=\"#\" class=\"table-link\" data-toggle=\"modal\" data-target=\"#editModal\">' +
                '<i class=\"cvd-edit\"></i>Edit</a>' +
                '                            <a href=\"#\" class=\"table-link\" ' +
                'data-table-collapse=\"#' + hideRow + (n+1) + '\">' +
                '<i class=\"cvd-arrow-right\"></i>Open information</a>' +
                '                            <a href=\"#\" class=\"btn btn-outline-danger btn-sm\" data-toggle=\"modal\" data-target=\"#confirmSkillsModal\">' +
                '<i class=\"cvd-trash\"></i></a>' +
                '</td>' +
            '</tr>' +
                '<tr class=\"row-hide\" id=\"' + hideRow + (n+1) + '\">' +
                '<td colspan=\"6\" class=\"cell-description\">' +  description + '</td>' +
            '</tr>'
        );
    });


    $(document).on('click','.btn-outline-danger', function() {
        $(this).closest('tr').remove();
    });


    $('#editModal').on('hidden.bs.modal', function () {
        $('#type_field').remove();
        $('#select2-start_year-container').html('<span class=\"select2-selection__placeholder\">Select year</span>');
        $('#select2-start_month-container').html('<span class=\"select2-selection__placeholder\">Select month</span>');
        $('#select2-end_year-container').html('<span class=\"select2-selection__placeholder\">Select year</span>');
        $('#select2-end_month-container').html('<span class=\"select2-selection__placeholder\">Select month</span>');
    });


}(jQuery));