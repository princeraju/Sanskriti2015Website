
      init = function(){
        var jarallax = new Jarallax();
		/* jarallax.setDefault('.hash1, .hash2, .hash3, .hash4, .flash, .meteor, 
			.red_frag, .blue_frag, .logo, .logo_glow, .coming_soon, .content, .flash_image, .fb, .centre', {display:'none'}); */
      jarallax.setDefault('.words, .butterfly, .main_butterfly, .rocket, .launch1, .explode, .events_content, .helicopter, .superb_holder, .widther, .explode2, .aeroplane, .just_events, .giframe, .main_logo2, .last_button_holder, .footer', {display:'none'});
      
		
		jarallax.addAnimation('.background_first', [{progress:'0%', top:'0px'}, 
											        {progress:'8%', top:'-4000px'}]);
		jarallax.addAnimation('.main_logo', [{progress:'0%',marginTop:'0'}, 
									{progress:'4%',marginTop:'-4000'}]);
		jarallax.addAnimation('.college_name', [{progress:'0%',marginLeft:'0',marginTop:'0'}, 
									{progress:'5%',marginLeft:'-4000',marginTop:'-4000'}]);

		jarallax.addAnimation('.dates', [{progress:'0%',right:'5',marginTop:'0'}, 
									{progress:'4%',right:'-4005',marginTop:'-4000'}]);


		jarallax.addAnimation('.back2', [{progress:'0%',opacity:'0'}, 
									{progress:'3%',opacity:'1'}]);
		jarallax.addAnimation('.back2_support', [{progress:'0%',opacity:'0'}, 
									{progress:'3%',opacity:'.1'}]);

		jarallax.addAnimation('.content_1', [{progress:'0%',opacity:'0',paddingLeft:'200'}, 
									{progress:'4%',opacity:'1',paddingLeft:'0'}]);

		jarallax.addAnimation('.ball',[{progress:'1%',marginTop:'-10000000px'},
										{progress:'2%',marginTop:'0px'}]);					//To remove bug
		jarallax.addAnimation('.ball', [{progress:'2%',width:'0',height:'0',marginLeft:'0',marginTop:'0',borderRadius:'0'}, 
									{progress:'4%',width:'400px',height:'400px',marginLeft:'-200px',marginTop:'-200px',borderRadius:'400px'}]);

		jarallax.addAnimation('.square',[{progress:'1%',marginTop:'-10000000px'},
										{progress:'3%',marginTop:'0px'}]);					//To remove bug

		jarallax.addAnimation('.square',[{progress:'3%',width:'0px',height:'0px',marginLeft:'0px',marginTop:'0px'},
										{progress:'5%',width:'700px',height:'200px',marginLeft:'-350px',marginTop:'-100px'}]);
		jarallax.addAnimation('.words',[{progress:'2%',display:'none'},
										{progress:'4%',display:'block',opacity:'0'},
										{progress:'6%',marginTop:'0px',opacity:'1',display:'block'},
										{progress:'11%',opacity:'1',display:'block'},
										{progress:'12%',opacity:'0',display:'block'}]);
		jarallax.addAnimation('.ball',[{progress:'8%',width:'400px',height:'400px',marginLeft:'-200px',marginTop:'-200px',borderRadius:'400px'},
										{progress:'13%',width:'3000px',height:'3000px',marginLeft:'-1500px',marginTop:'-1500px',borderRadius:'3000px'}]);

		jarallax.addAnimation('#butterfly1',[{progress:'3%',marginTop:'0', display:'block'},
											{progress:'16%',marginTop:'-3000', display:'block'}]);
		jarallax.addAnimation('#butterfly2',[{progress:'3%',marginTop:'0', marginLeft:'0',rotate:'-30', display:'block'},
											{progress:'16%',marginTop:'-2500',marginLeft:'-2200', rotate:'-90', display:'block'}]);
		jarallax.addAnimation('#butterfly3',[{progress:'3%',marginTop:'0', marginLeft:'-100',rotate:'30', display:'block'},
											{progress:'17%',marginTop:'-2500',marginLeft:'1800', rotate:'45', display:'block'}]);
		jarallax.addAnimation('#butterfly4',[{progress:'3%',marginTop:'0', marginLeft:'0',rotate:'0', display:'block'},
											{progress:'16%',marginTop:'-1500',marginLeft:'-1200', rotate:'-80', display:'block'}]);
		jarallax.addAnimation('#butterfly5',[{progress:'3%',marginTop:'0', marginLeft:'-100',rotate:'45', display:'block'},
											{progress:'16%',marginTop:'-1500',marginLeft:'1800', rotate:'0', display:'block'}]);
        
        jarallax.addAnimation('.city',[{progress:'11%',bottom:'-500'},
                                        {progress:'13%',bottom:'0',left:'0'},
                                       {progress:'30',left:'-900'}]);
        jarallax.addAnimation('.main_butterfly, .rocket',[{progress:'12%',marginLeft:'-2000', marginBottom:'150px',display:'block'},
                                        {progress:'18%',marginLeft:'0', marginBottom:'150px',display:'block'},
                                        {progress:'20%', marginBottom:'0', display:'block'}]);
        jarallax.addAnimation('.main_butterfly',[{progress:'20%',marginLeft:'0', marginBottom:'0',display:'block',rotate:'45'},
                                        {progress:'26%',marginLeft:'1000', marginBottom:'2000px',display:'block',rotate:'15'}]);
          
        jarallax.addAnimation('.rocket',[{progress:'20%',display:'block'},
                                        {progress:'22%',display:'block'},
                                         {progress:'23%',marginBottom:'0',display:'block'},
                                         {progress:'40%',marginBottom:'3000',display:'none'},
                                         {progress:'71%',rotate:'0'},
                                         {progress:'72%',rotate:'0'},
                                         {progress:'73%',rotate:'180',marginBottom:'3000',display:'block'},
                                        {progress:'79%',marginBottom:'-1000',display:'block'}]);
        jarallax.addAnimation('.launch1',[{progress:'22%',opacity:'0',display:'block'},
                                        {progress:'23%',opacity:'1',display:'block'},
                                          {progress:'28%',opacity:'0',display:'block'}]);
        jarallax.addAnimation('.explode',[{progress:'27%',opacity:'0',display:'block'},
                                          {progress:'28%',opacity:'1',width:'100',height:'100',marginLeft:'-50',borderRadius:'100',display:'block'},                      {progress:'34%',width:'3000',height:'3000',marginLeft:'-1500',borderRadius:'3000',display:'block'},
    {progress:'100%', display:'block'}]);
          
          jarallax.addAnimation('.events_content',[{progress:'29%',opacity:'0',display:'block'},
                                        {progress:'31%',opacity:'1',display:'block'},
                                        {progress:'46%',opacity:'1',marginTop:'0',display:'block'},
                                          {progress:'50%',opacity:'0',marginTop:'-50',display:'block'}]);
           jarallax.addAnimation('.helicopter',[{progress:'32%',opacity:'0',marginLeft:'5000',display:'block'},
                                        {progress:'33%',opacity:'1',marginLeft:'2000',display:'block'},
                                        {progress:'42%',marginLeft:'-100',display:'block'},
                                          {progress:'43%',display:'block'}]);
          jarallax.addAnimation('.superb_holder',[{progress:'29%',opacity:'0',opacity:'0',marginTop:'-50',display:'block'},
                                          {progress:'35%',opacity:'1',marginTop:'0',display:'block'},
                                          {progress:'50%',opacity:'1',marginTop:'0',display:'block'},
                                          {progress:'54%',opacity:'0',marginTop:'-700',display:'block'}]);
          
          jarallax.addAnimation('.widther',[{progress:'51%',width:'0',display:'block'},
                                          {progress:'53%',width:'2500',height:'10',marginTop:'0',display:'block'},
                                            {progress:'54%',width:'2500',height:'10',marginTop:'0',display:'block'},
                                          {progress:'59%',height:'2000',marginTop:'-1000',display:'block'},
                                            {progress:'100%',display:'block'}]);
          jarallax.addAnimation('.explode2',[{progress:'56%',opacity:'0',display:'block'},
                                             {progress:'57%', bottom:'-100',opacity:'1',width:'100',height:'100',marginLeft:'-50',borderRadius:'100',display:'block'},
                                          {progress:'58%', bottom:'-100',opacity:'1',width:'100',height:'100',marginLeft:'-50',borderRadius:'100',display:'block'},                      {progress:'60%',bottom:'-20',width:'930',height:'930',marginLeft:'-465',borderRadius:'930',display:'block'},
    {progress:'73%',bottom:'-20',width:'930',height:'930',marginLeft:'-465',borderRadius:'930', display:'block'},
    {progress:'75%',bottom:'100',width:'2000',height:'2000',marginLeft:'-1000',borderRadius:'2000', display:'block'},
    {progress:'100', display:'block'}]);
          
          jarallax.addAnimation('#aero1',[{progress:'63%',rotate:'90',marginLeft:'0',display:'block'},
                                        {progress:'69%',marginLeft:'1000',display:'block'}]);
          jarallax.addAnimation('#aero2',[{progress:'66%',rotate:'-90',marginLeft:'0',display:'block'},
                                        {progress:'72%',marginLeft:'-1000',display:'block'}]);
         jarallax.addAnimation('.just_events',[{progress:'62%',opacity:'0',marginLeft:'-100',display:'block'},
                                        {progress:'67%',opacity:'1',marginLeft:'-50',display:'block'}, 
                                        {progress:'72%',opacity:'1',marginLeft:'-50',display:'block'},
                                        {progress:'74%',opacity:'0',marginLeft:'0',display:'block'}]);
          
          jarallax.addAnimation('.giframe',[{progress:'75%',marginTop:'-4000',display:'block'},
                                          {progress:'77%',opacity:'1',marginTop:'-300',display:'block'},
                                          {progress:'100%',opacity:'1',display:'block'}]);
          
           jarallax.addAnimation('.cover_screen1',[{progress:'76%',marginLeft:'0'},
                                                   {progress:'78%',marginLeft:'0'},
                                          {progress:'82%',marginLeft:'5000'},
                                                   {progress:'83%',marginLeft:'5000'}]);
          jarallax.addAnimation('.cover_screen2',[{progress:'76%',marginLeft:'0'},
                                                   {progress:'78%',marginLeft:'0'},
                                          {progress:'82%',marginLeft:'-5000'},
                                                  {progress:'83%',marginLeft:'-5000'}]);
          jarallax.addAnimation('.main_logo2',[
                                    {progress:'80%',marginTop:'-2500', display:'block'},
                                     {progress:'83%',marginTop:'0', display:'block'},
                                    {progress:'100%',marginTop:'0', display:'block'}]);
          jarallax.addAnimation('.last_button_holder',[
                                    {progress:'81%', display:'block'},
                                     {progress:'100%',display:'block'}]);
           jarallax.addAnimation('.last_button',[
                                    {progress:'81%',opacity:'0',margin:'300', display:'block'},
                                    {progress:'83%',opacity:'1',margin:'10', display:'block'},
                                     {progress:'100%',display:'block'}]);
          jarallax.addAnimation('.footer',[
                                            {progress:'83%',opacity:'0',display:'block'},
                                            {progress:'85%',opacity:'1',display:'block'},
                                            {progress:'100%',display:'block'}]);

	  }