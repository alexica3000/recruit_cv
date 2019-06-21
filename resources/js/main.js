/**
 * jQuery object
 * @external jQuery
 * @see {@link http://api.jquery.com/jQuery/}
 */
;(function ($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



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




    /************************************************************************

        features

     ************************************************************************/

    /* auto-hide alert-dismissible message */

    $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-dismissible").alert('close');
    });

    /* reset modal form */

    function resetForm($form)
    {
        $form.find('input').val('');
        $form.find('select').val('').trigger('change');
        $form.find('textarea').val('');

        // $('#modal_employer').val('');
        // $('#modal_edit_name').val('');
        // $('#start_year').val('').trigger('change');
        // $('#start_month').val('').trigger('change');
        // $('#end_year').val('').trigger('change');
        // $('#end_month').val('').trigger('change');
        // $('#modal_edit_description').val('');
    }

    /* load data from modal form */

    function loadFields($form)
    {
        let fields = $form.serializeArray();
        let dataObj = {};

        $(fields).each(function(i, field){
            dataObj[field.name] = field.value;
        });

        return dataObj;
    }




    /************************************************************************

     Tables: Work Experience / Education / Course or Training
     // siteSelect.init('.select2-init');

    ************************************************************************/

    $('#editModal').on('hidden.bs.modal', function () {
        $('#update_work').attr('id', 'submit_button');
    });

    var type_work = {
        tbody: '',
        type: ''
    };

    /* show modal form for work to add new data */

    $('.add_new_work').click(function() {
        let $form = $('#form_work').closest('form');
        resetForm($form);
        $('#submit_button').html('Add');
        $('#editModal').modal('show');
        typeOfWork(this.id);
    });

    /* add type of work to object variable */

    var typeOfWork = function(id_works)
    {
        switch (id_works)
        {
            case "add_new_work":
                type_work.tbody = '#work_tbody';
                type_work.type = 1;
                $('#editModalLabel').html('Add new work experience');
                $('#label_employer').html('Employer');
                $('#label_skill').html('Job');
            break;
            case "add_new_education":
                type_work.tbody = '#education_tbody';
                type_work.type = 2;
                $('#editModalLabel').html('Add new education');
                $('#label_employer').html('Institute');
                $('#label_skill').html('Education');
            break;
            case "add_new_course":
                type_work.tbody = '#course_tbody';
                type_work.type = 3;
                $('#editModalLabel').html('Add new course or training');
                $('#label_employer').html('Institute');
                $('#label_skill').html('Course or Training');
            break;
        }
    }

    /* add new row to work table */

    $(document).on('click', '#submit_button', function(){
        // let n = $(type_work.tbody + " tr.row-hide").length;
        let $form = $('#form_work').closest('form');
        let recruit_id = $('#recruit_id').val();

        $.ajax({
            type: 'POST',
            url: `/recruits/${recruit_id}/w`,
            data: {
                fields: loadFields($form),
                type: type_work.type
            },
            success: function(data)
            {
                let newRowWorkd = addDataToRowWork(loadFields($form), data.id);
                $(type_work.tbody).append(newRowWorkd);
            }
        });
    });

    /* add data to row work table from recruit */

    var addDataToRowWork = function(fields, work_id)
    {
        let finished = (fields['end_year'] == '') ? 'No' : 'Yes';

        let newRowWork = `
            <tr>
                <td>${fields['modal_employer']}</td>
                    <!--<input form="edit" type="hidden" value="${fields['modal_employer']}" name="employer">-->
                <td>${fields['modal_edit_name']}</td>
                    <!--<input form="edit" type="hidden" value="${fields['modal_edit_name']}" name="work_job">-->
                <td>${fields['start_year']}</td>
                    <!--<input form="edit" type="hidden" value="${fields['start_year']}" name="start_year">-->
                    <!--<input form="edit" type="hidden" value="${fields['start_month']}" name="start_month">-->
                <td>${fields['end_year']}</td>
                    <!--<input form="edit" type="hidden" value="${fields['end_year']}" name="end_year">-->
                    <!--<input form="edit" type="hidden" value="${fields['end_month']}" name="end_month">-->
                <td>${finished}</td>
                
                <td class="cell-flex"><a href="#" class="table-link edit_work" data-toggle="modal" data-target="#editModal">
                    <i class="cvd-edit"></i>Edit</a>
                        <a href="#" class="table-link" data-table-collapse="#hiddenRow${work_id}">
                    <i class="cvd-arrow-right"></i>Open information</a>
                        <a href="#" class="btn btn-outline-danger btn-sm delete_work" data-toggle="modal" data-target="#confirmSkillsModal">
                    <i class="cvd-trash"></i></a>
                </td>
            </tr>
            <tr class="row-hide" id="hiddenRow${work_id}">
                <td style="white-space:normal" colspan="6" class="cell-description">${fields['modal_edit_description']}</td>
                    <!--<input form="edit" type="hidden" value="${fields['modal_edit_description']}" name="work_description">-->
                    <input form="edit" type="hidden" value="${work_id}" name="work_id">
            </tr>
        `;
        return newRowWork;
    }

    /* delete row from works table with jQuery */

    $(document).on('click','.delete_work', function() {
        var closestRow = $(this).closest('tr');
        var id_row = closestRow.next().find('input[name=work_id]').attr('value');
        let recruit_id = $('#recruit_id').val();

        $.ajax({
            type:'DELETE',
            url:`/recruits/${recruit_id}/w/${id_row}`,
            success:function(){
                closestRow.fadeOut(400, function()
                {
                    closestRow.add(closestRow.next()).remove();
                });
            },
            error:function(){
                closestRow.append('<div id="work_error">Error!</div>');
                $('#work_error').fadeOut(1000, function()
                {
                    $(this).remove();
                });
            }
        });
    });

    /* show edit form works table with jQuery */

    var work = {
        id: 0
    };

    $(document).on('click', '.edit_work', function(){

        let currentRow = $(this).closest('tr');
        let recruit_id = $('#recruit_id').val();
        work.id = currentRow.next().find('input[name=work_id]').attr('value');
        typeOfWork($(this).closest('div[class*=card-primary]').find('.add_new_work').attr('id'));

        $.ajax({
            url:`/recruits/${recruit_id}/w/${work.id}`,

            success:function(data){
                $('#submit_button').html('Edit');
                $('#submit_button').attr('id', 'update_work');

                var start_date = new Date(data.start_date);
                var end_date = new Date(data.end_date);

                if (data.end_date == null)
                {
                    $('#end_year').val('').trigger('change');
                    $('#end_month').val('').trigger('change');
                }
                else
                {
                    $('#end_year').val(end_date.getFullYear()).trigger('change');
                    $('#end_month').val(end_date.getMonth()+1).trigger('change');
                }

                $('#modal_employer').val(data.employer);
                $('#modal_edit_name').val(data.job);
                $('#start_year').val(start_date.getFullYear()).trigger('change');
                $('#start_month').val(start_date.getMonth()+1).trigger('change');
                $('#modal_edit_description').val(data.description);
                $('#editModal').modal('show');
            }
        });
    });

    /* update row from work table */

    $(document).on('click', '#update_work', function(){
        let recruit_id = $('#recruit_id').val();
        let $form = $('#form_work').closest('form');

        // let input_work_array = {
        //     modal_employer: $('#modal_employer').val(),
        //     skill: $('#modal_edit_name').val(),
        //     start_year: $('#start_year').val(),
        //     start_month: $('#start_month').val(),
        //     end_year: $('#end_year').val(),
        //     end_month: $('#end_month').val(),
        //     description: $('#modal_edit_description').val()
        // };

        $.ajax({
            type:'PATCH',
            url:`/recruits/${recruit_id}/w/${work.id}`,
            data:{
                fields: loadFields($form),
                // modal_employer: input_work_array.modal_employer,
                // skill: input_work_array.skill,
                // start_year: input_work_array.start_year,
                // start_month: input_work_array.start_month,
                // end_year: input_work_array.end_year,
                // end_month: input_work_array.end_month,
                // description: input_work_array.description
            },

            success:function(data){
                let row = $("input[name*='work_id'][value='" + work.id + "']").parent().prev();
                row.next().remove();
                let updatedRowWork = addDataToRowWork(loadFields($form), data.id);
                row.replaceWith(updatedRowWork);
            }
        });
    });




    /********************************************************************************************

     Skills / Characteristics / Social Media / Interests (tables from recruit view)

    ********************************************************************************************/

    var $type_skill = {
        tbody: '',
        type: ''
    }

    /* show modal form to add new data */

    $(document).on('click', '.add_new_skill', function () {
        resetForm($('#skill_form').closest('form'));
        $('#createNewModal').modal('show');
        typeOfSkill(this.id);
    });

    /* store and show new skill */

    $(document).on('click', '#submit_skill', function (){
        // let n = $($type_skill.tbody + " tr").length;
        let skill = loadDataFromSkillModal();
        let recruit_id = $('#recruit_id').val();

        $.ajax({
            type:'POST',
            url:`/recruits/${recruit_id}/s`,
            data: {
                char: skill.char,
                description: skill.description,
                type: $type_skill.type
            },
            success:function(data){
                // $($type_skill.tbody).append(addDataToRowSkill(JSON.parse(data.id)));
                $($type_skill.tbody)
                    .append(addDataToRowSkill(data.id))
                    .children(':last')
                    .hide()
                    .fadeIn(2000);
            }
        });
    });

    /* add type of skill to object variable */

    var typeOfSkill = function(id_skill_table)
    {
        switch (id_skill_table)
        {
            case "add_new_skill":
                $type_skill.tbody = '#skill_tbody';
                $type_skill.type = 1;
                $('#createNewModalLabel').html('Add new skill');
                $('#label_modal_name').html('Skill');
                $('#label_modal_desc').parent().hide();
                $('#modal_level').parent().show();
            break;
            case "add_new_charac":
                $type_skill.tbody = '#charac_tbody';
                $type_skill.type = 2;
                $('#createNewModalLabel').html('Add new characteristics');
                $('#modal_level').parent().hide();
                $('#label_modal_desc').parent().show();
                $('#label_modal_name').html('Characteristic');
                $('#label_modal_desc').html('Description');
            break;
            case "add_new_social":
                $type_skill.tbody = '#social_tbody';
                $type_skill.type = 3;
                $('#modal_level').parent().hide();
                $('#label_modal_desc').parent().show();
                $('#createNewModalLabel').html('Add new social media');
                $('#label_modal_name').html('Platform');
                $('#label_modal_desc').html('Link');
            break;
            case "add_new_interest":
                $type_skill.tbody = '#interest_tbody';
                $type_skill.type = 4;
                $('#modal_level').parent().hide();
                $('#label_modal_desc').parent().show();
                $('#createNewModalLabel').html('Add new interests');
                $('#label_modal_name').html('Interest');
                $('#label_modal_desc').html('Description');
            break;
        }
    }

    /* load input data from modal form */

    var loadDataFromSkillModal = function()
    {
        let inputs_row = {
            char: '',
            description: ''
        }

        inputs_row.char = $('#modal_name').val();
        inputs_row.description = ($type_skill.tbody == '#skill_tbody') ? $('#modal_level').val() : $('#modal_description').val();

        return inputs_row;
    }

    /* return a new row with data for skill tables */

    var addDataToRowSkill = function(id)
    {
        let fields = loadDataFromSkillModal();
        var row_skills = `
            <tr>
                <td>${fields.char}</td>
                    <!--<input form="edit" type="hidden" value="${fields.char}" name="char">-->
                <td>${fields.description}</td>
                    <!--<input form="edit" type="hidden" value="${fields.description}" name="description">-->
                    <input form="edit" type="hidden" value="${id}" name="skill_id">
                <td class="cell-flex">
                    <a href="#" class="btn btn-outline-danger delete_skill btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                        <i class="cvd-trash"></i>
                    </a>
                </td>
            </tr>
        `;
        return row_skills;
    }

    /* delete row from skills table with jQuery */

    $(document).on('click','.delete_skill', function() {
        var closestRow = $(this).closest('tr');
        var id_row = closestRow.find('input[name=skill_id').attr('value');

        let recruit_id = $('#recruit_id').val();

        $.ajax({
            type:'DELETE',
            url:`/recruits/${recruit_id}/s/${id_row}`,
            success:function(){
                closestRow.fadeOut(400, function()
                {
                    $(this).remove();
                });
            }
        });

    });












}(jQuery));
