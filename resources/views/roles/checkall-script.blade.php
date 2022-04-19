<script>
    // Get repeated parent select all checkbox
    var checkall = document.querySelectorAll('.select-all-check');
    // For each parent checkbox get all child checkboxes and check or uncheck them
    checkall.forEach(function(el) {
        el.addEventListener('change', function() {
            parentDataId = this.getAttribute('data-id');
            var checkboxes = document.querySelectorAll('input[data-id="' + parentDataId + '"]');
            if (this.checked) {
                checkboxes.forEach(function(el) {
                    if (el.getAttribute('data-id') == parentDataId) {
                        el.checked = true;
                    }
                });
            } else {
                checkboxes.forEach(function(el) {
                    if (el.getAttribute('data-id') == parentDataId) {
                        el.checked = false;
                    }
                });
            }
        });
    });

    // Uncheck parent checkbox if one of the child checkboxes is unchecked
    var checkboxes = document.querySelectorAll('.child-checkbox');
    checkboxes.forEach(function(el) {
        el.addEventListener('change', function() {
            parentDataId = this.getAttribute('data-id');
            var parent = document.querySelector('.parent-checkbox-' + parentDataId);
            var checked = parent.checked;
            if (el.checked == false) {
                checked = false;
            }
            parent.checked = checked;

        });
    });
</script>
