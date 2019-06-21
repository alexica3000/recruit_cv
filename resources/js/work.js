/**
 * jQuery object
 * @external jQuery
 * @see {@link http://api.jquery.com/jQuery/}
 */
;(function ($) {

    const expRules = {
        employer: {
            required: true,
            minlength: 2
        },
        job: {
            required: true,
            number: true
        },
        start: {
            required: true,
            number: true
        },
        end: {
            required: true,
            number: true,
            greaterThan: '#experience_start'
        },
        finished: {
            required: true,
            number: true
        },
        description: {
            required: true,
            minlength: 2
        }
    };

    const eduRules = {
        institute: {
            required: true,
            minlength: 2
        },
        job: {
            required: true,
            number: true
        },
        start: {
            required: true,
            number: true
        },
        end: {
            required: true,
            number: true,
            greaterThan: '#education_start'
        },
        finished: {
            required: true,
            number: true
        },
        description: {
            required: true,
            minlength: 2
        }
    };

    let modalForm = (function () {
        /**
         * @memberOf modalForm
         * @param {string} selector
         */
        this.init = (selector) => {
            $(document).on('click', selector, function () {
                let $button = $(selector);
                let $form = $button.closest('form');
                let formID = $form.attr('id');
                let rules = {};

                switch(formID) {
                    case 'addExperienceForm':
                        rules = expRules;
                        break;
                    case 'addEducationForm':
                        rules = eduRules;
                        break;
                }

                self.toggleDisable($button);

                if(self.validateForm($form, rules).form()) {
                    let $modal = $button.closest('.modal');

                    tableRow.init($button.attr('data-target'), self.getFormData($form));
                    $modal.modal('hide');

                    $modal.find('select, input, textarea').val('');
                    $modal.find('select').trigger('change');
                }

                self.toggleDisable($(selector), false);

                return false;
            });
        };

        /**
         * @memberOf modalForm
         * @param {object} $form
         */
        this.getFormData = ($form) => {
            let $fields = $form.find('input, select, textarea');
            let data = {};

            $fields.each(function () {
                let $field = $(this);
                let value = $field.val();
                let text = $field.val();
                let target = $field.attr('id');

                if($field.is('select')) {
                    text = $field.find('option:selected').text().trim();
                }

                data[target] = {
                    text,
                    value
                };
            });

            return data;
        };

        /**
         * @memberOf modalForm
         * @param {object} $button
         * @param {boolean} disable
         */
        this.toggleDisable = ($button, disable = true) => {
            if(disable) {
                $button.addClass('disabled');
            }else {
                $button.removeClass('disabled');
            }

            $button.prop('disabled', disable);
        };

        /**
         * @memberOf modalForm
         * @param {object} $form
         * @param {object} rules
         * @return {boolean|void|ActiveX.IXMLDOMParseError}
         */
        this.validateForm = ($form, rules) => {
            $.validator.addMethod("greaterThan",
                function(value, element, params) {

                    if (!/Invalid|NaN/.test(new Date(value))) {
                        return new Date(value) >= new Date($(params).val());
                    }

                    return isNaN(value) && isNaN($(params).val())
                        || (Number(value) >= Number($(params).val()));
                }, 'Must be greater than {0}.');

            return $form.validate({
                rules: rules
            });
        };

        return {
            init: this.init
        }
    }());












    let tableRow = (function () {
        /**
         * @memberOf tableRow
         * @param {string} selector
         * @param {object} data
         */
        this.init = (selector, data) => {
            let $table = $(selector);
            let $clone = $table.find('[data-clone]').clone();

            self.setRowData(self.cloneRow($clone), data);
            $table.find('tbody').append(self.cloneRow($clone));
        };

        /**
         * @memberOf tableRow
         * @param {object} $clone
         * @return {*}
         */
        this.cloneRow = ($clone) => {
            let index = Date.now();

            $clone.each(function () {
                let $block = $(this);
                let $fields = $block.find('[data-name]');
                let $collapse = $block.find('[data-table-collapse]');

                $block.removeClass('d-none').removeAttr('data-clone');

                if($collapse.length) {
                    let attr = $collapse.attr('data-table-collapse');

                    $collapse.attr('data-table-collapse', attr.replace('%index%', index));
                }

                if($block.is('.row-hide')) {
                    let attr = $block.attr('id');

                    $block.attr('id', attr.replace('%index%', index));
                }

                $fields.each(function () {
                    let $field = $(this);
                    let name = $field.attr('data-name').replace('%index%', index);

                    $field.attr('name', name).removeAttr('data-name');
                });
            });


            return $clone;
        };

        /**
         * @memberOf tableRow
         * @param {object} $rows
         * @param {object} data
         */
        this.setRowData = ($rows, data) => {
            for(let key in data) {
                if(data.hasOwnProperty(key)) {
                    let $field = $rows.find(`[data-target="${key}"]`);

                    if($field.length) {
                        $field.val(data[key].value);
                        $field.prev().html(data[key].text);
                    }
                }
            }
        };

        return {
            init: this.init
        }
    }());





























    /* delete row from work table */

    let deleteWork = function(){
        $(document).on('click', '.del-work', function()
        {
            let closestRow = $(this).closest('tr');

            $(document).on('click','.confirmAction', function() {
                let $modal = $('.confirmAction').closest('.modal');
                $modal.modal('hide');

                closestRow.add(closestRow.next()).remove();
            });
        });
    };


    let showEditModal = function()
    {
        $(document).on('click', '.edit_row', function(){

            // $('#addExperienceButton').attr('id', 'editExperienceButton');
            let $currentRow = $(this).closest('tr');

            // let ed_employer = $currentRow.find('input[data-target=experience_employer]').attr('value');
            // let ed_job = $currentRow.find('input[data-target=experience_job]').prev().text();
            // let ed_start_year = $currentRow.find('input[data-target=experience_start]').attr('value');
            // let ed_end_year = $currentRow.find('input[data-target=experience_end]').attr('value');
            // let ed_job = $currentRow.find('input[data-target=experience_finished]').prev().text();


            $('#experience_employer').val($currentRow.find('input[data-target=experience_employer]').attr('value'));
            $('#experience_job').val($currentRow.find('input[data-target=experience_job]').attr('value')).trigger('change');
            $('#experience_start').val($currentRow.find('input[data-target=experience_start]').attr('value')).trigger('change');
            $('#experience_end').val($currentRow.find('input[data-target=experience_end]').attr('value')).trigger('change');
            $('#experience_finished').val($currentRow.find('input[data-target=experience_finished]').attr('value')).trigger('change');
            $('#experience_description').val($currentRow.next().find('input[data-target=experience_description]').attr('value'));

            let $form = $('#addExperienceButton').closest('form');
            let data = getFormData($form);

            updateRowWork(data);
        });
    };

    showEditModal();





    function updateRowWork(data)
    {
        $(document).on('click', '#addExperienceButton', function(){
            // $('#editExperienceButton').attr('id', 'addExperienceButton');
            // $('#experienceTable').find('tbody').find(':last-child').remove();
            tableRow.init('#experienceTable', data);
            let $modal = $('#experienceTable').closest('.modal');
            $modal.modal('hide');

            $modal.find('select, input, textarea').val('');
            $modal.find('select').trigger('change');

            // $($currentRow).replace();
        });
    }



    function getFormData ($form)
    {
        let data = {};
        let $fields = $form.find('input, select, textarea');

        $fields.each(function () {
            let $field = $(this);
            let value = $field.val();
            let text = $field.val();
            let target = $field.attr('id');

            if($field.is('select')) {
                text = $field.find('option:selected').text().trim();
            }

            data[target] = {
                text,
                value
            };
        });

        return data;
    };





    modalForm.init('#addExperienceButton');
    deleteWork();

}(jQuery));