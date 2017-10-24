/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// JavaScript Document
function validaCadastro()
            {
                var validacpf = ValidarCPF(document.cadastro.cpf);
                var validadata =ValidaData(document.cadastro.nascimento);
                
                if (document.cadastro.nome.value === "")
                {
                    alert("O Campo nome \u00e9 Obrigat\u00f3rio!");
                    return false;
                } else
                if (document.cadastro.nascimento.value === "")
                {
                    alert("O Campo data nascimento \u00e9 Obrigat\u00f3rio!");
                    return false;
                } else
                if (document.cadastro.cpf.value === "")
                {
                    alert("O Campo CPF \u00e9 Obrigat\u00f3rio!");
                    return false;
                } else
                if (validacpf)
                {
                    alert("O Campo CPF inv\u00e1lido!");
                    return false;
                } else
                if (validadata)
                {
                    alert("O Campo data inv\u00e1lido!");
                    return false;
                } else
                if (document.cadastro.termo.checked === false)
                {
                    alert("Para prosseguir \u00e9 nescess\u00e1rio ler e concordar com o termo!");
                    return false;
                } else
                if (document.cadastro.senha.value === "")
                {
                    alert("Digite uma senha!");
                    return false;
                }else
                if (document.cadastro.senha.value.length <= 5)
                {
                    alert("Senha deve conter no m\u00ednimo 6 Caracteres!");
                    return false;
                } else
                if (document.cadastro.senha2.value !== document.cadastro.senha.value)
                {
                    alert("Senha e confirma\u00e7\u00e3o de senha diferentes!");
                    return false;
                } else
                    return true;
            }
//valida o CPF digitado
function ValidarCPF(Objcpf) {
    var cpf = Objcpf.value;
    exp = /\.|\-/g;
    cpf = cpf.toString().replace(exp, "");    
    
    if(cpf == '') return true; 
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return true;
    // Valida 1o digito 
    add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))     
            return true;       
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(cpf.charAt(i)) * (11 - i);  
    rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(cpf.charAt(10)))
        return true;       
    return false;
}

function valida_numero() {
   var num = document.getElementById('numero').value;
   if ( isNaN( num ) ) { // isNaN = is not a number
      alert('Não é um número!');
      return false; // bloqueia submissão/envio ao php
   }
   alert('Manda pro php porque é número sim!');
   return true; // prossegue o envio
}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) {
    var boleanoMascara;

    var Digitato = evento.keyCode;
    exp = /\-|\.|\/|\(|\)| /g
    campoSoNumeros = campo.value.toString().replace(exp, "");

    var posicaoCampo = 0;
    var NovoValorCampo = "";
    var TamanhoMascara = campoSoNumeros.length;
    ;

    if (Digitato !== 8) { // backspace 
        for (i = 0; i <= TamanhoMascara; i++) {
            boleanoMascara = ((Mascara.charAt(i) === "-") || (Mascara.charAt(i) === ".")
                    || (Mascara.charAt(i) === "/"))
            boleanoMascara = boleanoMascara || ((Mascara.charAt(i) === "(")
                    || (Mascara.charAt(i) === ")") || (Mascara.charAt(i) === " "))
            if (boleanoMascara) {
                NovoValorCampo += Mascara.charAt(i);
                TamanhoMascara++;
            } else {
                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                posicaoCampo++;
            }
        }
        campo.value = NovoValorCampo;
        return true;
    } else {
        return true;
    }
}
