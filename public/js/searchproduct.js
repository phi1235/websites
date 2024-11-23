$(document).ready(function() {
    const searchInput = $('input[name="search"]');
    const clearBtn = $('.clear-btn');
    const suggestionsBox = $('.search-suggestions');
    let currentFocus = -1;
    let suggestions = [];

    // Hàm highlight text
    function highlightText(text, query) {
        if (!query) return text;
        
        const pattern = new RegExp(`(${escapeRegExp(query)})`, 'gi');
        return text.replace(pattern, '<span class="highlight">$1</span>');
    }

    // Escape special characters for RegExp
    function escapeRegExp(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }
    
    // Debounce function
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Fetch suggestions
    const fetchSuggestions = debounce(function(searchTerm) {
        if (searchTerm.length < 1) {
            suggestionsBox.hide();
            return;
        }
        
        $.ajax({
            url: window.location.href,
            method: 'GET',
            data: { search: searchTerm },
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(response) {
                suggestions = response;
                if (suggestions.length > 0) {
                    displaySuggestions(suggestions, searchTerm);
                    suggestionsBox.show();
                } else {
                    suggestionsBox.hide();
                }
            }
        });
    }, 300);
    
    // Display suggestions with highlighting
    function displaySuggestions(items, searchTerm) {
        suggestionsBox.empty();
        items.forEach((item, index) => {
            const highlightedText = highlightText(item, searchTerm);
            const div = $('<div>')
                .addClass('suggestion-item')
                .html(highlightedText) // Sử dụng html thay vì text để render HTML
                .on('click', function() {
                    searchInput.val(item);
                    suggestionsBox.hide();
                    $('form.search-box').submit();
                })
                .on('mouseenter', function() {
                    removeActive($('.suggestion-item'));
                    $(this).addClass('active');
                    currentFocus = index;
                });
            suggestionsBox.append(div);
        });
    }
    
    // Handle input changes
    searchInput.on('input', function() {
        const searchTerm = $(this).val();
        clearBtn.toggle(searchTerm.length > 0);
        currentFocus = -1;
        fetchSuggestions(searchTerm);
    });
    
    // Handle keyboard navigation
    searchInput.on('keydown', function(e) {
        const items = $('.suggestion-item');
        
        if (e.keyCode === 40) { // Down arrow
            e.preventDefault();
            currentFocus++;
            addActive(items);
        } else if (e.keyCode === 38) { // Up arrow
            e.preventDefault();
            currentFocus--;
            addActive(items);
        } else if (e.keyCode === 13) { // Enter
            e.preventDefault();
            if (currentFocus > -1) {
                if (items.length) items[currentFocus].click();
            }
        }
    });
    
    // Add active suggestion
    function addActive(items) {
        if (!items) return false;
        removeActive(items);
        if (currentFocus >= items.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (items.length - 1);
        $(items[currentFocus]).addClass('active');
    }
    
    // Remove active suggestion
    function removeActive(items) {
        items.removeClass('active');
    }
    
    // Clear search
    clearBtn.on('click', function() {
        searchInput.val('');
        $(this).hide();
        suggestionsBox.hide();
        $('form.search-box').submit();
    });
    
    // Close suggestions when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search-container').length) {
            suggestionsBox.hide();
        }
    });
    
    // Show clear button if search has value
    if (searchInput.val().length > 0) {
        clearBtn.show();
    }
});