const btnAdd = document.querySelector('a.add').addEventListener('click', function(){
    var table = document.getElementById('tabela')
    var row = table.insertRow(2)

row.insertCell(0).innerHTML = `<input type="text" name="r1[]" class='desc' placeholder="Ex:Pão">`
row.insertCell(1).innerHTML = `<input type="text" name="r2[]" class='valor' placeholder="Ex:0.30" onkeyup="preencher(this)">`
row.insertCell(2).innerHTML = `<input type="text" name="r3[]" class='quantidade' placeholder="Ex:10">`
})

//Remove a linha
function removerLinha(){
    var result = document.querySelector('input.desc', 'input.valor', 'input.quantidade')
    result.parentNode.parentNode.remove()
}

//Deixa pré definido onde estará o ponto de acordo com o valor que o usuário digitar no campo valor
function preencher(i) {
	var v = i.value.replace(/\D/g,'');
	v = (v/100).toFixed(2) + '';
	v = v.replace(",", ".");
	v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
	v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
	i.value = v;
}

//Permite somente números no campo Quantidade
function somenteN(e){
	let tecla = (window.event) ? event.keyCode : e.which
	if((tecla > 47 && tecla < 58)){
		return true
	}else{
		if(tecla == 8 || tecla == 0){
			return true
		}
		else{
			return false
		}
	}
}

//Permite letras, números e espaços no campo descrição, evitando barras, virgulas, pontos e etc.
function somenteLN(e){
	let teclaLetras = (window.event) ? event.keyCode : e.which
	if((teclaLetras > 64 && teclaLetras < 91) || (teclaLetras > 96 && teclaLetras < 123) || (teclaLetras > 191 && teclaLetras < 255) || (teclaLetras > 47 && teclaLetras < 58) || (teclaLetras == 32)){
		return true
	}else{
		return false
	}
}





