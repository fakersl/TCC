function formatarCampo(campo, mascara) {
    const valor = campo.value.replace(/\D/g, '');
    let valorFormatado = '';

    let pos = 0;
    for (let i = 0; i < mascara.length; i++) {
        if (mascara[i] === '0') {
            if (valor[pos]) valorFormatado += valor[pos++];
            else break;
        } else {
            valorFormatado += mascara[i];
        }
    }
    campo.value = valorFormatado;
}

function formatarTelefone(campo) {
    const valor = campo.value.replace(/\D/g, ''); //remove tudo q não for numero

    if (valor.length <= 10) {
        // Formato para telefone com 8 dígitos: (XX) XXXX-XXXX
        campo.value = valor.replace(/^(\d{2})(\d{4})(\d{4})$/, "($1) $2-$3");
    } else {
        // Formato para telefone com 9 dígitos: (XX) XXXXX-XXXX
        campo.value = valor.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
    }
}