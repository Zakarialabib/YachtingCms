(function ($) {
    'use strict';

    /**
     * Amenities list
     */
    $(document).on("click", ".amenities_edit", function () {
        let amenities_id = $(this).attr('data-id');
        let amenities_name = $(this).attr('data-name');
        let translations = JSON.parse($(this).attr('data-translations'));
        let amenities_icon = $(this).attr('data-icon');


        translations.forEach(function (value) {
            $(`input[name="${value.locale}[name]"]`).val(value.name);
        });

        $('#submit_add_amenities').hide();
        $('#submit_edit_amenities').show();
        $('#add_amenities_method').val('PUT');
        $('#amenities_id').val(amenities_id);
        $('#amenities_name').val(amenities_name);

        if (amenities_icon) {
            $('#preview_icon').attr('src', `/uploads/${amenities_icon}`);
        } else {
            $('#preview_icon').attr('src', `https://via.placeholder.com/100x100?text=Rentacs-tours`);
        }

        $('#modal_add_amenities').modal('show');
    });

    $(document).on("click", ".amenities_delete", function () {
        swal({
            title: "Êtes-vous sûr?",
            text: "les services supprimées ne peuvent pas être restaurées!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $(this).parent().submit();
            } 
          });
    });

    $('#btn_add_amenities').click(function () {
        $('#submit_add_amenities').show();
        $('#submit_edit_amenities').hide();
        $('#add_amenities_method').val('POST');
        $('#modal_add_amenities').modal('show');
    });

    /**
     * Model add new
     */
    $('#amenities_icon').change(function () {
        previewUploadImage(this, 'preview_icon')
    });

})(jQuery);