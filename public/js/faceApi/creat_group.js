/**
 * Untuk membuat group baru sesuai dengan group yang dibutuhkan dan jika masih belum ada group
 */

//===================================== Untuk membuat group baru yang dibutuhkan =====================================//

function createGroup() {

    var subscriptionKey = "db65aa4a153a4f52a96fa44430450b5f";//kunci API dari microsoft

    var uriBase = "https://westcentralus.api.cognitive.microsoft.com/face/v1.0/persongroups/";

    var groupName = document.getElementById('groupName').value;//nama group yang ingin ditambahkan

    $.ajax({
        url: uriBase + groupName,

        /**
         * berisi header yang di minta oleh microsoft
         */
        beforeSend: function (xhrObj) {
            xhrObj.setRequestHeader("Content-Type", "application/json");//jenis konten yang akan dikirim ke API
            xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);//berisi kunci langanan API yang digunakan untuk mengirim kontn ke API
        },

        type: "PUT",

        /**
         * Data dapat diisi dan bisa juga tidak
         */
        data: '{' +
        '"name":"group1",' +//Nama tampilan group. max panjang 128
        '"userData":""' +//data yang disediakan pengguna yang dilampirkan pada group orang tersebut. batas ukuran 16KB
        '}'
    })

        /**
         * respon jika pengiriman data berhasil atau terkirim ke microsoft
         */
        .done(function (data) {
            console.log(JSON.parse(JSON.stringify(data)));
        })

        /**
         * respon jika pengiriman data tidak berhasil ataupun mengalami error
         */
        .fail(function (jqXHR, textStatus, errorThrown) {

            var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
            errorString += (jqXHR.responseText === "") ? "" : (jQuery.parseJSON(jqXHR.responseText).message) ?
                    jQuery.parseJSON(jqXHR.responseText).message : jQuery.parseJSON(jqXHR.responseText).error.message;
            alert(errorString);
        });
}

//====================================================================================================================//
