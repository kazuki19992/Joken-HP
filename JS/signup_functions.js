$(document).ready(function(){
    $('select').formSelect();
});
$(document).ready(function() {
    // initialize
    $('input#input_text, textarea#textarea1').characterCounter();
    
    // need this!!
    $('div.input-field span:last-child').remove();
});

// リスト項目によって無効化するやつ
document.getElementById("role").addEventListener("change", function(){
	var age_elem = document.getElementById("role");
	var s_value = age_elem.options[age_elem.selectedIndex].value;
	var box_div_elem = document.getElementById("address_input");
	var box_div_elem2 = document.getElementById("std_num_input");

	if(s_value == "5"){
		box_div_elem.style.display = 'none';
		box_div_elem2.style.display = 'none';
	}else{
		box_div_elem.style.display = 'block';
		box_div_elem2.style.display = 'block';
	}
}, false);