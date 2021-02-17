// jQuery Validation Plugin v1.19.2
// https://jqueryvalidation.org/

(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "./jquery.validate"], factory );
		} else if (typeof module === "object" && module.exports) {
		module.exports = factory( require( "jquery" ) );
		} else {
		factory( jQuery );
	}
	}(function( $ ) {	
		
		// METODO VALIDAR CEDULA ECUATORIANA
		$.validator.addMethod( "validarcedula", function( value, element ) {
			
			if (typeof(value) == 'string' && value.length == 10 && /^\d+$/.test(value)) {
				var digitos = value.split('').map(Number);
				var codigo_provincia = digitos[0] * 10 + digitos[1];
				if (codigo_provincia >= 1 && (codigo_provincia <= 24 || codigo_provincia == 30)) {
					var digito_verificador = digitos.pop();				
					var digito_calculado = digitos.reduce(
						function (valorPrevio, valorActual, indice) {
							return valorPrevio - (valorActual * (2 - indice % 2)) % 9 - (valorActual == 9) * 9;
						}, 1000) % 10;
						return digito_calculado === digito_verificador;
				}
			}
			return false;
			
		}, "Por favor, escriba un número de cédula válido." );
		
		return $;
	}));			