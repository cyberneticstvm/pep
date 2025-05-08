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

    /*$(document).on('shown.bs.tab', 'a[href="#features"], a[href="#pricing"], a[href="#images"]', function(e) {
        let pid = $("#property_id").val();
        if (pid == 0) {
            let msg = {
                'error': 'Please Complete Property Details and Continue'
            }
            failed(msg);
            $('.nav-tabs a:first').tab('show');
        }
        return true;
    });*/

    $(document).on("click", ".btn-add-property", function(e){
        e.preventDefault();
        let currentTab = $(".nav-tabs li a.active").attr("href");
        let nextTab = $('.nav-tabs a[href="'+currentTab+'"]').parent().next().find('a').attr('href')
        let frm = document.getElementById('frmProperty');
        let formData = new FormData(frm);
        let proceed = validatePropertyForm();
        if(proceed){
            if(currentTab == '#images'){
                if(myDropzone.getAcceptedFiles().length === 0){
                    failed({
                        error: "Upload an image / asset to continue",
                    })
                }else{
                    myDropzone.processQueue();
                }                
            }else{
                $.ajax({
                    type: 'POST',
                    url: '/add/property',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $(".btn-add-property").attr("disabled", true);
                        $(".btn-add-property").html("Processing...<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");
                    },
                    success: function(response) {
                        if (response.type == 'success') {
                            $("#property_id").val(response.property.id)
                            $('.nav-tabs a[href="'+nextTab+'"]').tab('show')
                            success({
                                'success': response.message
                            })
                        } else if (response.type == 'warning') {
                            notify(response.message);
                        } else {
                            failed({
                                'error': response.message
                            })
                        }
                    },
                    complete: function(){
                        $(".btn-add-property").attr("disabled", false);
                        if(nextTab == '#images'){
                            $(".btn-add-property").html("Submit for Approval");
                        }else{
                            $(".btn-add-property").html("Save & continue");
                        }                    
                    },
                    error: function (xhr, status, error) {                       
                        alert('Your form was not sent successfully.');
                        console.error(error);
                    }
                });
            }
        }        
    });
});

window.addEventListener('load', initialize);

function initialize() {
    var input = document.getElementById('location');
    let ccode = String($('#ccode').val());
    var autocomplete = new google.maps.places.Autocomplete(input, {
        componentRestrictions: {'country': [ccode]},
    });
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        $('#lat').val(place.geometry['location'].lat());
        $('#lng').val(place.geometry['location'].lng());
        $('#place_id').val(place.place_id);
        $('#display_name').val(place.address_components[0]['long_name']);
        $('#formatted_address').val(place.formatted_address);
        $('#country_code').val(ccode);
    });
}

/*async function initMap() {      
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
            //document.querySelector('div[id="location"]').textContent = "";
            //document.querySelector('input[name="lat"]').value = "";
            //document.querySelector('input[name="lng"]').value = "";
            //document.querySelector('input[name="place_id"]').value = "";
            //document.querySelector('input[name="display_name"]').value = "";
            //document.querySelector('input[name="formatted_address"]').value = "";
            failed({
                'error': 'The location you have selected might invalid. Please switch your contry and try again'
            })
            return false;
        }
                
      });
}*/

//initMap();

  

