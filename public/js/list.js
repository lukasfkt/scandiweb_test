$(document).ready(() => {
  $("#delete-product-btn").click(function (e) {
    e.preventDefault();
    var productsId = [];
    const checkedBoxes = $("input:checkbox[name=deleteProduct]:checked");

    checkedBoxes.each(function () {
      productsId.push($(this).val());
    });

    if (productsId.length === 0) {
      $(".error-message").html("Please select at least one item to delete");
      return;
    }

    const payload = JSON.stringify(productsId);
    $.post("/deleteproducts", payload, function (data, status) {})
      .done(function () {
        checkedBoxes.each(function () {
          $(this).parent().remove();
        });
        //location.reload();
      })
      .fail(function () {
        $(".error-message").html("Error");
      });
  });
});
