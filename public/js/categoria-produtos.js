var interruptor = false;
$('#selectcategoria').on('change', function(){
    if(!interruptor){
        $('.forms').append(
            "<input class='input absolute form-control' placeholder='Nome do produto' id='criarProduto' name='prod'>" + 
            "<input class='input absolute form-control' placeholder='Preço  do produto' id='precoProduto' name='preco'>" + 
            "<input class='input absolute form-control' placeholder='Stock do produto' id='stockProduto' name='stock'>"
            + "<button class='btn btn-primary'>Cadastrar</button>");
        $('#cat').val(this.value);
        $('#cadProd').on('click', function(){
            let cat = $('#selectcategoria').val();
            let prod = $('input#criarProduto').attr('name');
            enviar(cat, prod);
        });
        
        interruptor = true
    }else{
        $('#cat').attr('value', this.value);
    }
});

function remover(id){
    $.ajax({
        type: 'get',
        url: 'http://localhost/cadastro/public/removerProduto/'+id,
        success: retorno => {    
                $('#'+id).remove();
            },
        error: ()=>{
            console.log('erro');
        }
    });
}
function abrirForm(id){
    let dados =  $('tr#'+ id + ' td');

    let titulosDados = $('#titulosDados th');

    for(var i = 1;i < (dados.length - 1); i++){
        let tableUpdate = $('tr#'+ id + ' td')[i];
        let input = document.createElement('input');
        let classe = 'input absolute form-control';
        input.placeholder = 'Editar ' + titulosDados[i].textContent;
        input.value = dados[i].textContent;
        input.id = 'updateProduto_' + i
        tableUpdate.textContent = "";
        dados[i].append(input);
    };
    let ultimaPosicaoColuna = $('tr#'+ id + ' td');
    ultimaPosicaoColuna[dados.length - 1].innerHTML = 
    "<button onclick='editar("
    + dados[0].textContent +
    ")' class='btn btn-primary d-block'> Editar</button>";
}
function editar(id){
    let dados =  $('tr#'+ id + ' td');
    let produto = $('#updateProduto_1').val();
    let categoria = $('#updateProduto_2').val();
    let preco = $('#updateProduto_3').val();
    let stock = $('#updateProduto_4').val();
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
    $.ajax({
        type: 'POST',
        url: 'http://localhost/cadastro/public/editProduto/'+id,
       data: {id, produto, categoria, preco, stock},
        success: (retorno)=>{
            let dados = retorno.split('|')
            $('#'+id).remove();
            $('tbody')[1].innerHTML +=
                "<tr id="+id+">" +
                "<td>" + dados[0] + "</td>" +
                "<td>" + dados[1] + "</td>" +
                "<td>" + dados[2] + "</td>" +
                "<td>" + dados[3] + "</td>" +
                "<td>" + dados[4] + "</td>" +
                "<td>" + 
                    "<a class='btn btn-sm btn-danger' onclick='remover("+id+")'>Remover</a>" + 
                    "<a class='btn btn-sm btn-primary' onclick='abrirForm("+id+")'>Editar</a>"
                + "</td>" +
                "</tr>"
            ;
        },
        error: ()=>{
            alert('erro id(' + id + ')');
        }
     });
}

function removerCliente(id){
    $.ajax({
        type: 'get',
        url: 'http://localhost/cadastro/public/removerCliente/'+id,
        success: retorno => {    
                $('#tr_'+id).remove();
            },
        error: ()=>{
            console.log('erro');
        }
    })
}
