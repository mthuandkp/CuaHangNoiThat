function convertStringToEnglish(dataString) {
    var aVN = ["á", "à", "ả", "ã", "ạ", "ắ", "ằ", "ẳ", "ẵ", "ặ", "ă", "â", "ấ", "ầ", "ẩ", "ẫ", "ậ"];
    var dVN = ["đ"];
    var eVN = ["é", "è", "ẻ", "ẽ", "ẹ", "ê", "ế", "ề", "ể", "ễ", "ệ"];
    var iVN = ["í", "ì", "ỉ", "ĩ", "ị"];
    var oVN = ["ó", "ò", "ỏ", "õ", "ọ", "ô", "ố", "ồ", "ổ", "ỗ", "ộ", "ơ", "ớ", "ờ", "ở", "ỡ", "ợ"];
    var uVN = ["ú", "ù", "ủ", "ũ", "ụ", "ư", "ứ", "ừ", "ử", "ữ", "ự"];
    var yVN = ["ý", "ỳ", "ỷ", "ỹ", "ỵ"];

    dataString = dataString.toLowerCase();
    for (var i = 0; i < dataString.length; i++) {
        for (var j = 0; j < aVN.length; j++) {
            if (dataString[i] == aVN[j]) {
                dataString = dataString.replaceAt(i, "a");
            }
        }
        for (var j = 0; j < dVN.length; j++) {
            if (dataString[i] == dVN[j]) {
                dataString = dataString.replaceAt(i, "d");
            }
        }
        for (var j = 0; j < eVN.length; j++) {
            if (dataString[i] == eVN[j]) {
                dataString = dataString.replaceAt(i, "e");
            }
        }
        for (var j = 0; j < iVN.length; j++) {
            if (dataString[i] == iVN[j]) {
                dataString = dataString.replaceAt(i, "i");
            }
        }
        for (var j = 0; j < oVN.length; j++) {
            if (dataString[i] == oVN[j]) {
                dataString = dataString.replaceAt(i, "o");
            }
        }
        for (var j = 0; j < uVN.length; j++) {
            if (dataString[i] == uVN[j]) {
                dataString = dataString.replaceAt(i, "i");
            }
        }
        for (var j = 0; j < yVN.length; j++) {
            if (dataString[i] == yVN[j]) {
                dataString = dataString.replaceAt(i, "y");
            }
        }
    }
    return dataString.replace(/\s/g, '');
}