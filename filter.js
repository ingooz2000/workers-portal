document.addEventListener('DOMContentLoaded', function () {
    // Get the input element and list
    var filterInput = document.getElementById('filterInput');
    var itemList = document.getElementById('itemList');

    // Add event listener for input changes
    filterInput.addEventListener('input', function () {
        // Get the filter value and convert to lowercase
        var filterValue = filterInput.value.toLowerCase();

        // Get all list items
        var items = itemList.getElementsByTagName('li');

        // Loop through the items and hide those that don't match the filter
        for (var i = 0; i < items.length; i++) {
            var itemText = items[i].textContent.toLowerCase();
            if (itemText.includes(filterValue)) {
                items[i].style.display = 'block';
            } else {
                items[i].style.display = 'none';
            }
        }
    });
});
