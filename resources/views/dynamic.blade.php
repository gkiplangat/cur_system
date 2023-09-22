<style type="text/css">
@import url("https://fonts.googleapis.com/css?family={{ $allsettings->body_font }}");
html, body, div, span, applet, object,
iframe, p, blockquote,
pre, a, abbr, acronym, address, big, cite,
code, del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var, b,
u, i, center, dl, dt, dd, ol, ul, li, fieldset,
form, label, legend, table, caption, tbody,
tfoot, thead, tr, th, td, article, aside,
canvas, details, embed, figure, figcaption,
footer, header, hgroup, menu, nav, output, ruby,
section, summary, time, mark, audio, video {
		
		font-family: '{{ str_replace("+"," ",$allsettings->body_font) }}', sans-serif !important;
		font-size: {{ $allsettings->body_font_size }}px;
		line-height:inherit;
}
.h1
{
font-family: '{{ str_replace("+"," ",$allsettings->h1_font) }}' !important;
}
.h2
{
font-family: '{{ str_replace("+"," ",$allsettings->h2_font) }}' !important;
}
.h3
{
font-family: '{{ str_replace("+"," ",$allsettings->h3_font) }}' !important;
}
.h4
{
font-family: '{{ str_replace("+"," ",$allsettings->h4_font) }}' !important;
}
.h5
{
font-family: '{{ str_replace("+"," ",$allsettings->h5_font) }}' !important;
}
.h6
{
font-family: '{{ str_replace("+"," ",$allsettings->h6_font) }}' !important;
}
.button
{
font-family: '{{ str_replace("+"," ",$allsettings->button_font) }}' !important;
}
.link-color,.text-color
{
color:{{ $allsettings->site_button_color }};
}
.pastor-social li a
{
color:{{ $allsettings->site_theme_color }};

}
.link-color:hover
{
color:{{ $allsettings->site_button_color }};
text-decoration:underline;
}

.turn-page .turn-ul li:hover, .turn-page .turn-ul li:active {
  background: {{ $allsettings->site_button_color }} !important;
  color: #fff;
}

.turn-page .turn-ul li.on {
  background: {{ $allsettings->site_button_hover }} !important;
  color: #fff;
}
.event-tag a
{
background:{{ $allsettings->site_button_hover }} !important;
padding:6px 10px 6px 10px;
color:{{ $allsettings->site_theme_color }};
}
.event-tag a:hover,.event-tag a:active,.event-tag a:focus
{
color:#FFFFFF;
background: {{ $allsettings->site_button_color }} !important;
}


#LoginForm{ background-image: linear-gradient(to right, {{ $allsettings->site_button_hover }} , {{ $allsettings->site_theme_color }}); }
#backTop{
    width:35px;
	
    height:35px;
    padding:10px;
    border-radius:4px;
    text-indent:-9999px;
    cursor:pointer;
    z-index:999999999;
	display:none;
	box-sizing:content-box;
	-webkit-box-sizing:content-box;
}

#backTop.red{
     background:url({{ URL::to('resources/views/theme/backtop/uparr-48-w.png') }}) no-repeat center center;
	 background-color:{{ $allsettings->site_theme_color }}; 
    border:1px solid {{ $allsettings->site_theme_color }};
}
#backTop.red:hover,#backTop:hover
{
background-color:{{ $allsettings->site_button_hover }}; 
}
.latest-event
{
background-color:{{ $allsettings->site_theme_color }};
}

/* theme color */
.sidebar-header
{
background:{{ $allsettings->site_theme_color }};
color: #fff;
}
.dropotron > li:hover > a 
{
				background: {{ $allsettings->site_theme_color }};
				color: #fff;
}
.countdown-timer ul li
{
list-style:none;
display:inline-block;
background:{{ $allsettings->site_button_hover }};
color:#FFFFFF;
text-align:center;
min-width:70px;
opacity:0.6;
}
.sermon-card .card-section-image .card-purchase ul li a{
background:{{ $allsettings->site_button_hover }}; 
color:#fff; 
text-decoration:none;
padding:10px 25px 10px;
display: inline-block;
opacity:0.9;

}
.sermon-card .card-section-image .card-purchase ul li a:hover,.sermon-card .card-section-image .card-purchase ul li a:focus,.sermon-card .card-section-image .card-purchase ul li a:active
{
background: {{ $allsettings->site_button_color }} !important;
}
.single-event .countdown-timer ul li
{
list-style:none;
display:inline-block;
background:{{ $allsettings->site_button_color }};
color:#FFFFFF;
text-align:center;
min-width:70px;
opacity:0.9;
}
.countdown-timing ul li
{
list-style:none;
  display:inline-block;
}
.countdown-timing ul li a
{
background:{{ $allsettings->site_button_color }}; 
color:#fff; 
text-decoration:none;
padding:10px 25px 10px;
display: inline-block;
opacity:0.9;
}
.countdown-timing ul li a:hover,.countdown-timing ul li a:active,.countdown-timing ul li a:focus
{
background: {{ $allsettings->site_button_hover }} !important;
}

.home-timer ul li
{
margin-left:3px;
margin-right:3px;
}

.product-grid9 .product-full-view:hover{color:{{ $allsettings->site_theme_color }}}
.product-grid9 .title a:hover{color:{{ $allsettings->site_theme_color }}}
.product-grid9 .add-to-cart{display:block;color:{{ $allsettings->site_theme_color }};font-weight:600;font-size:14px;opacity:0;position:absolute;left:10px;bottom:-20px;transition:all .5s ease 0s}
.product-grid9{font-family: '{{ str_replace("+"," ",$allsettings->body_font) }}', sans-serif !important;z-index:1}
/* theme color */

/* button color */
.post-category a {
	display: inline-block;
	background-color: {{ $allsettings->site_button_color }};
	color: #fff;
	font-size: 15px;
	padding: 5px 20px;
	border-radius:0 25px 25px 0;
}

.subscribe-area {
background: {{ $allsettings->site_theme_color }};

}

.testim .dots .dot.active,
.testim .dots .dot:hover {
    background: {{ $allsettings->site_button_color }};
    border-color: {{ $allsettings->site_button_color }};
}

.testim .cont div .h4 {
    color: {{ $allsettings->site_theme_color }};
    font-size: 1.2em;
    margin: 15px 0;
}

.testim .arrow:hover {
    color: {{ $allsettings->site_button_color }};
}

.blog-date {
    position: absolute;
	  background: {{ $allsettings->site_button_color }};
    top: 35px;
    left: 5px;
    color: #fff;
    border-radius: 0 25px 25px 0;
    padding: 5px 15px;
    font-weight: 600;
}

.post-date {
    position: absolute;
	  background: {{ $allsettings->site_button_color }};
    top: 35px;
    
    color: #fff;
    border-radius: 0 25px 25px 0;
    padding: 5px 15px;
    font-weight: 600;
}
.button
{
    color: #fff;
    background-color: {{ $allsettings->site_button_color }};
    border-color: {{ $allsettings->site_button_color }};
	display: inline-block;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s;
}

.button:hover,
.button:active,
.button:focus,
.button.active {
   background: {{ $allsettings->site_button_hover }};
  color: #ffffff;
  border-color: {{ $allsettings->site_button_hover }};
  display: inline-block;
  text-decoration:none;
   text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s;
}


.black-button
{
    color: #fff;
    font-family: '{{ str_replace("+"," ",$allsettings->button_font) }}' !important;
    padding: 14px 25px;
	display: inline-block;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 2px solid #fff;
    line-height: 1.5;
	transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s;
}
.black-button:hover,
.black-button:active,
.black-button:focus,
.black-button.active,.subscribe2-wrapper .subscribe-form button:hover {
   background: {{ $allsettings->site_button_hover }};
  color: #ffffff;
  border-color: {{ $allsettings->site_button_hover }};
  display: inline-block;
  text-decoration:none;
   text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 2px solid transparent;
    line-height: 1.5;
	padding: 14px 25px;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s;
}

.icon-button
{
    color: #fff;
    background-color: {{ $allsettings->site_button_hover }};
    border-color: {{ $allsettings->site_button_hover }};
	display: inline-block;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: 14px 25px;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s;
}

.icon-button:hover,
.icon-button:active,
.icon-button:focus,
.icon-button.active {
   background: {{ $allsettings->site_button_color }};
  color: #ffffff;
  border-color: {{ $allsettings->site_button_color }};
  display: inline-block;
  text-decoration:none;
   text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: 14px 25px;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s;
}
.icon-button .fa
{
font-size:20px !important;
}

/* button color */
#footer {
    background: {{ $allsettings->site_footer_color }};
}
#header 
{
		background: {{ $allsettings->site_copyright_color }};
		box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.075);
		color: inherit;
		cursor: default;
		left: 0;
		padding: 0em 1.5em;
		position: fixed;
		top: 0;
		width: 100%;
		z-index: 10000;
}
#copyright
{
background: {{ $allsettings->site_copyright_color }};
}
</style>