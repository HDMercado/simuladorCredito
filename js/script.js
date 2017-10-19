var estado = false;
function validarMesesNoPago(meses){
    var contador = 0;
    var listaSeleccionados = [];

    for(var i = 0; i < meses.length; i++){
        if(meses.options[i].selected == true){
            contador++;

            listaSeleccionados.push(i);
            console.log(listaSeleccionados);

        }
        if(contador == 2){
            for(var i = 0; i < meses.length; i++){
                if(i != listaSeleccionados[0]  && i != listaSeleccionados[1]){
                    meses.options[i].disabled = true;
                }
            }

            estado = true;

        } else if(estado == true){
            console.log("hola");
            for(var i = 0; i < meses.length; i++){
                meses.options[i].disabled = false;
            }
            estado = false;
        }
        console.log(estado);
    }

}