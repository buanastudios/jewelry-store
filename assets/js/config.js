var weburlpath = ".";
var apiurlpath = weburlpath + "/API";
var dljsonpath = weburlpath + "/Download/";
var loc = location;     
var url = loc.protocol + "//" + loc.host + "/";
// url = 'http://localhost/';
url= url+"courses/derry/jewelry-store/";
var productimageurl =url+"assets/img/products";
var rootpath =  url;//"http://ummuluthfitextile.com/backend";
var baseurl = rootpath ;


// notification body's can be any html string or just string
var notification_html = [];
    notification_html[0] = '<div class="activity-item"> <i class="fa fa-tasks text-warning"></i> <div class="activity"> There are <a href="#">6 new tasks</a> waiting for you. Don\'t forget! <span>About 3 hours ago</span> </div> </div>',
    notification_html[1] = '<div class="activity-item"> <i class="fa fa-check text-success"></i> <div class="activity"> Mail server was updated. See <a href="#">changelog</a> <span>About 2 hours ago</span> </div> </div>',
    notification_html[2] = '<div class="activity-item"> <i class="fa fa-heart text-danger"></i> <div class="activity"> Your <a href="#">latest post</a> was liked by <a href="#">Audrey Mall</a> <span>35 minutes ago</span> </div> </div>',
    notification_html[3] = '<div class="activity-item"> <i class="fa fa-shopping-cart text-success"></i> <div class="activity"> <a href="#">Eugene</a> ordered 2 copies of <a href="#">OEM license</a> <span>14 minutes ago</span> </div> </div>';
    notification_html[4] = '<div class="activity-item"> <i class="fa fa-tasks text-success"></i> <div class="activity"> New Expenditure Saved </div> </div>';


function generateNotification(type, text) {
    var n = noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        layout      : 'topLeft',
        closeWith   : ['click'],
        theme       : 'relax',
        maxVisible  : 7,
        timeout 	: 2000,
        animation   : {
            open  : 'animated bounceInLeft',
            close : 'animated bounceOutLeft',
            easing: 'swing',
            speed : 500
        }
    });
    console.log('html: ' + n.options.id);
}

function getTrxCode(term){
	var rs;
	$.ajax({
	            type: "POST",
	            url: baseurl + "/transactionCategories/searchByTerm",
	            async:false,
	            dataType: 'json',
	            data: {
	                    term: term
	                  },
	            success: function(res) {
	                  console.log("success"); 
	                    rs = res.data.rows[0].code;
	                    console.log(rs);
	                  }
	      });
	console.log(rs);
	return rs;
}

function setSideBar(){
    var abcd = $("li.active",".treeview-menu").length;
    var theactive = $("li.active",".treeview-menu").parents(".treeview");
    // console.log(theactive);
    theactive.addClass("active");
}

setSideBar();

//window.addEventListener('load', function() {
  //  new FastClick(document.body);
//}, false);

function imgError2(image) {	
	image.src=productimageurl+"/thumbnails/no-picture.jpg";
    image.onerror = "";    			
    return true;
}

function imgError(image) {	
	image.src=productimageurl+"/thumbnails/no-picture.jpg";
    image.onerror = "";    		
    return true;
}
