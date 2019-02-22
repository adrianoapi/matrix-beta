
function form_validtaion(nome, email)
{   
    
    var array = [];
    
    if(nome.length < 5){
        array.push('Preencha o campo <strong>nome</strong>!');
    }
    
    if(email.length < 5){
        array.push('Preencha o campo <strong>e-mail</strong>!');
    }
    
    return array;
    
}
