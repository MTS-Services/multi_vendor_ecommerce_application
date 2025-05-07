function generateSlug(str) {
    return str
        .toLowerCase()
        .replace(/\s+/g, "-")
        .replace(/[^\w\u0980-\u09FF-]+/g, "") // Allow Bangla characters (\u0980-\u09FF)
        .replace(/--+/g, "-")
        .replace(/^-+|-+$/g, "");
}
function getStates(countryId, route, stateId = null) {
    axios.get(route, {
        params: { country_id: countryId }
    })
    .then(function (response) {
        if (response.data.states.length > 0) {
            $('#state').html(`<option value="" selected hidden>Select State</option>`);
            response.data.states.forEach(function(state) {
                $('#state').append(`<option value="${state.id}" ${state.id == stateId ? 'selected' : ''}>${state.name}</option>`);
            });
            $('#state').prop('disabled', false);
        } else {
            $('#state').html(`<option value="" selected hidden>Select State</option>`).prop('disabled', true);
        }
    })
    .catch(function (error) {
        console.error(error);
        $('#state').html(`<option value="" selected hidden>Select State</option>`).prop('disabled', true);
        alert('Failed to load states.');
    });
}
function getStatesOrCity(countryId, route, stateOrCityId = null) {
    axios.get(route, {
        params: { country_id: countryId }
    })
    .then(function (response) {
        if(response.data.states){
            if (response.data.states.length > 0) {
                $('#state').html(`<option value="" selected hidden>Select State</option>`);
                response.data.states.forEach(function(state) {
                    $('#state').append(`<option value="${state.id}" ${state.id == stateOrCityId ? 'selected' : ''}>${state.name}</option>`);
                    $('#city').html(`<option value="" selected hidden>Select City</option>`).prop('disabled', true);
                });
                $('#state').prop('disabled', false);
            } else {
                $('#state').html(`<option value="" selected hidden>Select State</option>`).prop('disabled', true);
            }
        }else if(response.data.cities){
            if (response.data.cities.length > 0) {
                $('#city').html(`<option value="" selected hidden>Select City</option>`);
                response.data.cities.forEach(function(city) {
                    $('#city').append(`<option value="${city.id}" ${city.id == stateOrCityId ? 'selected' : ''}>${city.name}</option>`);

                    $('#state').html(`<option value="" selected hidden>Select State</option>`).prop('disabled', true);
                });
                $('#city').prop('disabled', false);
            } else {
                $('#city').html(`<option value="" selected hidden>Select City</option>`).prop('disabled', true);
            }
        }else{
            $('#state').html(`<option value="" selected hidden>Select State</option>`).prop('disabled', true);
            $('#city').html(`<option value="" selected hidden>Select City</option>`).prop('disabled', true);
        }


    })
    .catch(function (error) {
        console.error(error);
        $('#state').html(`<option value="" selected hidden>Select State</option>`).prop('disabled', true);
        $('#city').html(`<option value="" selected hidden>Select City</option>`).prop('disabled', true);
        alert('Failed to load states or cities.');
    });
}

function getCities(stateId, route, cityId = null) {

    axios.get(route, {
        params: { state_id: stateId }
    })
    .then(function (response) {
        if (response.data.cities.length > 0) {
            $('#city').html(`<option value="" selected hidden>Select City</option>`);
            response.data.cities.forEach(function(city) {
                $('#city').append(`<option value="${city.id}" ${city.id == cityId ? 'selected' : ''}>${city.name}</option>`);
            });
            $('#city').prop('disabled', false);
        } else {
            $('#city').html(`<option value="" selected hidden>Select City</option>`).prop('disabled', true);
        }
    })
    .catch(function (error) {
        console.error(error);
        $('#city').html(`<option value="" selected hidden>Select City</option>`).prop('disabled', true);
        alert('Failed to load states.');
    });
}


