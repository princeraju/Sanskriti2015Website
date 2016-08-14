//Open source this code someday.. :)      {
!function(e,t){"object"==typeof exports?module.exports=t(e,e.document):"function"==typeof define&&define.amd?define(function(){return t(e,e.document)}):e.Sketch=t(e,e.document)}(this,function(e,t){"use strict";function n(e){return"[object Array]"==Object.prototype.toString.call(e)}function o(e){return"function"==typeof e}function r(e){return"number"==typeof e}function i(e){return"string"==typeof e}function u(e){return C[e]||String.fromCharCode(e)}function a(e,t,n){for(var o in t)!n&&o in e||(e[o]=t[o]);return e}function c(e,t){return function(){e.apply(t,arguments)}}function s(e){var t={};for(var n in e)t[n]=o(e[n])?c(e[n],e):e[n];return t}function l(e){function t(t){o(t)&&t.apply(e,[].splice.call(arguments,1))}function n(e){for(_=0;_<et.length;_++)B=et[_],i(B)?O[(e?"add":"remove")+"EventListener"].call(O,B,k,!1):o(B)?k=B:O=B}function r(){R(T),T=L(r),K||(t(e.setup),K=o(e.setup)),U||(t(e.resize),U=o(e.resize)),e.running&&!Y&&(e.dt=(z=+new Date)-e.now,e.millis+=e.dt,e.now=z,t(e.update),Z&&(e.retina&&(e.save(),e.scale(V,V)),e.autoclear&&e.clear()),t(e.draw),Z&&e.retina&&e.restore()),Y=++Y%e.interval}function c(){O=J?e.style:e.canvas,D=J?"px":"",Q=e.width,X=e.height,e.fullscreen&&(X=e.height=w.innerHeight,Q=e.width=w.innerWidth),e.retina&&Z&&V&&(O.style.height=X+"px",O.style.width=Q+"px",Q*=V,X*=V),O.height!==X&&(O.height=X+D),O.width!==Q&&(O.width=Q+D),K&&t(e.resize)}function l(e,t){return N=t.getBoundingClientRect(),e.x=e.pageX-N.left-(w.scrollX||w.pageXOffset),e.y=e.pageY-N.top-(w.scrollY||w.pageYOffset),e}function f(t,n){return l(t,e.element),n=n||{},n.ox=n.x||t.x,n.oy=n.y||t.y,n.x=t.x,n.y=t.y,n.dx=n.x-n.ox,n.dy=n.y-n.oy,n}function d(e){if(e.preventDefault(),G=s(e),G.originalEvent=e,G.touches)for(M.length=G.touches.length,_=0;_<G.touches.length;_++)M[_]=f(G.touches[_],M[_]);else M.length=0,M[0]=f(G,$);return a($,M[0],!0),G}function g(n){for(n=d(n),j=(q=et.indexOf(W=n.type))-1,e.dragging=/down|start/.test(W)?!0:/up|end/.test(W)?!1:e.dragging;j;)i(et[j])?t(e[et[j--]],n):i(et[q])?t(e[et[q++]],n):j=0}function p(n){F=n.keyCode,H="keyup"==n.type,tt[F]=tt[u(F)]=!H,t(e[n.type],n)}function m(n){e.autopause&&("blur"==n.type?b:y)(),t(e[n.type],n)}function y(){e.now=+new Date,e.running=!0}function b(){e.running=!1}function P(){(e.running?b:y)()}function A(){Z&&e.clearRect(0,0,e.width,e.height)}function S(){I=e.element.parentNode,_=E.indexOf(e),I&&I.removeChild(e.element),~_&&E.splice(_,1),n(!1),b()}var T,k,O,I,N,_,D,z,B,G,W,F,H,j,q,Q,X,Y=0,M=[],U=!1,K=!1,V=w.devicePixelRatio||1,J=e.type==x,Z=e.type==h,$={x:0,y:0,ox:0,oy:0,dx:0,dy:0},et=[e.element,g,"mousedown","touchstart",g,"mousemove","touchmove",g,"mouseup","touchend",g,"click",g,"mouseout",g,"mouseover",v,p,"keydown","keyup",w,m,"focus","blur",c,"resize"],tt={};for(F in C)tt[C[F]]=!1;return a(e,{touches:M,mouse:$,keys:tt,dragging:!1,running:!1,millis:0,now:0/0,dt:0/0,destroy:S,toggle:P,clear:A,start:y,stop:b}),E.push(e),e.autostart&&y(),n(!0),c(),r(),e}for(var f,d,g="E LN10 LN2 LOG2E LOG10E PI SQRT1_2 SQRT2 abs acos asin atan ceil cos exp floor log round sin sqrt tan atan2 pow max min".split(" "),p="__hasSketch",m=Math,h="canvas",y="webgl",x="dom",v=t,w=e,E=[],b={fullscreen:!0,autostart:!0,autoclear:!0,autopause:!0,container:v.body,interval:1,globals:!0,retina:!1,type:h},C={8:"BACKSPACE",9:"TAB",13:"ENTER",16:"SHIFT",27:"ESCAPE",32:"SPACE",37:"LEFT",38:"UP",39:"RIGHT",40:"DOWN"},P={CANVAS:h,WEB_GL:y,WEBGL:y,DOM:x,instances:E,install:function(e){if(!e[p]){for(var t=0;t<g.length;t++)e[g[t]]=m[g[t]];a(e,{TWO_PI:2*m.PI,HALF_PI:m.PI/2,QUATER_PI:m.PI/4,random:function(e,t){return n(e)?e[~~(m.random()*e.length)]:(r(t)||(t=e||1,e=0),e+m.random()*(t-e))},lerp:function(e,t,n){return e+n*(t-e)},map:function(e,t,n,o,r){return(e-t)/(n-t)*(r-o)+o}}),e[p]=!0}},create:function(e){return e=a(e||{},b),e.globals&&P.install(self),f=e.element=e.element||v.createElement(e.type===x?"div":"canvas"),d=e.context=e.context||function(){switch(e.type){case h:return f.getContext("2d",e);case y:return f.getContext("webgl",e)||f.getContext("experimental-webgl",e);case x:return f.canvas=f}}(),(e.container||v.body).appendChild(f),P.augment(d,e)},augment:function(e,t){return t=a(t||{},b),t.element=e.canvas||e,t.element.className+=" sketch",a(e,t,!0),l(e)}},A=["ms","moz","webkit","o"],S=self,T=0,k="AnimationFrame",O="request"+k,I="cancel"+k,L=S[O],R=S[I],N=0;N<A.length&&!L;N++)L=S[A[N]+"Request"+k],R=S[A[N]+"Cancel"+k];return S[O]=L=L||function(e){var t=+new Date,n=m.max(0,16-(t-T)),o=setTimeout(function(){e(t+n)},n);return T=t+n,o},S[I]=R=R||function(e){clearTimeout(e)},P});

// } Open Source this code someday.. :)
      
      var arrow=0;
        var temp;
        var tempIdVal;
      $(document).ready(function(){
      		$(".amaze").click(function(){
                mySpecial();
	      	
	     	});
          $(".amaze_back").click(function(){
                mySpecial();
	      	
          });
          $(".scroll_1").click(function(){
              $('body').animate({scrollTop:2200}, 3000,function(){});
          });
          $(".arrowup").click(function(){
              $('body').animate({scrollTop:0}, 3000,function(){});
          });
          $(".floater_close").click(function(){
                $(".floater").animate({marginLeft:6000},1000);
                $(".floater_back").fadeToggle(300);
          });
          $(".floater_back").click(function(){
                $(".floater").animate({marginLeft:6000},1000);
                $(".floater_back").fadeToggle(300);
          });
          
          $("#amaze_events").click(function(){
                $(".floater_back").fadeToggle(300);
                $("#floater_event").css({marginLeft:-6000});
                $("#floater_event").show();
                $("#floater_event").animate({marginLeft:0},500);
                
          });
          
          $(".amaze_gallery2").click(function(){
                $(".floater_back").fadeToggle(300);
                $("#floater_gallery").css({marginLeft:-6000});
                $("#floater_gallery").show();
                $("#floater_gallery").animate({marginLeft:0},500);
                
          });
          $(".amaze_contact2").click(function(){
                $(".floater_back").fadeToggle(300);
                $("#floater_contact").css({marginLeft:-6000});
                $("#floater_contact").show();
                $("#floater_contact").animate({marginLeft:0},500);
                
          });
          $(".amaze_about2").click(function(){
                $(".floater_back").fadeToggle(300);
                $("#floater_about").css({marginLeft:-6000});
                $("#floater_about").show();
                $("#floater_about").animate({marginLeft:0},500);
                
          });
          $(".amaze_spotlight2").click(function(){
                $(".floater_back").fadeToggle(300);
                $("#floater_spotlight").css({marginLeft:-6000});
                $("#floater_spotlight").show();
                $("#floater_spotlight").animate({marginLeft:0},500);
                
          });
          $(".amaze_sponsor2").click(function(){
                $(".floater_back").fadeToggle(300);
                $("#floater_sponsor").css({marginLeft:-6000});
                $("#floater_sponsor").show();
                $("#floater_sponsor").animate({marginLeft:0},500);
                
          });
          
          $(".event_caller").click(function(){
                $(".floater_back").fadeToggle(300);
                $("#floater_event").css({marginLeft:-6000});
                $("#floater_event").show();
                $("#floater_event").animate({marginLeft:0},500);
                
          });
          
          $(".event_button").click(function(){
              tempIdVal=$(this).attr('id');
              temp=$(this).attr('manval');
              $('#'+temp+'_button').fadeOut();
              $('#'+tempIdVal+'_a').delay(400).show(500);
          });
          
          $(".back_button2").click(function(){
              $('#'+temp+'_button').delay(500).fadeIn(500);
              $('#'+tempIdVal+'_a').hide(500);
          });
          
          $(".day_nums").click(function(){
              var temp2;
              
              $(".day_nums").css({
              color: '#333'
              },500);
              $(this).css({
              color: '#C52A4A'
              },500);
              temp2=$(this).attr('id');
              
              $('.hold_events').fadeOut();
              $('#'+temp2+'_hold').delay(300).fadeToggle();
          });
          
      });
function mySpecial()
{
    $('.amaze_back').fadeToggle(300);
      			if(arrow==0)
      			{
                    
                    popOut();
      				arrow_down();
      				left_rotate();
      				right_rotate();
      				arrow=1;
      			}
      			else if (arrow==1)
      			{
                    popBack();
      				arrow_up();
      				left_rotate_back();
      				right_rotate_back();
      				arrow=0;
                }
}
    
function popOut()
{
    
    $("#amaze_gallery").animate({marginBottom:80,marginRight:40},500);
    $("#amaze_events").animate({marginBottom:160,marginRight:100},500);
    $("#amaze_spotlight").animate({marginBottom:240,marginRight:180},500);
    $("#amaze_about").animate({marginBottom:320,marginRight:270},500);
    $("#amaze_sponsor").animate({marginBottom:400,marginRight:370},500);
    $("#amaze_contact").animate({marginBottom:480,marginRight:470},500);
    $(".sugg").animate({opacity:1},500);
}

function popBack()
{
    
    $("#amaze_gallery").animate({marginBottom:0,marginRight:0},500);
    $("#amaze_events").animate({marginBottom:0,marginRight:0},500);
    $("#amaze_spotlight").animate({marginBottom:0,marginRight:0},500);
    $("#amaze_about").animate({marginBottom:0,marginRight:0},500);
    $("#amaze_sponsor").animate({marginBottom:0,marginRight:0},500);
    $("#amaze_contact").animate({marginBottom:0,marginRight:0},500);
    $(".sugg").animate({opacity:0},500);
}

 function arrow_down()
 {
	    // caching the object for performance reasons
	    var $elem = $('.second_amaze');

	    // we use a pseudo object for the animation
	    // (starts from `0` to `angle`), you can name it as you want
	    $({deg: 0}).animate({deg: -90}, {
	        duration: 500,
	        step: function(now) {
	            // in the step-callback (that is fired each step of the animation),
	            // you can use the `now` paramter which contains the current
	            // animation-position (`0` up to `angle`)
	            $elem.css({
	                transform: 'rotate(' + now + 'deg)'
	            });
	        }

    	});
 }

  function arrow_up()
 {
	    // caching the object for performance reasons
	    var $elem = $('.second_amaze');

	    // we use a pseudo object for the animation
	    // (starts from `0` to `angle`), you can name it as you want
	    $({deg: -90}).animate({deg: 0}, {
	        duration: 500,
	        step: function(now) {
	            // in the step-callback (that is fired each step of the animation),
	            // you can use the `now` paramter which contains the current
	            // animation-position (`0` up to `angle`)
	            $elem.css({
	                transform: 'rotate(' + now + 'deg)'
	            });
	        }

    	});
 }

 function left_rotate () {
 		 var $elem = $('.first_amaze');

	    // we use a pseudo object for the animation
	    // (starts from `0` to `angle`), you can name it as you want
	    $({deg: 0}).animate({deg: 45}, {
	        duration: 500,
	        step: function(now) {
	            // in the step-callback (that is fired each step of the animation),
	            // you can use the `now` paramter which contains the current
	            // animation-position (`0` up to `angle`)
	            $elem.css({
	                transform: 'rotate(' + now + 'deg)'
	            });
	        }

    	});
	            $elem.animate({
	            	marginLeft:'-7px',
	            	marginTop:'13px',
	            	width:'25px'
	            },500);

 }

  function left_rotate_back () {
 		 var $elem = $('.first_amaze');

	    // we use a pseudo object for the animation
	    // (starts from `0` to `angle`), you can name it as you want
	    $({deg: 45}).animate({deg: 0}, {
	        duration: 500,
	        step: function(now) {
	            // in the step-callback (that is fired each step of the animation),
	            // you can use the `now` paramter which contains the current
	            // animation-position (`0` up to `angle`)
	            $elem.css({
	                transform: 'rotate(' + now + 'deg)'
	            });

	        }

    	});
    	$elem.animate({
	            	marginLeft:'0px',
	            	marginTop:'0px',
	            	width:'30px'
	    },500);

 }
 function right_rotate () {
 		 var $elem = $('.third_amaze');

	    // we use a pseudo object for the animation
	    // (starts from `0` to `angle`), you can name it as you want
	    $({deg: 0}).animate({deg: -45}, {
	        duration: 500,
	        step: function(now) {
	            // in the step-callback (that is fired each step of the animation),
	            // you can use the `now` paramter which contains the current
	            // animation-position (`0` up to `angle`)
	            $elem.css({
	                transform: 'rotate(' + now + 'deg)'
	            });
	        }

    	});
			            $elem.animate({
			            	marginLeft:'11px',
			            	marginTop:'-3px',
			            	width:'25px'
			            },500);

 }

 function right_rotate_back () {
 		 var $elem = $('.third_amaze');

	    // we use a pseudo object for the animation
	    // (starts from `0` to `angle`), you can name it as you want
	    $({deg: -45}).animate({deg: 0}, {
	        duration: 500,
	        step: function(now) {
	            // in the step-callback (that is fired each step of the animation),
	            // you can use the `now` paramter which contains the current
	            // animation-position (`0` up to `angle`)
	            $elem.css({
	                transform: 'rotate(' + now + 'deg)'
	            });
	        }

    	});
	            $elem.animate({
	            	marginLeft:'0px',
	            	marginTop:'0px',
	            	width:'30px'
	            },500);


}

//Animation
       
        // ----------------------------------------
        // Particle
        // ----------------------------------------

        function Particle( x, y, radius ) {
            this.init( x, y, radius );
        }

        Particle.prototype = {

            init: function( x, y, radius ) {

                this.alive = true;

                this.radius = radius || 10;
                this.wander = 0.15;
                this.theta = random( TWO_PI );
                this.drag = 0.92;
                this.color = '#fff';

                this.x = x || 0.0;
                this.y = y || 0.0;

                this.vx = 0.0;
                this.vy = 0.0;
            },

            move: function() {

                this.x += this.vx;
                this.y += this.vy;

                this.vx *= this.drag;
                this.vy *= this.drag;

                this.theta += random( -0.5, 0.5 ) * this.wander;
                this.vx += sin( this.theta ) * 0.1;
                this.vy += cos( this.theta ) * 0.1;

                this.radius *= 0.96;
                this.alive = this.radius > 0.5;
            },

            draw: function( ctx ) {

                ctx.beginPath();
                ctx.arc( this.x, this.y, this.radius, 0, TWO_PI );
                ctx.fillStyle = this.color;
                ctx.fill();
            }
        };

        // ----------------------------------------
        // Example
        // ----------------------------------------

        var MAX_PARTICLES = 280;
        var COLOURS = [ '#69D2E7', '#A7DBD8', '#E0E4CC', '#F38630', '#FA6900', '#FF4E50', '#F9D423' ];

        var particles = [];
        var pool = [];

        var demo = Sketch.create({
            container: document.getElementById( 'container' )
        });

        demo.setup = function() {

            // Set off some initial particles.
            var i, x, y;

            for ( i = 0; i < 20; i++ ) {
                x = ( demo.width * 0.5 ) + random( -100, 100 );
                y = ( demo.height * 0.5 ) + random( -100, 100 );
                demo.spawn( x, y );
            }
        };

        demo.spawn = function( x, y ) {

            if ( particles.length >= MAX_PARTICLES )
                pool.push( particles.shift() );

            particle = pool.length ? pool.pop() : new Particle();
            particle.init( x, y, random( 5, 40 ) );

            particle.wander = random( 0.5, 2.0 );
            particle.color = random( COLOURS );
            particle.drag = random( 0.9, 0.99 );

            theta = random( TWO_PI );
            force = random( 2, 8 );

            particle.vx = sin( theta ) * force;
            particle.vy = cos( theta ) * force;

            particles.push( particle );
        };

        demo.update = function() {

            var i, particle;

            for ( i = particles.length - 1; i >= 0; i-- ) {

                particle = particles[i];

                if ( particle.alive ) particle.move();
                else pool.push( particles.splice( i, 1 )[0] );
            }
        };

        demo.draw = function() {

            demo.globalCompositeOperation  = 'lighter';

            for ( var i = particles.length - 1; i >= 0; i-- ) {
                particles[i].draw( demo );
            }
        };

        demo.mousemove = function() {

            var particle, theta, force, touch, max, i, j, n;

            for ( i = 0, n = demo.touches.length; i < n; i++ ) {

                touch = demo.touches[i], max = random( 1, 4 );
                for ( j = 0; j < max; j++ ) {
                  demo.spawn( touch.x, touch.y );
                }

            }
        };
        


