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




    /* *********************************************************************** */

    /*
        row template for work table from recruit
        Tables: Work Experience / Education / Course or Training
    */

    var newRowWork = function(input_array, typeArray, n, finished, hideRow)
    {
        let newRowWorkdd = `
            <tr>
                <td>${input_array.modal_employer}</td>
                    <input form="edit" type="hidden" value="${input_array.modal_employer}" name="${typeArray}[${n}][employer]">
                <td>${input_array.skill}</td>
                    <input form="edit" type="hidden" value="${input_array.skill}" name="${typeArray}[${n}][work_job]">
                <td>${input_array.start_year}</td>
                    <input form="edit" type="hidden" value="${input_array.start_year}" name="${typeArray}[${n}][start_year]">
                    <input form="edit" type="hidden" value="${input_array.start_month}" name="${typeArray}[${n}][start_month]">
                <td>${input_array.end_year}</td>
                    <input form="edit" type="hidden" value="${input_array.end_year}" name="${typeArray}[${n}][end_year]">
                    <input form="edit" type="hidden" value="${input_array.end_month}" name="${typeArray}[${n}][end_month]">
                <td>${finished}</td>
                
                <td class="cell-flex"><a href="#" class="table-link" data-toggle="modal" data-target="#editModal">
                    <i class="cvd-edit"></i>Edit</a>
                        <a href="#" class="table-link" data-table-collapse="#${hideRow}${n+1}">
                    <i class="cvd-arrow-right"></i>Open information</a>
                        <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                    <i class="cvd-trash"></i></a>
                </td>
            </tr>
            <tr class="row-hide" id="${hideRow}${n+1}">
                <td style="white-space:normal" colspan="6" class="cell-description">${input_array.description}</td>
                    <input form="edit" type="hidden" value="${input_array.description}" name="${typeArray}[${n}][work_description]">
                    <input form="edit" type="hidden" value="0" name="${typeArray}[${n}][work_id]">
            </tr>
        `;
        return newRowWorkdd;
    }







    /*
        add new work with modal
    */
    $('.add_new_work').click(function() {

        siteSelect.init('.select2-init');
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





    /*
            add new row to work table modal
    */

    $('#submit_button').on('click', function(){

        let tbody = '',
            hideRow = '',
            typeArray = '';

        var type_field = $('#type_field').val();

        let input_work_array = {
             modal_employer: $('#modal_employer').val(),
             skill: $('#modal_edit_name').val(),
             start_year: $('#start_year').val(),
             start_month: $('#start_month').val(),
             end_year: $('#end_year').val(),
             end_month: $('#end_month').val(),
             description: $('#modal_edit_description').val()
         };

        if(type_field == 'add_new_work') {
            tbody = '#work_tbody';
            hideRow = 'experianceRow';
            typeArray = 'works';
        }
        else if(type_field == 'add_new_education') {
            tbody = '#education_tbody';
            hideRow = 'educationRow';
            typeArray = 'educations';
        }
        else if(type_field == 'add_new_course'){
            tbody = '#course_tbody';
            hideRow = 'courseRow';
            typeArray = 'courses';
        }

        let finished = (input_work_array.end_year == '') ? 'No' : 'Yes';

        let n = $(tbody + " tr.row-hide").length;
        let newRowWorkd = newRowWork(input_work_array, typeArray, n, finished, hideRow);

        $(tbody).append(newRowWorkd);
    });





    /*
            correct inputs year and month for work modal
    */

    $('#editModal').on('hidden.bs.modal', function () {
        $('#type_field').remove();
        siteSelect.init('.select2-init');
        $('#select2-start_year-container').html('<span class=\"select2-selection__placeholder\">Select year</span>');
        $('#select2-start_month-container').html('<span class=\"select2-selection__placeholder\">Select month</span>');
        $('#select2-end_year-container').html('<span class=\"select2-selection__placeholder\">Select year</span>');
        $('#select2-end_month-container').html('<span class=\"select2-selection__placeholder\">Select month</span>');
    });




    /*
            delete row from works table with jQuery
    */
    $(document).on('click','.delete_work', function() {
        var closestRow = $(this).closest('tr');
        var id_row = closestRow.next().children(':nth-child(3)').attr('value');

        if (id_row == 0)
            closestRow.add(closestRow.next()).remove();
        else
        {
            let recruit_id = $('#recruit_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'DELETE',
                url:`/recruits/${recruit_id}/w/${id_row}`,
                success:function(){
                    closestRow.add(closestRow.next()).remove();
                    // location.reload();
                    // alert(data);
                }
            });
        }
    });


    /*
        auto-hide alert-dismissible message
    */

    $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-dismissible").alert('close');
    });


    /*
        show edit form works table with jQuery
    */

    var work = {
        id: 0
    };

    $('.edit_work').click(function(){

        let currentRow = $(this).closest('tr');
        let recruit_id = $('#recruit_id').val();
        let id_row = currentRow.next().children(':nth-child(3)').attr('value');
        work.id = id_row;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'PATCH',
            url:`/recruits/${recruit_id}`,
            data:{get_work_id:id_row},

            success:function(data){
                $('#submit_button').attr('id', 'update_work');
                siteSelect.init('.select2-init');

                var start_date = new Date(data.start_date);
                var end_date = new Date(data.end_date);

                if (data.end_date == null)
                {
                    $('#end_year').val('');
                    $('#end_month').val('');
                }
                else
                {
                    $('#end_year').val(end_date.getFullYear());
                    $('#end_month').val(end_date.getMonth()+1);
                }

                $('#modal_employer').val(data.employer);
                $('#modal_edit_name').val(data.job);
                $('#start_year').val(start_date.getFullYear());
                $('#start_month').val(start_date.getMonth()+1);
                $('#modal_edit_description').val(data.description);
                $('#editModal').modal('show');
            }
        });
    });


    /*
        update row from work table
     */

    $(document).on('click', '#update_work', function(){
        $('#update_work').attr('id', 'submit_button');
        let recruit_id = $('#recruit_id').val();

        // let row = $(`input[value=${work.id}]`);

        let input_work_array = {
            modal_employer: $('#modal_employer').val(),
            skill: $('#modal_edit_name').val(),
            start_year: $('#start_year').val(),
            start_month: $('#start_month').val(),
            end_year: $('#end_year').val(),
            end_month: $('#end_month').val(),
            description: $('#modal_edit_description').val()
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'PATCH',
            url:`/recruits/${recruit_id}`,
            data:{
                update_work_id: work.id,
                modal_employer: input_work_array.modal_employer,
                skill: input_work_array.skill,
                start_year: input_work_array.start_year,
                start_month: input_work_array.start_month,
                end_year: input_work_array.end_year,
                end_month: input_work_array.end_month,
                description: input_work_array.description
            },

            success:function(data){
                // let newRow = newRowWork(input_work_array);
                // row.parent().prev().replaceWith(newRow);
                location.reload();
                // alert('yes!');
            }
        });
    });




    /*
        work with tables from recruit view: Skills / Characteristics / Social Media / Interests
        show modal form
    */

    $(document).on('click', '.add_new_skill', function () {
        $('#modal_name').val('');
        $('#modal_level').val('').trigger('change');
        $('#modal_description').val('');
        $('#createNewModalLabel').html('Add new skill');
        $('#createNewModal').modal('show');
        let id_skill_table = this.id;
        typeOfSkillsTable(id_skill_table);
    });

    /*
        insert data to view table
    */

    $(document).on('click', '#submit_skill', function (){
        let n = $(type_of_table.tbody + " tr").length;
        let row_skill_table = rowSkills(n);
        $(type_of_table.tbody).append(row_skill_table);
    });

    var type_of_table = {
        tbody: '',
        typeArray: ''
    }


    /*
        types of skill table
    */

    var typeOfSkillsTable = function(id_skill_table)
    {
        if(id_skill_table == 'add_new_skill')
        {
            type_of_table.tbody = '#skill_tbody';
            type_of_table.typeArray = 'skills';
            $('#createNewModalLabel').html('Add new skill');
            $('#label_modal_name').html('Skill');
            $('#label_modal_desc').html('Level');
        }

        if(id_skill_table == 'add_new_charac')
        {
            type_of_table.tbody = '#charac_tbody';
            type_of_table.typeArray = 'charac';
            $('#createNewModalLabel').html('Add new characteristics');
            $('#label_modal_name').html('Characteristic');
            $('#label_modal_desc').html('Description');
        }

        if(id_skill_table == 'add_new_social')
        {
            type_of_table.tbody = '#social_tbody';
            type_of_table.typeArray = 'social';
            $('#createNewModalLabel').html('Add new social media');
            $('#label_modal_name').html('Platform');
            $('#label_modal_desc').html('Link');
        }

        if(id_skill_table == 'add_new_interest')
        {
            type_of_table.tbody = '#interest_tbody';
            type_of_table.typeArray = 'interest';
            $('#createNewModalLabel').html('Add new interests');
            $('#label_modal_name').html('Interest');
            $('#label_modal_desc').html('Description');
        }
    }

    /*
        load input data from modal form
    */

    var loadDataFromSkillModal = function()
    {
        let inputs_row = {
            char: '',
            description: ''
        }

        inputs_row.char = $('#modal_name').val();
        inputs_row.description = $('#modal_description').val();

        return inputs_row;
    }

    /*
        return a new row for skill tables
    */

    var rowSkills = function(n)
    {
        let fields = loadDataFromSkillModal();
        var row_skills = `
            <tr>
                <td>${fields.char}</td>
                    <input form="edit" type="hidden" value="${fields.char}" name="${type_of_table.typeArray}[${n}][char]">
                <td>${fields.description}</td>
                    <input form="edit" type="hidden" value="${fields.description}" name="${type_of_table.typeArray}[${n}][description]">
                    <input form="edit" type="hidden" value="0" name="${type_of_table.typeArray}[${n}][skill_id]">
                <td class="cell-flex">
                    <a href="#" class="btn btn-outline-danger delete_skill btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                        <i class="cvd-trash"></i>
                    </a>
                </td>
            </tr>
        `
        return row_skills;
    }

    /*
                delete row from skills table with jQuery
    */
    $(document).on('click','.delete_skill', function() {
        var closestRow = $(this).closest('tr');
        var id_row = closestRow.children(':nth-child(5)').attr('value');

        if (id_row == 0)
            closestRow.remove();
        else
        {
            let recruit_id = $('#recruit_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'DELETE',
                url:`/recruits/${recruit_id}/s/${id_row}`,
                success:function(){
                    closestRow.remove();
                    // location.reload();
                    // alert(data);
                }
            });
        }
    });






}(jQuery));
