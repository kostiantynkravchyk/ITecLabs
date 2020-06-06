// HTML
function wardsByNurse(e){
	var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "queries/wards-by-nurse.php",
	  data: currentForm.serialize(),
	  success: function(result){
	  	$('#result1').html(result);
	  }
	});
}

// XML
function nursesByDepartment(e){
	var currentForm = $(e).parents('form');
	$.ajax({
	  type: "GET",
	  url: "queries/nurses-by-department.php",
	  data: currentForm.serialize(),
	  dataType: "xml",
	  success: function(result){
	  	var output = "";
	  	$(result).find('nurse').each(function(){
			output += '<tr>'+
  			'<td>' + $(this).find('id_nurse').text() + '</td>' +
  			'<td>' + $(this).find('name').text() + '</td>' +
  			'<td>' + $(this).find('date').text() + '</td>' +
  			'<td>' + $(this).find('department').text() + '</td>' +
  			'<td>' + $(this).find('shift').text() + '</td>' +
  			'</tr>';
	  	});
	  	$('#result2 tbody').html(output);
  		
	  },
	  error: function(data){
	  	console.log(data);
	  }
	});
}


// JSON
function wardsByShift(e){
    var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "queries/wards-by-shift.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
        var output = "";
        // var items = JSON.parse(result);
        result.forEach(item => {
            output += '<tr>'+
            '<td>' + item.id_nurse + '</td>' +
            '<td>' + item.name + '</td>' +
            '<td>' + item.date + '</td>' +
            '<td>' + item.department + '</td>' +
            '<td>' + item.shift + '</td>' +
            '<td>' + item.id_ward + '</td>' +
            '<td>' + item.ward_name + '</td>' +
            '</tr>';
        });
  		$('#result3 tbody').html(output);
	  }
	});
}