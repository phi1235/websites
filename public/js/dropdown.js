let selectedColors = [];
let selectedSizes = [];
document.querySelector('form').addEventListener('submit', function(e) {
    console.log('Form submitting...');
    console.log('Colors:', document.getElementById('selectedColors').value);
    console.log('Sizes:', document.getElementById('selectedSizes').value);
});

function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    const allDropdowns = document.getElementsByClassName('dropdown-menu');

    // Đóng tất cả các dropdown khác
    Array.from(allDropdowns).forEach(d => {
        if (d.id !== dropdownId) {
            d.style.display = 'none';
        }
    });

    // Toggle dropdown hiện tại
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

function updateColors(checkbox) {
    if (checkbox.checked) {
        selectedColors.push(checkbox.value);
    } else {
        selectedColors = selectedColors.filter(color => color !== checkbox.value);
    }

    document.getElementById('colorInput').value = selectedColors.join(', ');
    document.getElementById('selectedColors').value = selectedColors.join(',');
    console.log('Selected Colors:', selectedColors); // Debug
}

function updateSizes(checkbox) {
    if (checkbox.checked) {
        selectedSizes.push(checkbox.value);
    } else {
        selectedSizes = selectedSizes.filter(size => size !== checkbox.value);
    }

    document.getElementById('sizeInput').value = selectedSizes.join(', ');
    document.getElementById('selectedSizes').value = selectedSizes.join(',');
    console.log('Selected Colors:', selectedColors); // Debug
}

// Đóng dropdown khi click bên ngoài
document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropdown-container')) {
        const dropdowns = document.getElementsByClassName('dropdown-menu');
        Array.from(dropdowns).forEach(dropdown => {
            dropdown.style.display = 'none';
        });
    }
});