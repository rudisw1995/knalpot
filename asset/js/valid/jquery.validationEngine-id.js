(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = 	{"required":{
						"regex":"none",
						"alertText":"* Inputan ini harus diisi",
						"alertTextCheckboxMultiple":"* Please choose an option",
						"alertTextCheckboxe":"* Checkbox ini harus dipilih"},
					"length":{
						"regex":"none",
						"alertText":"* must be completed between ",
						"alertText2":" and ",
						"alertText3": " character"},
					"maxCheckbox":{
						"regex":"none",
						"alertText":"* Checks allowed Exceeded"},	
					"minCheckbox":{
						"regex":"none",
						"alertText":"* Please select ",
						"alertText2":" options"},	
					"confirm":{
						"regex":"none",
						"alertText":"* Optional fields that do not match"},		
					"telephone":{
						"regex":"/^[0-9\-\(\)\ ]+$/",
						"alertText":"* Phone numbers do not match"},	
					"email":{
						"regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
						"alertText":"* Your email address does not match"},	
					"date":{
                         "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                         "alertText":"* The date was wrong, had to format YYYY-MM-DD"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* Only Numbers"},	
					"noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z]+$/",
						"alertText":"* Only letters and numbers"},	
					"onlyLetter":{
						"regex":"/^[a-zA-Z\ \']+$/",
						"alertText":"* Only letters"}
					}	
		}
	}
})(jQuery);
$(document).ready(function() {	
	$.validationEngineLanguage.newLang()
});