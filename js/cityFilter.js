document.ready = () => {
    const $form = $('#cityFilterForm');
    const $table = $('#usersTable');
    const $clearButton = $form.find('button[name="clear"]');
    $clearButton.removeClass('hidden');

    const clearFilter = () => {
        $form.find('input[name="city"]').val('');
        showAllCities();
        window.history.pushState({}, '', window.location.pathname);
    };

    const filterCitiesBy = (city) => {
        $table.find('tbody tr').each((index, row) => {
            const $row = $(row);
            const cityCell = $row.find('td[name="city"]').text();
            if (cityCell.toLowerCase() !== city.toLowerCase()) {
                $row.hide();
            } else {
                $row.show();
            }
        });
    };

    const showAllCities = () => {
        $table.find('tbody tr').each((index, row) => {
            $(row).show();
        });
    };

    const urlParams = new URLSearchParams(window.location.search);
    const city = urlParams.get('city');
    if (city) {
        filterCitiesBy(city);
    }

    $form.on('submit', (e) => {
        e.preventDefault();
        const city = $form.find('input[name="city"]').val();

        if(city == '') {
            clearFilter();
            return;
        }

        filterCitiesBy(city);
        window.history.pushState({}, '', `?city=${city}`);
    });

    $clearButton.on('click', clearFilter);
}
