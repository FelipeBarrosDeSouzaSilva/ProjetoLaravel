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

    let idCategoria = $('tr#'+ id + ' td')[2].textContent;

    for(var i = 1;i < (dados.length - 1); i++){
        let tableUpdate = $('tr#'+ id + ' td')[i];
        if(i !== 2){
            let input = document.createElement('input');
            let classe = 'input absolute form-control';
            input.placeholder = 'Editar ' + titulosDados[i].textContent;
            input.value = dados[i].textContent;
            input.id = 'updateProduto_' + i
            tableUpdate.textContent = "";
            dados[i].append(input);
        }else{
            $('tr#'+ id + ' td')[2].innerHTML = '';
            let select = document.createElement('select');
            select.id = 'updateProduto_'+id;
            let categorias;
            dados[2].append(select);
            $('#updateProduto_'+id).attr('class', 'form-control');
            let trCategoria =  $('tr#'+ id + ' select#updateProduto_'+id);
            $('#selectcategoria option').each(function(index, element) {
                categorias += "<option value='" +
                element.value +
            "'>" + 
                element.innerHTML + 
            "</option>";

                console.log(categorias);
              })
              trCategoria.html(
                categorias      
              );
              $('#updateProduto_'+id).val(idCategoria);
        }
        $('td input').attr('class', 'form-control');
    };
    let ultimaPosicaoColuna = $('tr#'+ id + ' td');
    ultimaPosicaoColuna[dados.length - 1].innerHTML = 
    "<button onclick='editar("
    + dados[0].textContent +
    ")' class='btn btn-primary d-block'> Editar</button>";
}
function editar(id){
    let dados =  $('tr#'+ id + ' td');
    let nome = $('#updateProduto_1').val();
    let categoria = $('#updateProduto_'+id).val();
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
       data: {id, nome, categoria, preco, stock},
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
            alert(dado[1])
        },
        error: (e)=>{
            console.log('status erro: ' + e.status);
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
$('#buscar').keyup(function(e){
    if(e.keyCode !== 8 && e.keyCode != '32'){
        let pesquisa = this.value;
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: 'http://localhost/cadastro/public/buscarProduto/',
            data: {pesquisa},
            success: retorno => {
                for(var i = 0; i < retorno.length; i++){
                    let id = retorno[i]['id'];
                    $('#'+id).attr('class', 'bg-warning h5');
                    console.log(id);
                }
                console.log(retorno.length)
            },
            error: ()=>{
                console.log('erro');
            }
        });
    }else if(e.keyCode == 8){
        $('tbody tr').attr('class', 'bg-white').removeClass('h5');
    }
})
