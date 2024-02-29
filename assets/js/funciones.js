function elevar(numero,exponente){
	resultado=Math.pow(numero,exponente); 
	return resultado;
}

function var_dump(obj){
  	var msg = '';

  	for (var property in obj){
    	if (typeof obj[property] == 'function'){
    		var inicio = obj[property].toString().indexOf('function');
      		var fin = obj[property].toString().indexOf(')')+1;
      		var propertyValue=obj[property].toString().substring(inicio,fin);
      		msg +=(typeof obj[property])+' '+property+' : '+propertyValue+' ;\n';
	    }else if (typeof obj[property] == 'unknown'){
	      	msg += 'unknown '+property+' : unknown ;\n';
	    }else{
      		msg +=(typeof obj[property])+' '+property+' : '+obj[property]+' ;\n';
    	}
  	}
  	return msg;
}


function in_array(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}


function hora(){
	var hora=fecha.getHours();
	var minutos=fecha.getMinutes();
	var segundos=fecha.getSeconds();

	var a = fecha.getFullYear();
	var mes = fecha.getMonth()+1;
	var d = fecha.getDay();
	var dMes = fecha.getDate();
	

	var weekday = new Array(7);
	weekday[0] =  "Domingo";
	weekday[1] = "Lunes";
	weekday[2] = "Martes";
	weekday[3] = "Miercoles";
	weekday[4] = "Jueves";
	weekday[5] = "Viernes";
	weekday[6] = "Sabado";

	var NombreMes =new Array();
	NombreMes[1]='Enero';
	NombreMes[2]='Febrero';
	NombreMes[3]='Marzo';
	NombreMes[4]='Abril';
	NombreMes[5]='Mayo';
	NombreMes[6]='Junio';
	NombreMes[7]='Julio';
	NombreMes[8]='Agosto';
	NombreMes[9]='Septiembre';
	NombreMes[10]='Octubre';
	NombreMes[11]='Noviembre';
	NombreMes[12]='Diciembre';



	if(hora<10){ hora='0'+hora;}
	if(minutos<10){minutos='0'+minutos; }
	if(segundos<10){ segundos='0'+segundos; }
	fech=hora+':'+minutos+':'+segundos;


	var FechaDia=weekday[d]+' '+dMes+' de '+NombreMes[mes]+','+a
	
	$('#reloj').html(fech);
	$('#FechaDia').html(FechaDia);
	
	fecha.setSeconds(fecha.getSeconds()+1);
	setTimeout("hora()",970);
}




function getObjForm(IdForm) {
	// var d = new $.Deferred();
	var Obj={};
	$("#"+IdForm).find(':input').each(function() {
		var ObjConstruect=[];
		if(this.type==='radio'){
			if($("input:radio[name='"+this.name+"']:checked").val()){
				Obj[this.name]=$("input:radio[name='"+this.name+"']:checked").val();
			}        				
		
		}else if(this.type==='checkbox'){
			
			if($(this).is(":checked")===true){
				Obj[this.id]=$(this).val()	;
			}					
		
		}else if(this.type!=='button'){						
			Obj[this.id]=$(this).val()
		}
	});	

	
	return Obj;
}


function roundToTwo(num) {    
	return Math.floor(Math.round(num * 100))/100;
}

function roundjs(num,cant){
	return +(Math.round(num + "e+"+cant+"")  + "e-"+cant+"");	
}

function cantidad_decimales(num,cant) {  
	
  
	return Math.floor(Math.round(num * 10))/10;
}

function remplaza_cadena( text, busca, reemplaza ){
  while (text.toString().indexOf(busca) != -1)
	  text = text.toString().replace(busca,reemplaza);
  return text;
}

function validar_email(mail){
	if (/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/.test(mail)){
		return "1";
	}else{
		return "2";
	}
}


function puntitos(donde,caracter){
	pat = /[\*,\+,\(,\),\?,\,$,\[,\],\^]/
	valor = donde.value
	largo = valor.length
	crtr = true
	if(isNaN(caracter) || pat.test(caracter) == true){
		if (pat.test(caracter)==true){ 
			caracter="\ "+caracter;
		}
		carcter = new RegExp(caracter,"g")
		valor = valor.replace(carcter,"")
		donde.value = valor
		crtr = false
	}else{
		var nums = new Array()
		cont = 0
		for(m=0;m<largo;m++){
			if(valor.charAt(m) == "." || valor.charAt(m) == " ")
				{continue;}
			else{
				nums[cont] = valor.charAt(m)
				cont++
			}
		}
	}
	var cad1="",cad2="",tres=0
	if(largo > 3 && crtr == true){
		for (k=nums.length-1;k>=0;k--){
			cad1 = nums[k]
			cad2 = cad1 + cad2
			tres++
			if((tres%3) == 0){
				if(k!=0){
					cad2 = "." + cad2
				}
			}
		}
		donde.value = cad2
	}
}

function trim (cadena){
	return cadena.replace(/^\s+/g,'').replace(/\s+$/g,'')
}


function fecha_en(fecha){
	var xMonth=fecha.substring(3, 5);  
    var xDay=fecha.substring(0, 2);  
    var xYear=fecha.substring(6,10);  
    
	var fechaEn=xYear+'-'+xMonth+'-'+xDay
	return (fechaEn)	
	
}

function compara_fechas(fecha, fecha2)  
  {  
    var xMonth=fecha.substring(3, 5);  
    var xDay=fecha.substring(0, 2);  
    var xYear=fecha.substring(6,10);  
    var yMonth=fecha2.substring(3, 5);  
    var yDay=fecha2.substring(0, 2);  
    var yYear=fecha2.substring(6,10);  
    if (xYear> yYear)  
    {  
        return(true)  
    }  
    else  
    {  
      if (xYear == yYear)  
      {   
        if (xMonth> yMonth)  
        {  
            return(true)  
        }  
        else  
        {   
          if (xMonth == yMonth)  
          {  
            if (xDay> yDay)  
              return(true);  
            else  
              return(false);  
          }  
          else  
            return(false);  
        }  
      }  
      else  
        return(false);  
    }  
}  




function corta_cadena(texto,menos){
	var largo_cadena=texto.length;
	var hasta=largo_cadena-menos;
	
	var cadena_nueva=texto.substring(0,hasta);
	return cadena_nueva;
	
}
function saca_puntos(cadena){
	return cadena.replace(/\./g,"");
	
}
function array_unique(arr){

	if (arr.length>1){
		var arr=arr.sort();
		var arrUnique=new Array(arr[0]);
		
		for (i=1;i<arr.length;i++){
			if(arr[i]!=arrUnique[arrUnique.length-1]){
				arrUnique.push(arr[i]);
			}
		
		}
		return arrUnique;
	}
	else{
		return arr;
	}
}




