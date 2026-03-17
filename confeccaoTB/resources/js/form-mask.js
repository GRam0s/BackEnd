// Máscaras para campos de formulário
document.addEventListener('DOMContentLoaded', function() {
    // Função para limpar valores antes de enviar
    function cleanValue(value, type) {
        switch(type) {
            case 'cpf':
                return value.replace(/[^\d]/g, '');
            case 'cnpj':
                return value.replace(/[^\d]/g, '');
            case 'telefone':
                return value.replace(/[^\d]/g, '');
            case 'currency':
                return value.replace(/[^\d,]/g, '').replace(',', '.');
            default:
                return value;
        }
    }

    // Máscara de CPF
    const cpfInput = document.querySelector('input[name="cpf"]');
    if (cpfInput) {
        cpfInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            }
            e.target.value = value;
        });

        // Limpar valor antes de enviar
        cpfInput.addEventListener('blur', function(e) {
            if (e.target.value) {
                e.target.dataset.cleanValue = cleanValue(e.target.value, 'cpf');
            }
        });
    }

    // Máscara de CNPJ
    const cnpjInput = document.querySelector('input[name="cnpj"]');
    if (cnpjInput) {
        cnpjInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 14) {
                value = value.replace(/(\d{2})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1/$2');
                value = value.replace(/(\d{4})(\d)/, '$1-$2');
            }
            e.target.value = value;
        });

        // Limpar valor antes de enviar
        cnpjInput.addEventListener('blur', function(e) {
            if (e.target.value) {
                e.target.dataset.cleanValue = cleanValue(e.target.value, 'cnpj');
            }
        });
    }

    // Máscara de Telefone
    const phoneInputs = document.querySelectorAll('input[name="telefone"]');
    phoneInputs.forEach(input => {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                if (value.length > 0) {
                    value = value.replace(/^(\d{2})/, '($1) ');
                    if (value.length > 6) {
                        value = value.replace(/(\) )(\d{4,5})(\d)/, '$1$2-$3');
                    }
                }
            }
            e.target.value = value;
        });

        // Limpar valor antes de enviar
        input.addEventListener('blur', function(e) {
            if (e.target.value) {
                input.dataset.cleanValue = cleanValue(e.target.value, 'telefone');
            }
        });
    });

    // Máscara de Valores Monetários
    const currencyInputs = document.querySelectorAll('input[data-currency="true"]');
    currencyInputs.forEach(input => {
        input.addEventListener('blur', function(e) {
            let value = parseFloat(e.target.value);
            if (!isNaN(value)) {
                e.target.value = value.toLocaleString('pt-BR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }
        });

        input.addEventListener('focus', function(e) {
            if (e.target.value) {
                e.target.value = parseFloat(e.target.value.replace(/[^\d,]/g, '').replace(',', '.')).toString();
            }
        });

        // Limpar valor antes de enviar
        input.addEventListener('blur', function(e) {
            if (e.target.value) {
                input.dataset.cleanValue = cleanValue(e.target.value, 'currency');
            }
        });
    });

    // Interceptar envio do formulário para usar valores limpos
    document.addEventListener('submit', function(e) {
        const form = e.target;
        if (form.tagName === 'FORM') {
            const inputs = form.querySelectorAll('input[data-clean-value]');
            inputs.forEach(input => {
                if (input.dataset.cleanValue) {
                    input.value = input.dataset.cleanValue;
                }
            });
        }
    });
});
