/**
 * yang ini adalah langkah terakhir, yaitu melakukan identifikasi wajah.
 *
 * namun sebelum melakukan identifikasi wajah, kita harus melakukan pendeteksian wajah.
 *
 * setelah wajah terdeteksi, maka akan mendapat pengembalian berupa faceId.
 *
 * faceId ini nantinya yang akan dikirim ke API microsoft dan mencocokan dengan wajah yang telah didaftarkan tadi.
 *
 * jika sudah mendapatkan wajah yang cocok, makan akan mendapatkan pengembalian lagi yang berupa personId dan confidence
 *
 * yang akan digunakan untuk seleksi login nantinya.
 */

//========================================= Untuk melakukan identifikasi wajah =======================================//

function addIdentify() {

    var subscriptionKey = "db65aa4a153a4f52a96fa44430450b5f";//kunci API dari microsoft

    /**
     * Digunakan untuk memilih group yang telah di daftarkan pada microsoft.
     */
    var group1 = $('#selectGroup1');

    var group2 = $('#selectGroup2');

    if (group1.val() != "") {
        var getGroup = group1.val()
    } else {
        if (group2.val() != "") {
            getGroup = group2.val()
        } else {
            alert('pilih group terlebih dahulu')
        }
    }

    var uriBase = "https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect";

    /**
     * parameter yang diminta untuk dikirim ke API
     */
    var params = {
        "returnFaceId": "true",//kembalikan wajah yang terdeteksi berupa faceId. defaultnya true
        "returnFaceLandmarks": "false",//kembalikan tengara wajah yang terdeteksi. defaultnya false
        "returnFaceAttributes": ""//Menganalisis dan mengembalikan satu atau lebih atribut wajah tertentu dalam string.
    };

    //untuk mengambil gambar wajah yang akan dideteksi
    var sourceImageUrl = document.getElementById("urlIdentify").value;
    document.querySelector("#sourcesIdentify").src = sourceImageUrl;

    //Untuk melakukan pendeteksian wajah
    $.ajax({
        url: uriBase + "?" + $.param(params),

        /**
         * berisi header yang di minta oleh microsoft
         */
        beforeSend: function (xhrObj) {
            xhrObj.setRequestHeader("Content-Type", "application/octet-stream");//jenis konten yang akan dikirim ke API
            xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);//berisi kunci langanan API yang digunakan untuk mengirim kontn ke API
        },

        type: "POST",

        processData: false,

        /**
         * Data harus diisi untuk mengirim wajah
         */
        data: makeblob(sourceImageUrl)//untuk mengirim jenis data image wajah yang berupa binary data
    })

        /**
         * respon jika pengiriman data berhasil atau terkirim ke microsoft
         */
        .done(function (data) {
            $("#responseIdentify").val(JSON.stringify(data, null, 2));

            /**
             * untuk mengidentifikasi wajah yang sudah terdetekdi dan sudah dikembalikan dengan bentuk faceId*/
            $.ajax({
                url: "https://westcentralus.api.cognitive.microsoft.com/face/v1.0/identify",

                /**
                 * berisi header yang di minta oleh microsoft
                 */
                beforeSend: function (xhrObj) {
                    xhrObj.setRequestHeader("Content-Type", "application/json");//jenis konten yang akan dikirim ke API
                    xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);//berisi kunci langanan API yang digunakan untuk mengirim kontn ke API
                },

                type: "POST",

                /**
                 * Data harus diisi untuk mengirim wajah
                 */
                data: '{' +
                '"personGroupId":"'+ getGroup +'",' +//person group dari group dimana target wajah didaftarkan
                '"faceIds":["' + JSON.parse(JSON.stringify(data[0].faceId)) + '"],' +//untuk mengidentifikasi wajah mana yang cocok menggunakan faceId yg didapat dari hasil deteksi tadi
                '"maxNumOfCandidatesReturned":1,' +//maksimum nomor kandidat yang kembali. defaultnya 1
                '"confidenceThreshold": 0.5' +//untuk menentukan apakah satu wajah milik satu orang. defaultnya ditentukan oleh algoritma
                '}'
            })

                /**
                 * respon jika pengiriman data berhasil atau terkirim ke microsoft
                 */
                .done(function (identify) {

                    $("#responseIdentify").val(JSON.stringify(identify, null, 2));

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
