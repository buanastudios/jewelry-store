function numberToWords(number) {
  var unique = ["", "Satu ", "Dua ", "Tiga ", "Empat ", "Lima ", "Enam ", "Tujuh ", "Delapan ",
              "Sembilan ", "Sepuluh ", "Sebelas "];

  if(number < 12){
    return unique[number];
  }
  else if (number < 20){
    return numberToWords(number - 10) + "Belas ";
  }
  else if (number < 100){
    return numberToWords((number - (number % 10))/10) + "Puluh " + numberToWords(number%10);
  }
  else if (number < 200){
    return "Seratus " + numberToWords(number - 100);
  }
  else if (number < 1000){
    return numberToWords((number - (number % 100))/100) + "Ratus " + numberToWords(number % 100);
  }
  else if (number < 2000){
    return "Seribu " + numberToWords(number - 1000);
  }
  else if (number < 1000000){
    return numberToWords((number - (number % 1000))/1000) + "Ribu " + numberToWords(number % 1000);
  }
  else if (number < 1000000000){
    return numberToWords((number - (number % 1000000))/1000000) + "Juta " + numberToWords(number % 1000000);
  }
  else if (number < 1000000000000){
    return numberToWords((number - (number % 1000000000))/1000000000) + "Miliar " + numberToWords(number % 1000000000);
  }
  else if (number < 1000000000000000){
    return numberToWords((number - (number % 1000000000000))/1000000000000) + "Triliun " + numberToWords(number % 1000000000000);
  }
}

function numberToWordsInRupiah(number) {
  if(number >= 1000000000000000){
    return "Input number is out of scope, maximum number is 999999999999999, minimum number is 0"
  } else if(number == 0){
    return "Nol Rupiah"
  } else {
    return numberToWords(number) + "Rupiah"
  }

}

// module.exports = numberToWordsInRupiah
