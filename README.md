# shutterstock-and-getty-random-image
It fetches full dpi images from Shutterstock and Gettyimages by an api endpoint.
...
## Shutterstock 
```javascript
api_endpoint = "http://tab.shutterstock.com/photos";
var xhr = new XMLHttpRequest();
xhr.open("GET",api_endpoint,true);
xhr.onload = function(){
  if(xhr.readyState == 4 && xhr.status == 200){
  const data = JSON.parse(xhr.response);
  const img = new Image();
  img.onload = function(){
    document.appendChild(img);
  }
  img.src = data.image_url;
  }
xhr.onerror = function(){
console.log("Network Error")}
xhr.send();
}
```
## GettyImages
```javascript
api_endpoint = "hhttps://6v0luvcal3.execute-api.us-west-2.amazonaws.com/prod/backgroundimagecached";
var xhr = new XMLHttpRequest();
xhr.open("GET",api_endpoint,true);
xhr.onload = function(){
  if(xhr.readyState == 4 && xhr.status == 200){
  console.log(JSON.parse(xhr.response));
  const img = new Image();
  img.onload = function(){
    document.appendChild(img);
  }
  img.src = data.high_res_comp;
  }
xhr.onerror = function(){
console.log("Network Error")}
xhr.send();
}
```
##### save this in JS File and run.

...
## Instructions
git clone https://github.com/aman29271/shutterstock-and-getty-random-image.git
cd shutterstock-and-getty-random-image
Run image-download.py on Respective OS 
