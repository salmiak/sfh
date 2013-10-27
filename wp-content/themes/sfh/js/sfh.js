
$(function(){

});

// Google map in footer
function initialize() { 
  var myLatlng = new google.maps.LatLng(58.21437,11.4227);
  var mapOptions = {
    zoom: 15,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  
  var footerMap = new google.maps.Map(document.getElementById("footerMap"), mapOptions);
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: footerMap,
      title:"Skaftö Folkhets hus"
  });
  
  var contactMap = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: contactMap,
      title:"Skaftö Folkhets hus"
  });
}
google.maps.event.addDomListener(window, 'load', initialize);