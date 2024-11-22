$(() => {
    const $form = $('#userAddForm');
    const $table = $('#usersTable');
    const $errors = $('#errors');

    const clearErrors = () => {
        $errors.addClass('hidden');
        $errors.find('[name=error]').remove();
        queryManagement.removeParameter('errors');
    }

    const handleError = (errors) => {
        $errors.removeClass('hidden');
        $errors.find('[name=error]').remove();
        errors.forEach((error) => {
            $errors.append(`<p name="error">${error}</p>`);
        });
    }

    $form.on('submit', (e) => {
        e.preventDefault();

        clearErrors();

        const user = {
            name: $form.find('input[name="name"]').val(),
            email: $form.find('input[name="email"]').val(),
            city: $form.find('input[name="city"]').val(),
            phoneNumber: $form.find('input[name="phoneNumber"]').val()
        };

        $.post('createAjax.php', user, (response) => {
            if (response.error) {
                handleError(['An error occurred. Please try again.']);
            } else {
                if(response.success) {
                    $table.find('tbody').append(`
                        <tr>
                            <td name="name">${user.name}</td>
                            <td name="email">${user.email}</td>
                            <td name="city">${user.city}</td>
                            <td name="phoneNumber">${user.phoneNumber}</td>
                        </tr>
                        `);
                } else {
                    handleError(response.errors);
                }
            }
        });
    });
});
