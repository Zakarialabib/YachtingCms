var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


(function ($) {
    'use strict';

    $(document).ready(function () {
        $('.golo-datatable').DataTable({
            language: {
                url: '/admin/vendors/datatables.net/js/french.json'
            },
            dom: 'Bfrtip',
            responsive: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            order: [0, "desc"],
            buttons: [
                {
                    extend: 'pdf',
                    text: '<i class="la la-file-export" data-toggle="popover" data-content="Enregistrer la liste en PDF." data-trigger="hover" data-original-title="PDF" />',
                    footer:true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4]
                    },
                },
                {
                    extend: 'excel',
                    text: '<i class="la la-file-excel" data-toggle="popover" data-content="Enregistrer la liste sur Excel." data-trigger="hover" data-original-title="Excel" />',
                    footer:true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4]
                    },
                },
                {
                    extend: 'print',
                    text: '<i class="la la-print" data-toggle="popover" data-content="Imprimer la liste sur papier." data-trigger="hover" data-original-title="Print" />',
                    footer:true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4]
                    },
                },
            ],
        });

        $('.right_col').css('min-height', 'auto');
    });

})(jQuery);


function getUrlAPI(slug, type = "api") {
    const base_url = window.location.origin;
    if (type === "full")
        return slug;
    else
        return base_url + "/" + type + slug;
}

function callAPI(data) {
    try {
        let method = data.method || "GET";
        let header = data.header || {'Accept': 'application/json', 'Content-Type': 'application/json'};
        let body = JSON.stringify(data.body);

        return fetch(data.url, {
            'method': method,
            'headers': header,
            'body': body
        }).then(res => {
            return res.json();
        }).then(response => {
            return response;
        })

    } catch (e) {
        console.log(e);
    }
}

function toSlug(text) {
    var slug;

    //?????i ch??? hoa th??nh ch??? th?????ng
    slug = text.toLowerCase();

    //?????i k?? t??? c?? d???u th??nh kh??ng d???u
    slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
    slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
    slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
    slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
    slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
    slug = slug.replace(/??|???|???|???|???/gi, 'y');
    slug = slug.replace(/??/gi, 'd');
    //X??a c??c k?? t??? ?????t bi???t
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
    slug = slug.replace(/ /gi, "-");
    //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
    //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');

    //In slug ra textbox c?? id ???slug???
    // document.getElementById('slug').value = slug;

    return slug;
}

function previewUploadImage(input, element_id) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $(`#${element_id}`).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
