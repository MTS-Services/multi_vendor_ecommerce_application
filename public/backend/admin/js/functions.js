
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
