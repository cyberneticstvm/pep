$(function () {
    "use strict"
    $(".btn-refresh").click(function () {
        $.ajax({
            type: 'GET',
            url: '/refresh/captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

    $(document).on("click", ".btn-add-property", function(e){
        e.preventDefault();
    });
});

async function initMap() {      
    await google.maps.importLibrary("places");
    var ccode = document.querySelector('input[name="ccode"]').value;
    const placeAutocomplete = new google.maps.places.PlaceAutocompleteElement({
        componentRestrictions: {
            country: ccode
        },
    });
    document.querySelector('div[id="location"]').appendChild(placeAutocomplete);
    placeAutocomplete.addEventListener("gmp-select", async ({ placePrediction  }) => {
        const place = placePrediction.toPlace();
        await place.fetchFields({
          fields: ["displayName", "formattedAddress", "location", "addressComponents"],
        });
        let address = place.toJSON();
        let flag = false;
        for (var i = 0; i < address.addressComponents.length; i++) {
            var addressType = address.addressComponents[i].types[0];
            if(addressType == 'country'){
                var c = address.addressComponents[i].shortText.toLowerCase();
                document.querySelector('input[name="country_code"]').value = c;
                if(ccode == c){
                    flag = true;
                }
            }
        }
        if(flag){
            document.querySelector('input[name="lat"]').value = address.location.lat;
            document.querySelector('input[name="lng"]').value = address.location.lng;
            document.querySelector('input[name="place_id"]').value = address.id;
            document.querySelector('input[name="display_name"]').value = address.displayName;
            document.querySelector('input[name="formatted_address"]').value = address.formattedAddress;
        }else{
            document.querySelector('input[name="lat"]').value = "";
            document.querySelector('input[name="lng"]').value = "";
            document.querySelector('input[name="place_id"]').value = "";
            document.querySelector('input[name="display_name"]').value = "";
            document.querySelector('input[name="formatted_address"]').value = "";
            failed({
                'error': 'The location you have selected might invalid. Please switch your contry and try again'
            })
            return false;
        }
                
      });
}

initMap();

  

