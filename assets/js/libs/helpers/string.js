window.randomStr = randomStr
export function randomStr(length = 8) {
    var characters =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    var result = "";
    var charactersLength = characters.length;

    // Membuat karakter pertama non-angka
    result += characters.charAt(Math.floor(Math.random() * 52));

    // Membuat karakter-karakter berikutnya secara acak
    for (var i = 1; i < length; i++) {
        result += characters.charAt(
            Math.floor(Math.random() * charactersLength)
        );
    }

    return result;
}
