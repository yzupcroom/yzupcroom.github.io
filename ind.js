function onDuty()
{
    var userId=$('#user').val();
    //alert(userId);
	$.ajax({
		url: "php/onDuty.php",
		data: {
            userId:userId
		},
		type: "POST",
		datatype: "html",
		success: function( out ) {
			alert("打卡成功");
			showInformation();
		},
		error : function(){
			alert( "Request failed." );
		}
	});
    
    
}

function offDuty()
{
    var userId=$('#user').val();
	$.ajax({
		url: "php/offDuty.php",
		data: {
            userId:userId
		},
		type: "POST",
		datatype: "html",
		success: function( out ) {
			alert("下班成功");
			showInformation();
		},
		error : function(){
			alert( "Request failed." );
		}
	});
}

function showInformation()
{
    var userId=$('#user').val();
	$.ajax({
		url: "php/show.php",
		data: {
            userId:userId

		},
		type: "POST",
		datatype: "html",
		success: function( out ) {
			document.getElementById("hours").innerHTML=out;
		},
		error : function(){
			alert( "Request failed." );
		}
	});
}

function showMenu()
{
	$.ajax({
		url: "php/showYMSel.php",
		data: {
		},
		type: "POST",
		datatype: "html",
		success: function( out ) {
			document.getElementById("ym").innerHTML=out;
		},
		error : function(){
			alert( "Request failed." );
		}
	});

}


function hist()
{
    var year=$('#year').val();
    var month=$('#month').val();
	$('show1').empty();
	console.log(year)
	$.ajax({
		url: "php/showhist.php",
		data: {
            year:year,
			month: month
		},
		type: "POST",
		datatype: "html",
		success: function( out ) {
			document.getElementById("show1").innerHTML=out;
		},
		error : function(){
			alert( "Request failed." );
		}
	});
}

function r()
{
	$.ajax({
		url: "php/r.php",
		data: {
		},
		type: "POST",
		datatype: "html",
		success: function( out ) {
			console.log("200")
		},
		error : function(){
			alert( "Request failed." );
		}
	});
}

function calSalary(){
    var unitSalary =168;
    var today = new Date()
    var month =today.getMonth()+1;
    var percent=$("#percent").val()/100;
    var hour=$("#hours").val();
    var give=$("#give").val();

    var doSalary=hour*unitSalary;   // 基本薪資*實際時數 ...(A) 
    var health = Math.round((give - doSalary)*percent) // 健保 ...(B) 
    var getSalary=doSalary+health;
    var returnSalary = give-getSalary; 
    month-=1 
    var info="";
    info += hour+" * "+unitSalary +"="+ doSalary+" ...... ( 總時薪 )\n";
    info += "( " + give +" - "+doSalary+" ) * "+percent +" = "+health+" ...... ( 健保 )\n";
    info += "( 總時薪 ) - ( 健保 ) = "+getSalary+" ...... ( 你應該留下來的錢 )\n ";
    info += give+" - "+getSalary+" = "+returnSalary +" ...... ( 要退回去的錢 )";
    document.getElementById("info").value = info ;

    if(returnSalary>=0) 
    {
        var RET =month+"月份時數: "+hour+" 小時\n";
        RET += "學校發 *"+give+"* 元\n";
        RET += "實領 *"+getSalary+"* 元\n";
        RET += "需退回 *"+returnSalary+"* 元\n";
  
        document.getElementById("result").value=RET;
    }
    else
    {
        var RET =month+"月份時數: "+hour+" 小時\n";
        RET += "學校發 *"+give+"* 元\n";
        RET += "實領 *"+getSalary+"* 元\n";
        RET += "需補上 *"+returnSalary*(-1)+"* 元\n";
  
        document.getElementById("result").value=RET;
    }
    document.getElementById('result').select();
    document.execCommand('copy');

}
