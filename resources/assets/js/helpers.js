
numFormat = function(number){
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
numRevert = function(number){
    return parseFloat(number.replace(/,/g, ''))
}
