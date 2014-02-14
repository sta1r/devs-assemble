// http://www.sanwebe.com/2013/10/google-map-v3-markers-and-infowindow-with-jquery
$(document).ready(function() {
    
    var map;
    var markersArray = [];

    map_initialize(); // initialize google map
    
    //############### Google Map Initialize ##############
    function map_initialize()
    {

        var geoLat    = $('#geolat').attr('value');
        var geoLng    = $('#geolng').attr('value');
        var address   = '';
        var point     = new google.maps.LatLng(geoLat,geoLng);

        var googleMapOptions = 
        { 
            center: point, // map center
            zoom: 12, //zoom level, 0 = earth view to higher value
            panControl: true, //enable pan Control
            zoomControl: true, //enable zoom control
            zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL //zoom control size
        },
            scaleControl: true, // enable scale control
            mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
        };
    
        map = new google.maps.Map(document.getElementById("user_map_canvas"), googleMapOptions);         
        

        //call create_marker() function for xml loaded maker
        create_marker(point, name, address, false, false, false, "http://PATH-TO-YOUR-WEBSITE-ICON/icons/pin_blue.png");

        
        //drop a new marker on right click
        google.maps.event.addListener(map, 'click', function(event) {

            // remove existing markers
            clearOverlays();

            //Edit form to be displayed with new marker
            var EditForm = '';

            //call create_marker() function
            create_marker(event.latLng, 'New Marker', EditForm, true, true, true, "http://PATH-TO-YOUR-WEBSITE-ICON/icons/pin_green.png");
            
            $('#geolat').val(event.latLng.d);
            $('#geolng').val(event.latLng.e);
            
        });                             
    }


    //############### clearOverlays Function ##############
    function clearOverlays() {
        for (var i = 0; i < markersArray.length; i++ ) {
            markersArray[i].setMap(null);
        }
        markersArray.length = 0;
    }


    //############### Create Marker Function ##############
    function create_marker(MapPos, MapTitle, MapDesc,  InfoOpenDefault, DragAble, Removable, iconPath)
    {                 
        //new marker
        var marker = new google.maps.Marker({
            position: MapPos,
            map: map,
            draggable:DragAble,
            animation: google.maps.Animation.DROP,
            title:"Hello World!",
            //icon: iconPath
        });

        // store the marker in an array so we can clear it later
        markersArray.push(marker);
        
        //Content structure of info Window for the Markers
        var contentString = $('<div class="marker-info-win">'+
        '<div class="marker-inner-win"><span class="info-content">'+
        '<h1 class="marker-heading">'+MapTitle+'</h1>'+
        MapDesc+ 
        '</span><button name="remove-marker" class="remove-marker" title="Remove Marker">Remove Marker</button>'+
        '</div></div>');    


        //Find remove button in infoWindow
        var removeBtn   = contentString.find('button.remove-marker')[0];
        var saveBtn     = contentString.find('button.save-marker')[0];

        //add click listner to remove marker button
        google.maps.event.addDomListener(removeBtn, "click", function(event) {
            //call remove_marker function to remove the marker from the map
            remove_marker(marker);
        });
        
        if(typeof saveBtn !== 'undefined') //continue only when save button is present
        {
            //add click listner to save marker button
            google.maps.event.addDomListener(saveBtn, "click", function(event) {
                var mReplace = contentString.find('span.info-content'); //html to be replaced after success
                var mName = contentString.find('input.save-name')[0].value; //name input field value
                var mDesc  = contentString.find('textarea.save-desc')[0].value; //description input field value
                var mType = contentString.find('select.save-type')[0].value; //type of marker
                
                if(mName =='' || mDesc =='')
                {
                    alert("Please enter Name and Description!");
                }else{
                    //call save_marker function and save the marker details
                    save_marker(marker, mName, mDesc, mType, mReplace);
                }
            });
        }
        
        
    }

    //############### Remove Marker Function ##############
    function remove_marker(Marker)
    {
        /* determine whether marker is draggable 
        new markers are draggable and saved markers are fixed */
        if(Marker.getDraggable()) 
        {
            Marker.setMap(null); //just remove new marker
        }
        else
        {
            //Remove saved marker from DB and map using jQuery Ajax
            var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
            var myData = {del : 'true', latlang : mLatLang}; //post variables
            $.ajax({
              type: "POST",
              url: "map_process.php",
              data: myData,
              success:function(data){
                    Marker.setMap(null); 
                    alert(data);
                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError); //throw any errors
                }
            });
        }
    }

    //############### Save Marker Function ##############
    function save_marker(Marker, mName, mAddress, mType, replaceWin)
    {
        //Save new marker using jQuery Ajax
        var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
        var myData = {name : mName, address : mAddress, latlang : mLatLang, type : mType }; //post variables
        console.log(replaceWin);        
        $.ajax({
          type: "POST",
          url: "map_process.php",
          data: myData,
          success:function(data){
                replaceWin.html(data); //replace info window with new html
                Marker.setDraggable(false); //set marker to fixed
                Marker.setIcon('http://PATH-TO-YOUR-WEBSITE-ICON/icons/pin_blue.png'); //replace icon
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //throw any errors
            }
        });
    }

});