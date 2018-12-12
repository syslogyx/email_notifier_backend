<!DOCTYPE html>
<html>
<head>
<title> Email </title>

<meta name="viewport" content="width=device-width"/>
<meta name="description" content="The Curriculum Vitae of Joe Bloggs."/>
<meta charset="UTF-8"> 
<style type="text/css">
.page-break {
    page-break-after: always;
    /*box-decoration-break: slice;*/
}
@page {
    header: page-header;
    footer: page-footer;
    margin-top: 100px;
    margin-bottom: 150px;
}

html,body,div,span,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,abbr,address,cite,code,del,dfn,em,img,ins,kbd,q,samp,small,strong,sub,sup,var,b,i,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video {
border:0;
font:inherit;
font-size:100%;
margin:0;
padding:0;
vertical-align:baseline;
}
html,body,section{
margin:0 20px 0 20px !important;
}

article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section {
display:block;
}

html, body {background: transparent; font-family: 'Lato', helvetica, arial, sans-serif; font-size: 16px; color: #222;}

.clear {clear: both;}

p {
    font-size:14px;
    line-height: 1.4em;
    /*margin-bottom: 20px;*/
    color: #444;
}

span{
    font-size:14px;
    line-height: 1.3em;
    margin-bottom: 15px;
    color: #444;
}

#cv {
    width: 100%;
    max-width: 1024px;
    background: white;
    margin: 20px auto;
}

.mainDetails {
    /*padding: 25px 35px;*/
    border-bottom: 2px solid black;
    background: white;
    margin:5px;
}

#name h1 {
    font-size: 2.5em;
    font-weight: 700;
    font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
    margin-bottom: -6px;
}

#name h2 {
    font-size: 2em;
    margin-left: 2px;
    font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
}

#mainArea {
    padding: 0 40px;
}

#headshot {
    width: 12.5%;
    float: left;
    margin-right: 30px;
}

#headshot img {
    width: 100%;
    height: auto;
    -webkit-border-radius: 50px;
    border-radius: 50px;
}

#name {
    float: left;
}

#contactDetails {
    float: right;
}

#contactDetails ul {
    list-style-type: none;
    font-size: 0.9em;
    margin-top: 2px;
}

#contactDetails ul li {
    margin-bottom: 3px;
    color: #444;
}

#contactDetails ul li a, a[href^=tel] {
    color: #444; 
    text-decoration: none;
    -webkit-transition: all .3s ease-in;
    -moz-transition: all .3s ease-in;
    -o-transition: all .3s ease-in;
    -ms-transition: all .3s ease-in;
    transition: all .3s ease-in;
}

#contactDetails ul li a:hover { 
    color: #cf8a05;
}


section {
    border-top: 1px solid #dedede;
    /*border-top: 1px solid #356aac;*/
    padding: 20px 0 0;
}

section:first-child {
    border-top: 0;
}

section:last-child {
    padding: 20px 0 10px;
}

.sectionTitle {
    float: left;
    width: 100%;
}

.sectionContent {
    float: right;
    width: 97.5%;
}

.sectionTitle h1 {
    font-family: callibri;
    font-size: 20px;
    color:#356aac;
}

.sectionContent h2 {
    font-family: callibri;
    font-size: 13px;
    margin-bottom: -2px;
}
.sectionContent {
    text-align: justify;
}

.subDetails {
    text-align: justify;
}

.subDetails {
    font-size: 0.8em;
    /*font-style: italic;*/
    margin-bottom: 3px;
}

.industrial-labels{
    font-size: 0.8em;
    /*font-style: italic;*/
    margin-bottom: 5px;
}

.education-labels{
    font-size: 0.8em;
    /*font-style: italic;*/
    margin-bottom: 5px;
}

.keySkills {
    list-style-type: disc;
    -moz-column-count:3;
    -webkit-column-count:3;
    column-count:3;
    margin-bottom: 20px;
    font-size: 14px;
    color: #444;
    margin-left: 10px;
}

.keySkills ul li {
    margin-bottom: 3px;
}

@media all and (min-width: 602px) and (max-width: 800px) {
    #headshot {
        display: none;
    }
    
    .keySkills {
    -moz-column-count:2;
    -webkit-column-count:2;
    column-count:2;
    }
}

@media all and (max-width: 601px) {
    #cv {
        width: 100%;
        margin: 10px auto;
        min-width: 280px;
    }
    
    #headshot {
        display: none;
    }
    
    #name, #contactDetails {
        float: none;
        width: 100%;
        text-align: center;
    }
    
    .sectionTitle, .sectionContent {
        float: none;
        width: 100%;
    }
    
    .sectionTitle {
        margin-left: -2px;
        font-size: 1.25em;
    }
    
    .keySkills {
        -moz-column-count:2;
        -webkit-column-count:2;
        column-count:2;
    }
}

@media all and (max-width: 480px) {
    .mainDetails {
        padding: 15px 15px;
    }
    
    section {
        padding: 15px 0 0;
    }
    
    #mainArea {
        padding: 0 25px;
    }

    
    .keySkills {
    -moz-column-count:1;
    -webkit-column-count:1;
    column-count:1;
    }
    
    #name h1 {
        line-height: .8em;
        margin-bottom: 4px;
    }
}

@media print {
    #cv {
        width: 100%;
    }
}

@-webkit-keyframes reset {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 0;
    }
}

@-webkit-keyframes fade-in {
    0% {
        opacity: 0;
    }
    40% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

@-moz-keyframes reset {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 0;
    }
}

@-moz-keyframes fade-in {
    0% {
        opacity: 0;
    }
    40% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

@keyframes reset {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 0;
    }
}

@keyframes fade-in {
    0% {
        opacity: 0;
    }
    40% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

.instaFade {
    -webkit-animation-name: reset, fade-in;
    -webkit-animation-duration: 1.5s;
    -webkit-animation-timing-function: ease-in;
    
    -moz-animation-name: reset, fade-in;
    -moz-animation-duration: 1.5s;
    -moz-animation-timing-function: ease-in;
    
    animation-name: reset, fade-in;
    animation-duration: 1.5s;
    animation-timing-function: ease-in;
}

.quickFade {
    -webkit-animation-name: reset, fade-in;
    -webkit-animation-duration: 2.5s;
    -webkit-animation-timing-function: ease-in;
    
    -moz-animation-name: reset, fade-in;
    -moz-animation-duration: 2.5s;
    -moz-animation-timing-function: ease-in;
    
    animation-name: reset, fade-in;
    animation-duration: 2.5s;
    animation-timing-function: ease-in;
}
 
.delayOne {
    -webkit-animation-delay: 0, .5s;
    -moz-animation-delay: 0, .5s;
    animation-delay: 0, .5s;
}

.delayTwo {
    -webkit-animation-delay: 0, 1s;
    -moz-animation-delay: 0, 1s;
    animation-delay: 0, 1s;
}

.delayThree {
    -webkit-animation-delay: 0, 1.5s;
    -moz-animation-delay: 0, 1.5s;
    animation-delay: 0, 1.5s;
}

.delayFour {
    -webkit-animation-delay: 0, 2s;
    -moz-animation-delay: 0, 2s;
    animation-delay: 0, 2s;
}

.delayFive {
    -webkit-animation-delay: 0, 2.5s;
    -moz-animation-delay: 0, 2.5s;
    animation-delay: 0, 2.5s;
}

/*#personalDetailsTable td,#qualificationDetailsTable td {
    font-size: 0.8em;
}*/

#personalDetailsTable td .span-label,#qualificationDetailsTable td .span-label{
    color: #444;
}

.set-title-color{
    color: #356aac;
}
h1{
    font-weight: normal !important;
}

</style>

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body id="top">
<htmlpageheader name="page-header">
    <img src="{{ public_path('/imgs/Email_HF.png') }}">
</htmlpageheader>
<div id="cv" class="instaFade">
        
  
    <div class="" style="display:inline-block;">          
        <section style="border-top:0px; margin-left: 50px">
            <div style="width: 50%; float: left;">            
                <h1 class="set-title-color" style="font-size: 16px;">Hello All,</h1></br>
				<h1 class="set-title-color" style="font-size: 16px;"><strong>'Machine "'.$machine_name.'" is in "'.$status.'" status with "'.$reason.'" message' </strong></h1> 
            </div>
           
        </section>
    </div>
</div>
<htmlpagefooter name="page-footer" style="bottom: 0px">
<div style="text-align: center;color:#cac5c5">{PAGENO}</div>
<img src="{{ public_path('/imgs/Footer_.png') }}">
</htmlpagefooter>
</body>
</html>