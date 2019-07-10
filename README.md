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
  console.log(JSON.parse(xhr.response));
  }
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
  }
xhr.send();
}
```
