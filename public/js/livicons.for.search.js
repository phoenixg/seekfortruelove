;var dN="spinner-four",dS=64,dC="#333333",dHC="#333333",dCCOH=false,dET="click",dA=true,dL=true,dOP=false,mD=200,hD=200,lDataI=JSON.stringify({"spinner-four":{"d":1000,"it":1,"sh":[{"i":{"a":{"p":"M23,3.875C16.304,0.009,7.742,2.304,3.875,9S2.304,24.258,9,28.124S24.258,29.696,28.124,23S29.696,7.742,23,3.875zM19,10.804c2.87,1.657,3.853,5.328,2.196,8.196c-1.657,2.87-5.326,3.854-8.196,2.196c-2.87-1.657-3.854-5.326-2.196-8.196C12.46,10.131,16.13,9.147,19,10.804zM5.608,10c1.295-2.243,3.207-3.899,5.394-4.9c0.301-0.137,0.62,0.025,0.706,0.344l0.736,2.747c0.085,0.319-0.091,0.691-0.379,0.854C10.859,9.723,9.813,10.716,9.072,12C6.863,15.826,8.174,20.719,12,22.928S20.719,23.826,22.928,20c0.741-1.284,1.078-2.687,1.063-4.068c-0.004-0.332,0.229-0.671,0.55-0.756l2.747-0.736c0.32-0.085,0.618,0.109,0.651,0.439c0.228,2.395-0.252,4.878-1.547,7.121C23.079,27.739,15.739,29.706,10,26.393S2.294,15.739,5.608,10z","s":"none","fl":"#333"}},"f":{"0":{"t":"r0"},"100":{"t":"r360"}},"fIE":{"0":{"t":"r0,14.5,14.5"},"100":{"t":"r360,14.5,14.5"}}}]}});
lDataI=lDataI.replace(/\"d\":/g,'"duration":').replace(/\"i\":/g,'"init":').replace(/\"f\":/g,'"frames":').replace(/\"fIE\":/g,'"framesIE":').replace(/\"o\":/g,'"opacity":').replace(/\"t\":/g,'"transform":').replace(/\"it\":/g,'"iteration":').replace(/\"sh\":/g,'"shapes":').replace(/\"a\":/g,'"attr":').replace(/\"p\":/g,'"path":').replace(/\"fl\":/g,'"fill":').replace(/\"e\":/g,'"easing":').replace(/\"s\":/g,'"stroke-width":0,"stroke":'),liviconsdata=JSON.parse(lDataI),
sB=Raphael.svg,vB=Raphael.vml;
Raphael.fn.createLivicon=function(k,c,b,x,g,p,s,r,z,t,f,u,h){var e=[];f=clone(f);var d=f.shapes.length;r=r?r:f.iteration;var j=[],q=[],v=[],A="s"+u+","+u+",0,0",w=u=!1;if(c.match(/spinner/)){u=!0;var B=function(){if($("#"+k).is(":visible")){if(!y){for(var a=0;a< d;a++)e[a].animate(j[a].repeat(Infinity));y=!0}}else if(y){for(a=0;a< d;a++)e[a].stop();y=!1}}}c.match(/morph/)&&(w=!0);for(c=0;c< d;c++){var n=f.shapes[c].init,l;for(l in n)n[l].transform=A+n[l].transform}if(sB)for(c=0;c< d;c++)for(l in n=
f.shapes[c].frames,n)"transform"in n[l]&&(n[l].transform=A+n[l].transform);else for(c=0;c< d;c++)for(l in n=f.shapes[c].framesIE?f.shapes[c].framesIE:f.shapes[c].frames,n)"transform"in n[l]&&(n[l].transform=A+n[l].transform);for(c=0;c< d;c++)l=f.shapes[c].init.attr,"original"!=x&&(l.fill=x),v.push(l.fill),e[c]=this.path(l.path).attr(l);b=this.rect(0,0,b,b).attr({fill:"#fff",stroke:"none","stroke-width":0,opacity:0}).toFront();h=h?h:b;if(!0==p){if(w){for(c=0;c< d;c++)j.push(Raphael.animation(f.shapes[c].frames,
mD)),q.push(f.shapes[c].init.attr);if(g){var C=clone(q);for(c=0;c< d;c++)C[c].fill=g}}else if(p=z?z:f.duration,!sB&&vB)for(c=0;c< d;c++)f.shapes[c].framesIE?j.push(Raphael.animation(f.shapes[c].framesIE,p)):j.push(Raphael.animation(f.shapes[c].frames,p)),q.push(f.shapes[c].init.attr);else for(c=0;c< d;c++)j.push(Raphael.animation(f.shapes[c].frames,p)),q.push(f.shapes[c].init.attr);if("click"==t)if(s&&!w)if(u){for(c=0;c< d;c++)e[c].stop().animate(j[c].repeat(Infinity));var y=
!0;setInterval(B,500)}else if(g){h.hover(function(){for(var a=0;a< d;a++)e[a].animate({fill:g},hD)},function(){for(var a=0;a< d;a++)e[a].animate({fill:v[a]},hD)});var m=!0;h.click(function(){for(var a=0;a< d;a++)e[a].stop().animate(m?j[a].repeat(s):q[a],0);m=!m})}else m=!0,h.click(function(){for(var a=0;a< d;a++)e[a].stop().animate(m?j[a].repeat(s):q[a],0);m=!m});else w?g?(h.hover(function(){for(var a=0;a< d;a++)e[a].animate({fill:g},hD)},function(){for(var a=0;a< d;a++)e[a].animate({fill:v[a]},
hD)}),m=!0,h.click(function(){for(var a=0;a< d;a++)e[a].stop().animate(m?j[a]:C[a],mD),m=!m})):(m=!0,h.click(function(){for(var a=0;a< d;a++)e[a].stop().animate(m?j[a]:q[a],mD),m=!m})):g?(h.hover(function(){for(var a=0;a< d;a++)e[a].animate({fill:g},hD)},function(){for(var a=0;a< d;a++)e[a].animate({fill:v[a]},hD)}),h.click(function(){for(var a=0;a< d;a++)e[a].stop().animate(j[a].repeat(r))})):h.click(function(){for(var a=0;a< d;a++)e[a].stop().animate(j[a].repeat(r))});
else if(s&&!w)if(u){for(t=0;t< d;t++)e[t].stop().animate(j[t].repeat(Infinity));y=!0;setInterval(B,500)}else g?h.hover(function(){for(var a=0;a< d;a++)e[a].stop().animate({fill:g},hD).animate(j[a].repeat(s))},function(){for(var a=0;a< d;a++)e[a].stop().animate(q[a],0)}):h.hover(function(){for(var a=0;a< d;a++)e[a].stop().animate(j[a].repeat(s))},function(){for(var a=0;a< d;a++)e[a].stop().animate(q[a],0)});else w?h.hover(function(){if(g)for(var a=0;a< d;a++)e[a].stop().animate({fill:g},hD).animate(j[a]);
else for(a=0;a< d;a++)e[a].stop().animate(j[a])},function(){for(var a=0;a< d;a++)e[a].stop().animate(q[a],mD)}):h.hover(function(){if(g)for(var a=0;a< d;a++)e[a].stop().animate(q[a],0).animate({fill:g},hD).animate(j[a].repeat(r));else for(a=0;a< d;a++)e[a].stop().animate(q[a],0).animate(j[a].repeat(r))},function(){for(var a=0;a< d;a++)e[a].animate({fill:v[a]},hD)})}else g&&h.hover(function(){for(var a=0;a< d;a++)e[a].stop().animate({fill:g},hD)},function(){for(var a=
0;a< d;a++)e[a].stop().animate({fill:v[a]},hD)});return!0};
(function(k){k(window).load(function(){k(".livicon").each(function(c,b){k(b).attr("id","livicon-"+c)});k(".livicon").each(function(){var c=k(this).attr("id"),b=k(this).data(),x=k(this).parent(),g=b.name||b.n?b.name||b.n:dN,p=b.size||b.s?b.size||b.s:dS,s=b.eventtype||b.et?b.eventtype||b.et:dET,r=p/32;k(this).css({width:p,height:p});var z=g in liviconsdata?liviconsdata[g]:liviconsdata[dN],t="original"==b.color||"original"==b.c?"original":b.color||b.c?b.color||b.c:dC,f=
dA?!1==b.animate||!1==b.a?b.animate||b.a:dA:!0==b.animate||!0==b.a?b.animate||b.a:dA,u=dL?!1==b.loop||!1==b.l?!1:Infinity:!0==b.loop||!0==b.l?Infinity:!1,h=b.iteration||b.i?0< Math.round(b.iteration)||0< Math.round(b.i)?Math.round(b.iteration)||Math.round(b.i):!1:!1,e=b.duration||b.d?0< Math.round(b.duration)||0< Math.round(b.d)?Math.round(b.duration)||Math.round(b.d):!1:!1,d=dCCOH?dHC:!1;if(!1===b.hovercolor||!1===b.hc||0===b.hovercolor||0===
b.hc)d=!1;else if(!0===b.hovercolor||!0===b.hc||1===b.hovercolor||1===b.hc)d=dHC;else if(b.hovercolor||b.hc)d=b.hovercolor||b.hc;b=dOP?!1==b.onparent||!1==b.op?!1:x:!0==b.onparent||!0==b.op?x:!1;Raphael(c,p,p).createLivicon(c,g,p,t,d,f,u,h,e,s,z,r,b)})})})(jQuery);function clone(k){if(null==k||"object"!=typeof k)return k;var c=new k.constructor,b;for(b in k)c[b]=clone(k[b]);return c};