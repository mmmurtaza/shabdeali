 // Ensure the script runs after the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Get references to the HTML elements
            const searchBox = document.getElementById('searchBox');
            const myList = document.getElementById('myList');
            const noResultsMessage = document.getElementById('noResults');
            const loadingMessage = document.getElementById('loadingMessage');

            // --- Function to fetch data from API and render the list ---
            async function fetchAndRenderList() {
                loadingMessage.style.display = 'block'; // Show loading message
                noResultsMessage.style.display = 'none'; // Hide no results message initially
                myList.innerHTML = ''; // Clear any existing list items

                // --- Placeholder API URL ---
                // In a real application, replace this with your actual JSON API endpoint.
                // This example simulates an API returning an array of strings.
                const apiUrl = 'server.php?cmd=getAll'; // Replace with your actual API endpoint

                // Simulate fetching data
                // const dummyData = [
                //     'Apple', 'Banana', 'Cherry', 'Date', 'Elderberry', 'Fig', 'Grape',
                //     'Honeydew', 'Kiwi', 'Lemon', 'Mango', 'Nectarine', 'Orange', 'Papaya',
                //     'Quince', 'Raspberry', 'Strawberry', 'Tangerine', 'Ugli Fruit',
                //     'Vanilla Bean', 'Watermelon', 'Xigua (Chinese Watermelon)',
                //     'Yellow Plum', 'Zucchini (Yes, it\'s a fruit botanically!)',
                //     'Apricot', 'Blueberry', 'Cantaloupe', 'Durian', 'Guava', 'Lime', 'Peach', 'Plum'
                // ];

                try {
                    // In a real scenario, you would use fetch like this:
                    const response = await fetch(apiUrl);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const data = await response.json();

                    // For this example, we'll use dummyData directly after a small delay
                    // await new Promise(resolve => setTimeout(resolve, 1000)); // Simulate network delay
                    // const data = dummyData; // Use dummy data

                    if (data && Array.isArray(data)) {
                        data.forEach(itemText => {
                            const listItem = document.createElement('li');
                            listItem.textContent = itemText;
                            myList.appendChild(listItem);
                        });
                    } else {
                        console.error('API response is not an array or is empty:', data);
                        noResultsMessage.textContent = 'Failed to load items.';
                        noResultsMessage.style.display = 'block';
                    }
                } catch (error) {
                    console.error('Error fetching or parsing data:', error);
                    noResultsMessage.textContent = 'Error loading items. Please try again later.';
                    noResultsMessage.style.display = 'block';
                } finally {
                    loadingMessage.style.display = 'none'; // Hide loading message
                    // After loading, trigger a filter in case there's already text in the search box
                    filterList();
                }
            }

            // --- Function to filter the list based on search input ---
            function filterList() {
                // Get all list items. This is a live HTMLCollection, so it reflects dynamically added items.
                const listItems = myList.getElementsByTagName('li');
                const filter = searchBox.value.toLowerCase(); // Get current search input and convert to lowercase
                let foundResults = false;

                // Loop through all list items
                for (let i = 0; i < listItems.length; i++) {
                    const listItemText = listItems[i].textContent.toLowerCase(); // Get item text and convert to lowercase

                    // Check if the list item text includes the filter text
                    if (listItemText.includes(filter)) {
                        listItems[i].style.display = ''; // Show the item (resets to default display for <li>)
                        foundResults = true;
                    } else {
                        listItems[i].style.display = 'none'; // Hide the item
                    }
                }

                // Show/hide "No results" message
                if (foundResults) {
                    noResultsMessage.style.display = 'none';
                } else {
                    noResultsMessage.textContent = `No results found for "${searchBox.value}".`;
                    noResultsMessage.style.display = 'block';
                }
            }

            // Add an event listener to the search input for 'keyup' events
            searchBox.addEventListener('keyup', filterList);

            // Initial call to fetch and render the list when the page loads
            fetchAndRenderList();
        });