const queryManagement = {
    parameters: [],
    addParameter: (key, value) => {
        queryManagement.parameters[key] = value;
        queryManagement.updateHistory();
    },
    removeParameter: (key) => {
        if (queryManagement.parameters.hasOwnProperty(key)) {
            queryManagement.parameters[key] = undefined;
        }
        queryManagement.updateHistory();
    },
    updateHistory: () => {
        let query = [];
        for (let key in queryManagement.parameters) {
            if (queryManagement.parameters[key] !== undefined) {
                query.push(`${key}=${queryManagement.parameters[key]}`);
            }
        }
        window.history.pushState({}, '', `?${query.join('&')}`);
    }
}

const urlParams = new URLSearchParams(window.location.search);
urlParams.forEach((value, key) => {
    queryManagement.parameters[key] = value;
});