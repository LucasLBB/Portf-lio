function senhaVerifica(){

	//Campo senha
	let senha = document.getElementById('senha');
	//Mínimo de caracteres
	let minCaracter = 10;
	//Tamanho dos caracteres
	let senhaValorLen = senha.value.length;
	//Valores no campo senha para utilizar o regex
	let senhaValor = senha.value;
	//Permite mínimo 10 caracteres, mínimo 1 letra minúscula, mínimo 1 letra maiúscula, mínimo 1 caracter especial e no mínimo 1 número
	let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/

	if(senhaValorLen < minCaracter){
		document.getElementById('resultado').innerHTML = 'Não atende aos requisitos';
		return false;
	}else if(senhaValorLen >= minCaracter && regex.exec(senhaValor)){
		document.getElementById('resultado').innerHTML = 'Perfeito';
		return true;
	}else{
		document.getElementById('resultado').innerHTML = 'Ainda falta requisitos';
		return false;
	}
}

function verificaAutenticidade(){
	if(senhaVerifica()){
		return true;
	}else{
		alert('Não foi enviado, por não atender todos os requisitos');
		return false;
	}
}




	



