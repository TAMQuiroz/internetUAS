$(document).ready(function(){
        $('#keysearchpermission').on("input", function() {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

            var $rows = $('#permissiontable tr');
            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        });
    }
);
