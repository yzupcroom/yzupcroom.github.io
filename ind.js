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
