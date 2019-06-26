/**
 * jQuery object
 * @external jQuery
 * @see {@link http://api.jquery.com/jQuery/}
 */
;(function ($) {

    let skillModalForm = (function(){

        this.init = () => {
            // let $form = $('#skill_form').closest('form');
            let $modal = $('#skillModal');

            $('.add-skill').on('click', function(){
                let typeSkill = $(this).attr('type-skill');
                self.showModalSkill(typeSkill, $modal);
                // console.log('here');
            });
        };

        /* show Modal Skill */

        this.showModalSkill = (typeSkill, $modal) => {
            self.resetFormSkill($modal);
            self.typeOfSkill(typeSkill);
            self.setModalSkillTrans($modal, typeSkill);
            $modal.modal('show');

            return false;
        };

        /* hide modal for skills*/

        this.hideModalSkill = ($modal) => {
            $modal.modal('hide');
        };

        /* add type of skill to object variable */

        this.typeOfSkill = (typeID) => {

            switch (typeID)
            {
                case "1":
                    $('#label_modal_desc').parent().hide();
                    $('#modal_level').parent().show();
                    break;
                case "2":
                    $('#modal_level').parent().hide();
                    $('#label_modal_desc').parent().show();
                    break;
                case "3":
                    $('#modal_level').parent().hide();
                    $('#label_modal_desc').parent().show();
                    break;
                case "4":
                    $('#modal_level').parent().hide();
                    $('#label_modal_desc').parent().show();
                    break;
            }
        };

        /* trans modal skill */

        this.setModalSkillTrans = ($modal, type) => {
            let $trans = $modal.find('.trans-skill');
            $trans.each(function() {
                let $block = $(this);
                let trans = $block.attr(`data-trans-${type}`);
                $block.html(trans);
            });
        };

        /* load input data from modal form */

        this.loadDataFromSkillModal = () => {
            let inputs_row = {
                char: '',
                description: ''
            }

            inputs_row.char = $('#modal_name').val();
            inputs_row.description = ($type_skill.tbody == '#skill_tbody') ? $('#modal_level').val() : $('#modal_description').val();

            return inputs_row;
        }

        /* reset form*/

        this.resetFormSkill = ($form) => {
            $form.find('input').val('');
            $form.find('select').val('').trigger('change');
            $form.find('textarea').val('');
        };

        return {
            init: init
        }

    })();

    skillModalForm.init();

}(jQuery));