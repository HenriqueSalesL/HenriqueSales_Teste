/* Cadastro de Corridas */

document.getElementById('formulario3').addEventListener('submit', cadastrarCorrida);

function cadastrarCorrida(e){
	var nomeMotorista = document.getElementById('nomeMotorista').value;
	var nomePassageiro = document.getElementById('nomePassageiro').value;
	var valorCorrida = document.getElementById('valorCorrida').value;
	console.log(nomeMotorista)
	if(!nomeMotorista || !nomePassageiro || !valorCorrida){
		alert("Preencha todos os campos!");
		return false;
	} 

	var corrida = {
		NomeMoto: nomeMotorista,
		NomePass: nomePassageiro,
		Valor: valorCorrida
	};

	if(localStorage.getItem('novo3') === null){
		var corridas = [];
		corridas.push(corrida);
		localStorage.setItem('novo3', JSON.stringify(corridas));
	} else {
		var corridas = JSON.parse(localStorage.getItem('novo3'));
		corridas.push(corrida);
		localStorage.setItem('novo3', JSON.stringify(corridas));
	}

	document.getElementById('formulario3').reset();

	mostraNovo3();


	e.preventDefault();
}


function apagarCorrida(Valor){
	var novo3 = JSON.parse(localStorage.getItem('novo3'));
		console.log(novo3);

		 for(var i = 0 ; i < novo3.length; i++){
			if(novo3[i].Valor == Valor){
				novo3.splice(i, 1);
			}
		}

		localStorage.setItem('novo3', JSON.stringify(novo3));

		mostraNovo3();
}



function mostraNovo3(){
	var corridas = JSON.parse(localStorage.getItem('novo3'));
	var novo3Resultado = document.getElementById('resultados3');

	novo3Resultado.innerHTML = '';

	for(var i = 0; i < corridas.length; i++){
		var NomeMoto = corridas[i].NomeMoto;
		var NomePass = corridas[i].NomePass;
		var Valor = corridas[i].Valor;
		 novo3Resultado.innerHTML += '<tr><td>'+ NomeMoto + '</td>'+
		 							 	  '<td>'+ NomePass + '</td>' +
		 							 	  '<td>'+ Valor + '</td>' +
		 							 	  '<td><button class="btn btn danger" onclick="apagarCorrida(\'' + Valor + '\')">Excluir</button></td>' +
		 							 '</tr>';
	}
}