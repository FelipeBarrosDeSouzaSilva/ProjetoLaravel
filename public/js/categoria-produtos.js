var interruptor = false;
$('#selectcategoria').on('change', function(){
    if(!interruptor){
        $('.forms').append(
            "<input class='input absolute form-control' placeholder='Nome do produto' id='criarProduto' name='prod'>" + 
            "<input class='input absolute form-control' placeholder='Preço  do produto' id='precoProduto' name='preco'>" + 
            "<input class='input absolute form-control' placeholder='Stock do produto' id='stockProduto' name='stock'>"
            + "<button>Cadastrar</button>" + 
            + "<button type=''>Cadastrar</button>" + 
            + "<button>Cadastrar</button>"
            );
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
function editar(id){
    alert(false)
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
    });
}
function editar(id){
    alert(false)
}
