$(document).ready(function() {
    $("#project").autocomplete({
        minLength: 2,
        source: 'get_search.php',
        focus: function(event, ui) {
            $("#project").val(ui.item.label);
            return false;
        },
        select: function(event, ui) {
            $("#project").val(ui.item.label);
            return false;
        }
    })
    .autocomplete("instance")._renderItem = function(ul, item) {
        if (item.photo_lp == null) {
            return $("<li>")
                .append(` <div style="padding: 6px;font-size: 1.4rem">
                    <a style="display: flex;align-items: center;" href="view_detail.php?${item.value}">
                        <img style="display: block;margin-right: 8px;" src='admin/products/server/uploads/${item.photo}' height='50'>
                        <div style="display: block;padding: 8px">
                            ${item.label}
                            <span style="color:#eb1f27;display: block;margin-top: 8px">${item.price}</span>
                        </div>
                    </a>
                `)
                .appendTo(ul);
        }
        if (item.photo == null) {
            return $("<li>")
                .append(` <div style="margin-top: 16px;font-size: 1.4rem">
                    <a style="display: flex;align-items: center;" href="view_detail.php?${item.value}">
                        <img style="display: block;margin-right: 8px;" src='admin/product_laptop/server/uploads/${item.photo_lp}' height='50'>
                        <div style="display: block;padding: 8px">
                            ${item.label}
                            <span style="color:#eb1f27;display: block;margin-top: 8px">${item.price}</span>
                        </div>
                    </a>
                `)
                .appendTo(ul);
        }
    };
});