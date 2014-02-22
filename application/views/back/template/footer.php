<script src="<?php echo base_url(); ?>back/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>back/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>back/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="<?php echo base_url(); ?>back/js/main-admin.js"></script>

				<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
				<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
				<script src="<?php echo base_url(); ?>back/js/plugins/forms/jquery.uniform.min.js"></script>
				<script src="<?php echo base_url(); ?>back/js/plugins/forms/jquery.tagsinput.min.js"></script>
				<script src="<?php echo base_url(); ?>back/js/plugins/forms/jquery.select2.min.js"></script>
				<script src="<?php echo base_url(); ?>back/js/plugins/forms/jquery.form.wizard.js"></script>
				<script src="<?php echo base_url(); ?>back/js/plugins/forms/jquery.form.js"></script>
				<script src="<?php echo base_url(); ?>back/js/demo/wizards.js"></script>


<script type="text/javascript" charset="utf-8">
	// clock function
	function startTime()
	{
		var d_names = new Array("Sun", "Mon", "Tues",
		"Wed", "Thur", "Fri", "Sat");
		
		var today=new Date();
		var day=today.getDay();
		var dte=today.getDate();
		var mnth=today.getMonth();
		var yr=today.getFullYear();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		// add a zero in front of numbers<10
		m=checkTime(m);
		s=checkTime(s);
		document.getElementById('time').innerHTML=d_names[day]+" "+dte+"/"+mnth+1+"/"+yr+" "+h+":"+m;
		t=setTimeout(function(){startTime()},500);
	}

	function checkTime(i)
	{
		if (i<10)
	  	{
	  		i="0" + i;
	  	}
		return i;
	}
</script>
    </body>

</html>