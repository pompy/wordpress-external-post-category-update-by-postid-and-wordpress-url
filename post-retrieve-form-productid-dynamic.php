<html><head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
    <body>
        <h2>Enter Product ID for which you want to change category (woocommerce)</h2>
        <form method="get" action="post-retrieve-form-productid-process.php">
           Wordpress Product ID (woocommerce):<br/>
           <input name="postid" value="0"><br/>
             <br/>
             Category Id in wordpress;
             <input name="categoryid" value="3"><br/>
            <br/>
            <input type="submit">
            
        </form>
        
        <br/><br/>
        Or
        <br/><br/>
        Comma seperated product id(woocommerce)<br/>
        <textarea id="postidcommaseperated" rows=5 cols=65></textarea><br/>
        <br/>
             Category Id in wordpress
             
             <input id="categoryidgenerated" value=""><br/>
             <br/>
        <button id="cmdlink" href="#">Generate link</button>
        <br/><br/>
        <div id="generatedlink"></div>
        <br/><br/>
        
        <div id="generatedlinkresult"></div>
        
        <script language="javascript">
            
            $(document).ready(function(){
  $("#cmdlink").click(function(){
      var str = $('#postidcommaseperated').val();
      var catid = $('#categoryidgenerated').val();
      var ids = str.split(",");
        $("#generatedlink").empty();
        $("#generatedlinkresult").empty();
var i=1;
var url="";
ids.forEach(function(item) {
    url="post-retrieve-form-productid-process.php?postid=" + item+ "&categoryid=" + catid + "";
    
      $("#generatedlink").append(i + ") <a target='_blank' href='" + url + "'>Click Product #" + item + "</a><br/><br/>");
      
      
$.ajax({
            type : 'GET',
            url : window.location.origin + '/'+  url,
            dataType : 'html',
            success : function(data){                                               
                $("#generatedlinkresult").append(  data + '<hr/>');
            }   
        });
        
      
      i++;

});


        
  });
});

        </script>
    </body>
</html>