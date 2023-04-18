function calcKw() {
    var tarifa = document.getElementById("tarifa").value
    var uso = document.getElementById("uso").value;
    var uso_mes = (uso*30) / 60
    var kwh = document.getElementById("kwh").value / 1000;
    var kwh_mes = uso_mes * kwh
    var valor_final = kwh_mes * tarifa
    alert("O valor do produto na conta de luz vai ser " + valor_final.toFixed(2))
};