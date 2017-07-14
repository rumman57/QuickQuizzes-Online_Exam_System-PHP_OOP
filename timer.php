<script type="text/javascript">
    setInterval(function(){
    var gid = '<?=$exgid?>';
    var sid = '<?=$userid?>';
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function (){
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
         var result = document.getElementById('val');
           var  rt = xmlhttp.responseText;
           var res = rt.split(":");
           var min = res[0];
           var sec = res[1];
           result.innerHTML = rt;
         if(sec==0 && min==0){
          window.location='finishexam.php?exgid='+gid+'&sid='+sid;
         }   
     }
  }
  xmlhttp.open('GET','countdown.php?gid='+gid+'&stid='+sid,true);
  xmlhttp.send(null);
   },1000);
</script>