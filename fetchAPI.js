// fetchAPI.js

// Function to fetch property details
function fetchPropertyDetails() {
    const data = null;

    const xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener('readystatechange', function () {
        if (this.readyState === this.DONE) {
            console.log(this.responseText); // Log the response
            displayPropertyDetails(this.responseText); // Handle response
        }
    });

    xhr.open('GET', 'https://bayut.p.rapidapi.com/properties/detail?externalID=4937770');
    xhr.setRequestHeader('x-rapidapi-key', '86e67fb426mshab523bdfa4fe0a9p148da9jsn0ccb5580b2df');
    xhr.setRequestHeader('x-rapidapi-host', 'bayut.p.rapidapi.com');

    xhr.send(data);
}

// Function to display property details
function displayPropertyDetails(responseText) {
    try {
        const response = JSON.parse(responseText); // Parse JSON response
        const propertyName = response.title || 'No title available';
        const propertyPrice = response.price || 'Price not available';
        const propertyDescription = response.description || 'No description available';

        // Displaying data in the console (or you can update the DOM)
        console.log(`Property Name: ${propertyName}`);
        console.log(`Price: ${propertyPrice}`);
        console.log(`Description: ${propertyDescription}`);
    } catch (error) {
        console.error('Error parsing API response:', error);
    }
}

// Export the function for usage in other files
export { fetchPropertyDetails };

