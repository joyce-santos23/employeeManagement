function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]/g, ''); // Remover caracteres não numéricos

    if (cpf.length !== 11 || /^(\d)\1*$/.test(cpf)) {
        document.getElementById('cpfError').innerText = 'CPF inválido';
        return false;
    }

    let soma = 0;
    for (let i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }

    let resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) {
        resto = 0;
    }

    if (resto !== parseInt(cpf.charAt(9))) {
        document.getElementById('cpfError').innerText = 'CPF inválido';
        return false;
    }

    soma = 0;
    for (let i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }

    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) {
        resto = 0;
    }

    if (resto !== parseInt(cpf.charAt(10))) {
        document.getElementById('cpfError').innerText = 'CPF inválido';
        return false;
    }

    document.getElementById('cpfError').innerText = '';
    return true;
}

function formatarCPF(input) {
    let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    if (value.length > 3 && value.length <= 6) {
        value = value.replace(/^(\d{3})/, '$1.');
    } else if (value.length > 6 && value.length <= 9) {
        value = value.replace(/^(\d{3})(\d{3})/, '$1.$2.');
    } else if (value.length > 9) {
        value = value.replace(/^(\d{3})(\d{3})(\d{3})/, '$1.$2.$3-');
    }
    input.value = value;
}

function validarDataNascimento(data) {
    if (/^\d{2}\/\d{2}\/\d{4}$/.test(data)) {
        document.getElementById('dataNascimentoError').textContent = '';
    } else {
        document.getElementById('dataNascimentoError').textContent = 'Formato inválido.';
    }
}

function formatarDataNascimento(input) {
    let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    if (value.length > 2 && value.length <= 4) {
        value = value.replace(/^(\d{2})/, '$1/');
    } else if (value.length > 4) {
        value = value.replace(/^(\d{2})(\d{2})/, '$1/$2/');
    }
    input.value = value;
}

function formatarDataBrasil(data) {
    const partes = data.split('-');
    if (partes.length === 3) {
        return `${partes[2]}/${partes[1]}/${partes[0]}`;
    }
    return data;
}

function validarEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailRegex.test(email)) {
        document.getElementById('emailError').innerText = '';
        return true;
    } else {
        document.getElementById('emailError').innerText = 'Formato de e-mail inválido.';
        return false;
    }
}

function validarForm() {
    const cpfInput = document.getElementById('cpf');
    const nascimentoInput = document.getElementById('nascimento');
    const emailInput = document.getElementById('email');

    const isCPFValido = validarCPF(cpfInput.value);
    const isNascimentoValido = validarDataNascimento(nascimentoInput.value);
    const isEmailValido = validarEmail(emailInput.value);

    return isCPFValido && isNascimentoValido && isEmailValido;
}