<script type="text/javascript">	
   function ajax_value_save(id){
 	if (document.getElementById('a').checked) {
	 var  rate_value = document.getElementById('a').value;
	}
  else if (document.getElementById('b').checked) {
	 var  rate_value = document.getElementById('b').value;
	}
    else if (document.getElementById('c').checked) {
	 var  rate_value = document.getElementById('c').value;
	} 
  else if (document.getElementById('d').checked) {
   var  rate_value = document.getElementById('d').value;
  }   
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function (){
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
         var result1 = document.getElementById('val1');
         result1.innerHTML = xmlhttp.responseText;
	      }
	    }
 	xmlhttp.open('GET','answersave.php?valsave='+rate_value+'&qid='+id,true);
 	xmlhttp.send(); 
}
  </script>