
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Veille</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo BASE_URL . '/css/materialdesign.css' ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . '/css/veille.css' ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
     <body >
        <div class="site-container">
            <div class="site-pusher">
                <header class="header">
                    <a href="#" class="header__icon" id="header__icon"></a>
                    <a href="#" class="header__logo" id="titre">Outils de Veille</a>
                    <nav class="menu">
                        <h2><a href="#" onclick='javascript:accueil();return false';>Accueil</a></h2> 
                                     
                       
                    </nav>
                </header>

                <div class="site-content">
                    <div class="site-content-container">
                        
                        
                        <div id="links"> 
                        </div>

                        <!--<div id="source">
                            <div class="dialog">
                                 <h3>RSS</h3> 
                                <div class="content" id="rss">                                 
                                    
                                   
                                </div>
                               
                            </div>

                            <div class="dialog">
                                 <h3>Liens</h3>       
                                <div class="content" id="liens">                                   
                                                                    
                                </div>                               
                            </div>

                            <div class="dialog">  
                                <h3>Autres</h3>    
                                <div class="content" id="autre">                                   
                                    
                                      
                                </div>
                               
                            </div>

                            

                        </div>-->
                      
                    </div>
                </div>

                <div class="site-cache" id="site-cache"></div>
            </div>
        </div>

        

      

        <script type="text/javascript" src="<?php echo BASE_URL . '/js/veille.js' ?>"></script>

			<!-- menu -->
			<script type="text/javascript">                        
                $(function() {
                $.getJSON('http://baptistedixneuf.fr/site/apis/topcategories', function(donnees) {
                    for (var i in donnees) {
					$(".menu").append("<a href='#' onclick='javascript:categories("+donnees[i].id+");return false';>"+donnees[i].name_category+"</a>");
					}                                    
            	});
            });
            </script>




            <!-- Accueil -->
            <script type="text/javascript">
                function accueil(id) {
                    $(function() {
                        $('body').removeClass('with--sidebar');
                        $( "#links" ).empty();
                        $.getJSON('http://baptistedixneuf.fr/apis/viewall', function(donnees) {
                        console.log(donnees);
                         $( "#titre" ).replaceWith( "<a href='#' class='header__logo' id='titre'>Outils de Veille</a>" );
                        $("#links").append("<h3> Les 10 derniers liens</h3>");
                        for (var i in donnees) {
                            $("#links").append("<div class='dialog'><div class='content'>"+donnees[i].content+"<h3>"+donnees[i].link+"</h3><p>"+donnees[i].description+"</p><div class='button label-blue'><div class='center' fit><a href='"+donnees[i].link+"' >VOIR LE SITE &rarr;</a></div><paper-ripple fit></paper-ripple></div><div class='button'><div class='center' fit><a href='#' onclick='javascript:commenter("+donnees[i].id+");return false';>COMMENTER</a></div><paper-ripple fit></paper-ripple></div></div>");
                            

                        }


                });
                });
            }
            accueil();                       
                
            </script>



            <!-- Catégorie -->
			<script type="text/javascript">
				function categories(id) {
					$(function() {
						$('body').removeClass('with--sidebar');
                        $( "#links" ).empty();
                        $( "#rss" ).empty();
                        $( "#liens" ).empty();
						$( "#autres" ).empty();

                		$.getJSON('http://baptistedixneuf.fr/apis/viewcategorie/'+id, function(donnees) {
                    		console.log(donnees);

                            $( "#titre" ).replaceWith( "<a href='#' class='header__logo' id='titre'>"+ donnees[0].name_category +"</a>" );

    	                    for (var i in donnees) {
    							$("#links").append("<div class='dialog'><div class='content'>"+donnees[i].content+"<h3>"+donnees[i].link+"</h3><p>"+donnees[i].description+"</p><div class='button label-blue'><div class='center' fit><a href='"+donnees[i].link+"' >VOIR LE SITE &rarr;</a></div><paper-ripple fit></paper-ripple></div><div class='button'><div class='center' fit><a href='#' onclick='javascript:commenter("+donnees[i].id+");return false';>COMMENTER</a></div><paper-ripple fit></paper-ripple></div></div>");
    							

					       }


                        });

                        $.getJSON('http://baptistedixneuf.fr/apis/sourcecategorie/'+id, function(sources) {
                            console.log(sources);
                            for (var i in sources) {
                                if(sources[i].type=="rss"){
                                    $("#rss").append("<li> <a href='"+sources[i].content+"'>"+sources[i].content+"</a></li>");
                                }else if(sources[i].type=="lien"){
                                    $("#liens").append("<li> <a href='"+sources[i].content+"'>"+sources[i].content+"</a></li>");
                                }else{
                                    $("#autres").append();
                                }
                            }
                        });


            	
            	});
			}                        
                
            </script>

            



			<!-- Commmenter -->
			<script type="text/javascript">
				var link_id=0;
				function commenter(id) {
					link_id=id;
					$(function() {
						$('body').removeClass('with--sidebar');
						$( "#links" ).empty();
                		$.getJSON('http://baptistedixneuf.fr/apis/viewlink/'+id, function(donnees) {
                		console.log(donnees);                   
						$("#links").append("<div class='dialog'><div class='content'>"+donnees.content+"<h3>"+donnees.link+"</h3><p>"+donnees.description+"</p><div class='button label-blue'><div class='center' fit><a href='"+donnees.link+"' >VOIR LE SITE &rarr;</a></div><paper-ripple fit></paper-ripple></div></div><div id='disqus_thread'></div>");
						initDisqus(id);
							

						                                   
            	});
            	});
			}                        
                
            </script>






			<!--commentaires -->
			<script type="text/javascript">
				function initDisqus(id) {
					window.disqus_shortname = 'baptistedixneuf';
					var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					dsq.src = '//' + window.disqus_shortname + '.disqus.com/embed.js';
					$.getScript(dsq.src)
					        .done(function () {
					            DISQUS.reset({
					                reload: true,
					                config: function () {
					                    this.page.identifier = id;
					                    this.page.url = "http://baptistedixneuf.fr/veille/"+id;
					                }
					            });
					        });
					 
					}
            </script>


            <!-- feeds -->
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>

            <!--<script type="text/javascript">
            google.load("feeds", "1") //Load Google Ajax Feed API (version 1)
            var feedcontainer=document.getElementById("feeddiv")
            var feedurl="http://www.numerama.com/rss/news.rss"
            var feedlimit=5
            var rssoutput="<div class='title'>Flux RSS</div><ul>"

            function rssfeedsetup(){
            var feedpointer=new google.feeds.Feed(feedurl) //Google Feed API method
            feedpointer.setNumEntries(feedlimit) //Google Feed API method
            feedpointer.load(displayfeed) //Google Feed API method
            }

            function displayfeed(result){
            if (!result.error){
            var thefeeds=result.feed.entries
            for (var i=0; i<thefeeds.length; i++)
            rssoutput+="<li><a href='" + thefeeds[i].link + "'>" + thefeeds[i].title + "</a></li>"
            rssoutput+="</ul>"
            feedcontainer.innerHTML=rssoutput
            }
            else
            alert("Error fetching feeds!")
            }

            window.onload=function(){
            rssfeedsetup()
            }

            </script>-->
	

            
    </body>
</html>
