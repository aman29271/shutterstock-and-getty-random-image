<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="justifiedGallery.min.css">
  <!-- <link rel="stylesheet" href="colorbox.css"> -->
  <link rel="stylesheet" href="swipebox.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <title>Shutterstock Search</title>
  <script>colorboxConf = {
            rel:'group1',
			maxHeight : '90%',
		};</script>
    <script src="https://code.jquery.com/jquery-2.1.0.min.js" integrity="sha256-8oQ1OnzE2X9v4gpRVRMb1DWHoPHJilbur1LP9ykQ9H0=" crossorigin="anonymous"></script>
    <!-- <script src="jquery.colorbox-min.js"></script> -->
    <script src="jquery.justifiedGallery.min.js"></script>
    <script src="jquery.swipebox.min.js"></script>
    <style>
    .container{
      padding-top:50px;
    }
    </style>
</head>
<body>
<div class="container">
<div class="tabs is-toggle is-toggle-rounded is-centered">
  <ul id="list">
    <li class="is-active" id="shutterstock">
      <a>
        <span class="icon is-small"><i class="fas fa-image"></i></span>
        <span>Shutterstock</span>
      </a>
    </li>
    <li id="gettyimages">
      <a>
        <span class="icon is-small"><i class="fas fa-image"></i></span>
        <span>Gettyimages</span>
      </a>
    </li>
    <!-- <li id="unsplash">
      <a>
        <span class="icon is-small"><i class="fas fa-image"></i></span>
        <span>Unsplash</span>
      </a>
    </li> -->
    
  </ul>
</div>
<div id="myGallery"></div>
</div>

<script>
activeTab = '';
  $(document).ready(function(){
            activeTab = document.querySelector('.is-active');
            request(activeTab.id);
            justified_gallery();
  })
  function justified_gallery(){
    $("#myGallery").justifiedGallery({
                rowHeight:180,
                lastRow:'nojustify',
                margins:5
            }).on('jg.complete',function(){
                $('a.group2').swipebox();
            });  
            }

  var tabs= document.querySelectorAll('#list li');
  for(var i=0;i<tabs.length;i++){
    tabs[i].addEventListener('click',function(e){
      for(var i =0;i<tabs.length;i++){
        tabs[i].classList.remove('is-active');
      }        
      e.currentTarget.classList.add('is-active');
        activeTab = e.currentTarget;
        result = document.querySelector('#myGallery');
        if(result.hasChildNodes()){
          result.innerHTML = null;
        }
      justified_gallery();
      request(activeTab.id);
  },false)
  }
  function currentTarget(e){
    
  }
// $('#list li').on('click',function(e){
//   console.log(e.target);
//   // e.stopPropagation();
//   tabs = $('#list li')
//   for(var i=0;i<tabs.length;i++){
//     tabs[i].classList.remove("is-active");
//   }
// }
// )
function request(e){
  for(var i=0;i<12;i++){
    setTimeout(function(){
      fetchData(e);
    },100)
  }
}
function imageCompress(e){
  var canvas  = document.createElement('canvas');
  var context = canvas.getContext('2d');
  canvas.height = 600;
  canvas.width = (e.naturalWidth/e.naturalHeight)*600;
  context.drawImage(e,0,0,e.naturalWidth,e.naturalHeight,0,0,canvas.width,canvas.height);
  return canvas.toBlob(function(blob){
     img =new Image();
     return img.onload = function(){
      return img;
     }
    img.src = window.URL.createObjectURL(blob);
  })
  
}
  function fetchData(e){
    $.ajax({url: "auth.php",type:"POST",data:{'query':e},
    success:function(data){
      var data = JSON.parse(data);
      console.log(data);
      updateHTML(data);
    }})
  }
  function updateHTML(e){
          var img = new Image();       
          img.onload = ()=>{
            img.width = 200;
            // var img1 = imageCompress(img);
            var anchor = document.createElement('a');
            var gallery = document.querySelector('#myGallery');
            anchor.innerHTML = `<img src="${img.src}">`;
            anchor.classList.add('group2');
            anchor.rel = 'group1';
            anchor.href = img.src;
            gallery.appendChild(anchor);
            $('#myGallery').justifiedGallery('norewind');
          }
          // img.crossOrigin="anonymous";
            if(e.image_url){
            img.src = e.image_url;
          }
          else if(e.high_res_comp){
            img.src = e.high_res_comp;
          }
          else if(e.urls.regular){
            img.src = e.urls.regular;
          }
        }
$(window).scroll(function(){
      if($(document).height() - ($(window).scrollTop() + $(window).height()) <= 20){
        for(var i=0;i<12;i++){
          fetchData(activeTab.id);
        }
      }
    })
</script>
</body>
</html>