<?php

if (!function_exists('formatar_cpf')) {
    function formatar_cpf($cpf) {
        if (!$cpf) return '';
        $cpf = preg_replace('/\D/', '', $cpf);
        if (strlen($cpf) != 11) return $cpf;
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpf);
    }
}

if (!function_exists('formatar_cnpj')) {
    function formatar_cnpj($cnpj) {
        if (!$cnpj) return '';
        $cnpj = preg_replace('/\D/', '', $cnpj);
        if (strlen($cnpj) != 14) return $cnpj;
        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj);
    }
}

if (!function_exists('formatar_telefone')) {
    function formatar_telefone($telefone) {
        if (!$telefone) return '';
        $telefone = preg_replace('/\D/', '', $telefone);
        if (strlen($telefone) == 11) {
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $telefone);
        } elseif (strlen($telefone) == 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);
        }
        return $telefone;
    }
}

if (!function_exists('formatar_moeda')) {
    function formatar_moeda($valor) {
        if (!$valor) return '';
        return number_format($valor, 2, ',', '.');
    }
}

if (!function_exists('limpar_cpf')) {
    function limpar_cpf($cpf) {
        return preg_replace('/\D/', '', $cpf);
    }
}

if (!function_exists('limpar_cnpj')) {
    function limpar_cnpj($cnpj) {
        return preg_replace('/\D/', '', $cnpj);
    }
}

if (!function_exists('limpar_telefone')) {
    function limpar_telefone($telefone) {
        return preg_replace('/\D/', '', $telefone);
    }
}

if (!function_exists('limpar_moeda')) {
    function limpar_moeda($valor) {
        if (!$valor) return 0;
        $valor = str_replace(['R$', ' ', '.'], '', $valor);
        $valor = str_replace(',', '.', $valor);
        return (float) $valor;
    }
}