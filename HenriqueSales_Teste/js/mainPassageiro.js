/* Cadastro de Passageiros */

document.getElementById('formulario2').addEventListener('submit', cadastrarPassageiro);

function cadastrarPassageiro(e){
	var nomePassageiro = document.getElementById('nomePassageiro').value;
	var dataPassageiro = document.getElementById('dataPassageiro').value;
	var cpfPassageiro = document.getElementById('cpfPassageiro').value;
	var sexoPassageiro = document.getElementById('sexoPassageiro').value;
	if (sexoPassageiro == "F"){
		var sexoPassageiro = "Feminino"
	}else {
		var sexoPassageiro = "Masculino"
	}
	
	
	if(!nomePassageiro || !dataPassageiro || !cpfPassageiro){
		alert("Preencha todos os campos!");
		return false;
	} 

	var passageiro = {
		Nome: nomePassageiro,
		DataNascimento: dataPassageiro,
		CPF: cpfPassageiro,
		Sexo: sexoPassageiro
	};

	if(localStorage.getItem('novo2') === null){
		var passageiros = [];
		passageiros.push(passageiro);
		localStorage.setItem('novo2', JSON.stringify(passageiros));
	} else {
		var passageiros = JSON.parse(localStorage.getItem('novo2'));
		passageiros.push(passageiro);
		localStorage.setItem('novo2', JSON.stringify(passageiros));
	}

	document.getElementById('formulario2').reset();

	mostraNovo2();

	e.preventDefault();
}



function apagarPassageiro(CPF){
	var novo2 = JSON.parse(localStorage.getItem('novo2'));
		console.log(novo2);

		 for(var i = 0 ; i < novo2.length; i++){
			if(novo2[i].CPF == CPF){
				novo2.splice(i, 1);
			}
		}

		localStorage.setItem('novo2', JSON.stringify(novo2));

		mostraNovo2();
}


function mostraNovo2(){
	var passageiros = JSON.parse(localStorage.getItem('novo2'));
	var novo2Resultado = document.getElementById('resultados2');

	novo2Resultado.innerHTML = '';

	for(var i = 0; i < passageiros.length; i++){
		var Nome = passageiros[i].Nome;
		var DataNascimento = passageiros[i].DataNascimento;
		var CPF = passageiros[i].CPF;
		var Sexo = passageiros[i].Sexo;
		 novo2Resultado.innerHTML += '<tr><td>'+ Nome + '</td>'+
		 							 	  '<td>'+ DataNascimento + '</td>' +
		 							 	  '<td>'+ CPF + '</td>' +
										  '<td>'+ Sexo + '</td>' +
		 							 	  '<td><button class="btn btn danger" onclick="apagarPassageiro(\'' + CPF + '\')">Excluir</button></td>' +
		 							 '</tr>';
	}
}