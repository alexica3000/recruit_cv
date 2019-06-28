/**
 * jQuery object
 * @external jQuery
 * @see {@link http://api.jquery.com/jQuery/}
 */
;(function ($) {

    let skillModalFormCr = (function(){

        this.init = (modal) => {
            let $modal = $(modal);

            $(document).on('click', '.add-skill-cr', function(){
                let typeSkill = $(this).attr('type-skill-cr');
                self.showModalSkillCr(typeSkill, $modal);

                return false;
            }).on('click', '#submit_skill-cr', function(){
                let table = '#' + $modal.attr('data-table-type');
                let typeSkCr = $modal.attr('type-of-skill-cr');
                self.addRowSkillCr(table, typeSkCr, self.getFormDataCr($modal, table));
                $modal.modal('hide');

                return false;
            }).on('click', '[data-row-remove-cr]', function(){
                self.deleteRowSkillCr(this);

                return false;
            }).on('click', '.confirmRowRemove', function () {
                $('.to-remove').remove();
                $(this).closest('.modal').modal('hide');

                return false;
            });
        };

        /* show Modal Skill */

        this.showModalSkillCr = (typeSkill, $modal) => {
            self.resetFormSkillCr($modal);
            self.typeOfSkillCr(typeSkill);
            self.setModalSkillTransCr($modal, typeSkill);
            $modal.attr('data-table-type', `${typeSkill}-table-cr`);
            $modal.attr('type-of-skill-cr', `${typeSkill}`);
            $modal.modal('show');

            return false;
        };

        /* hide modal for skills*/

        this.hideModalSkillCr = ($modal) => {
            $modal.modal('hide');
        };

        /* add row from modal  */

        this.addRowSkillCr = ($table, typeSkCr, data) => {
            let $clone = $(document).find('[data-clone-row-skill-cr]').clone();
            const index = Date.now();
            let $row = self.setRowDataCr(self.cloneRowCr($clone, typeSkCr, index), data);

            $($table).find('tbody').append($row);
        };

        /* clone new row */

        this.cloneRowCr = ($clone, typeSkCr, index) => {
            $clone.each(function () {
                let $block = $(this);
                let $fields = $block.find('[data-name]');
                let $rems = $block.find('[data-row-remove-cr]');

                $block.removeClass('d-none').removeAttr('data-clone-row-skill-cr');

                $rems.each(function () {
                    let $rem = $(this);
                    let newRem = $rem.attr('data-row-remove-cr').replace('%typeOfSkill%', typeSkCr);

                    $rem.removeAttr('data-row-remove-cr');
                    $rem.attr('data-row-remove-cr', newRem);
                });

                $fields.each(function () {
                    let $field = $(this);
                    let name = $field.attr('data-name').replace('%index%', index).replace('%typeOfSkill%', typeSkCr);

                    $field.attr('name', name).removeAttr('data-name');
                });

            });

            return $clone;
        };

        /* get data from form skill */

        this.getFormDataCr = ($form, table) => {
            let inputs_row = {
                char: '',
                description: ''
            };

            inputs_row.char = $('#modal_name').val();
            inputs_row.description = (table == '#skills-table-cr') ? $('#modal_level').val() : $('#modal_description').val();

            return inputs_row;
        };

        /* set new data for row skill */

        this.setRowDataCr = ($rows, data) => {


            $.each(data, function(index, value){
                let $td = $rows.find(`td[data-target="${index}"]`);
                let $input = $rows.find(`input[data-target="${index}"]`);
                $td.html(value);
                $input.val(value);
            });

            return $rows;
        };

        /* add type of skill to object variable */

        this.typeOfSkillCr = (typeID) => {

            switch (typeID)
            {
                case "skills":
                    $('#label_modal_desc').parent().hide();
                    $('#modal_level').parent().show();
                    break;
                case "characteristics":
                    $('#modal_level').parent().hide();
                    $('#label_modal_desc').parent().show();
                    break;
                case "social":
                    $('#modal_level').parent().hide();
                    $('#label_modal_desc').parent().show();
                    break;
                case "interests":
                    $('#modal_level').parent().hide();
                    $('#label_modal_desc').parent().show();
                    break;
            }
        };

        /* trans modal skill */

        this.setModalSkillTransCr = ($modal, type) => {
            let $trans = $modal.find('.trans-skill');
            $trans.each(function() {
                let $block = $(this);
                let trans = $block.attr(`data-trans-${type}`);
                $block.html(trans);
            });
        };

        /* remove row skill */

        this.deleteRowSkillCr = (e) => {
            let id = $(e).attr('data-row-remove-cr');
            let $modal = $(id);
            let $tr = $(e).closest('tr');

            $tr.addClass('to-remove');
            $modal.find('.confirmAction').addClass('confirmRowRemove');
            $modal.modal('show');
        };

        /* reset form*/

        this.resetFormSkillCr = ($form) => {
            $form.find('input').val('');
            $form.find('select').val('').trigger('change');
            $form.find('textarea').val('');
        };

        return {
            init: init
        }

    })();

    skillModalFormCr.init('#skillModalCr');

}(jQuery));