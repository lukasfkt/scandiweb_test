$(document).ready(() => {
  $("#product_list").submit(function (e) {
    e.preventDefault();
    var productsId = [];

    $("input:checkbox[name=deleteProduct]:checked").each(function () {
      productsId.push($(this).val());
    });

    if (productsId.length === 0) {
      $(".error-message").html("Please select at least one item to delete");
      return;
    }

    const payload = JSON.stringify(productsId);
    $.post("/deleteproducts", payload, function (data, status) {})
      .done(function () {
        $("input:checkbox[name=deleteProduct]:checked").each(function () {
          $(this).parent().remove();
        });
      })
      .fail(function () {
        $(".error-message").html("Error");
      });
  });
});
