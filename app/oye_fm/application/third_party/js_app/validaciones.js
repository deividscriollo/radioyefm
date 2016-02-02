var nav4 = window.Event ? true : false;

function numeros(evt) {
// Backspace = 8, Enter = 13, '0' = 48, '9' = 57
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 13 || (key >= 48 && key <= 57));
}

function letras(evt) {
// Backspace = 8, Enter = 13, 'A' = 65, 'Z' = 90 , 'a' = 97, 'z' = 122
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 32 || key <= 8 || key <= 13 || (key >= 65 && key <= 90) || (key >= 97 && key <= 122));
}

function letras_guion(evt) {
// Backspace = 8, Enter = 13, 'A' = 65, 'Z' = 90 , 'a' = 97, 'z' = 122
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 32 || key <= 8 || key <= 13 || (key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key == 45);
}

function decimales(evt) {
// Backspace = 8, Enter = 13, '0' = 48, '9' = 57
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
}

function letrasnumeros(evt) {
// Backspace = 8, Enter = 13, 'A' = 65, 'Z' = 90 , 'a' = 97, 'z' = 122
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 32 || key <= 8 || key <= 13 || (key >= 65 && key <= 90) || (key >= 97 && key <= 122) || (key >= 48 && key <= 57));
}

function letrasnumerossinespacios(evt) {
// Backspace = 8, Enter = 13, 'A' = 65, 'Z' = 90 , 'a' = 97, 'z' = 122
    var key = nav4 ? evt.which : evt.keyCode;
    return (key < 32 || key <= 8 || key <= 13 || key == 95 || (key >= 65 && key <= 90) || (key >= 97 && key <= 122) || (key >= 48 && key <= 57));
}

function letrasnumeros_con_punto(evt) {
// Backspace = 8, Enter = 13, 'A' = 65, 'Z' = 90 , 'a' = 97, 'z' = 122
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 32 || key <= 8 || key <= 13 || (key >= 65 && key <= 90) || (key >= 97 && key <= 122) || (key >= 48 && key <= 57) || key == 46);
}

function letrasnumeros_con_punto_guion(evt) {
// Backspace = 8, Enter = 13, 'A' = 65, 'Z' = 90 , 'a' = 97, 'z' = 122
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 32 || key <= 8 || key <= 13 || (key >= 65 && key <= 90) || (key >= 97 && key <= 122) || (key >= 48 && key <= 57) || key == 46 || key == 45);
}

function letras_numeros_caracteres_especiales(evt) {
// Backspace = 8, Enter = 13, 'A' = 65, 'Z' = 90 , 'a' = 97, 'z' = 122
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 32 || key <= 8 || key <= 13 || key == 35 || (key >= 64 && key <= 90) || (key >= 97 && key <= 122) || (key >= 48 && key <= 57) || key == 46 || key == 45 ||
            key == 40 || key == 41 || key == 95 || key == 241 || key == 209 || key == 239 || key == 225 || key == 233 || key == 237 || key == 243 || key == 250
            || key == 193 || key == 201 || key == 205 || key == 211 || key == 218);
}

function check_ruc(ruc) {
    var digito = ruc.length;
    var valor;
    var acumulador = 0;

    for (var i = 0; i < digito; i++) {
        valor = ruc.substring(i, i + 1);
        if (valor == 0 || valor == 1 || valor == 2 || valor == 3 || valor == 4 || valor == 5 || valor == 6 || valor == 7 || valor == 8 || valor == 9) {
            acumulador++;
        }
    }
    if (acumulador == digito) {
        while (ruc.substring(10, 13) != 001) {
//                alert('Los tres últimos dígitos no tienen el código del RUC 001.');
            return false;
        }
        while (ruc.substring(0, 2) > 24) {
//                alert('Los dos primeros dígitos no pueden ser mayores a 24.');
            return false;
        }
//            alert('El RUC está escrito correctamente');
//            alert('Se procederá a analizar el respectivo RUC.');
        var porcion1 = ruc.substring(2, 3);
        if (porcion1 < 6) {
//                alert('El tercer dígito es menor a 6, por lo \ntanto el usuario es una persona natural.\n');
        } else {
            if (porcion1 == 6) {
//                    alert('El tercer dígito es igual a 6, por lo \ntanto el usuario es una entidad pública.\n');
            } else {
                if (porcion1 == 9) {
//                        alert('El tercer dígito es igual a 9, por lo \ntanto el usuario es una sociedad privada.\n');
                }
            }
        }
        return true;
    }
}

function check_cedula(cedula) {
    var array = cedula.split("");
    var num = array.length;
    if (num == 10) {
        var total = 0;
        var digito = (array[9] * 1);
        for (var i = 0; i < (num - 1); i++) {
            var mult = 0;
            if ((i % 2) != 0) {
                total = total + (array[i] * 1);
            } else {
                mult = array[i] * 2;
                if (mult > 9)
                    total = total + (mult - 9);
                else
                    total = total + mult;
            }
        }
        var decena = total / 10;
        decena = Math.floor(decena);
        decena = (decena + 1) * 10;
        var final = (decena - total);
        if ((final === 10 && digito === 0) || (final === digito)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}