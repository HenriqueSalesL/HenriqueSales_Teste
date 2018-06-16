/* Cadastro de Motoristas */

document.getElementById('formulario').addEventListener('submit', cadastrarMotorista);
	
function cadastrarMotorista(e){
	var nomeMotorista = document.getElementById('nomeMotorista').value;
	var dataMotorista = document.getElementById('dataMotorista').value;
	var cpfMotorista = document.getElementById('cpfMotorista').value;
	var modeloCarro = document.getElementById('modeloCarro').value;
	var statusMotorista = document.getElementById('statusMotorista').value;
	var sexoMotorista = document.getElementById('sexoMotorista').value;
	if (sexoMotorista == "F"){
		var sexoMotorista = "Feminino"
	}else {
		var sexoMotorista = "Masculino"
	}
	
	
	if(!nomeMotorista || !dataMotorista || !cpfMotorista){
		alert("Preencha todos os campos!");
		return false;
	} 

	var motorista = {
		Nome: nomeMotorista,
		DataNascimento: dataMotorista,
		CPF: cpfMotorista,
		Modelo: modeloCarro,
		Status: statusMotorista,
		Sexo: sexoMotorista
	};
		
		
	if(localStorage.getItem('novo') === null){
		var motoristas = [];
		motoristas.push(motorista);
		localStorage.setItem('novo', JSON.stringify(motoristas));
	} else {
		var motoristas = JSON.parse(localStorage.getItem('novo'));
		motoristas.push(motorista);
		localStorage.setItem('novo', JSON.stringify(motoristas));
	}
	
	
	document.getElementById('formulario').reset();

	mostraNovo();

	e.preventDefault();
	
	
}

function apagarMotorista(CPF){
	var novo = JSON.parse(localStorage.getItem('novo'));
		console.log(novo);

		 for(var i = 0 ; i < novo.length; i++){
			if(novo[i].CPF == CPF){
				novo.splice(i, 1);
			}
		}

		localStorage.setItem('novo', JSON.stringify(novo));

		mostraNovo();
		
		
}

function mostraNovo(){
	var motoristas = JSON.parse(localStorage.getItem('novo'));
	var novoResultado = document.getElementById('resultados');	
	
	novoResultado.innerHTML = '';
		
	for(var i = 0; i < motoristas.length; i++){
		var Nome = motoristas[i].Nome;
		var DataNascimento = motoristas[i].DataNascimento;
		var CPF = motoristas[i].CPF;
		var Modelo = motoristas[i].Modelo;
		var Status = motoristas[i].Status;
		var Sexo = motoristas[i].Sexo;
		novoResultado.innerHTML += '<tr><td>'+ Nome + '</td>'+
		 							 	  '<td>'+ DataNascimento + '</td>' +
		 							 	  '<td>'+ CPF + '</td>' +
										  '<td>'+ Modelo + '</td>' +
										  '<td>' + Status + '</td>' +
										  '<td>'+ Sexo + '</td>' +
		 							 	  '<td><button class="btn btn danger" onclick="apagarMotorista(\'' + CPF + '\')">Excluir</button></td>' +
		 							 '</tr>';

	}
}	