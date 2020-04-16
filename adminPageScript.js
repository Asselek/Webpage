function del_v_f(){
	hideTheWord();
	clear();
	document.getElementById('action_area_id').innerHTML = "<input class = 'input_box' id = 'input_id_box' type='number' placeholder='VISITOR ID'><input class = 'input_box submit_bu' type = 'submit', name = 'delete_visitor' value = 'DELETE VISITOR'>";
	showTheOut();
}

function get_v_f(){
	clear();
	hideTheWord();
	document.getElementById('action_area_id').innerHTML = "<input class = 'input_box' id = 'input_id_box' type='number' placeholder='VISITOR ID'><input class = 'input_box submit_bu' type = 'submit', name = 'get_visitor' value = 'GET VISITOR'>";
}

function get_all_v_f(){
	showTheWord();
	clear();
}

function ins_a_f(){
	clear();
	hideTheWord();
	document.getElementById('action_area_id').innerHTML = "<input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='ANIMAL ID'><input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='ZOO ID'><input class = 'input_box' id = 'input_id_box' type = 'text' placeholder='GENUS'><input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='AGE'><input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='FOOD ID'><input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='EVENT ID'><input class = 'input_box submit_bu' type = 'submit', name = 'insert_animal' value = 'INSERT ANIMAL'>";
}

function del_a_f(){
	clear();
	hideTheWord();
	document.getElementById('action_area_id').innerHTML = "<input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='ANIMAL ID'><input class = 'input_box submit_bu' type = 'submit', name = 'delete_animal' value = 'DELETE ANIMAL'>";
}

function upd_a_f(){
	clear();
	hideTheWord();
	document.getElementById('action_area_id').innerHTML = "<input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='ANIMAL ID'><input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='ZOO ID'><input class = 'input_box' id = 'input_id_box' type = 'text' placeholder='GENUS'><input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='AGE'><input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='FOOD ID'><input class = 'input_box' id = 'input_id_box' type = 'number' placeholder='EVENT ID'><input class = 'input_box submit_bu' type = 'submit', name = 'update_animal' value = 'UPDATE ANIMAL'>";
}

function get_a_f(){
	clear();
	hideTheWord();
}

function get_all_o(){
	clear();
	hideTheWord();
	
}

function get_all_e(){
	clear();
	hideTheWord();
}

function get_all_z(){
	clear();
	hideTheWord();
}

function get_all_d(){
	clear();
	hideTheWord();
}

function ins_saf(){
	clear();
	hideTheWord();
	document.getElementById('action_area_id').innerHTML = "<input class = 'input_box' id = 'input_id_box' type='number' placeholder='STAFF ID'><input class = 'input_box' id = 'input_id_box' type='text' placeholder='FIRST NAME'><input class = 'input_box' id = 'input_id_box' type='text' placeholder='LAST NAME'><input class = 'input_box' id = 'input_id_box' type='number' placeholder='ZOO ID'><input class = 'input_box submit_bu' type = 'submit', name = 'insert_staff' value = 'INSERT_STAFF'>";

}

function del_saf(){
	clear();
	hideTheWord();
	document.getElementById('action_area_id').innerHTML = "<input class = 'input_box' id = 'input_id_box' type='number' placeholder='STAFF ID'><input class = 'input_box submit_bu' type = 'submit', name = 'delete_staff' value = 'DELETE STAFF'>";
}

function get_saf() {
	clear();
	hideTheWord();
}

function get_all_saf(){
	clear();
	hideTheWord();
}

function hideTheWord(){
	document.getElementById('select_button').setAttribute("style", "visibility:hidden;");
}

function showTheWord(){
	document.getElementById('select_button').setAttribute("style", "visibility:visibile;");
}

function hideTheOut(){
	document.getElementById('no_out').setAttribute("style", "visibility:hidden;");
}

function showTheOut(){
	document.getElementById('no_out').setAttribute("style", "visibility:visibile;");
}


function clear(){
	document.getElementById('action_area_id').innerHTML = "";
}

