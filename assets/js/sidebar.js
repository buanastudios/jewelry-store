$(function(){	
	
	// var data = [
	// 			    {
	// 			        id: 1,
	// 			        text: 'Karyawan 1'
	// 			    },
	// 			    {
	// 			        id: 2,
	// 			        text: 'Karyawan 2'
	// 			    },
	// 			    {
	// 			        id: 3,
	// 			        text: 'Karyawan 3'
	// 			    },
	// 			    {
	// 			        id: 4,
	// 			        text: 'Karyawan 4'
	// 			    }
	// 			];

	// $("#userlogged").select2({
	// 	search: false,
	// 	tags: false,
	// 	multiple: false,	
	// 	placeholder: 'Select an option',
	// 	width: 'resolve',
	// 	minimumResultsForSearch: -1,
	// 	data: data
	// });
	var loggeduser;
	var url_employee_list = baseurl + 'employee/searchByTerm';
	var url_current_user  = baseurl + 'login/api_retrieve_session';

	 $("#userlogged").select2({
	    tags: false,
	    multiple: false,
	    tokenSeparators: [',', ' '],
	    minimumInputLength: 4,
	    minimumResultsForSearch: 10,
	    templateResult: function(result) {
	        var rs = $("<div />").addClass("row");
	        // rs.append($("<div />").addClass("col-lg-2 col-md-2 col-sm-2 col-xs-2").html(result.id));
	        rs.append($("<div />").addClass("col-lg-10 col-md-10 col-sm-10 col-xs-10").html(result.text));        
	        return rs;
	    },
	    ajax: {
	        url: url_employee_list,
	        dataType: "json",
	        type: "GET",
	        data: function (params) {

	            var queryParameters = {
	                term: params.term
	            }
	            return queryParameters;
	        },
	      
	        processResults: function (data, params) {
	            params.page = params.page || 1;
	            return {
	                results: $.map(data.data, function (item) {
	                    return {
	                        text: item.fullname,                        
	                        id: item.u_id
	                    }
	                })
	            };
	        }
	      }
	  });

	 $("#user_logged").on("load", loadingCurrentUser);
	 
	 function init(){
	 	loadingCurrentUser();

	 }

	 function loadingCurrentUser(){
	 	$.ajax({
				type: "POST",
				url: url_current_user,
				dataType: 'json',
				async: false,				
				success: onCurrentUserLoaded
		});		
	 }

	 function onCurrentUserLoaded(res){
	 	console.log(res);	 		 	
	 	$('#user_logged').html(res.data.nama);
	 }

	 // $('#userlogged').val('2');

	 $("#userlogged").on("change", function (e) { 
	 		console.log('perubahan');
	 		loggeduser_id = $("#userlogged").select2("val");
	 		loggeduser = $("#userlogged").select2('data')[0]['text'];
	 			 		
	 		$("#user_logged").html(loggeduser);
	 		$("#officer_name").html(loggeduser);

	 		var url_new_session = baseurl + 'login/sess_add'
			$.ajax({
				type: "POST",
				url: url_new_session,
				dataType: 'json',
				async: false,
				data: {
					u_id: loggeduser_id,
					fullname: loggeduser
				},
				success: onUserLogged
			});		
	  });

	 function onUserLogged(res){
	 	console.log(res);
	 }

	 init();
});