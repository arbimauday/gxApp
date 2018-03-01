/**
 * digunakan utuk train person group, agar pada saat akan diidentify wajah yang telah kita daftarkan dapat teridentifikasi
 *
 * training harus dilakukan, karena jika tidak maka sebanyak apapun kita mendaftarkan wajah, wajah itu tetap tidak akan bisa diidentifikasi oleh API microsoft
 */

//============================================= For train person group ===============================================//

function printPerson() {

    var subscriptionKey = "db65aa4a153a4f52a96fa44430450b5f";//kunci API dari microsoft

    /**
     * Digunakan untuk memilih group yang telah di daftarkan pada microsoft.
     */
    var group1 = $('#selectGroup1');

    var group2 = $('#selectGroup2');

    if (group1.val() != "") {
        var getGroup = group1.val();
    } else {
        if (group2.val() != "") {
            getGroup = group2.val()
        } else {
            alert('pilih group terlebih dahulu')
        }
    }

    $.ajax({
        url: "https://westcentralus.api.cognitive.microsoft.com/face/v1.0/persongroups/"+ getGroup +"/train",

        /**
         * berisi header yang di minta oleh microsoft
         */
        beforeSend: function (xhrObj) {
            xhrObj.setRequestHeader("Content-Type", "application/json");//jenis konten yang akan dikirim ke API
            xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);//berisi kunci langanan API yang digunakan untuk mengirim kontn ke API
        },

        type: "POST"

    })

        /**
         * respon jika pengiriman data berhasil atau terkirim ke microsoft
         */
        .done(function (data) {
            console.log('success print')
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
