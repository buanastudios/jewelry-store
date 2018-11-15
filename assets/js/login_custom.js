/** 
  * Created on October 28, 2018. 
  * @author Arti Hikmatullah Perbawana Sakti Buana <sakti.buana@arthipesa.com>
  * Telegram/Whatsapp/Wire +6285720502217 
  **/
$(document).ready(function() {

	var data = [
				    {
				        id: 1,
				        text: 'Sales'
				    },
				    {
				        id: 2,
				        text: 'Manager'
				    },
				    {
				        id: 3,
				        text: 'Owner'
				    }
				];

	$("#predefined_username").select2({
		tags: false,
		multiple: false,
		placeholder: 'Select an option',
		width: 'resolve',
		minimumResultsForSearch: -1,
		data: data
	});


	// $("#predefined_username").select2(
	// 	{	tags: false,
	// 		multiple: false,
	// 		tokenSeparators: [',', ' '],
	// 		minimumInputLength: 2,
	// 		minimumResultsForSearch: 10,
	// 		templateResult: function(result) {
	// 				var rs = $("<div />").addClass("row").css("margin","0");
	// 				rs.append($("<div />").addClass("clearfix"));
	// 				rs.append($("<div />").addClass("col-lg-2 col-md-2 col-sm-2 col-xs-2").html("<img src='"+baseurl+"assets/img/users/"+result.pic+"-28x28.jpg' />"));
	// 				rs.append($("<div />").addClass("col-lg-3 col-md-3 col-sm-3 col-xs-3").html(result.id));
	// 				rs.append($("<div />").addClass("col-lg-7 col-md-7 col-sm-7 col-xs-7").html(result.text));
	// 				return rs;
	// 		},
	// 		ajax: {
	// 			url: baseurl + 'user/searchByTerm',
	// 			dataType: "json",
	// 			type: "GET",
	// 			data: function (params) {
	// 				var queryParameters = { term: params.term}
	// 				return queryParameters;
	// 			},
	// 			processResults: function (data) {
	// 				return {
	// 					results: $.map(data.data, function (item) {
	// 						return {text: item.fullname,
	// 								pic: $.trim(item.avatar_filename),
	// 								id: item.u_name}
	// 					})
	// 				};
	// 			}
	// 		}
	// 	});
});