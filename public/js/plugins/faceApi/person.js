/**
 * Untuk mendaftarkan wajah baru dan mendapatkan personID
 *
 * wajah yang yang sudah terdeteksi akan langsung dikirim ke penyimpanan microsoft
 */

var subscriptionKey = "db65aa4a153a4f52a96fa44430450b5f";//kunci API dari microsoft


//========================================== untuk mendaftarkan Nama orang ===========================================//

/**
 * Untuk mendaftarkan nama orang.
 *
 * Nama langsung di kirim ke penyimpanan microsoft.
 *
 * kita akan mendapatkan pengembalian berupa personId, yang akan di gunakan untuk mendaftarkan wajah
 */
function createPerson() {

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

    /**
     * Url yang di gunakan untuk mendaftarkan nama orang baru
     */
    var uriBase = "https://westcentralus.api.cognitive.microsoft.com/face/v1.0/persongroups";

    $.ajax({
        url: uriBase + "/" + getGroup + "/persons",

        /**
         * berisi header yang di minta oleh microsoft
         */
        beforeSend: function (xhrObj) {
            xhrObj.setRequestHeader("Content-Type", "application/json");//jenis konten yang akan dikirim ke API
            xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);//berisi kunci langanan API yang digunakan untuk mengirim kontn ke API
        },

        type: "POST",

        /**
         * Data dapat diisi dan bisa juga tidak
         */
        data: '{' +
        '"name":"' + document.getElementById('personName').value + '",' +//Nama orang yang di tampilkan
        '"userData":""' +//bidang lampiran untuk data yang disediakan pengguna yang dilampirkan pada seseorang. batas ukuran 16KB
        '}'
    })

        /**
         * respon jika pengiriman data berhasil atau terkirim ke microsoft
         */
        .done(function (data) {
            console.log(JSON.parse(JSON.stringify(data)));
            document.getElementById('personId').value = JSON.parse(JSON.stringify(data.personId));
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


//============================= Untuk mendapatkan wajah yang akan dikirim ke microsoft ===============================//

function addImage() {
    var images = document.getElementById('urlImage').value;
    document.querySelector('#sourcesPerson').src = images;
}

//====================================================================================================================//


//========================================= untuk mendaftarkan wajah orang ===========================================//

/**
 * jika nama orang telah terdaftar, maka kita akan mendapatkan pengembalian berupa personId
 *
 * personId yang akan kita gunakan untuk mendaftarkan wajah orang ke API dan menyimpanya pada penyimapan microsoft
 *
 * setiap nama yang di daftarkan mendapatkan personId masing-masing
 *
 * dan pada saat mendaftarkan wajah baru tidak diperbolehkan mereload halaman,
 *
 * karena akan berakibat personId yang didapat akan hilang namun wajah telah tersimpan pada penyimpanan microsoft
 *
 * sehingga jika kita mendaftarkan wajah yang sama walaupun dengan person id yang berbeda akan berbenturan dengan personId yang pertama
 *
 * dan akan sulit untuk mendeteksi kepemilikan wajah pada saat melakukan login nantinya.
 */
function addPersonFace() {

    /**
     * params yang ini boleh kosong atau pun diisi
     */
    var params = {
        "userData": "",//data yang ditentukan pengguna tentang wajah target. panjang max 1KB
        "targetFace": ""//Untuk menentukan wajah mana yang akan di tambah jika terdapat lebih dari satu wajah. jika kosong berarti hanya ada satu wajah yang akan terdeteksi
    };

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

    var getPersonId = document.getElementById('personId').value;//untuk mengambil personId yang didapat pada saat mendaftarkan nama tadi

    $.ajax({
        url: "https://westcentralus.api.cognitive.microsoft.com/face/v1.0/persongroups/" + getGroup + "/persons/" + getPersonId + "/persistedFaces" + "?" + $.param(params),

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
        data: makeblob(document.getElementById('urlImage').value)//untuk mengirim jenis data image wajah yang berupa binary data
    })

        /**
         * respon jika pengiriman data berhasil atau terkirim ke microsoft
         */
        .done(function (data) {
            $('#responsePerson').text('success');
            $('#addPerson').attr('disabled', false);
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
