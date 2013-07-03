
        function loginClick(){
        	if (!$('#registerDiv').is(':visible')) {
	          $('#registerDiv').hide();
	          $('#loginDiv').fadeIn('slow');

        	};

          return true;
        }

        function regClick(){
          $('#loginDiv').hide();
          $('#registerDiv').fadeIn('slow');
          return true;
        }  