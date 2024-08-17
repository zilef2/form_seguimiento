// export function LimpiarArray(UnArray){

import {number_format, plata_format, tieneCaracteresNoNumericos} from "../global";

export function handledinero(form) {
    if (tieneCaracteresNoNumericos(form.valor_unitario)) form.valor_unitario = 0;
    // if (tieneCerosIzq(form.valor_unitario)) form.valor_unitario.replace(/^$0+/, '$');

    let value = form.valor_unitario.toString().replace(/[$,.]/g, '');
    let dinerou = parseInt(value)
    if (dinerou > 99_999_999_999_999 || dinerou < 0) form.valor_unitario = 0

    form.valor_unitario = plata_format(form.valor_unitario)
}


export function handleCantidad(form) {
    form.cantidad ?? ''
    if (!form || !form.cantidad) return null
    let conteoString = form.cantidad
    removeLetters(form)

    let canti: string = (conteoString.replace(/[$,]/g, ''))
    canti.replace(/^0+/, '');
    if ((canti.match(/\./g) || []).length > 1) {
        form.cantidad = 0
    }
    let cantiNumber: number = parseFloat(canti)

    if (cantiNumber > 9_999_999 || cantiNumber < 0) form.cantiNumberdad = 0
    if (isNaN(cantiNumber) && (cantiNumber > 9000000 || cantiNumber < 0)) form.cantidad = 0

}

export function removeLetters(form) {
    if (form && form.cantidad)
        form.cantidad = form.cantidad.replace(/\D/g, '');
}

export function calcularTotal(valor,canti,data) {
    try {
        let INTvalunitario:number = parseInt(valor.toString().replace(/\$|\./g, ''))
        let INTcanti:number = parseFloat(canti)
        let result:number = 0
        if (!isNaN(INTcanti) && !isNaN(INTvalunitario)) {
            result = INTvalunitario * INTcanti
            data.valor_total_solicitatdo_por_necesidad = number_format(result, 0, true)
        }
        return result
    } catch (exceptionVar) {
        return 0
    }
}

export function handledinerVigAnt(form) {
    let value = form.valor_asignado_en_la_vigencia_anterior.toString().replace(/\$|\./g, '');
    let dinerou = parseInt(value)
    if (dinerou > 9_999_999_999_999 || dinerou < 0) form.valor_asignado_en_la_vigencia_anterior = 0
    
    form.valor_asignado_en_la_vigencia_anterior = plata_format(form.valor_asignado_en_la_vigencia_anterior)
}