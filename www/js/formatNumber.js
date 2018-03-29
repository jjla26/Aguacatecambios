	/* Without prefix */
	
	var input = document.getElementById('cantidad1');
	var input2 = document.getElementById('pesos1')
	var input3 = document.getElementById('bolivares1')
	
	input.addEventListener('keyup', function(e)
	{
		input.value = format_number(this.value);
	});
	
	input2.addEventListener('keyup', function(e)
	{
		input2.value = format_number(this.value);
	});

	input3.addEventListener('keyup', function(e)
	{
		input3.value = format_number(this.value);
	});
		
	
	/* Function */
 export function format_number(number, prefix, thousand_separator, decimal_separator)
	{
		var thousand_separator = thousand_separator || '.',
			decimal_separator = decimal_separator || ',',
			regex		= new RegExp('[^' + decimal_separator + '\\d]', 'g'),
			number_string = number.replace(regex, '').toString(),
			split	  = number_string.split(decimal_separator),
			rest 	  = split[0].length % 3,
			result 	  = split[0].substr(0, rest),
			thousands = split[0].substr(rest).match(/\d{3}/g);
		
		if (thousands) {
			separator = rest ? thousand_separator : '';
			result += separator + thousands.join(thousand_separator);
		}
		result = split[1] != undefined ? result + decimal_separator + split[1] : result;
		return prefix == undefined ? result : (result ? prefix + result : '');
	};
