<div class="row">
			<div class="col-sm-6 text-left">
           Show: <select id="hosting_select">
             <option value="5">5</option>
             <option value="10">10</option>
             <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
      </select>
      </div>
      <div class="col-sm-6 text-right" >
         Search: <input id="search_hosting" type="text"/>
       </div>
</div>
                                
                                
<div class="table-responsive hosting_info">
</div>



 <script>

function domainval(select)
{
	  $.ajax({  
                url:"domain_info.php",  
                method:"POST",
				data:{fetch:select},				
                success:function(data){  
                     $('.domain_info').html(data); 
                }  
           }); 
}

$('#domain_select').on('change',function(){
	var val=$(this).val();
	var select=val;
	domainval(select);
});

$('#search_domain').on('keyup',function(){
	var val=$(this).val();
	var select=val;
	domainval(select);
});
domainval("empty");


</script>
