// 1
function wardsByNurse(e){
    var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "queries/wards-by-nurse.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
		const nurse = document.getElementById("nurseName").value;
		let finalResult = [];
		result.forEach(x => finalResult = [...finalResult, ...x.wards]);
		finalResult = finalResult.filter((item, pos) => finalResult.indexOf(item) === pos);
		localStorage.setItem('first' + nurse, finalResult.join(','));
		$('#result1').html(finalResult.join(','));
	  }
	});
}

// 2
function nurseByDept(e){
    var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "queries/nurse-by-dept.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
		let finalResult = [];
		const dept = document.getElementById("dept").value;
		result.forEach(x => finalResult = [...finalResult, ...x.nurses]);
		finalResult = finalResult.filter((item, pos) => finalResult.indexOf(item) === pos);
        var output = "";
        finalResult.forEach(item => {
            output += '<tr>'+
            '<td>' + item.name + '</td>' +
            '<td>' + item._id + '</td>' +
            '</tr>';
        });
		localStorage.setItem('second'+dept, output);
  		$('#result2 tbody').html(output);
	  }
	});
}


// 3
function dutyByWardAndShift(e){
    var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "queries/duty-by-ward-and-shift.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
        var output = "";
		const dept = document.getElementById("dept").value;
		const shift = document.getElementById("shift").value;
        result.forEach(item => {
            output += '<tr>'+
            '<td>' + item.shift + '</td>' +
            '<td>' + item.date.$date.$numberLong + '</td>' +
            '<td>' + JSON.stringify(item.nurses) + '</td>' +
            '<td>' + item.departmentName + '</td>' +
            '<td>' + JSON.stringify(item.wards) + '</td>' +
            '</tr>';
        });
		localStorage.setItem(`third-${dept}-${shift}`, output);
  		$('#result3 tbody').html(output);
	  }
	});
}


// LOCAL STORAGE

// 1
function wardsByNurseLocal(e){
	const nurse = document.getElementById("nurseName").value;
	const result = localStorage.getItem('first' + nurse);

	if (result) {
		$('#result1local').css('display', 'block');
		$('#result1localinternal').html(result);
	}
	else {
		$('#result1local').css('display', 'block');
		$('#result1localinternal').html("Local storage is empty");
	}
}

// 2
function nurseByDeptLocal(e){
	const dept = document.getElementById("dept").value;
	const result = localStorage.getItem('second'+dept);

	if (result) {
		$('#result2local').css('display', 'block');
		$('#result2localinternal').html(result);
	}
	else {
		$('#result2local').css('display', 'block');
		$('#result2localinternal').html("Local storage is empty");
	}
}


// 3

function dutyByWardAndShiftLocal(e){
	var currentForm = $(e).parents('form');

	const dept = document.getElementById("dept").value;
	const shift = document.getElementById("shift").value;

	const result = localStorage.getItem(`third-${dept}-${shift}`);

	if (result) {
		$('#result3local').css('display', 'block');
		$('#result3localinternal').html(result);
	}
	else {
		$('#result3local').css('display', 'block');
		$('#result3localinternal').html("Local storage is empty");
	}
}