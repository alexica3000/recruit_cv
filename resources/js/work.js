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
            required: true
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
            required: true
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
            number: false
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
            required: true
        },
        description: {
            required: true,
            minlength: 2
        }
    };

    const couRules = {
        employer: {
            required: true,
            minlength: 2
        },
        job: {
            required: true,
            number: false
        },
        start: {
            required: true,
            number: true
        },
        end: {
            required: true,
            number: true,
            greaterThan: '#course_start'
        },
        finished: {
            required: true
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
        let init = (selector) => {

            $(document).on('click', selector, function () {
                let $button = $(selector);
                let $modal = $button.closest('.modal');
                let $form = $button.closest('form');
                let formID = $form.attr('id');
                let rules = _getValidationRules(formID);

                _resetValidation($modal, $form);

                self.toggleDisable($button);


                if(_validateForm($form, rules).form()) {

                    let modalType = $(selector).attr('data-type');
                    let modalAction = typeof modalType === 'undefined' || modalType === 'create' ? true : false;

                    if(modalAction) {
                        tableRow.addRow($button.attr('data-target'), self.getFormData($form));
                    }else {
                        let rowsSelector = $modal.attr('data-modal-row-id');
                        let $rows = $(`[data-row-id="${rowsSelector}"]`);

                        tableRow.setRow($rows, self.getFormData($form));
                    }

                    $modal.modal('hide');
                    $modal.removeAttr('data-row-id');
                }

                self.toggleDisable($button, false);

                return false;
            }).on('click', '[data-row-edit]', function () {
                let $button = $(this);
                let id = $button.attr('data-row-edit');
                let $tr = $button.closest('tr');
                let rowID = $tr.attr('data-row-id');
                let $modal = $(id);

                tableRow.editRow($button.closest('tr'));
                self.setModalTranslations($modal, 'edit');
                $modal.find(selector).attr('data-type', 'edit');
                $modal.attr('data-modal-row-id', rowID);
                $modal.modal('show');

                return false;
            }).on('click', '[data-row-remove]', function () {
                tableRow.removeRow($(this));

                return false;
            }).on('hide.bs.modal', function () {

                function clearM (idModal)
                {
                    let $modal = $(idModal);
                    $('.table tr').removeClass('to-remove');
                    $('.confirmAction').removeClass('confirmRowRemove');
                    $(selector).attr('data-type', 'create');

                    self.setModalTranslations($modal);
                    self.clearFormModal($modal);
                };
                clearM('#experienceModal');
                clearM('#educationModal');
                clearM('#courseModal');

            }).on('click', '.confirmRowRemove', function () {
                $('.to-remove').remove();
                $(this).closest('.modal').modal('hide');

                return false;
            });
        };

        /**
         * @memberOf modalForm
         * @param {object} $modal
         * @param {string} type
         */
        this.setModalTranslations = ($modal, type = 'create') => {
            let $trans = $modal.find('.trans');

            $trans.each(function() {
                let $block = $(this);
                let trans = $block.attr(`data-trans-${type}`);

                $block.html(trans);
            });
        };

        /* reset Validation Form */

        let _resetValidation = ($modal, $form) => {

            $modal.on('hide.bs.modal', function () {
                $($form).validate().resetForm();
            });
        };

        /**
         * @memberOf modalForm
         * @param {object} $modal
         */
        this.clearFormModal = ($modal) => {
            $modal.find('select, input, textarea').val('');
            $modal.find('select').trigger('change');
        };

        /**
         * @memberOf modalForm;
         * @param {string} formID
         * @return {object}
         */
        let _getValidationRules = (formID) => {
            let rules = expRules;

            switch(formID) {
                case 'addExperienceForm':
                    rules = expRules;
                    break;
                case 'addEducationForm':
                    rules = eduRules;
                    break;
                case 'addCourseForm':
                    rules = couRules;
                    break;
            }

            return rules;
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
        let _validateForm = ($form, rules) => {
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

        /**
         * @memberOf modalForm
         */

        return {
            init: init
        }
    })();

    let tableRow = (function () {
        /**
         * @memberOf tableRow
         * @param {string} selector
         * @param {object} data
         */
        this.addTableRow = (selector, data) => {
            let $table = $(selector);
            let $clone = $table.find('[data-clone]').clone();
            const index = Date.now();

            self.setRowData(self.cloneRow($clone, index), data);
            $table.find('tbody').append(self.cloneRow($clone, index));
        };

        /**
         * @memberOf tableRow
         * @param {object} $button
         */
        this.removeTableRow = ($button) => {
            let id = $button.attr('data-row-remove');
            let $modal = $(id);
            let $tr = $button.closest('tr');
            let $descriptionTr = $tr.next();

            $descriptionTr.addClass('to-remove');
            $tr.addClass('to-remove');
            $modal.find('.confirmAction').addClass('confirmRowRemove');
            $modal.modal('show');
        };

        /**
         * @memberOf tableRow
         * @param {object} $clone
         * @param number index
         * @return {*}
         */
        this.cloneRow = ($clone, index) => {
            $clone.each(function () {
                let $block = $(this);
                let $fields = $block.find('[data-name]');
                let $collapse = $block.find('[data-table-collapse]');

                $block.attr('data-row-id', 'row-index-' + index);
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
                        $field.val(data[key].text);
                        $field.prev().html(data[key].text);
                    }
                }
            }
        };

        /**
         * @memberOf tableRow
         * @param {object} $row
         */
        this.editTableRow = ($row) => {
            let $descriptionRow = $row.next();
            let $descriptionFields = $descriptionRow.find('input');
            let $fields = $row.find('input');

            self.setDataToForm($fields);
            self.setDataToForm($descriptionFields);
        };

        /**
         * @memberOf tableRow
         * @param {object} $fields
         */
        this.setDataToForm = ($fields) => {
            $fields.each(function () {
                let $field = $(this);
                let value = $field.val();
                let id = '#' + $field.attr('data-target');
                let $formField = $(id);

                $formField.val(value);

                if($formField.is('select')) {
                    $formField.trigger('change');
                }
            });
        };

        return {
            addRow: this.addTableRow,
            removeRow: this.removeTableRow,
            editRow: this.editTableRow,
            setRow: this.setRowData,
        }
    }());

    modalForm.init('#addExperienceButton');
    modalForm.init('#addEducationButton');
    modalForm.init('#addCourseButton');

}(jQuery));