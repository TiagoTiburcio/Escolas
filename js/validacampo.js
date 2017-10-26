/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// JavaScript Document
    function validaCadastro(){    
        if (document.cadastro.admin.value === "2" ){        
            alert("ERRO Cadastro - Campo Escola possui Setor Administrativo sem resposta!!!");
            return false;
        } else if (document.cadastro.lte.value === "2" ){
            alert("ERRO Cadastro - Campo Escola possui Laboratório sem resposta!!!");
            return false;
        } else if (document.cadastro.wifi.value === "2" ){
            alert("ERRO Cadastro - Campo Escola possui Redes Wifi sem resposta!!!");
            return false;
        } else if (document.cadastro.diario.value === "2" ){        
            alert("ERRO Cadastro - Campo Escola possui Diário Eletrônico sem resposta!!!");        
            return false;         
        } else {
            return true;
        }
    }
    function mostraAdmin(){
        document.getElementById("blocoAdminComp").style.display = "block";
        document.getElementById("blocoAdminImp").style.display = "block";
        document.getElementById("blocoAdminEstab").style.display = "block";
        document.getElementById("blocoAdminSca").style.display = "block";
        document.getElementById("blocoAdminObs").style.display = "block";
    }
    function escondeAdmin(){
        document.getElementById("blocoAdminComp").style.display = "none";
        document.getElementById("blocoAdminImp").style.display = "none";
        document.getElementById("blocoAdminEstab").style.display = "none";
        document.getElementById("blocoAdminSca").style.display = "none";
        document.getElementById("blocoAdminObs").style.display = "none";
    }
    function mostraLte(){
        document.getElementById("blocoLteComp").style.display = "block";
        document.getElementById("blocoLteImp").style.display = "block";
        document.getElementById("blocoLteEstab").style.display = "block";
        document.getElementById("blocoLteMax").style.display = "block";
        document.getElementById("blocoLtePreg").style.display = "block";
        document.getElementById("blocoLteObs").style.display = "block";
    }
    function escondeLte(){
        document.getElementById("blocoLteComp").style.display = "none";
        document.getElementById("blocoLteImp").style.display = "none";
        document.getElementById("blocoLteEstab").style.display = "none";
        document.getElementById("blocoLteMax").style.display = "none";
        document.getElementById("blocoLtePreg").style.display = "none";
        document.getElementById("blocoLteObs").style.display = "none";
    }
    function mostraWifi(){
        document.getElementById("blocoWifiApRouter").style.display = "block";
        document.getElementById("blocoWifiAp").style.display = "block";
        document.getElementById("blocoWifiObs").style.display = "block";    
    }
    function escondeWifi(){
        document.getElementById("blocoWifiApRouter").style.display = "none";
        document.getElementById("blocoWifiAp").style.display = "none";
        document.getElementById("blocoWifiObs").style.display = "none";    
    }
    function mostraDiario(){
        document.getElementById("blocoDiarioTab").style.display = "block";
        document.getElementById("blocoDiarioObs").style.display = "block";
    }
    function escondeDiario(){
        document.getElementById("blocoDiarioTab").style.display = "none";
        document.getElementById("blocoDiarioObs").style.display = "none";
    }

    function confereVisual(){ 
        alert("adasdadads");
        if (document.cadastro.admin.value === "0" ){        
            escondeAdmin();
        } else if (document.cadastro.lte.value === "0" ){
            escondeLte();
        } else if (document.cadastro.wifi.value === "0" ){
            escondeWifi();
        } else if (document.cadastro.diario.value === "0" ){        
            escondeDiario();
        } else if (document.cadastro.admin.value === "1" ){        
            mostraAdmin();
        } else if (document.cadastro.lte.value === "1" ){
            mostraLte();
        } else if (document.cadastro.wifi.value === "1" ){
            mostraWifi();
        } else if (document.cadastro.diario.value === "1" ){        
            mostraDiario();
        }
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
