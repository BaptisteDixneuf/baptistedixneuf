<div class="page-header">
    <h1>Mes derniers liens</h1>
</div>

<div class="paginate wrapper">
<ul>
    <?php for ($i = 1; $i <= $page; $i++): ?>
        <li>
            <a href="?page=<?php echo $i; ?>" <?php if ($i == $this->request->page) echo 'class="active"' ?> >
                <?php echo $i; ?>
            </a>
        </li>
    <?php endfor; ?>  
</ul>
</div>



<?php foreach ($liens as $k => $v): ?>
    <div class="liens"> 	
        <h2 class="liens-titre" itemprop="name" > 
            <a href="<?php echo $v->link; ?>" >
                <?php echo $v->link; ?></a>
        </h2>
        <div class="liens-informations" >
            <?php if (isset($v->categorys)) { ?>
                <?php foreach ($v->categorys as $key => $value): ?>

                    <a href="<?php echo Router::url("categories/view/id:{$value->category_id}/slug:$value->slug"); ?>"> <?php echo "#" . $value->name_category; ?></a>
                <?php endforeach ?>	
                <?php
            }else {
                echo "Aucune Catégorie";
            }
            ?>
        </div>
        <div class="liens-contenu">
            <p><?php echo $v->content; ?></p>
        </div>
        <div class="pager">
                <p><a  href="<?php echo $v->link; ?>"> Lien vers le site &rarr; </a></p>
                <p><a  href="<?php echo Router::url("links/view/id:{$v->id}"); ?>"> Commenter &rarr; </a></p>
          
        </div>

    </div>

<?php endforeach ?>

<div class="paginate wrapper">
<ul>
    <?php for ($i = 1; $i <= $page; $i++): ?>
        <li>
            <a href="?page=<?php echo $i; ?>" <?php if ($i == $this->request->page) echo 'class="active"' ?> >
                <?php echo $i; ?>
            </a>
        </li>
    <?php endfor; ?>  
</ul>
</div>

<div id="feeddiv"></div>
<!-- feeds -->
 <!--   <script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
google.load("feeds", "1") //Load Google Ajax Feed API (version 1)
var feedcontainer=document.getElementById("feeddiv")
var feedurl="http://www.numerama.com/rss/news.rss"
var feedlimit=5
var rssoutput="<b>Flux rss:</b><br /><ul>"

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