/**
 * GET request
 * @param {url request} url_api
 * @param {headers request} headers
 * @returns formmat json
*/
const getFetchData = (url_api, headers) => {
    let controller = new AbortController(); // Create a new controller to abort the request
  
    let timeout = setTimeout(() => {
      controller.abort(); // Abort the request
    }, 60000); // Set timeout to 60 seconds
  
    return new Promise((resolve, reject) => {
      fetch(url_api, {
        method: "GET",
        headers: headers,
        signal: controller.signal, // Pass the controller to the request
      })
        .then((res) => {
          resolve(res.json());
        })
        .catch((err) => {
          console.error("Error GET", err);
          reject(new Error(`Request get error: ${err}`));
        });
    });
};
  
/**
 * POST request
 * @param {url request} url_api
 * @param {headers request} headers
 * @param {data request} data
 * @returns formmat json
*/
const postFetchData = (url_api, headers, data) => {
    let controller = new AbortController(); // Create a new controller to abort the request

    let timeout = setTimeout(() => {
        controller.abort(); // Abort the request
    }, 60000); // Set timeout to 60 seconds

    return new Promise((resolve, reject) => {
        fetch(url_api, {
        method: "POST",
        headers: headers,
        body: data,
        signal: controller.signal, // Pass the controller to the request
        })
        .then((res) => {
            resolve(res.json());
        })
        .catch((err) => {
            console.error("Error POST", err);
            reject(new Error(`Request post error: ${err}`));
        });
    });
};

/**
 * PUT request
 * @param {url request} url_api
 * @param {headers request} headers
 * @param {data request} data
 * @returns json formmat
*/
const putFetchData = (url_api, headers, data) => {
    let controller = new AbortController(); // Create a new controller to abort the request

    let timeout = setTimeout(() => {
        controller.abort(); // Abort the request
    }, 60000); // Set timeout to 60 seconds

    const queryParams = new URLSearchParams(data).toString(); // Convert data to query parameters

    return new Promise((resolve, reject) => {
        fetch(`${url_api}&${queryParams}`, { // Append query parameters to URL
        method: "PUT",
        headers: headers,
        signal: controller.signal, // Pass the controller to the request
        })
        .then((res) => {
            resolve(res.json());
        })
        .catch((err) => {
            console.error("Error PUT", err);
            reject(new Error(`Request put error: ${err}`));
        });
    });
};

/**
 * DELETE request
 * @param {url request} url_api
 * @param {headers request} headers
 * @param {data request} data
 * @returns json formmat
*/
const deleteFetchData = (url_api, headers, data) => {
    let controller = new AbortController(); // Create a new controller to abort the request

    let timeout = setTimeout(() => {
        controller.abort(); // Abort the request
    }, 60000); // Set timeout to 60 seconds

    return new Promise((resolve, reject) => {
        fetch(url_api, {
        method: "DELETE",
        headers: headers,
        body: JSON.stringify(data), // Add body to the request
        signal: controller.signal, // Pass the controller to the request
        })
        .then((res) => {
            resolve(res.json());
        })
        .catch((err) => {
            console.error("Error DELETE", err);
            reject(new Error(`Request delete error: ${err}`));
        });
    });
};